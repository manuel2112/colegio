<?php

namespace App\Http\Controllers;

use App\Apoderado;
use App\AlumnoApoderado;
use Freshwork\ChileanBundle\Rut;
use App\Rules\ExisteApoderadoRut;
use App\Rules\ExistePupilo;
use Illuminate\Support\Facades\DB;
use DataTables;

class ApoderadoController extends Controller
{
    public function index()
    {
        $data['apoderados'] = Apoderado::where('APODERADO_FLAG', true)->orderby('id', 'ASC')->get();
        $data['contador'] = 1;
        return view('apoderado.index',$data);
    }

    public function create()
    {
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['tipoapoderado'] = DB::table('tipoapoderado')->where('TIPO_APODERADO_FLAG', true)->orderby('TIPO_APODERADO_NOMBRE', 'ASC')->get();
        return view('apoderado.create',$data);
    }

    public function store()
    {
        request()->validate([
            'insRUTApoderado'           => ['required', 'cl_rut', new ExisteApoderadoRut],
            'insNombresApoderado'       => 'required',
            'insApPaternoApoderado'     => 'required',
            'insApMaternoApoderado'     => 'required',
            'insFecNacApoderado'        => 'required',
            'insEmailApoderado'         => 'required|email',
            'insCelularApoderado'       => 'required|numeric|digits_between:9,10',
            'insFonoApoderado'          => 'nullable|numeric|digits_between:9,10',
            'insDomicilioApoderado'     => 'required',
            'insCiudadApoderado'        => 'required',
            'insTipoApoderado'          => 'required',
            'insLugarTrabajoApoderado'  => 'nullable',
            'insFonoTrabajoApoderado'   => 'nullable|numeric|digits_between:9,10',
            'insExApoderado'            => 'required',
            'insImagenApoderado'        => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $rutFormat = Rut::parse(request('insRUTApoderado'))->normalize();
        $rutValido = Rut::parse(request('insRUTApoderado'))->format(Rut::FORMAT_COMPLETE);
        if( strlen($rutFormat) == 8 ){
            $rutValido = '0'.$rutValido;
        }

        $filename = NULL;
        if( request()->hasFile('insImagenApoderado') ){
            $filename = request()->file('insImagenApoderado')->store('public');
        }

        $cel = request('insCelularApoderado') ? '+56' . request('insCelularApoderado') : NULL;

        Apoderado::create([
            'APODERADO_RUT'             => $rutValido,
            'APODERADO_NOMBRES'         => mb_strtoupper(request('insNombresApoderado')),
            'APODERADO_AP_PATERNO'      => mb_strtoupper(request('insApPaternoApoderado')),
            'APODERADO_AP_MATERNO'      => mb_strtoupper(request('insApMaternoApoderado')),
            'TIPO_APODERADO_ID'         => mb_strtoupper(request('insTipoApoderado')),
            'APODERADO_FEC_NAC'         => date(request('insFecNacApoderado')),
            'APODERADO_DOMICILIO'       => mb_strtoupper(request('insDomicilioApoderado')),
            'CIUDAD_ID'                 => request('insCiudadApoderado'),
            'APODERADO_EMAIL'           => request('insEmailApoderado'),
            'APODERADO_FONO_CEL'        => $cel,
            'APODERADO_FONO_FIJO'       => request('insFonoApoderado'),
            'APODERADO_TRABAJO'         => request('insLugarTrabajoApoderado'),
            'APODERADO_FONO_TRABAJO'    => request('insFonoTrabajoApoderado'),
            'APODERADO_IMG'             => $filename,
            'APODERADO_EX_ALUMNO'       => request('insExApoderado')
        ]);
        
        return redirect()->route('apoderado.index')->with('success','APODERADO INGRESADO EXITOSAMENTE');
    }
    
    public function show(Apoderado $apoderado)
    {
        $data['apoderado']  = $apoderado;
        $data['alumnos']    = DB::table('alumnos')->where('ALUMNO_FLAG', true)->orderby('ALUMNO_AP_PATERNO', 'ASC')->get();
        $data['pupilos']    = DB::table('alumno_apoderado')->where('ID_APODERADO', $apoderado->id )->orderby('ID_ALUMNO', 'ASC')->get();
        return view('apoderado.show',$data);
    }
    
    public function edit(Apoderado $apoderado)
    {
        $data['apoderado'] = $apoderado;
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['tipoapoderado'] = DB::table('tipoapoderado')->where('TIPO_APODERADO_FLAG', true)->orderby('TIPO_APODERADO_NOMBRE', 'ASC')->get();
        return view('apoderado.edit',$data);
    }
    
    public function update(Apoderado $apoderado)
    {
        request()->validate([
            'updNombresApoderado'       => 'required',
            'updApPaternoApoderado'     => 'required',
            'updApMaternoApoderado'     => 'required',
            'updFecNacApoderado'        => 'required',
            'updEmailApoderado'         => 'required|email',
            'updCelularApoderado'       => 'required|numeric|digits_between:9,10',
            'updFonoApoderado'          => 'nullable|numeric|digits_between:9,10',
            'updDomicilioApoderado'     => 'required',
            'updCiudadApoderado'        => 'required',
            'updTipoApoderado'          => 'required',
            'updLugarTrabajoApoderado'  => 'nullable',
            'updFonoTrabajoApoderado'   => 'nullable|numeric|digits_between:9,10',
            'updExApoderado'            => 'required',
            'updImagenApoderado'        => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $filename = request('updImagenHideApoderado');
        if( request()->hasFile('updImagenApoderado') ){
            $filename = request()->file('updImagenApoderado')->store('public');
        }

        $cel = request('updCelularApoderado') ? '+56' . request('updCelularApoderado') : NULL;

        $apoderado->update([
            'APODERADO_NOMBRES'         => mb_strtoupper(request('updNombresApoderado')),
            'APODERADO_AP_PATERNO'      => mb_strtoupper(request('updApPaternoApoderado')),
            'APODERADO_AP_MATERNO'      => mb_strtoupper(request('updApMaternoApoderado')),
            'TIPO_APODERADO_ID'         => mb_strtoupper(request('updTipoApoderado')),
            'APODERADO_FEC_NAC'         => date(request('updFecNacApoderado')),
            'APODERADO_DOMICILIO'       => mb_strtoupper(request('updDomicilioApoderado')),
            'CIUDAD_ID'                 => request('updCiudadApoderado'),
            'APODERADO_EMAIL'           => request('updEmailApoderado'),
            'APODERADO_FONO_CEL'        => $cel,
            'APODERADO_FONO_FIJO'       => request('updFonoApoderado'),
            'APODERADO_TRABAJO'         => request('updLugarTrabajoApoderado'),
            'APODERADO_FONO_TRABAJO'    => request('updFonoTrabajoApoderado'),
            'APODERADO_IMG'             => $filename,
            'APODERADO_EX_ALUMNO'       => request('updExApoderado')
        ]);
        
        return redirect()->route('apoderado.index')->with('success','APODERADO ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(Apoderado $apoderado)
    {
        DB::table('apoderado')->where('id', $apoderado->id)->update(['APODERADO_FLAG' => false]);

        return redirect()->route('apoderado.index')->with('success','APODERADO ELIMINADO EXITOSAMENTE');
    }

    public function addpupilo(Apoderado $apoderado)
    {
        $data['apoderado']  = $apoderado;
        
        request()->validate([
            'slc-alumno'     => ['required', 'string', new ExistePupilo($apoderado->id)]
        ]);

        AlumnoApoderado::create([
            'ID_ALUMNO'         => request('slc-alumno'),
            'ID_APODERADO'      => $apoderado->id
        ]);
        
        return redirect()->route('apoderado.show',$data)->with('success','ALUMNO ASOCIADO EXITOSAMENTE');
    }
    
    public function destroypupilo(Apoderado $apoderado)
    {
        $data['apoderado']  = $apoderado;

        DB::table('alumno_apoderado')
        ->where('ID_ALUMNO', request('id-pupilo'))
        ->where('ID_APODERADO', $apoderado->id)
        ->delete();

        return redirect()->route('apoderado.show',$data)->with('success','ESTE ALUMNO HA SIDO ELIMINADO EXITOSAMENTE');
    }

    public function json()
    {
        $data = Apoderado::where('APODERADO_FLAG', true)->orderby('APODERADO_AP_PATERNO', 'ASC')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<div class="btn-group">';
                       $btn .= '<a href="'.route('apoderado.show' , $row).'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>';
                       $btn .= '<a href="'.route('apoderado.edit' , $row).'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>';
                       $btn .= '<form method="POST" action="'.route('apoderado.destroy', $row).'">
                       '.csrf_field().'
                       <input type="hidden" name="_method" value="DELETE"> 
                       <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button></form>';
                       $btn .= '</div>';
                       return $btn;
                })
                ->addColumn('nombre', function($row){
                       $nombre = $row->APODERADO_AP_PATERNO.' '.$row->APODERADO_AP_MATERNO.', '. $row->APODERADO_NOMBRES;
                       return $nombre;
                })
                ->rawColumns(['action','nombre'])
                ->make(true);

        return view('index');
    }
}
