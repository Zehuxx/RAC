$(document).ready(function(){
    $(".card").click(function(event) {
      //console.log(event.target.className);
        if (event.target.className == "icon-close") {
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Estas seguro?',
              text: "No podras revertir estos cambios!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Si, borrar!',
              cancelButtonText: 'No, cancelar!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                var token = $("meta[name='csrf-token']").attr("content");
                var id=$(event.target.parentElement).attr("data-id");
                var element=$(this);
                $.ajax({
                url:"car/borrar/"+id,
                method:"DELETE",
                data:{"id": id,"_token":token },
                success:function(){
                  element.parent().fadeOut();
                  swalWithBootstrapButtons.fire(
                  'Borrado!',
                  'Tus datos han sido borrados',
                  'success'
                  )
                  }   
                })

              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelado',
                  'Tus datos estan seguros',
                  'error'
                )
              }
            })
        }

    });
});


