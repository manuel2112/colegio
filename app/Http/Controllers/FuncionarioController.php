<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Freshwork\ChileanBundle\Rut;
use App\Rules\ExisteFuncionarioRut;
use Illuminate\Support\Facades\DB;
use DataTables;

class FuncionarioController extends Controller
{
    public function index()
    {
        $data['funcionarios'] = Funcionario::where('FUNCIONARIO_FLAG', true)->orderby('id', 'ASC')->get();
        $data['contador'] = 1;
        return view('funcionario.index',$data);
    }

    public function create()
    {
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['cargos'] = DB::table('tipocargo')->where('TIPO_CARGO_FLAG', true)->orderby('TIPO_CARGO_NOMBRE', 'ASC')->get();
        return view('funcionario.create',$data);
    }

    public function store()
    {
        request()->validate([
            'insRUTFuncionario'           => ['required', 'cl_rut', new ExisteFuncionarioRut],
            'insNombresFuncionario'       => 'required|max:64',
            'insApPaternoFuncionario'     => 'required|max:64',
            'insApMaternoFuncionario'     => 'required|max:64',
            'insFecNacFuncionario'        => 'required',
            'insEmailFuncionario'         => 'required|email|max:128',
            'insCelularFuncionario'       => 'required|numeric|digits_between:9,10',
            'insFonoFuncionario'          => 'nullable|numeric|digits_between:9,10',
            'insDomicilioFuncionario'     => 'required|max:255',
            'insCiudadFuncionario'        => 'required',
            'insImagenFuncionario'        => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'insCargoFuncionario'         => 'required'
        ]);

        $rutFormat = Rut::parse(request('insRUTFuncionario'))->normalize();
        $rutValido = Rut::parse(request('insRUTFuncionario'))->format(Rut::FORMAT_COMPLETE);
        if( strlen($rutFormat) == 8 ){
            $rutValido = '0'.$rutValido;
        }

        $filename = NULL;
        if( request()->hasFile('insImagenFuncionario') ){
            $filename = request()->file('insImagenFuncionario')->store('public');
        }

        $cel = request('insCelularFuncionario') ? '+56' . request('insCelularFuncionario') : NULL;

        $data = Funcionario::create([
                'FUNCIONARIO_RUT'             => $rutValido,
                'FUNCIONARIO_NOMBRES'         => mb_strtoupper(request('insNombresFuncionario')),
                'FUNCIONARIO_AP_PATERNO'      => mb_strtoupper(request('insApPaternoFuncionario')),
                'FUNCIONARIO_AP_MATERNO'      => mb_strtoupper(request('insApMaternoFuncionario')),
                'FUNCIONARIO_FEC_NAC'         => date(request('insFecNacFuncionario')),
                'FUNCIONARIO_DOMICILIO'       => mb_strtoupper(request('insDomicilioFuncionario')),
                'CIUDAD_ID'                   => request('insCiudadFuncionario'),
                'FUNCIONARIO_EMAIL'           => request('insEmailFuncionario'),
                'FUNCIONARIO_FONO_CEL'        => $cel,
                'FUNCIONARIO_FONO_FIJO'       => request('insFonoFuncionario'),
                'FUNCIONARIO_IMG'             => $filename
            ]);

        foreach ( request('insCargoFuncionario') as $cargo ) {
            DB::table('funcionario_cargo')->insert([
                'FUNCIONARIO_ID' => $data->id,
                'CARGO_ID' => $cargo
            ]);
        }
        
        return redirect()->route('funcionario.index')->with('success','FUNCIONARIO INGRESADO EXITOSAMENTE');
    }
    
    public function show(Funcionario $funcionario)
    {
        $data['funcionario']  = $funcionario;
        $data['cargos'] = DB::table('funcionario_cargo')->where('FUNCIONARIO_ID', $funcionario->id )->orderby('CARGO_ID', 'ASC')->get();
        return view('funcionario.show',$data);
    }
    
    public function edit(Funcionario $funcionario)
    {
        $data['funcionario'] = $funcionario;
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['cargos'] = DB::table('tipocargo')->where('TIPO_CARGO_FLAG', true)->orderby('TIPO_CARGO_NOMBRE', 'ASC')->get();
        $data['funcar'] = DB::table('funcionario_cargo')->where('FUNCIONARIO_ID', $funcionario->id )->get();
        return view('funcionario.edit',$data);
    }
    
    public function update(Funcionario $funcionario)
    {
        request()->validate([
            'updNombresFuncionario'       => 'required',
            'updApPaternoFuncionario'     => 'required',
            'updApMaternoFuncionario'     => 'required',
            'updFecNacFuncionario'        => 'required',
            'updEmailFuncionario'         => 'required|email',
            'updCelularFuncionario'       => 'required|numeric|digits_between:9,10',
            'updFonoFuncionario'          => 'nullable|numeric|digits_between:9,10',
            'updDomicilioFuncionario'     => 'required',
            'updCiudadFuncionario'        => 'required',
            'updImagenFuncionario'        => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'updCargoFuncionario'         => 'required'
        ]);

        $filename = request('updImagenHideFuncionario');
        if( request()->hasFile('updImagenFuncionario') ){
            $filename = request()->file('updImagenFuncionario')->store('public');
        }

        $cel = request('updCelularFuncionario') ? '+56' . request('updCelularFuncionario') : NULL;

        $funcionario->update([
            'FUNCIONARIO_NOMBRES'         => mb_strtoupper(request('updNombresFuncionario')),
            'FUNCIONARIO_AP_PATERNO'      => mb_strtoupper(request('updApPaternoFuncionario')),
            'FUNCIONARIO_AP_MATERNO'      => mb_strtoupper(request('updApMaternoFuncionario')),
            'FUNCIONARIO_FEC_NAC'         => date(request('updFecNacFuncionario')),
            'FUNCIONARIO_DOMICILIO'       => mb_strtoupper(request('updDomicilioFuncionario')),
            'CIUDAD_ID'                   => request('updCiudadFuncionario'),
            'FUNCIONARIO_EMAIL'           => request('updEmailFuncionario'),
            'FUNCIONARIO_FONO_CEL'        => $cel,
            'FUNCIONARIO_FONO_FIJO'       => request('updFonoFuncionario'),
            'FUNCIONARIO_IMG'             => $filename
        ]);

        DB::delete( 'delete from funcionario_cargo where FUNCIONARIO_ID = '.$funcionario->id );
        foreach ( request('updCargoFuncionario') as $cargo ) {
            DB::table('funcionario_cargo')->insert([
                'FUNCIONARIO_ID' => $funcionario->id,
                'CARGO_ID' => $cargo
            ]);
        }
        
        return redirect()->route('funcionario.index')->with('success','FUNCIONARIO ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(Funcionario $funcionario)
    {
        DB::table('funcionarios')->where('id', $funcionario->id)->update(['FUNCIONARIO_FLAG' => false]);

        return redirect()->route('funcionario.index')->with('success','FUNCIONARIO ELIMINADO EXITOSAMENTE');
    }

    public function json()
    {
        $data = Funcionario::where('FUNCIONARIO_FLAG', true)->orderby('FUNCIONARIO_AP_PATERNO', 'ASC')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<div class="btn-group">';
                       $btn .= '<a href="'.route('funcionario.show' , $row).'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>';
                       $btn .= '<a href="'.route('funcionario.edit' , $row).'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>';
                       $btn .= '<form method="POST" action="'.route('funcionario.destroy', $row).'">
                       '.csrf_field().'
                       <input type="hidden" name="_method" value="DELETE"> 
                       <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button></form>';
                       $btn .= '</div>';
                       return $btn;
                })
                ->addColumn('nombre', function($row){
                       $nombre = $row->FUNCIONARIO_AP_PATERNO.' '.$row->FUNCIONARIO_AP_MATERNO.', '. $row->FUNCIONARIO_NOMBRES;
                       return $nombre;
                })
                ->rawColumns(['action','nombre'])
                ->make(true);

        return view('index');
    }
}
