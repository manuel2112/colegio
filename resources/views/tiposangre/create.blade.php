@extends('layout')
@section('title','TIPO DE SANGRE | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Tipo de Sangre</h1>

            <form method="POST" action="{{ route('tiposangre.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="strTipoSangre">Tipo de Sangre</label>
                            <input type="text" class="form-control" id="strTipoSangre" name="strTipoSangre" value="{{ old('strTipoSangre') }}" placeholder="TIPO DE SANGRE..." required>
                            {!! $errors->first('strTipoSangre','<small class="text-danger">:message</small>') !!}
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