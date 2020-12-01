@extends('layout')
@section('title','FUNCIONARIO | ACTUALIZAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Actualizar Funcionario: {{ $funcionario->FUNCIONARIO_AP_PATERNO }} {{ $funcionario->FUNCIONARIO_AP_MATERNO }}, {{ $funcionario->FUNCIONARIO_NOMBRES }}</h1>

            <form method="POST" action="{{ route('funcionario.update', $funcionario) }}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>RUT</label>
                            <input type="text" class="form-control" value="{{ $funcionario->FUNCIONARIO_RUT }}" placeholder="RUT..." readonly>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updNombresFuncionario">Nombres</label>
                            <input type="text" class="form-control {!! $errors->first('insNombresFuncionario','is-invalid') !!}" id="updNombresFuncionario" name="updNombresFuncionario" value="{{ old('updNombresFuncionario', $funcionario->FUNCIONARIO_NOMBRES) }}" placeholder="NOMBRES..." required>
                            {!! $errors->first('updNombresFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updApPaternoFuncionario">Apellido Paterno</label>
                            <input type="text" class="form-control {!! $errors->first('updApPaternoFuncionario','is-invalid') !!}" id="updApPaternoFuncionario" name="updApPaternoFuncionario" value="{{ old('updApPaternoFuncionario', $funcionario->FUNCIONARIO_AP_PATERNO) }}" placeholder="APELLIDO PATERNO..." required>
                            {!! $errors->first('updApPaternoFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updApMaternoFuncionario">Apellido Materno</label>
                            <input type="text" class="form-control {!! $errors->first('updApMaternoFuncionario','is-invalid') !!}" id="updApMaternoFuncionario" name="updApMaternoFuncionario" value="{{ old('updApMaternoFuncionario', $funcionario->FUNCIONARIO_AP_MATERNO) }}" placeholder="APELLIDO MATERNO..." required>
                            {!! $errors->first('updApMaternoFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFecNacFuncionario">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker {!! $errors->first('updFecNacFuncionario','is-invalid') !!}" id="updFecNacFuncionario" name="updFecNacFuncionario" value="{{ old('updFecNacFuncionario', $funcionario->FUNCIONARIO_FEC_NAC) }}" placeholder="FECHA DE NACIMIENTO..." required>
                            {!! $errors->first('updFecNacFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updEmailFuncionario">Email</label>
                            <input type="text" class="form-control {!! $errors->first('updEmailFuncionario','is-invalid') !!}" id="updEmailFuncionario" name="updEmailFuncionario" value="{{ old('updEmailFuncionario', $funcionario->FUNCIONARIO_EMAIL) }}" placeholder="EMAIL..." required>
                            {!! $errors->first('updEmailFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCelularFuncionario">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control {!! $errors->first('updCelularFuncionario','is-invalid') !!}" id="updCelularFuncionario" name="updCelularFuncionario" value="{{ old('updCelularFuncionario', substr($funcionario->FUNCIONARIO_FONO_CEL, 3)) }}" placeholder="N° CELULAR..." required>
                            </div>                            
                            {!! $errors->first('updCelularFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updFonoFuncionario">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="updFonoFuncionario" name="updFonoFuncionario" value="{{ old('updFonoFuncionario', $funcionario->FUNCIONARIO_FONO_FIJO) }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('updFonoFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="updDomicilioFuncionario">Domicilio</label>
                            <input type="text" class="form-control {!! $errors->first('updDomicilioFuncionario','is-invalid') !!}" id="updDomicilioFuncionario" name="updDomicilioFuncionario" value="{{ old('updDomicilioFuncionario', $funcionario->FUNCIONARIO_DOMICILIO) }}" placeholder="DOMICILIO..." required>
                            {!! $errors->first('updDomicilioFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="updCiudadFuncionario">Ciudad</label>
                            <select class="form-control {!! $errors->first('updCiudadFuncionario','is-invalid') !!}" id="updCiudadFuncionario" name="updCiudadFuncionario" required>
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('updCiudadFuncionario', $funcionario->CIUDAD_ID) == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('updCiudadFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="custom-file">
                            <label>Imagen de perfil</label>
                            <input type="hidden" class="form-control" id="updImagenHideFuncionario" name="updImagenHideFuncionario" value="{{ $funcionario->FUNCIONARIO_IMG }}">
                            <div class="input-group">
                                <input type="file" class="custom-file-input" id="updImagenFuncionario" name="updImagenFuncionario">
                                <label class="custom-file-label" for="updImagenFuncionario">SELECCIONAR IMAGEN...</label>
                                {!! $errors->first('updImagenFuncionario','<small class="text-danger">:message</small>') !!}
                            @if( $funcionario->FUNCIONARIO_IMG )
                                <img src="{{ Storage::url($funcionario->FUNCIONARIO_IMG) }}" width="50" alt="">
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Cargo</label>
                            @foreach( $cargos as $cargo )
                                <?php $checked = '' ?>
                                @foreach( $funcar as $func )
                                    @if ( $cargo->id == $func->CARGO_ID )
                                        <?php $checked = 'checked' ?>
                                    @endif                                
                                @endforeach
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="updCargoFuncionario[]" value="{{ $cargo->id }}" {{ (is_array(old('updCargoFuncionario')) and in_array( $cargo->id , old('insCargoFuncionario'))) ? 'checked' : '' }} {{ $checked }}>{{ $cargo->TIPO_CARGO_NOMBRE }}
                                </label>
                            </div>
                            @endforeach
                            {!! $errors->first('updCargoFuncionario','<small class="text-danger">:message</small>') !!}
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