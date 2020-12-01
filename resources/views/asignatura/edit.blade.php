@extends('layout')
@section('title','ASIGNATURAS | ACTUALIZAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Asignatura</h1>

            <form method="POST" action="{{ route('asignatura.update', $asignatura) }}" role="form">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="updCodAsignatura">CÓDIGO</label>
                            <input type="text" class="form-control" id="updCodAsignatura" name="updCodAsignatura" value="{{ old('updCodAsignatura',$asignatura->ASIGNATURA_COD) }}" placeholder="CÓDIGO...">
                            {!! $errors->first('updCodAsignatura','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="updNmbAsignatura">ASIGNATURA</label>
                            <input type="text" class="form-control" id="updNmbAsignatura" name="updNmbAsignatura" value="{{ old('updNmbAsignatura',$asignatura->ASIGNATURA_NOMBRE) }}" placeholder="ASIGNATURA...">
                            {!! $errors->first('updNmbAsignatura','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection