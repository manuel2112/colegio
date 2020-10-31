@extends('layout')
@section('title','TIPO DE SANGRE | EDITAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Tipo de Sangre {{ $tiposangre->TIPO_SANGRE_NOMBRE }}</h1>

            <form method="POST" action="{{ route('tiposangre.update', $tiposangre) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updTipoSangre">Tipo de Sangre</label>
                            <input type="text" class="form-control" id="updTipoSangre" name="updTipoSangre" value="{{ old('updTipoSangre', $tiposangre->TIPO_SANGRE_NOMBRE) }}" placeholder="TIPO DE SANGRE..." require>
                            {!! $errors->first('updTipoSangre','<small class="text-danger">:message</small>') !!}
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