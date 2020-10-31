@extends('layout')
@section('title','ALUMNO | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar nuevo alumno</h1>

            <form method="POST" action="{{ route('alumnos.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insRUTAlumno">RUT</label>
                            <input type="text" class="form-control" id="insRUTAlumno" name="insRUTAlumno" value="{{ old('insRUTAlumno') }}" placeholder="RUT...">
                            {!! $errors->first('insRUTAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insNombresAlumno">Nombres</label>
                            <input type="text" class="form-control" id="insNombresAlumno" name="insNombresAlumno" value="{{ old('insNombresAlumno') }}" placeholder="NOMBRES...">
                            {!! $errors->first('insNombresAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insApPaternoAlumno">Apellido Paterno</label>
                            <input type="text" class="form-control" id="insApPaternoAlumno" name="insApPaternoAlumno" value="{{ old('insApPaternoAlumno') }}" placeholder="APELLIDO PATERNO...">
                            {!! $errors->first('insApPaternoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insApMaternoAlumno">Apellido Materno</label>
                            <input type="text" class="form-control" id="insApMaternoAlumno" name="insApMaternoAlumno" value="{{ old('insApMaternoAlumno') }}" placeholder="APELLIDO MATERNO...">
                            {!! $errors->first('insApMaternoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFecNacAlumno">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker" id="insFecNacAlumno" name="insFecNacAlumno" value="{{ old('insFecNacAlumno') }}" placeholder="FECHA DE NACIMIENTO...">
                            {!! $errors->first('insFecNacAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insEmailAlumno">Email</label>
                            <input type="text" class="form-control" id="insEmailAlumno" name="insEmailAlumno" value="{{ old('insEmailAlumno') }}" placeholder="EMAIL...">
                            {!! $errors->first('insEmailAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCelularAlumno">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control" id="insCelularAlumno" name="insCelularAlumno" value="{{ old('insCelularAlumno') }}" placeholder="N° CELULAR...">
                            </div>                            
                            {!! $errors->first('insCelularAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFonoAlumno">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="insFonoAlumno" name="insFonoAlumno" value="{{ old('insFonoAlumno') }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('insFonoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="insDomicilioAlumno">Domicilio</label>
                            <input type="text" class="form-control" id="insDomicilioAlumno" name="insDomicilioAlumno" value="{{ old('insDomicilioAlumno') }}" placeholder="DOMICILIO...">
                            {!! $errors->first('insDomicilioAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCiudadAlumno">Ciudad</label>
                            <select class="form-control" id="insCiudadAlumno" name="insCiudadAlumno">
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('insCiudadAlumno') == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insCiudadAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Sexo</label>                            
                            <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="insSexoAlumno" id="insSexoAlumnom" value="M" {{ old('insSexoAlumno') == 'M' ? 'checked' : '' }}> Masculino
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="insSexoAlumno" id="insSexoAlumnof" value="F"  {{ old('insSexoAlumno') == 'F' ? 'checked' : '' }}> Femenino
                                </label>
                            </div>                           
                            {!! $errors->first('insSexoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="insFecIngresoAlumno">Fecha de Ingreso</label>
                            <input type="text" class="form-control datepicker" id="insFecIngresoAlumno" name="insFecIngresoAlumno" value="{{ old('insFecIngresoAlumno') }}" placeholder="FECHA DE INGRESO...">
                            {!! $errors->first('insFecIngresoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="insPrevisionAlumno">Previsión</label>
                            <select class="form-control" id="insPrevisionAlumno" name="insPrevisionAlumno">
                                <option value="">SELECCIONAR PREVISIÓN</option>
                            @foreach( $previsiones as $prevision )
                                <option value="{{ $prevision->id }}" {{ old('insPrevisionAlumno') == $prevision->id ? 'selected' : '' }}>{{ $prevision->PREVISION_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insPrevisionAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="insTipoSangreAlumno">Tipo de Sangre</label>
                            <select class="form-control" id="insTipoSangreAlumno" name="insTipoSangreAlumno">
                                <option value="">SELECCIONAR TIPO DE SANGRE</option>
                            @foreach( $tipossangre as $tiposangre )
                                <option value="{{ $tiposangre->id }}" {{ old('insTipoSangreAlumno') == $tiposangre->id ? 'selected' : '' }}>{{ $tiposangre->TIPO_SANGRE_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insTipoSangreAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="insImagenAlumno">Imagen de perfil</label>
                            <input type="file" class="form-control" id="insImagenAlumno" name="insImagenAlumno">
                            {!! $errors->first('insImagenAlumno','<small class="text-danger">:message</small>') !!}
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