@extends('layout')
@section('title','ALUMNO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Ciudad</h1>
            <a href="{{ route('ciudad.create') }}" class="btn btn-primary float-right">Nueva Ciudad</a>          

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CIUDAD</th>
                        <th scope="col">EDITAR</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $ciudades as $ciudad )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $ciudad->CIUDAD_NOMBRE }}</td>
                        <td><a href="{{ route('ciudad.edit' , $ciudad) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a></td>
                        <td>
                            <form method="POST" action="{{ route('ciudad.destroy', $ciudad) }}">
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