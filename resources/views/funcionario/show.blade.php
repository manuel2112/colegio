@extends('layout')
@section('title','FUNCIONARIO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>FUNCIONARIO: {{ $funcionario->FUNCIONARIO_NOMBRES }} {{ $funcionario->FUNCIONARIO_AP_PATERNO }} {{ $funcionario->FUNCIONARIO_AP_MATERNO }}</h1>
            
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="table-dark">RUT</td>
                        <td>{{ $funcionario->FUNCIONARIO_RUT }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">NOMBRES</td>
                        <td>{{ $funcionario->FUNCIONARIO_NOMBRES }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">APELLIDO PATERNO</td>
                        <td>{{ $funcionario->FUNCIONARIO_AP_PATERNO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">APELLIDO MATERNO</td>
                        <td>{{ $funcionario->FUNCIONARIO_AP_MATERNO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EDAD</td>
                        <td>{{ calcularEdad($funcionario->FUNCIONARIO_FEC_NAC) }}, {{ $funcionario->FUNCIONARIO_FEC_NAC }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">DOMICILIO</td>
                        <td>{{ $funcionario->FUNCIONARIO_DOMICILIO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">CIUDAD</td>
                        <td>{{ nmbCiudad($funcionario->CIUDAD_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO CELULAR</td>
                        <td>{{ $funcionario->FUNCIONARIO_FONO_CEL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO FIJO</td>
                        <td>{{ $funcionario->FUNCIONARIO_FONO_FIJO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EMAIL</td>
                        <td>{{ $funcionario->FUNCIONARIO_EMAIL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">INGRESO</td>
                        <td>{{ $funcionario->created_at }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">IMAGEN</td>
                        <td><img src="{{ Storage::url($funcionario->FUNCIONARIO_IMG) }}" width="100" alt=""></td>
                    </tr>
                    <tr>
                        <td class="table-dark">CARGO(S)</td>
                        <td>
                            @foreach( $cargos as $cargo )
                            - {{ nmbTipoCargo($cargo->CARGO_ID) }} <br>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
                      
        </div>
    </div>
</div>

@endsection