<?php

namespace App\Http\Controllers;

use App\Curso;
use App\CursoAsignatura;
use App\Rules\ExisteCurso;
use App\Rules\ExisteCursoUpdate;
use App\Rules\ExisteAsignaturaCurso;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index()
    {
        $data['cursos'] = Curso::where('CURSO_FLAG', true)->orderby('id', 'ASC')->get();
        $data['contador'] = 1;
        return view('curso.index',$data);
    }

    public function create()
    {
        $data['niveles'] = DB::table('niveles')->where('NIVEL_FLAG', true)->orderby('NIVEL_NOMBRE', 'ASC')->get();
        return view('curso.create',$data);
    }

    public function store()
    {
        request()->validate([
            'insNivel'  => ['required'],
            'insCurso'  => ['required', 'string', new ExisteCurso]
        ]);

        $data = Curso::create([
                'NIVEL_ID'      => request('insNivel'),
                'CURSO_NOMBRE'  => mb_strtoupper(request('insCurso'))
            ]);
        
        return redirect()->route('curso.index')->with('success','CURSO INGRESADO EXITOSAMENTE');
    }
    
    public function show()
    {
        //
    }
    
    public function edit(Curso $curso)
    {
        $data['curso'] = $curso;
        $data['niveles'] = DB::table('niveles')->where('NIVEL_FLAG', true)->orderby('NIVEL_NOMBRE', 'ASC')->get();
        return view('curso.edit',$data);
    }
    
    public function update(Curso $curso)
    {
        request()->validate([
            'updNivel'  => ['required'],
            'updCurso'  => ['required', 'string', new ExisteCursoUpdate($curso->id)]
        ]);

        $curso->update([
            'NIVEL_ID'      => request('updNivel'),
            'CURSO_NOMBRE'  => mb_strtoupper(request('updCurso'))
        ]);
        
        return redirect()->route('curso.index')->with('success','CURSO ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(Curso $curso)
    {
        DB::table('cursos')->where('id', $curso->id)->update(['CURSO_FLAG' => false]);

        return redirect()->route('curso.index')->with('success','CURSO ELIMINADO EXITOSAMENTE');
    }
    
    public function cursoasignatura(Curso $curso)
    {
        $data['curso'] = $curso;
        $data['asignaturascurso'] = DB::table('curso_asignatura')->where('CURSO_ID', $curso->id)->where('CUR_ASIG_FLAG', true)->orderby('ASIGNATURA_ID', 'ASC')->get();
        $data['asignaturas'] = DB::table('asignaturas')->where('ASIGNATURA_USO', true)->orderby('ASIGNATURA_NOMBRE', 'ASC')->get();
        $data['profesores'] = DB::table('funcionarios')
                                        ->join('funcionario_cargo', 'funcionario_cargo.FUNCIONARIO_ID', '=', 'funcionarios.id')
                                        ->select('funcionarios.*')
                                        ->where('funcionario_cargo.CARGO_ID', 2)
                                        ->orderby('funcionarios.FUNCIONARIO_AP_PATERNO', 'ASC')
                                        ->get();
        $data['contador'] = 1;
        return view('curso.asignatura',$data);
    }
    
    public function cursoasignaturainsert(Curso $curso)
    {
        request()->validate([
            'insAsignatura'  => ['required', 'string', new ExisteAsignaturaCurso($curso->id)]
        ]);

        DB::table('curso_asignatura')->insert([
            'CURSO_ID' => $curso->id,
            'ASIGNATURA_ID' => request('insAsignatura')
        ]);
        
        $data['curso'] = $curso;
        return redirect()->route('curso.cursoasignatura',$data)->with('success','ASIGNATURA AGREGADA EXITOSAMENTE');
    }
    
    public function cursoasignaturadelete(Curso $curso)
    {
        $idAsig = request('idAsig');
        DB::table('curso_asignatura')->where('id', $idAsig)->update(['CUR_ASIG_FLAG' => false]);

        $data['curso'] = $curso;

        return redirect()->route('curso.cursoasignatura',$data)->with('success','ASIGNATURA ELIMINADA EXITOSAMENTE');
    }

    public function ajaxaddprofesor()
    {
        $idProfesor     = request('idProfesor');
        $idAsigCurso    = request('idAsigCurso');

        if( !empty($idProfesor) ){
            DB::table('curso_asignatura')->where('id', $idAsigCurso)->update(['FUNCIONARIO_ID' => $idProfesor ]);
            $ok = 1;
        }else{
            $ok = 2;
        }        

        return response()->json(
                [
                    'ok'=> $ok
                ]
            );
    }
}
