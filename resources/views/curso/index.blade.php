@extends('layout')
@section('title','CURSO')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Curso</h1>
            <a href="{{ route('curso.create') }}" class="btn btn-primary float-right">Nuevo Curso</a>          

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CURSO</th>
                        <th scope="col">NIVEL</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $cursos as $curso )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $curso->CURSO_NOMBRE }}</td>
                        <td>{{ nmbNivel($curso->NIVEL_ID) }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('curso.cursoasignatura' , $curso) }}" class="btn btn-sm btn-primary"><i class="fas fa-book-open"></i></a>
                                <a href="{{ route('curso.edit' , $curso) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                <form method="POST" action="{{ route('curso.destroy', $curso) }}">
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