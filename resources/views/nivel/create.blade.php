@extends('layout')
@section('title','NIVEL | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Nivel</h1>

            <form method="POST" action="{{ route('nivel.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="strNivel">Nivel</label>
                            <input type="text" class="form-control" id="strNivel" name="strNivel" value="{{ old('strNivel') }}" placeholder="NIVEL..." required>
                            {!! $errors->first('strNivel','<small class="text-danger">:message</small>') !!}
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