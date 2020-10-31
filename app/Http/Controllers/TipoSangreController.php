<?php

namespace App\Http\Controllers;

use App\TipoSangre;
use App\Rules\ExisteTipoSangre;
use App\Rules\ExisteTipoSangreUpdate;
use Illuminate\Support\Facades\DB;

class TipoSangreController extends Controller
{    
    public function index()
    {
        $data['tipossangre'] = TipoSangre::where('TIPO_SANGRE_FLAG', true)->orderby('TIPO_SANGRE_NOMBRE', 'ASC')->get();
        $data['contador'] = 1;
        return view('tiposangre.index',$data);
    }
    
    public function create()
    {
        return view('tiposangre.create');
    }
    
    public function store()
    {
        request()->validate([
            'strTipoSangre'   => ['required', 'string', new ExisteTipoSangre]
        ]);

        TipoSangre::create([
            'TIPO_SANGRE_NOMBRE' => mb_strtoupper(request('strTipoSangre'))
        ]);
        
        return redirect()->route('tiposangre.index')->with('success','TIPO DE SANGRE CREADA EXITOSAMENTE');
    }
    
    public function show()
    {
        //
    }
    
    public function edit(TipoSangre $tiposangre)
    {
        $data['tiposangre'] = $tiposangre;
        return view('tiposangre.edit',$data);
    }
    
    public function update(TipoSangre $tiposangre)
    {
        request()->validate([
            'updTipoSangre'   => ['required', 'string', new ExisteTipoSangreUpdate($tiposangre->id)]
        ]);

        $tiposangre->update([
            'TIPO_SANGRE_NOMBRE' => mb_strtoupper(request('updTipoSangre'))
        ]);
        
        return redirect()->route('tiposangre.index')->with('success','TIPO DE SANGRE ACTUALIZADA EXITOSAMENTE');
    }
    
    public function destroy(TipoSangre $tiposangre)
    {
        DB::table('tiposangre')
              ->where('id', $tiposangre->id)
              ->update(['TIPO_SANGRE_FLAG' => false]);

        return redirect()->route('tiposangre.index')->with('success','TIPO DE SANGRE ELIMINADA EXITOSAMENTE');
    }
}
