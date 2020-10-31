@extends('layout')
@section('title','TIPO DE APODERADO | EDITAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Tipo de Apoderado {{ $tipoapoderado->TIPO_APODERADO_NOMBRE }}</h1>

            <form method="POST" action="{{ route('tipoapoderado.update', $tipoapoderado) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updTipoApoderado">Tipo de Apoderado</label>
                            <input type="text" class="form-control" id="updTipoApoderado" name="updTipoApoderado" value="{{ old('updTipoApoderado', $tipoapoderado->TIPO_APODERADO_NOMBRE) }}" placeholder="TIPO DE APODERADO..." require>
                            {!! $errors->first('updTipoApoderado','<small class="text-danger">:message</small>') !!}
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