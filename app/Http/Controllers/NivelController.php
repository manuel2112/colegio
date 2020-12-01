<?php

namespace App\Http\Controllers;

use App\Nivel;
use App\Rules\ExisteNivel;
use App\Rules\ExisteNivelUpdate;
use Illuminate\Support\Facades\DB;

class NivelController extends Controller
{
    public function index()
    {
        $data['niveles'] = Nivel::where('NIVEL_FLAG', true)->orderby('id', 'ASC')->get();
        $data['contador'] = 1;
        return view('nivel.index',$data);
    }

    public function create()
    {
        return view('nivel.create');
    }

    public function store()
    {
        request()->validate([
            'strNivel'  => ['required', new ExisteNivel]
        ]);

        $data = Nivel::create([
                'NIVEL_NOMBRE'   => mb_strtoupper(request('strNivel'))
            ]);
        
        return redirect()->route('nivel.index')->with('success','NIVEL INGRESADO EXITOSAMENTE');
    }
    
    public function show()
    {
        //
    }
    
    public function edit(Nivel $nivel)
    {
        $data['nivel'] = $nivel;
        return view('nivel.edit',$data);
    }
    
    public function update(Nivel $nivel)
    {
        request()->validate([
            'updNivel'  => ['required', 'string', new ExisteNivelUpdate($nivel->id)]
        ]);

        $nivel->update([
            'NIVEL_NOMBRE'   => mb_strtoupper(request('updNivel'))
        ]);
        
        return redirect()->route('nivel.index')->with('success','NIVEL ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(Nivel $nivel)
    {
        DB::table('niveles')->where('id', $nivel->id)->update(['NIVEL_FLAG' => false]);

        return redirect()->route('nivel.index')->with('success','NIVEL ELIMINADO EXITOSAMENTE');
    }
}
