@extends('layout')
@section('title','CIUDAD | Editar')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Ciudad {{ $ciudad->CIUDAD_NOMBRE }}</h1>

            <form method="POST" action="{{ route('ciudad.update', $ciudad) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updCiudad">Ciudad</label>
                            <input type="text" class="form-control" id="updCiudad" name="updCiudad" value="{{ old('updCiudad', $ciudad->CIUDAD_NOMBRE) }}" placeholder="CIUDAD..." require>
                            {!! $errors->first('updCiudad','<small class="text-danger">:message</small>') !!}
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