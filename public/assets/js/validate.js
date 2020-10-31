$(document).ready(function() {

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

}); //FIN DOCUMENT