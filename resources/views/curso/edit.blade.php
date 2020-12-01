@extends('layout')
@section('title','CURSO | EDITAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Curso: {{ $curso->CURSO_NOMBRE }}</h1>

            <form method="POST" action="{{ route('curso.update', $curso) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updNivel">Nivel</label>
                            <select class="form-control" id="updNivel" name="updNivel">
                                <option value="">SELECCIONAR NIVEL</option>
                            @foreach( $niveles as $nivel )
                                <option value="{{ $nivel->id }}" {{ old('updNivel',$curso->NIVEL_ID) == $nivel->id ? 'selected' : '' }}>{{ $nivel->NIVEL_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updNivel','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updCurso">Curso</label>
                            <input type="text" class="form-control" id="updCurso" name="updCurso" value="{{ old('updCurso', $curso->CURSO_NOMBRE) }}" placeholder="CURSO..." require>
                            {!! $errors->first('updCurso','<small class="text-danger">:message</small>') !!}
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