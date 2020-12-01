@extends('layout')
@section('title','TIPO DE CARGO | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Tipo de Cargo</h1>

            <form method="POST" action="{{ route('tipocargo.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="strTipoCargo">Tipo de Cargo</label>
                            <input type="text" class="form-control" id="strTipoCargo" name="strTipoCargo" value="{{ old('strTipoCargo') }}" placeholder="TIPO DE CARGO..." required>
                            {!! $errors->first('strTipoCargo','<small class="text-danger">:message</small>') !!}
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