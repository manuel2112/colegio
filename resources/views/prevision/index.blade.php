@extends('layout')
@section('title','PREVISIÓN')

@section('content')

<div class="container-fluid" id="xxx">
    <div class="row">
        <div class="col-12">
            <h1>Previsión</h1>
            <a href="{{ route('prevision.create') }}" class="btn btn-primary float-right">Nueva Previsión</a>          

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PREVISIÓN</th>
                        <th scope="col">EDITAR</th>
                        <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $previsiones as $prevision )
                    <tr>
                        <th scope="row">{{ $contador++ }}</th>
                        <td>{{ $prevision->PREVISION_NOMBRE }}</td>
                        <td><a href="{{ route('prevision.edit' , $prevision) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a></td>
                        <td>
                            <form method="POST" action="{{ route('prevision.destroy', $prevision) }}">
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