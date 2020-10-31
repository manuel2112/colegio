@extends('layout')
@section('title','CIUDAD | Crear')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Ciudad</h1>

            <form method="POST" action="{{ route('ciudad.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="strCiudad">Ciudad</label>
                            <input type="text" class="form-control" id="strCiudad" name="strCiudad" value="{{ old('strCiudad') }}" placeholder="CIUDAD..." required>
                            {!! $errors->first('strCiudad','<small class="text-danger">:message</small>') !!}
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