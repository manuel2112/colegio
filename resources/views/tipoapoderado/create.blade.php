@extends('layout')
@section('title','TIPO DE APODERADO | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Tipo de Apoderado</h1>

            <form method="POST" action="{{ route('tipoapoderado.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="strTipoApoderado">Tipo de Sangre</label>
                            <input type="text" class="form-control" id="strTipoApoderado" name="strTipoApoderado" value="{{ old('strTipoApoderado') }}" placeholder="TIPO DE APODERADO..." required>
                            {!! $errors->first('strTipoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection