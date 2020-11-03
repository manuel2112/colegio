@extends('layout')
@section('title','APODERADO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>APODERADO: {{ $apoderado->APODERADO_NOMBRES }} {{ $apoderado->APODERADO_AP_PATERNO }} {{ $apoderado->APODERADO_AP_MATERNO }}</h1>
            
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="table-dark">RUT</td>
                        <td>{{ $apoderado->APODERADO_RUT }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">NOMBRES</td>
                        <td>{{ $apoderado->APODERADO_NOMBRES }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">APELLIDO PATERNO</td>
                        <td>{{ $apoderado->APODERADO_AP_PATERNO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">APELLIDO MATERNO</td>
                        <td>{{ $apoderado->APODERADO_AP_MATERNO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TIPO DE APODERADO</td>
                        <td>{{ nmbTipoApoderado($apoderado->TIPO_APODERADO_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EDAD</td>
                        <td>{{ calcularEdad($apoderado->APODERADO_FEC_NAC) }}, {{ $apoderado->APODERADO_FEC_NAC }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">DOMICILIO</td>
                        <td>{{ $apoderado->APODERADO_DOMICILIO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">CIUDAD</td>
                        <td>{{ nmbCiudad($apoderado->CIUDAD_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO CELULAR</td>
                        <td>{{ $apoderado->APODERADO_FONO_CEL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO FIJO</td>
                        <td>{{ $apoderado->APODERADO_FONO_FIJO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EMAIL</td>
                        <td>{{ $apoderado->APODERADO_EMAIL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">LUGAR DE TRABAJO</td>
                        <td>{{ $apoderado->APODERADO_TRABAJO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO TRABAJO</td>
                        <td>{{ $apoderado->APODERADO_FONO_TRABAJO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EX-ALUMNO</td>
                        <td><?php echo $apoderado->APODERADO_EX_ALUMNO == 0 ? 'SI' : 'NO' ?></td>
                    </tr>
                    <tr>
                        <td class="table-dark">INGRESO</td>
                        <td>{{ $apoderado->created_at }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">IMAGEN</td>
                        <td><img src="{{ Storage::url($apoderado->APODERADO_IMG) }}" width="100" alt=""></td>
                    </tr>
                    <tr>
                        <td class="table-dark">APODERADO DE</td>
                        <td>
                        @foreach( $pupilos as $pupilo )
                        <?php $var = alumno($pupilo->ID_ALUMNO)  ?>
                        <div class="pupilo">
                            <a href="{{ route('alumnos.show' , $pupilo->ID_ALUMNO) }}" class="btn btn-sm btn-outline-secondary">{{ $var->ALUMNO_NOMBRES }} {{ $var->ALUMNO_AP_PATERNO }} {{ $var->ALUMNO_AP_MATERNO }}</a>
                            <form method="POST" action="{{ route('apoderado.destroypupilo', $apoderado) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id-pupilo" value="{{ $var->id }}" >
                                <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                        @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>

        <form method="POST" action="{{ route('apoderado.addalumno', $apoderado) }}" role="form">
            @csrf
            <div class="card text-center mb-5">
                <div class="card-header" style="">
                    BUSCAR ALUMNO
                    {!! $errors->first('slc-alumno','<br><small class="text-danger">:message</small>') !!}
                </div>
                <div class="card-body">
                    <div class="input-group selectWrapper col-12">
                        <select class="form-control custom-select form-control-lg" name="slc-alumno" required>
                            <option value="">SELECCIONAR ALUMNO...</option>
                            @foreach( $alumnos as $alumno )
                                <option value="{{ $alumno->id }}" {{ old('slc-alumno') == $alumno->id ? 'selected' : '' }}>{{ $alumno->id }} / {{ $alumno->ALUMNO_RUT }} / {{ $alumno->ALUMNO_AP_PATERNO }} {{ $alumno->ALUMNO_AP_MATERNO }}, {{ $alumno->ALUMNO_NOMBRES }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary" name="btn-color-01">SELECCIONAR</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    BUSCAR Y SELECCIONAR ALUMNO
                </div>
            </div>
        </form>
                      
        </div>
    </div>
</div>

@endsection