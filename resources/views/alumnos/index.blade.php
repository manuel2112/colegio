@extends('layout')
@section('title','ALUMNO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Alumnos</h1>
            <a href="{{ route('alumnos.create') }}" class="btn btn-primary float-right">Nuevo Alumno</a>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">RUT</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">IMG</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $alumnos as $alumno )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $alumno->ALUMNO_RUT }}</td>
                        <td>{{ $alumno->ALUMNO_AP_PATERNO }} {{ $alumno->ALUMNO_AP_MATERNO }}, {{ $alumno->ALUMNO_NOMBRES }}</td>
                        <td>
                            @if( $alumno->ALUMNO_IMG )
                                <img src="{{ Storage::url($alumno->ALUMNO_IMG) }}" width="50" alt="">
                            @else
                                <i class="fas fa-user-tie"></i>
                            @endif
                        </td>
                        <td class="acciones">
                            <a href="{{ route('alumnos.show' , $alumno) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('alumnos.edit' , $alumno) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                            <form method="POST" action="{{ route('alumnos.destroy', $alumno) }}">
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