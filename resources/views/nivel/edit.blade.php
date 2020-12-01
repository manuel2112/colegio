@extends('layout')
@section('title','NIVEL | EDITAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Nivel: {{ $nivel->NIVEL_NOMBRE }}</h1>

            <form method="POST" action="{{ route('nivel.update', $nivel) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updNivel">Tipo de Sangre</label>
                            <input type="text" class="form-control" id="updNivel" name="updNivel" value="{{ old('updNivel', $nivel->NIVEL_NOMBRE) }}" placeholder="NIVEL..." require>
                            {!! $errors->first('updNivel','<small class="text-danger">:message</small>') !!}
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