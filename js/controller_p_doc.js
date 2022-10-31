function size()
{
    $(window).resize(()=>{
        var h = $(window).height();
        $('#side-menu').css('height',h);
    });
}


$(document).ready(()=>{

    size();
    var id_doc = localStorage.getItem('id_doc');
    var h = $(window).height();
    $('#side-menu').css('height',h);

    $('#option-1-1').click(()=>
    {
        swal("¿Desea notificar de enterado?", {
            buttons: {
              cancel: "cancelar",
              catch: {
                text: "Marcar de enterado",
                value: "catch",
              },
            },
          })
          .then((value) => {
            switch (value) {
           
              case "catch":
                $.ajax({
                    type:       'POST',
                    url:        '../Controller/controller_doc_p.php',
                    data:       {'id_documento': id_doc},
                    success:    function(e){
                        swal("",e, "success");
                    }
                });
               
                break;
           
              default:
                swal("Accion cancelada");
            }
          });
    });
});