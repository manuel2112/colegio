@extends('layout')
@section('title','COLEGIO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Editar Colegio</h1>

            <form method="POST" action="{{ route('colegio.update', $colegio) }}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updNombreColegio">Nombre</label>
                            <input type="text" class="form-control" id="updNombreColegio" name="updNombreColegio" value="{{ old('updNombreColegio', $colegio->COLEGIO_NOMBRE) }}" placeholder="NOMBRE...">
                            {!! $errors->first('updNombreColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updEmailColegio">Email</label>
                            <input type="text" class="form-control" id="updEmailColegio" name="updEmailColegio" value="{{ old('updEmailColegio', $colegio->COLEGIO_EMAIL) }}" placeholder="EMAIL...">
                            {!! $errors->first('updEmailColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCelularColegio">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control" id="updCelularColegio" name="updCelularColegio" value="{{ old('updCelularColegio', substr($colegio->COLEGIO_FONO_CEL, 3)) }}" placeholder="N° CELULAR...">
                            </div>                            
                            {!! $errors->first('updCelularColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFonoColegio">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="updFonoColegio" name="updFonoColegio" value="{{ old('updFonoColegio', $colegio->COLEGIO_FONO_FIJO) }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('updFonoColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="updDireccionColegio">Dirección</label>
                            <input type="text" class="form-control" id="updDireccionColegio" name="updDireccionColegio" value="{{ old('updDireccionColegio', $colegio->COLEGIO_DIRECCION) }}" placeholder="DIRECCIÓN...">
                            {!! $errors->first('updDireccionColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCiudadColegio">Ciudad</label>
                            <select class="form-control" id="updCiudadColegio" name="updCiudadColegio">
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('updCiudadColegio', $colegio->CIUDAD_ID) == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updCiudadColegio','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updImagenColegio">Insignia</label>
                            <input type="hidden" class="form-control" id="updImagenHideColegio" name="updImagenHideColegio" value="{{ $colegio->COLEGIO_LOGO }}">

                            <input type="file" class="form-control" id="updImagenColegio" name="updImagenColegio">
                            {!! $errors->first('updImagenColegio','<small class="text-danger">:message</small>') !!}
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