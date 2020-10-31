@extends('layout')
@section('title','ALUMNO | ACTUALIZAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Actualizar alumno {{ $alumno->ALUMNO_AP_PATERNO }} {{ $alumno->ALUMNO_AP_MATERNO }}, {{ $alumno->ALUMNO_NOMBRES }}</h1>

            <form method="POST" action="{{ route('alumnos.update', $alumno) }}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updRUTAlumno">RUT</label>
                            <input type="text" class="form-control" value="{{ $alumno->ALUMNO_RUT }}" readonly>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updNombresAlumno">Nombres</label>
                            <input type="text" class="form-control" id="updNombresAlumno" name="updNombresAlumno" value="{{ old('updNombresAlumno', $alumno->ALUMNO_NOMBRES) }}" placeholder="NOMBRES...">
                            {!! $errors->first('updNombresAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updApPaternoAlumno">Apellido Paterno</label>
                            <input type="text" class="form-control" id="updApPaternoAlumno" name="updApPaternoAlumno" value="{{ old('updApPaternoAlumno', $alumno->ALUMNO_AP_PATERNO) }}" placeholder="APELLIDO PATERNO...">
                            {!! $errors->first('updApPaternoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updsApMaternoAlumno">Apellido Materno</label>
                            <input type="text" class="form-control" id="updApMaternoAlumno" name="updApMaternoAlumno" value="{{ old('updApMaternoAlumno', $alumno->ALUMNO_AP_MATERNO) }}" placeholder="APELLIDO MATERNO...">
                            {!! $errors->first('updApMaternoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFecNacAlumno">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker" id="updFecNacAlumno" name="updFecNacAlumno" value="{{ old('updFecNacAlumno',$alumno->ALUMNO_FEC_NAC) }}" placeholder="FECHA DE NACIMIENTO...">
                            {!! $errors->first('updFecNacAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updEmailAlumno">Email</label>
                            <input type="text" class="form-control" id="updEmailAlumno" name="updEmailAlumno" value="{{ old('updEmailAlumno',$alumno->ALUMNO_EMAIL) }}" placeholder="EMAIL...">
                            {!! $errors->first('updEmailAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCelularAlumno">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control" id="updCelularAlumno" name="updCelularAlumno" value="{{ old('updCelularAlumno',substr($alumno->ALUMNO_FONO_CEL, 3)) }}" placeholder="N° CELULAR...">
                            </div>                            
                            {!! $errors->first('updCelularAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFonoAlumno">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="updFonoAlumno" name="updFonoAlumno" value="{{ old('updFonoAlumno',$alumno->ALUMNO_FONO_FIJO) }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('updFonoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="updDomicilioAlumno">Domicilio</label>
                            <input type="text" class="form-control" id="updDomicilioAlumno" name="updDomicilioAlumno" value="{{ old('updDomicilioAlumno',$alumno->ALUMNO_DOMICILIO) }}" placeholder="DOMICILIO...">
                            {!! $errors->first('updDomicilioAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCiudadAlumno">Ciudad</label>
                            <select class="form-control" id="updCiudadAlumno" name="updCiudadAlumno">
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('updCiudadAlumno',$alumno->CIUDAD_ID) == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updCiudadAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Sexo</label>                            
                            <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="updSexoAlumno" id="updSexoAlumnom" value="M" {{ old('updSexoAlumno',$alumno->ALUMNO_SEXO) == 'M' ? 'checked' : '' }}> Masculino
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="updSexoAlumno" id="updSexoAlumnof" value="F"  {{ old('updSexoAlumno',$alumno->ALUMNO_SEXO) == 'F' ? 'checked' : '' }}> Femenino
                                </label>
                            </div>                           
                            {!! $errors->first('updSexoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="updFecIngresoAlumno">Fecha de Ingreso</label>
                            <input type="text" class="form-control datepicker" id="updFecIngresoAlumno" name="updFecIngresoAlumno" value="{{ old('updFecIngresoAlumno',$alumno->ALUMNO_INGRESO) }}" placeholder="FECHA DE INGRESO...">
                            {!! $errors->first('updFecIngresoAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="updPrevisionAlumno">Previsión</label>
                            <select class="form-control" id="updPrevisionAlumno" name="updPrevisionAlumno">
                                <option value="">SELECCIONAR PREVISIÓN</option>
                            @foreach( $previsiones as $prevision )
                                <option value="{{ $prevision->id }}" {{ old('updPrevisionAlumno',$alumno->PREVISION_ID) == $prevision->id ? 'selected' : '' }}>{{ $prevision->PREVISION_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updPrevisionAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="updTipoSangreAlumno">Tipo de Sangre</label>
                            <select class="form-control" id="updTipoSangreAlumno" name="updTipoSangreAlumno">
                                <option value="">SELECCIONAR TIPO DE SANGRE</option>
                            @foreach( $tipossangre as $tiposangre )
                                <option value="{{ $tiposangre->id }}" {{ old('updTipoSangreAlumno',$alumno->SANGRE_ID) == $tiposangre->id ? 'selected' : '' }}>{{ $tiposangre->TIPO_SANGRE_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updTipoSangreAlumno','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="updImagenAlumno">Imagen de perfil</label>
                            @if( $alumno->ALUMNO_IMG )
                                <img src="{{ Storage::url($alumno->ALUMNO_IMG) }}" width="50" alt="">
                            @endif
                            <input type="hidden" class="form-control" id="updImagenHideAlumno" name="updImagenHideAlumno" value="{{ $alumno->ALUMNO_IMG }}">
                            <input type="file" class="form-control" id="updImagenAlumno" name="updImagenAlumno">
                            {!! $errors->first('updImagenAlumno','<small class="text-danger">:message</small>') !!}
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