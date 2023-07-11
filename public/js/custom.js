$(document).ready(function(){
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
});
$('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
    title: '¿Estas seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'advertencia',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Sí, bórralo!',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // si se cumple el formulario lanza el swal
            if (form.submit()) {
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Su registro ha sido eliminado.',
                showConfirmButton: false,
                timer: 1500
                })    
            }
        }
    })
});