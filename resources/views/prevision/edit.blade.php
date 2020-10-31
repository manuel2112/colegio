@extends('layout')
@section('title','PREVISIÓN | Editar')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Previsión {{ $prevision->PREVISION_NOMBRE }}</h1>

            <form method="POST" action="{{ route('prevision.update', $prevision) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="updPrevision">Previsión</label>
                            <input type="text" class="form-control" id="updPrevision" name="updPrevision" value="{{ old('updPrevision', $prevision->PREVISION_NOMBRE) }}" placeholder="PREVISIÓN..." require>
                            {!! $errors->first('updPrevision','<small class="text-danger">:message</small>') !!}
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