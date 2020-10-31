@extends('layout')
@section('title','APODERADO | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Apoderado</h1>

            <form method="POST" action="{{ route('apoderado.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insRUTApoderado">RUT</label>
                            <input type="text" class="form-control" id="insRUTApoderado" name="insRUTApoderado" value="{{ old('insRUTApoderado') }}" placeholder="RUT...">
                            {!! $errors->first('insRUTApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insNombresApoderado">Nombres</label>
                            <input type="text" class="form-control" id="insNombresApoderado" name="insNombresApoderado" value="{{ old('insNombresApoderado') }}" placeholder="NOMBRES...">
                            {!! $errors->first('insNombresApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insApPaternoApoderado">Apellido Paterno</label>
                            <input type="text" class="form-control" id="insApPaternoApoderado" name="insApPaternoApoderado" value="{{ old('insApPaternoApoderado') }}" placeholder="APELLIDO PATERNO...">
                            {!! $errors->first('insApPaternoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insApMaternoApoderado">Apellido Materno</label>
                            <input type="text" class="form-control" id="insApMaternoApoderado" name="insApMaternoApoderado" value="{{ old('insApMaternoApoderado') }}" placeholder="APELLIDO MATERNO...">
                            {!! $errors->first('insApMaternoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFecNacApoderado">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker" id="insFecNacApoderado" name="insFecNacApoderado" value="{{ old('insFecNacApoderado') }}" placeholder="FECHA DE NACIMIENTO...">
                            {!! $errors->first('insFecNacApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insEmailApoderado">Email</label>
                            <input type="text" class="form-control" id="insEmailApoderado" name="insEmailApoderado" value="{{ old('insEmailApoderado') }}" placeholder="EMAIL...">
                            {!! $errors->first('insEmailApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCelularApoderado">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control" id="insCelularApoderado" name="insCelularApoderado" value="{{ old('insCelularApoderado') }}" placeholder="N° CELULAR...">
                            </div>                            
                            {!! $errors->first('insCelularApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFonoApoderado">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="insFonoApoderado" name="insFonoApoderado" value="{{ old('insFonoApoderado') }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('insFonoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="insDomicilioApoderado">Domicilio</label>
                            <input type="text" class="form-control" id="insDomicilioApoderado" name="insDomicilioApoderado" value="{{ old('insDomicilioApoderado') }}" placeholder="DOMICILIO...">
                            {!! $errors->first('insDomicilioApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCiudadApoderado">Ciudad</label>
                            <select class="form-control" id="insCiudadApoderado" name="insCiudadApoderado">
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('insCiudadApoderado') == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insCiudadApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insTipoApoderado">Tipo de Apoderado</label>
                            <select class="form-control" id="insTipoApoderado" name="insTipoApoderado">
                                <option value="">SELECCIONAR TIPO DE APODERADO</option>
                            @foreach( $tipoapoderado as $tipo )
                                <option value="{{ $tipo->id }}" {{ old('insTipoApoderado') == $tipo->id ? 'selected' : '' }}>{{ $tipo->TIPO_APODERADO_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insTipoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insLugarTrabajoApoderado">Lugar de Trabajo</label>
                            <input type="text" class="form-control" id="insLugarTrabajoApoderado" name="insLugarTrabajoApoderado" value="{{ old('insLugarTrabajoApoderado') }}" placeholder="LUGAR DE TRABAJO...">
                            {!! $errors->first('insLugarTrabajoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFonoTrabajoApoderado">N° Teléfono Trabajo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="insFonoTrabajoApoderado" name="insFonoTrabajoApoderado" value="{{ old('insFonoTrabajoApoderado') }}" placeholder="N° TELÉFONO TRABAJO...">
                            </div>                            
                            {!! $errors->first('insFonoTrabajoApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Ex-Alumno</label>                            
                            <div class="btn-group btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="insExApoderado" id="insExApoderadoS" value="1" {{ old('insExApoderado') == '1' ? 'checked' : '' }}> SI
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="insExApoderado" id="insExApoderadoN" value="0"  {{ old('insExApoderado') == '0' ? 'checked' : '' }}> NO
                                </label>
                            </div>                           
                            {!! $errors->first('insExApoderado','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insImagenApoderado">Imagen de perfil</label>
                            <input type="file" class="form-control" id="insImagenApoderado" name="insImagenApoderado">
                            {!! $errors->first('insImagenApoderado','<small class="text-danger">:message</small>') !!}
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