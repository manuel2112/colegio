<?php

namespace App\Http\Controllers;

use App\Colegio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ColegioController extends Controller
{
    
    public function index()
    {
        $data['colegio'] = DB::table('colegio')->where('id', 1)->first();
        return view('colegio.index',$data);
    }
    
    public function create()
    {
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        return view('colegio.create',$data);
    }
    
    public function store()
    {
        request()->validate([
            'insNombreColegio'    => 'required',
            'insEmailColegio'     => 'required|email',
            'insCelularColegio'   => 'nullable|numeric|digits_between:9,10',
            'insFonoColegio'      => 'nullable|numeric|digits_between:9,10',
            'insDireccionColegio' => 'required',
            'insCiudadColegio'    => 'required',
            'insImagenColegio'    => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $filename = '';
        if( request()->hasFile('insImagenColegio') ){
            $filename = request()->file('insImagenColegio')->store('public');
        }
        $fonoCel = request('insCelularColegio') ? '+56' . request('insCelularColegio') : NULL;

        Colegio::create([
            'COLEGIO_NOMBRE' => mb_strtoupper(request('insNombreColegio')),
            'COLEGIO_EMAIL' => mb_strtoupper(request('insEmailColegio')),
            'COLEGIO_FONO_CEL' => $fonoCel,
            'COLEGIO_FONO_FIJO' => request('insFonoColegio'),
            'COLEGIO_DIRECCION' => mb_strtoupper(request('insDireccionColegio')),
            'CIUDAD_ID' => request('insCiudadColegio'),
            'COLEGIO_LOGO' => $filename
        ]);
        
        return redirect()->route('colegio.index')->with('success','COLEGIO CREADO EXITOSAMENTE');
    }
    
    public function show()
    {
    }
    
    public function edit(Colegio $colegio)
    {
        $data['colegio'] = $colegio;
        $data['ciudades'] = DB::table('ciudad')->where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        return view('colegio.edit',$data);
    }
    
    public function update(Colegio $colegio)
    {
        request()->validate([
            'updNombreColegio'    => 'required',
            'updEmailColegio'     => 'required|email',
            'updCelularColegio'   => 'nullable|numeric|digits_between:9,10',
            'updFonoColegio'      => 'nullable|numeric|digits_between:9,10',
            'updDireccionColegio' => 'required',
            'updCiudadColegio'    => 'required',
            'updImagenColegio'    => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $filename = request('updImagenHideColegio');
        if( request()->hasFile('updImagenColegio') ){
            $filename = request()->file('updImagenColegio')->store('public');
        }
        $fonoCel = request('updCelularColegio') ? '+56' . request('updCelularColegio') : NULL;

        $colegio->update([
            'COLEGIO_NOMBRE' => mb_strtoupper(request('updNombreColegio')),
            'COLEGIO_EMAIL' => mb_strtoupper(request('updEmailColegio')),
            'COLEGIO_FONO_CEL' => $fonoCel,
            'COLEGIO_FONO_FIJO' => request('updFonoColegio'),
            'COLEGIO_DIRECCION' => mb_strtoupper(request('updDireccionColegio')),
            'CIUDAD_ID' => request('updCiudadColegio'),
            'COLEGIO_LOGO' => $filename
        ]);
        
        return redirect()->route('colegio.index')->with('success','COLEGIO ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(Colegio $colegio)
    {
        Colegio::query()->truncate();
        return redirect()->route('colegio.index')->with('success','COLEGIO ELIMINADO EXITOSAMENTE');
    }
}
