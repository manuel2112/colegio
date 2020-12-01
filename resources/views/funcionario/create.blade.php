@extends('layout')
@section('title','FUNCIONARIO | CREAR')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ingresar Funcionario</h1>

            <form method="POST" action="{{ route('funcionario.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insRUTFuncionario">RUT</label>
                            <input type="text" class="form-control {!! $errors->first('insRUTFuncionario','is-invalid') !!}" id="insRUTFuncionario" name="insRUTFuncionario" value="{{ old('insRUTFuncionario') }}" placeholder="RUT..." required>
                            {!! $errors->first('insRUTFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insNombresFuncionario">Nombres</label>
                            <input type="text" class="form-control {!! $errors->first('insNombresFuncionario','is-invalid') !!}" id="insNombresFuncionario" name="insNombresFuncionario" value="{{ old('insNombresFuncionario') }}" placeholder="NOMBRES..." required>
                            {!! $errors->first('insNombresFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insApPaternoFuncionario">Apellido Paterno</label>
                            <input type="text" class="form-control {!! $errors->first('insApPaternoFuncionario','is-invalid') !!}" id="insApPaternoFuncionario" name="insApPaternoFuncionario" value="{{ old('insApPaternoFuncionario') }}" placeholder="APELLIDO PATERNO..." required>
                            {!! $errors->first('insApPaternoFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insApMaternoFuncionario">Apellido Materno</label>
                            <input type="text" class="form-control {!! $errors->first('insApMaternoFuncionario','is-invalid') !!}" id="insApMaternoFuncionario" name="insApMaternoFuncionario" value="{{ old('insApMaternoFuncionario') }}" placeholder="APELLIDO MATERNO..." required>
                            {!! $errors->first('insApMaternoFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFecNacFuncionario">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker {!! $errors->first('insFecNacFuncionario','is-invalid') !!}" id="insFecNacFuncionario" name="insFecNacFuncionario" value="{{ old('insFecNacFuncionario') }}" placeholder="FECHA DE NACIMIENTO..." required>
                            {!! $errors->first('insFecNacFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insEmailFuncionario">Email</label>
                            <input type="text" class="form-control {!! $errors->first('insEmailFuncionario','is-invalid') !!}" id="insEmailFuncionario" name="insEmailFuncionario" value="{{ old('insEmailFuncionario') }}" placeholder="EMAIL..." required>
                            {!! $errors->first('insEmailFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCelularFuncionario">N° Celular</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56</div>
                                </div>
                                <input type="text" class="form-control {!! $errors->first('insCelularFuncionario','is-invalid') !!}" id="insCelularFuncionario" name="insCelularFuncionario" value="{{ old('insCelularFuncionario') }}" placeholder="N° CELULAR..." required>
                            </div>                            
                            {!! $errors->first('insCelularFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insFonoFuncionario">N° Teléfono Fijo</label>                            
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="insFonoFuncionario" name="insFonoFuncionario" value="{{ old('insFonoFuncionario') }}" placeholder="N° TELÉFONO FIJO...">
                            </div>                            
                            {!! $errors->first('insFonoFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="insDomicilioFuncionario">Domicilio</label>
                            <input type="text" class="form-control {!! $errors->first('insDomicilioFuncionario','is-invalid') !!}" id="insDomicilioFuncionario" name="insDomicilioFuncionario" value="{{ old('insDomicilioFuncionario') }}" placeholder="DOMICILIO..." required>
                            {!! $errors->first('insDomicilioFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="insCiudadFuncionario">Ciudad</label>
                            <select class="form-control {!! $errors->first('insCiudadFuncionario','is-invalid') !!}" id="insCiudadFuncionario" name="insCiudadFuncionario" required>
                                <option value="">SELECCIONAR CIUDAD</option>
                            @foreach( $ciudades as $ciudad )
                                <option value="{{ $ciudad->id }}" {{ old('insCiudadFuncionario') == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->CIUDAD_NOMBRE }}</option>
                            @endforeach
                            </select>
                            {!! $errors->first('insCiudadFuncionario','<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="custom-file">
                            <label>Imagen de perfil</label>
                            <div class="input-group">
                                <input type="file" class="custom-file-input" id="insImagenFuncionario" name="insImagenFuncionario">
                                <label class="custom-file-label" for="insImagenFuncionario">SELECCIONAR IMAGEN...</label>
                                {!! $errors->first('insImagenFuncionario','<small class="text-danger">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Cargo</label>
                            @foreach( $cargos as $cargo )
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="insCargoFuncionario[]" value="{{ $cargo->id }}" {{ (is_array(old('insCargoFuncionario')) and in_array( $cargo->id , old('insCargoFuncionario'))) ? 'checked' : '' }}>{{ $cargo->TIPO_CARGO_NOMBRE }}
                                </label>
                            </div>
                            @endforeach
                            {!! $errors->first('insCargoFuncionario','<small class="text-danger">:message</small>') !!}
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