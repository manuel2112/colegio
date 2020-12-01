@extends('layout')
@section('title','CURSO | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Curso</h1>

            <form method="POST" action="{{ route('curso.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="insNivel">Nivel</label>
                            <select class="form-control" id="insNivel" name="insNivel">
                                <option value="">SELECCIONAR NIVEL</option>
                            @foreach( $niveles as $nivel )
                                <option value="{{ $nivel->id }}" {{ old('insNivel') == $nivel->id ? 'selected' : '' }}>{{ $nivel->NIVEL_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insNivel','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="insCurso">Curso</label>
                            <input type="text" class="form-control" id="insCurso" name="insCurso" value="{{ old('insCurso') }}" placeholder="CURSO..." required>
                            {!! $errors->first('insCurso','<small class="text-danger">:message</small>') !!}
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