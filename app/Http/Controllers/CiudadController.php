<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Rules\ExisteCiudad;
use App\Rules\ExisteCiudadUpdate;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
{
    
    public function index()
    {
        $data['ciudades'] = Ciudad::where('CIUDAD_FLAG', true)->orderby('CIUDAD_NOMBRE', 'ASC')->get();
        $data['contador'] = 1;
        return view('ciudad.index',$data);
    }
    
    public function create()
    {
        return view('ciudad.create');
    }
    
    public function store()
    {
        request()->validate([
            'strCiudad'   => ['required', 'string', new ExisteCiudad]
        ]);

        Ciudad::create([
            'CIUDAD_NOMBRE' => mb_strtoupper(request('strCiudad'))
        ]);
        
        return redirect()->route('ciudad.index')->with('success','CIUDAD CREADA EXITOSAMENTE');
    }
    
    public function show()
    {
    }
    
    public function edit(Ciudad $ciudad)
    {
        $data['ciudad'] = $ciudad;
        return view('ciudad.edit',$data);
    }
    
    public function update(Ciudad $ciudad)
    {
        request()->validate([
            'updCiudad'   => ['required', 'string', new ExisteCiudadUpdate($ciudad->id)]
        ]);

        $ciudad->update([
            'CIUDAD_NOMBRE' => mb_strtoupper(request('updCiudad'))
        ]);
        
        return redirect()->route('ciudad.index')->with('success','CIUDAD ACTUALIZADA EXITOSAMENTE');
    }
    
    public function destroy(Ciudad $ciudad)
    {
        DB::table('ciudad')
              ->where('id', $ciudad->id)
              ->update(['CIUDAD_FLAG' => false]);

        return redirect()->route('ciudad.index')->with('success','CIUDAD ELIMINADA EXITOSAMENTE');
    }
}
