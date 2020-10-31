@extends('layout')
@section('title','PREVISIÓN | Crear')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Previsión</h1>

            <form method="POST" action="{{ route('prevision.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="strPrevision">Previsión</label>
                            <input type="text" class="form-control" id="strPrevision" name="strPrevision" value="{{ old('strPrevision') }}" placeholder="PREVISIÓN..." required>
                            {!! $errors->first('strPrevision','<small class="text-danger">:message</small>') !!}
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