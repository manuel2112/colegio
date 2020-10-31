@extends('layout')
@section('title','APODERADO | ACTUALIZAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Actualizar Apoderado {{ $apoderado->APODERADO_AP_PATERNO }} {{ $apoderado->APODERADO_AP_MATERNO }}, {{ $apoderado->APODERADO_NOMBRES }}</h1>

            <form method="POST" action="{{ route('apoderado.update', $apoderado) }}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updRUTApoderado">RUT</label>
                            <input type="text" class="form-control" value="{{ $apoderado->APODERADO_RUT }}" placeholder="RUT..." readonly>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updNombresApoderado">Nombres</label>
                            <input type="text" class="form-control" id="updNombresApoderado" name="updNombresApoderado" value="{{ old('updNombresApoderado',$apoderado->APODERADO_NOMBRES) }}" placeholder="NOMBRES...">
                            {!! $errors->first('updNombresApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updApPaternoApoderado">Apellido Paterno</label>
                            <input type="text" class="form-control" id="updApPaternoApoderado" name="updApPaternoApoderado" value="{{ old('updApPaternoApoderado',$apoderado->APODERADO_AP_PATERNO) }}" placeholder="APELLIDO PATERNO...">
                            {!! $errors->first('updApPaternoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updApMaternoApoderado">Apellido Materno</label>
                            <input type="text" class="form-control" id="updApMaternoApoderado" name="updApMaternoApoderado" value="{{ old('updApMaternoApoderado',$apoderado->APODERADO_AP_MATERNO) }}" placeholder="APELLIDO MATERNO...">
                            {!! $errors->first('updApMaternoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFecNacApoderado">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker" id="updFecNacApoderado" name="updFecNacApoderado" value="{{ old('updFecNacApoderado',$apoderado->APODERADO_FEC_NAC) }}" placeholder="FECHA DE NACIMIENTO...">
                            {!! $errors->first('updFecNacApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updEmailApoderado">Email</label>
                            <input type="text" class="form-control" id="updEmailApoderado" name="updEmailApoderado" value="{{ old('updEmailApoderado',$apoderado->APODERADO_EMAIL) }}" placeholder="EMAIL...">
                            {!! $errors->first('updEmailApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCelularApoderado">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control" id="updCelularApoderado" name="updCelularApoderado" value="{{ old('updCelularApoderado',substr($apoderado->APODERADO_FONO_CEL, 3)) }}" placeholder="N° CELULAR...">
                            </div>                            
                            {!! $errors->first('updCelularApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFonoApoderado">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="updFonoApoderado" name="updFonoApoderado" value="{{ old('updFonoApoderado',$apoderado->APODERADO_FONO_FIJO) }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('updFonoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="updDomicilioApoderado">Domicilio</label>
                            <input type="text" class="form-control" id="updDomicilioApoderado" name="updDomicilioApoderado" value="{{ old('updDomicilioApoderado',$apoderado->APODERADO_DOMICILIO) }}" placeholder="DOMICILIO...">
                            {!! $errors->first('updDomicilioApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCiudadApoderado">Ciudad</label>
                            <select class="form-control" id="updCiudadApoderado" name="updCiudadApoderado">
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('updCiudadApoderado',$apoderado->CIUDAD_ID) == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updCiudadApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updTipoApoderado">Tipo de Apoderado</label>
                            <select class="form-control" id="updTipoApoderado" name="updTipoApoderado">
                                <option value="">SELECCIONAR TIPO DE APODERADO</option>
                            @foreach( $tipoapoderado as $tipo )
                                <option value="{{ $tipo->id }}" {{ old('updTipoApoderado',$apoderado->TIPO_APODERADO_ID) == $tipo->id ? 'selected' : '' }}>{{ $tipo->TIPO_APODERADO_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updTipoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updLugarTrabajoApoderado">Lugar de Trabajo</label>
                            <input type="text" class="form-control" id="updLugarTrabajoApoderado" name="updLugarTrabajoApoderado" value="{{ old('updLugarTrabajoApoderado',$apoderado->APODERADO_TRABAJO) }}" placeholder="LUGAR DE TRABAJO...">
                            {!! $errors->first('updLugarTrabajoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFonoTrabajoApoderado">N° Teléfono Trabajo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="updFonoTrabajoApoderado" name="updFonoTrabajoApoderado" value="{{ old('updFonoTrabajoApoderado',$apoderado->APODERADO_FONO_TRABAJO) }}" placeholder="N° TELÉFONO TRABAJO...">
                            </div>                            
                            {!! $errors->first('updFonoTrabajoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Ex-Alumno</label>                            
                            <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="updExApoderado" id="updExApoderadoS" value="1" {{ old('updExApoderado',$apoderado->APODERADO_EX_ALUMNO) == '1' ? 'checked' : '' }}> SI
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="updExApoderado" id="updExApoderadoN" value="0"  {{ old('updExApoderado',$apoderado->APODERADO_EX_ALUMNO) == '0' ? 'checked' : '' }}> NO
                                </label>
                            </div>                           
                            {!! $errors->first('updExApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updImagenApoderado">Imagen de perfil</label>
                            @if( $apoderado->APODERADO_IMG )
                                <img src="{{ Storage::url($apoderado->APODERADO_IMG) }}" width="50" alt="">
                            @endif
                            <input type="hidden" class="form-control" id="updImagenHideApoderado" name="updImagenHideApoderado" value="{{ $apoderado->APODERADO_IMG }}">
                            <input type="file" class="form-control" id="updImagenApoderado" name="updImagenApoderado">
                            {!! $errors->first('updImagenApoderado','<small class="text-danger">:message</small>') !!}
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