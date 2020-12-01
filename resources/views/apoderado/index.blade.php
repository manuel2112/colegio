@extends('layout')
@section('title','APODERADO')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Apoderados</h1>
            <a href="{{ route('apoderado.create') }}" class="btn btn-primary float-right">Nuevo Apoderado</a>

            <table class="table table-bordered table-dark table-hover" id="tblapoderado" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">RUT</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
            </table>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

  $(function () {    

    var table = $('#tblapoderado').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('apoderado.json') }}",
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        lengthMenu : [
                        [ 50, 100, -1 ],
                        [ '50', '100', 'Todo' ] ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'APODERADO_RUT', name: 'APODERADO_RUT'},
            {data: 'nombre', name: 'nombre'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    }); 

    $('#tblapoderado').on( 'draw.dt', function () {
        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                    title: 'ELIMINAR',
                    text: '¿ESTÁS SEGURO DE ELIMINAR ESTE REGISTRO?',
                    icon: "warning",
                    buttons: ["CANCELAR", "ELIMINAR"],
                    dangerMode: true,
                    showLoaderOnConfirm: true
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    });

  });

</script>
@endsection