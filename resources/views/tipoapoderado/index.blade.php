@extends('layout')
@section('title','TIPO DE APODERADO')
@section('content')

<div class="container-fluid" id="xxx">
    <div class="row">
        <div class="col-12">
            <h1>Tipo de Apoderado</h1>
            <a href="{{ route('tipoapoderado.create') }}" class="btn btn-primary float-right">Nuevo Tipo de Apoderado</a>          

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TIPO DE APODERADO</th>
                        <th scope="col">EDITAR</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $tipoapoderado as $tipo )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $tipo->TIPO_APODERADO_NOMBRE }}</td>
                        <td><a href="{{ route('tipoapoderado.edit' , $tipo) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a></td>
                        <td>
                            <form method="POST" action="{{ route('tipoapoderado.destroy', $tipo) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan='4'>TABLA SIN DATOS</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection