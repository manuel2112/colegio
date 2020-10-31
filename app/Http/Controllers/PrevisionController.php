<?php

namespace App\Http\Controllers;

use App\Prevision;
use App\Rules\ExistePrevision;
use App\Rules\ExistePrevisionUpdate;
use Illuminate\Support\Facades\DB;

class PrevisionController extends Controller
{
    
    public function index()
    {
        $data['previsiones'] = Prevision::where('PREVISION_FLAG', true)->orderby('PREVISION_NOMBRE', 'ASC')->get();
        $data['contador'] = 1;
        return view('prevision.index',$data);
    }
    
    public function create()
    {
        return view('prevision.create');
    }
    
    public function store()
    {
        request()->validate([
            'strPrevision'   => ['required', 'string', new ExistePrevision]
        ]);

        Prevision::create([
            'PREVISION_NOMBRE' => mb_strtoupper(request('strPrevision'))
        ]);
        
        return redirect()->route('prevision.index')->with('success','PREVISION CREADA EXITOSAMENTE');
    }
    
    public function show()
    {
        //
    }
    
    public function edit(Prevision $prevision)
    {
        $data['prevision'] = $prevision;
        return view('prevision.edit',$data);
    }
    
    public function update(Prevision $prevision)
    {
        request()->validate([
            'updPrevision'   => ['required', 'string', new ExistePrevisionUpdate($prevision->id)]
        ]);

        $prevision->update([
            'PREVISION_NOMBRE' => mb_strtoupper(request('updPrevision'))
        ]);
        
        return redirect()->route('prevision.index')->with('success','PREVISION ACTUALIZADA EXITOSAMENTE');
    }
    
    public function destroy(Prevision $prevision)
    {
        DB::table('prevision')
              ->where('id', $prevision->id)
              ->update(['PREVISION_FLAG' => false]);

        return redirect()->route('prevision.index')->with('success','PREVISION ELIMINADA EXITOSAMENTE');
    }
}
