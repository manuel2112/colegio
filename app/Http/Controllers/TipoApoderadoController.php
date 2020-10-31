<?php

namespace App\Http\Controllers;

use App\TipoApoderado;
use App\Rules\ExisteTipoApoderado;
use App\Rules\ExisteTipoApoderadoUpdate;
use Illuminate\Support\Facades\DB;

class TipoApoderadoController extends Controller
{
    public function index()
    {
        $data['tipoapoderado'] = TipoApoderado::where('TIPO_APODERADO_FLAG', true)->orderby('TIPO_APODERADO_NOMBRE', 'ASC')->get();
        $data['contador'] = 1;
        return view('tipoapoderado.index',$data);
    }
    
    public function create()
    {
        return view('tipoapoderado.create');
    }
    
    public function store()
    {
        request()->validate([
            'strTipoApoderado'   => ['required', 'string', new ExisteTipoApoderado]
        ]);

        TipoApoderado::create([
            'TIPO_APODERADO_NOMBRE' => mb_strtoupper(request('strTipoApoderado'))
        ]);
        
        return redirect()->route('tipoapoderado.index')->with('success','TIPO DE APODERADO CREADO EXITOSAMENTE');
    }
    
    public function show()
    {
        //
    }
    
    public function edit(TipoApoderado $tipoapoderado)
    {
        $data['tipoapoderado'] = $tipoapoderado;
        return view('tipoapoderado.edit',$data);
    }
    
    public function update(TipoApoderado $tipoapoderado)
    {
        request()->validate([
            'updTipoApoderado'   => ['required', 'string', new ExisteTipoApoderadoUpdate($tipoapoderado->id)]
        ]);

        $tipoapoderado->update([
            'TIPO_APODERADO_NOMBRE' => mb_strtoupper(request('updTipoApoderado'))
        ]);
        
        return redirect()->route('tipoapoderado.index')->with('success','TIPO DE APODERADO ACTUALIZADO EXITOSAMENTE');
    }

    public function destroy(TipoApoderado $tipoapoderado)
    {
        DB::table('tipoapoderado')
              ->where('id', $tipoapoderado->id)
              ->update(['TIPO_APODERADO_FLAG' => false]);

        return redirect()->route('tipoapoderado.index')->with('success','TIPO DE APODERADO ELIMINADO EXITOSAMENTE');
    }
}
