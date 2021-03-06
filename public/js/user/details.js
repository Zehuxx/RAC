$("#editar").on("click",function(){
	$("#guardar").show();
    $("#marca").prop("disabled",false);
    $("#modelo").prop("disabled",false);
    $("#chasis").prop("disabled",false);
    $("#placa").prop("disabled",false);
    $("#tipo").prop("disabled",false);
    $("#estado").prop("disabled",false);
    $('#year').removeAttr('disabled');
    $("#ubicacion").prop("disabled",false);
    $('#imagen').removeAttr('disabled');
});


    $(".table tr").click(function(event) {
      //console.log(event.target.className);
        if (event.target.className == "btn btn-sm btn-outline-danger" || event.target.className == "fa fa-trash-o") {
            
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
                  var id_detalle=$(event.target.parentNode).attr("data-id");
                  var id_orden=$(event.target.parentNode).attr("data-order");
                }else{
                  var id_detalle=$(event.target).attr("data-id");
                  var id_orden=$(event.target).attr("data-order");
                }
                var element=$(this);
                //console.log(id_detalle,id_orden);
                $.ajax({
                url:"detalle/"+id_detalle+"/borrar",
                method:"DELETE",
                data:{"id_orden": id_orden,"id_detalle": id_detalle,"_token":token },
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


