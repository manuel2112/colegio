@extends('layout')
@section('title','ASIGNATURAS')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Asignatura</h1>
            <a href="{{ route('asignatura.create') }}" class="btn btn-primary float-right">Nueva Asignatura</a>

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <table class="table table-bordered table-dark table-hover" id="tblasignatura" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">CÓDIGO</th>
                        <th scope="col">ASIGNATURA</th>
                        <th scope="col">USO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
            </table>

            <form method="POST" action="{{ route('asignatura.import') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="file" class="form-control" id="insFileAsignatura" name="insFileAsignatura">
                        {!! $errors->first('insFileAsignatura','<small class="text-danger">:message</small>') !!}
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">INGRESAR</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

  $(function () {    

    var table = $('#tblasignatura').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('asignatura.json') }}",
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        lengthMenu : [
                        [ 20, 50, 100, -1 ],
                        [ '20', '50', '100', 'Todo' ] ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
            {data: 'ASIGNATURA_COD', name: 'ASIGNATURA_COD'},
            {data: 'ASIGNATURA_NOMBRE', name: 'ASIGNATURA_NOMBRE'},
            {data: 'uso', name: 'uso'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    }); 

    $('#tblasignatura').on( 'draw.dt', function () {
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
    
    $("#tblasignatura").on("click", ".btn-uso", function() {

        var idAsignatura    = $(this).attr("idasignatura");
        var valor           = $(this).attr("valor");
        var _token          = $('#token').val();
        var dataString      = { idAsignatura: idAsignatura, valor: valor, _token: _token };
        $.ajax({

            url: '/asignatura/ajaxuso',
            method: "POST",
            data: dataString,
            dataType: "json",
            success:  function (response) {
                
                  if( response.ok === 1 ){
                    $("#uso-"+response.id).html(response.btn);
                  }
               },
               statusCode: {
                  404: function() {
                     alert('web not found');
                  }
               },
               error:function(x,xs,xt){
                  alert(JSON.stringify(x));
               }

        });

    });

  });

</script>
@endsection