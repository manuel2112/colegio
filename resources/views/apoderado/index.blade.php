@extends('layout')
@section('title','APODERADO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Apoderados</h1>
            <a href="{{ route('apoderado.create') }}" class="btn btn-primary float-right">Nuevo Apoderado</a>

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
                    @forelse( $apoderados as $apoderado )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $apoderado->APODERADO_RUT }}</td>
                        <td>{{ $apoderado->APODERADO_AP_PATERNO }} {{ $apoderado->APODERADO_AP_MATERNO }}, {{ $apoderado->APODERADO_NOMBRES }}</td>
                        <td>
                            @if( $apoderado->APODERADO_IMG )
                                <img src="{{ Storage::url($apoderado->APODERADO_IMG) }}" width="50" alt="">
                            @else
                                <i class="fas fa-user-tie"></i>
                            @endif
                        </td>
                        <td class="acciones">
                            <a href="{{ route('apoderado.show' , $apoderado) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('apoderado.edit' , $apoderado) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                            <form method="POST" action="{{ route('apoderado.destroy', $apoderado) }}">
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