@extends('layout')
@section('title','COLEGIO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Colegio</h1>

            <form method="POST" action="{{ route('colegio.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insNombreColegio">Nombre</label>
                            <input type="text" class="form-control" id="insNombreColegio" name="insNombreColegio" value="{{ old('insNombreColegio') }}" placeholder="NOMBRE...">
                            {!! $errors->first('insNombreColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insEmailColegio">Email</label>
                            <input type="text" class="form-control" id="insEmailColegio" name="insEmailColegio" value="{{ old('insEmailColegio') }}" placeholder="EMAIL...">
                            {!! $errors->first('insEmailColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCelularColegio">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control" id="insCelularColegio" name="insCelularColegio" value="{{ old('insCelularColegio') }}" placeholder="N° CELULAR...">
                            </div>                            
                            {!! $errors->first('insCelularColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFonoColegio">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="insFonoColegio" name="insFonoColegio" value="{{ old('insFonoColegio') }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('insFonoColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="insDireccionColegio">Dirección</label>
                            <input type="text" class="form-control" id="insDireccionColegio" name="insDireccionColegio" value="{{ old('insDireccionColegio') }}" placeholder="DIRECCIÓN...">
                            {!! $errors->first('insDireccionColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCiudadColegio">Ciudad</label>
                            <select class="form-control" id="insCiudadColegio" name="insCiudadColegio">
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('insCiudadColegio') == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insCiudadColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insImagenColegio">Insignia</label>
                            <input type="file" class="form-control" id="insImagenColegio" name="insImagenColegio">
                            {!! $errors->first('insImagenColegio','<small class="text-danger">:message</small>') !!}
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