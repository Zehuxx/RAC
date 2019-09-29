 $(".table tr").click(function(event) {
        if (event.target.className == "btn btn-sm btn-outline-danger" || event.target.className == "fa fa-trash-o") {
            //console.log(event.target.className);
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
                if (event.target.className == "fa fa-trash-o") {
                  var id_orden=$(event.target.parentNode).attr("order-id");
                }else{
                  var id_orden=$(event.target).attr("order-id");
                }
                var element=$(this);
                //console.log(id_detalle,id_orden);
                $.ajax({
                url:"orden/"+id_orden+"/borrar",
                method:"DELETE",
                data:{"id_orden": id_orden,"_token":token },
                success:function(d){
                  console.log(d);
                  element.fadeOut();
                  swalWithBootstrapButtons.fire(
                  'Borrado!',
                  'Tus datos han sido borrados',
                  'success'
                  )
                  }   
                })

              } else if (
                
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