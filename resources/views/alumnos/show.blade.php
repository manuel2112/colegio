@extends('layout')
@section('title','ALUMNO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>{{ $alumno->ALUMNO_NOMBRES }} {{ $alumno->ALUMNO_AP_PATERNO }} {{ $alumno->ALUMNO_AP_MATERNO }}</h1>
            
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="table-dark">RUT</td>
                        <td>{{ $alumno->ALUMNO_RUT }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">NOMBRES</td>
                        <td>{{ $alumno->ALUMNO_NOMBRES }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">APELLIDO PATERNO</td>
                        <td>{{ $alumno->ALUMNO_AP_PATERNO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">APELLIDO MATERNO</td>
                        <td>{{ $alumno->ALUMNO_AP_MATERNO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EDAD</td>
                        <td>{{ calcularEdad($alumno->ALUMNO_FEC_NAC) }}, {{ $alumno->ALUMNO_FEC_NAC }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">DOMICILIO</td>
                        <td>{{ $alumno->ALUMNO_DOMICILIO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">CIUDAD</td>
                        <td>{{ nmbCiudad($alumno->CIUDAD_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO CELULAR</td>
                        <td>{{ $alumno->ALUMNO_FONO_CEL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO FIJO</td>
                        <td>{{ $alumno->ALUMNO_FONO_FIJO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EMAIL</td>
                        <td>{{ $alumno->ALUMNO_EMAIL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">SEXO</td>
                        <td>{{ $alumno->ALUMNO_SEXO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">INGRESO</td>
                        <td>{{ $alumno->ALUMNO_INGRESO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">PREVISIÓN</td>
                        <td>{{ nmbPrevision($alumno->PREVISION_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TIPO DE SANGRE</td>
                        <td>{{ nmbTipoSangre($alumno->SANGRE_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">IMAGEN</td>
                        <td><img src="{{ Storage::url($alumno->ALUMNO_IMG) }}" width="100" alt=""></td>
                    </tr>
                </tbody>
            </table>                     
                      
        </div>
    </div>
</div>

@endsection