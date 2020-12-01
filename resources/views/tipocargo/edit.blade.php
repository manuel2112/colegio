@extends('layout')
@section('title','TIPO DE CARGO | EDITAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Tipo de Cargo: {{ $tipo->TIPO_CARGO_NOMBRE }}</h1>

            <form method="POST" action="{{ route('tipocargo.update', $tipo) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updTipoCargo">Tipo de Cargo</label>
                            <input type="text" class="form-control" id="updTipoCargo" name="updTipoCargo" value="{{ old('updTipoCargo', $tipo->TIPO_CARGO_NOMBRE) }}" placeholder="TIPO DE CARGO..." require>
                            {!! $errors->first('updTipoCargo','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">EDITAR</button>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection