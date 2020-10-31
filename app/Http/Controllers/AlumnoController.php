<?php

namespace App\Http\Controllers;

use App\Alumno;
use Freshwork\ChileanBundle\Rut;
use App\Rules\ExisteAlumnoRut;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{    
    public function index()
    {
        $data['alumnos'] = Alumno::where('ALUMNO_FLAG', true)->orderby('id', 'ASC')->get();
        $data['contador'] = 1;
        return view('alumnos.index',$data);
    }

    public function create()
    {
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['previsiones'] = DB::table('prevision')->where('PREVISION_FLAG', true)->orderby('PREVISION_NOMBRE', 'ASC')->get();
        $data['tipossangre'] = DB::table('tiposangre')->where('TIPO_SANGRE_FLAG', true)->orderby('TIPO_SANGRE_NOMBRE', 'ASC')->get();
        return view('alumnos.create',$data);
    }

    public function store()
    {
        request()->validate([
            'insNombresAlumno'   => 'required',
            'insApPaternoAlumno' => 'required',
            'insApMaternoAlumno' => 'required',
            'insRUTAlumno'       => ['required', 'cl_rut', new ExisteAlumnoRut],
            'insEmailAlumno'     => 'required|email',
            'insFecNacAlumno'    => 'required',
            'insDomicilioAlumno' => 'required',
            'insCiudadAlumno'    => 'required',
            'insCelularAlumno'   => 'required|numeric|digits_between:9,10',
            'insFonoAlumno'      => 'nullable|numeric|digits_between:9,10',
            'insSexoAlumno'      => 'required',
            'insImagenAlumno'    => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'insFecIngresoAlumno'=> 'required',
            'insPrevisionAlumno' => 'required',
            'insTipoSangreAlumno'=> 'required'
        ]);

        $rutFormat = Rut::parse(request('insRUTAlumno'))->normalize();
        $rutValido = Rut::parse(request('insRUTAlumno'))->format(Rut::FORMAT_COMPLETE);
        if( strlen($rutFormat) == 8 ){
            $rutValido = '0'.$rutValido;
        }
        $password = time();

        $filename = '';
        if( request()->hasFile('insImagenAlumno') ){
            $filename = request()->file('insImagenAlumno')->store('public');
        }

        Alumno::create([
            'ALUMNO_RUT' => $rutValido,
            'ALUMNO_NOMBRES' => mb_strtoupper(request('insNombresAlumno')),
            'ALUMNO_AP_PATERNO' => mb_strtoupper(request('insApPaternoAlumno')),
            'ALUMNO_AP_MATERNO' => mb_strtoupper(request('insApMaternoAlumno')),
            'ALUMNO_EMAIL' => mb_strtoupper(request('insEmailAlumno')),
            'ALUMNO_FEC_NAC' => date(request('insFecNacAlumno')),
            'ALUMNO_DOMICILIO' => mb_strtoupper(request('insDomicilioAlumno')),
            'CIUDAD_ID' => request('insCiudadAlumno'),
            'ALUMNO_FONO_CEL' => '+56' . request('insCelularAlumno'),
            'ALUMNO_FONO_FIJO' => request('insFonoAlumno'),
            'ALUMNO_SEXO' => request('insSexoAlumno'),
            'ALUMNO_IMG' => $filename,
            'ALUMNO_INGRESO' => date(request('insFecNacAlumno')),
            'ALUMNO_PASSWORD' => MD5($password),
            'PREVISION_ID' => request('insPrevisionAlumno'),
            'SANGRE_ID' => request('insTipoSangreAlumno')
        ]);
        
        return redirect()->route('alumnos.index')->with('success','ALUMNO INGRESADO EXITOSAMENTE');
    }
    
    public function show(Alumno $alumno)
    {
        $data['alumno'] = $alumno;
        return view('alumnos.show',$data);
    }
    
    public function edit(Alumno $alumno)
    {
        $data['alumno'] = $alumno;
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['previsiones'] = DB::table('prevision')->where('PREVISION_FLAG', true)->orderby('PREVISION_NOMBRE', 'ASC')->get();
        $data['tipossangre'] = DB::table('tiposangre')->where('TIPO_SANGRE_FLAG', true)->orderby('TIPO_SANGRE_NOMBRE', 'ASC')->get();
        return view('alumnos.edit',$data);
    }
    
    public function update(Alumno $alumno)
    {
        request()->validate([
            'updNombresAlumno'   => 'required',
            'updApPaternoAlumno' => 'required',
            'updApMaternoAlumno' => 'required',
            'updEmailAlumno'     => 'required|email',
            'updFecNacAlumno'    => 'required',
            'updDomicilioAlumno' => 'required',
            'updCiudadAlumno'    => 'required',
            'updCelularAlumno'   => 'required|numeric|digits_between:9,10',
            'updFonoAlumno'      => 'nullable|numeric|digits_between:9,10',
            'updSexoAlumno'      => 'required',
            'updImagenAlumno'    => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'updFecIngresoAlumno'=> 'required',
            'updPrevisionAlumno' => 'required',
            'updTipoSangreAlumno'=> 'required'
        ]);

        $filename = request('updImagenHideAlumno');
        if( request()->hasFile('updImagenAlumno') ){
            $filename = request()->file('updImagenAlumno')->store('public');
        }

        $alumno->update([
            'ALUMNO_NOMBRES' => mb_strtoupper(request('updNombresAlumno')),
            'ALUMNO_AP_PATERNO' => mb_strtoupper(request('updApPaternoAlumno')),
            'ALUMNO_AP_MATERNO' => mb_strtoupper(request('updApMaternoAlumno')),
            'ALUMNO_EMAIL' => mb_strtoupper(request('updEmailAlumno')),
            'ALUMNO_FEC_NAC' => date(request('updFecNacAlumno')),
            'ALUMNO_DOMICILIO' => mb_strtoupper(request('updDomicilioAlumno')),
            'CIUDAD_ID' => request('updCiudadAlumno'),
            'ALUMNO_FONO_CEL' => '+56' . request('updCelularAlumno'),
            'ALUMNO_FONO_FIJO' => request('updFonoAlumno'),
            'ALUMNO_SEXO' => request('updSexoAlumno'),
            'ALUMNO_IMG' => $filename,
            'ALUMNO_INGRESO' => date(request('updFecIngresoAlumno')),
            'PREVISION_ID' => request('updPrevisionAlumno'),
            'SANGRE_ID' => request('updTipoSangreAlumno')
        ]);
        
        return redirect()->route('alumnos.index')->with('success','ALUMNO ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(Alumno $alumno)
    {
        DB::table('alumnos')
              ->where('id', $alumno->id)
              ->update(['ALUMNO_FLAG' => false]);

        return redirect()->route('alumnos.index')->with('success','ALUMNO ELIMINADO EXITOSAMENTE');
    }
}
