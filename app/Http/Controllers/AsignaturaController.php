<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Rules\ExisteAsignaturaCod;
use App\Rules\ExisteAsignaturaNmb;
use App\Rules\ExisteAsignaturaCodUpdate;
use App\Rules\ExisteAsignaturaNmbUpdate;
use Illuminate\Support\Facades\DB;
use App\Imports\AsignaturasImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class AsignaturaController extends Controller
{
    public function index()
    {
        $data['asignaturas'] = Asignatura::where('ASIGNATURA_FLAG', true)->orderby('ASIGNATURA_NOMBRE', 'ASC')->get();
        $data['contador'] = 1;
        return view('asignatura.index',$data);
    }
    
    public function import()
    {
        request()->validate([
            'insFileAsignatura'  => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new AsignaturasImport,request()->file('insFileAsignatura'));

        return redirect()->route('asignatura.index')->with('success','ARCHIVO INGRESADO EXITOSAMENTE');
    }

    public function create()
    {
        return view('asignatura.create');
    }

    public function store()
    {
        request()->validate([
            'insCodAsignatura'  => ['required', 'string', new ExisteAsignaturaCod],
            'insNmbAsignatura'  => ['required', 'string', new ExisteAsignaturaNmb]
        ]);

        Asignatura::create([
                'ASIGNATURA_COD'    => mb_strtoupper(request('insCodAsignatura')),
                'ASIGNATURA_NOMBRE' => mb_strtoupper(request('insNmbAsignatura'))
            ]);

        return redirect()->route('asignatura.index')->with('success','ASIGNATURA INGRESADA EXITOSAMENTE');
    }
    
    public function show()
    {
    }
    
    public function edit(Asignatura $asignatura)
    {
        $data['asignatura'] = $asignatura;
        return view('asignatura.edit',$data);
    }
    
    public function update(Asignatura $asignatura)
    {
        request()->validate([
            'updCodAsignatura'  => ['required', 'string', new ExisteAsignaturaCodUpdate($asignatura->id)],
            'updNmbAsignatura'  => ['required', 'string', new ExisteAsignaturaNmbUpdate($asignatura->id)]
        ]);

        $asignatura->update([
                'ASIGNATURA_COD'    => mb_strtoupper(request('updCodAsignatura')),
                'ASIGNATURA_NOMBRE' => mb_strtoupper(request('updNmbAsignatura'))
            ]);
        
        return redirect()->route('asignatura.index')->with('success','ASIGNATURA ACTUALIZADA EXITOSAMENTE');
    }
    
    public function destroy(Asignatura $asignatura)
    {
        DB::table('asignaturas')->where('id', $asignatura->id)->update(['ASIGNATURA_FLAG' => false]);

        return redirect()->route('asignatura.index')->with('success','ASIGNATURA ELIMINADA EXITOSAMENTE');
    }

    public function json()
    {
        $data = Asignatura::where('ASIGNATURA_FLAG', true)->orderby('ASIGNATURA_NOMBRE', 'ASC')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<div class="btn-group">';
                       $btn .= '<a href="'.route('asignatura.edit' , $row).'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>';
                       $btn .= '<form method="POST" action="'.route('asignatura.destroy', $row).'">
                       '.csrf_field().'
                       <input type="hidden" name="_method" value="DELETE"> 
                       <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button></form>';
                       $btn .= '</div>';
                       return $btn;
                })
                ->addColumn('uso', function($row){
                        if( !$row->ASIGNATURA_USO ){
                            $btn = '<div id="uso-'.$row->id.'"><button type="button" class="btn btn-sm btn-danger btn-uso" idasignatura="'.$row->id.'" valor="1"><i class="fas fa-times"></i></button></div>';
                        }else{
                            $btn = '<div id="uso-'.$row->id.'"><button type="button" class="btn btn-sm btn-success btn-uso" idasignatura="'.$row->id.'" valor="0"><i class="fas fa-check"></i></button></div>';
                        }
                       return $btn;
                })
                ->rawColumns(['action','uso'])
                ->make(true);

        return view('index');
    }

    public function ajaxuso()
    {
        $idAsignatura   = request('idAsignatura');
        $valor          = request('valor');

        DB::table('asignaturas')->where('id', $idAsignatura)->update(['ASIGNATURA_USO' => $valor]);

        $btn = $valor ? '<div id="uso-'.$idAsignatura.'"><button type="button" class="btn btn-sm btn-success btn-uso" idasignatura="'.$idAsignatura.'" valor="0"><i class="fas fa-check"></i></button></div>' : '<div id="uso-'.$idAsignatura.'"><button type="button" class="btn btn-sm btn-danger btn-uso" idasignatura="'.$idAsignatura.'" valor="1"><i class="fas fa-times"></i></button></div>';

        return response()->json(
                [
                    'ok'=> 1,
                    'id'=> $idAsignatura,
                    'btn'=> $btn
                ]
            );
    }

}
