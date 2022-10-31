function size()
{
    $(window).resize(()=>{
        var h = $(window).height();
        $('#side-menu').css('height',h);
    });
}

$(document).ready(()=>{
    size();

    var h = $(window).height();
    $('#side-menu').css('height',h);


    $('#option2-1').click(()=>{
      
    });


    $('#option-2-2').click(()=>{
        let id_doc = $('#id_documento').val();
        let option_e = 1;
        var formData = new FormData();
        formData.append('id_documento',id_doc);
        formData.append('option',option_e);

        swal("¿Desea cancelar el turno?","El documento dejara de ser visible para todos los involucrados, el documento volvera a la sección de origen","warning", {
            buttons: {
              cerrar: {
                text: "Cancelar",
                value: "1",
              },
              no_cerrar:{
                  text: "No cancelar",
                  value: "0"
              },
            },
          })
          .then((value) => {
            switch (value) {
           
              case "0":
                swal("No se ha cancelado el turno");
                break;
           
              case "1":
                  $.ajax({
                      type:     'POST',
                      url:      '../Controller/controller_cancell_turn.php',
                      data:     formData,
                      contentType: false,
                      processData: false,
                      success:  function(e){
                          swal(e);
                        $('#Modal-doc-turn').modal('toggle');
                      }
                  })
                break;
           
              default:
                swal("No se ha cancelado el turno");
            }
          });


    });


});