@extends('layout')
@section('title','COLEGIO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Colegio</h1>
            @if( isset($colegio->id) )
                <a href="{{ route('colegio.edit' , $colegio->id) }}" class="btn btn-primary float-right">EDITAR COLEGIO</a>
            @else
                <a href="{{ route('colegio.create') }}" class="btn btn-primary float-right">CREAR COLEGIO</a>
            @endif

            @if( isset($colegio->id) )
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="table-dark">NOMBRE</td>
                        <td>{{ $colegio->COLEGIO_NOMBRE }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">DIRECCIÓN</td>
                        <td>{{ $colegio->COLEGIO_DIRECCION }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">CIUDAD</td>
                        <td>{{ nmbCiudad($colegio->CIUDAD_ID) }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO FIJO</td>
                        <td>{{ $colegio->COLEGIO_FONO_FIJO }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">TELÉFONO CELULAR</td>
                        <td>{{ $colegio->COLEGIO_FONO_CEL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">EMAIL</td>
                        <td>{{ $colegio->COLEGIO_EMAIL }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark">INSIGNIA</td>
                        <td><img src="{{ Storage::url($colegio->COLEGIO_LOGO) }}" width="50" alt=""></td>
                    </tr>
                    <tr>
                        <td class="table-dark">ELIMINAR</td>
                        <td>
                            <form method="POST" action="{{ route('colegio.destroy', $colegio->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table> 
            @endif           
                      
        </div>
    </div>
</div>

@endsection