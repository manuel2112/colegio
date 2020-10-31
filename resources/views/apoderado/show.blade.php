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
                </tbody>
            </table>                     
                      
        </div>
    </div>
</div>

@endsection