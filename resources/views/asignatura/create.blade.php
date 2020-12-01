@extends('layout')
@section('title','ASIGNATURAS | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Asignatura</h1>

            <form method="POST" action="{{ route('asignatura.store') }}" role="form">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="insCodAsignatura">CÓDIGO</label>
                            <input type="text" class="form-control" id="insCodAsignatura" name="insCodAsignatura" value="{{ old('insCodAsignatura') }}" placeholder="CÓDIGO...">
                            {!! $errors->first('insCodAsignatura','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="insNmbAsignatura">ASIGNATURA</label>
                            <input type="text" class="form-control" id="insNmbAsignatura" name="insNmbAsignatura" value="{{ old('insNmbAsignatura') }}" placeholder="ASIGNATURA...">
                            {!! $errors->first('insNmbAsignatura','<small class="text-danger">:message</small>') !!}
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