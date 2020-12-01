<?php

namespace App\Http\Controllers;

use App\TipoCargo;
use App\Rules\ExisteTipoCargo;
use App\Rules\ExisteTipoCargoUpdate;
use Illuminate\Support\Facades\DB;

class TipoCargoController extends Controller
{
    public function index()
    {
        $data['tipos'] = TipoCargo::where('TIPO_CARGO_FLAG', true)->orderby('TIPO_CARGO_NOMBRE', 'ASC')->get();
        $data['contador'] = 1;
        return view('tipocargo.index',$data);
    }
    
    public function create()
    {
        return view('tipocargo.create');
    }
    
    public function store()
    {
        request()->validate([
            'strTipoCargo'   => ['required', 'string', new ExisteTipoCargo]
        ]);

        TipoCargo::create([
            'TIPO_CARGO_NOMBRE' => mb_strtoupper(request('strTipoCargo'))
        ]);
        
        return redirect()->route('tipocargo.index')->with('success','TIPO DE CARGO CREADO EXITOSAMENTE');
    }
    
    public function show()
    {
        //
    }
    
    public function edit(TipoCargo $tipocargo)
    {
        $data['tipo'] = $tipocargo;
        return view('tipocargo.edit',$data);
    }
    
    public function update(TipoCargo $tipocargo)
    {
        request()->validate([
            'updTipoCargo'   => ['required', 'string', new ExisteTipoCargoUpdate($tipocargo->id)]
        ]);

        $tipocargo->update([
            'TIPO_CARGO_NOMBRE' => mb_strtoupper(request('updTipoCargo'))
        ]);
        
        return redirect()->route('tipocargo.index')->with('success','TIPO DE CARGO ACTUALIZADO EXITOSAMENTE');
    }
    
    public function destroy(TipoCargo $tipocargo)
    {
        DB::table('tipocargo')->where('id', $tipocargo->id)->update(['TIPO_CARGO_FLAG' => false]);

        return redirect()->route('tipocargo.index')->with('success','TIPO DE CARGO ELIMINADO EXITOSAMENTE');
    }
}
