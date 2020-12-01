@extends('layout')
@section('title','NIVEL')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Nivel</h1>
            <a href="{{ route('nivel.create') }}" class="btn btn-primary float-right">Nuevo Nivel</a>          

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIVEL</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $niveles as $nivel )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $nivel->NIVEL_NOMBRE }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('nivel.edit' , $nivel) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                <form method="POST" action="{{ route('nivel.destroy', $nivel) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-confirm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
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