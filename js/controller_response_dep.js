

$(document).ready(()=>{
    var folio_use = 1;
    console.log("Inicializando scripts");

     ///Operaciones DropZone
  var arrayFiles = [];
  
  Dropzone.options.fileZoneAt = {

      addRemoveLinks: true,
      aceptedFile: ".pdf",
      maxFilesize: 8,
      maxFiles: 20,
      init: function() {
          $('.dz-remove').text("Remover archivo");
          this.on("addedfile", function(file) {
              $('#add_file_database').show();
              $('#clear_drop').show();
              arrayFiles.push(file);
              console.log("arrayFiles", arrayFiles);
          });
          this.on("removedfile", function(file) {
              var index = arrayFiles.indexOf(file);
              arrayFiles.splice(index, 1);
              console.log("arrayFiles", arrayFiles);
          });
      }

  }

  $("#fileZoneAt").dropzone();


  //Limpiar DropZone
  $('#clear_drop').click(function() {
   
    Dropzone.forElement("#fileZoneAt").removeAllFiles(true);
    
    });



    //scrip folio
    $('#f_u').change(()=>{
        if($('#f_u').prop('checked'))
        {
            folio_use = 1;
            $('#folio_asignado').css('color','black');
        }else{
            folio_use = 0;
            $('#folio_asignado').css('color','red');
            swal('Folio no seleccionado','La respuesta se emitira sin usar el folio asignado','warning');
        }
    });


    $('#close_response').click(()=>{

        var folio_a = $('#folio_asignado').val();

        swal("Desea salir sin atender el documento?", {
            buttons: {
              cerrar: {
                text: "Salir",
                value: "1",
              },
              no_cerrar:{
                  text: "no salir",
                  value: "0"
              },
            },
          })
          .then((value) => {
            switch (value) {
           
              case "0":
                swal("Se permanecera en la ventana actual");
                break;
           
              case "1":
                  $.ajax({
                      type:     'POST',
                      url:      '../Controller/controller_temp.php',
                      data:     {'folio_a': folio_a},
                      success:  function(){
                        $('#Modal-at-doc').modal('toggle');
                      }
                  })
                break;
           
              default:
                swal("Se permanecera en la ventana actual");
            }
          });
    });

    $('#at_doc').click(()=>{
        if(folio_use == 1)
        {
            folio = $('#folio_asignado').val();
        }else{
            folio = '';
        }
        
        var id_doc = $('#id_documento_r').val();
        f_r = $('#f_r').val();
        response = $('#txt_response').val();
        var form_data = new FormData();
        form_data.append('folio',folio);
        form_data.append('f_r',f_r);
        form_data.append('response',response);
        form_data.append('id_documento',id_doc);
        console.log(f_r,response,folio,id_doc);
        $.ajax({
            type:           'POST',
            url:            '../Controller/controller_at_doc_dep.php',
            data:           form_data,
            contentType:    false,
            processData:    false,
            success:    function(e)
            {
              swal(e);
                if(e){
                    for (var i = 0; i < arrayFiles.length; i++) {
                      var tipo = 2;  
                      var datosFiles = new FormData();
                      datosFiles.append("file", arrayFiles[i]);
                      datosFiles.append("id_documento",id_doc);
                      datosFiles.append("tipo",tipo);
                        $.ajax({
                          type:         'POST',
                          url:          '../Controller/controller_up_files.php',
                          data:         datosFiles,
                          contentType:  false,
                          processData:  false,
                          success:      function(e){
                              swal(e);
                              $('#Modal-at-doc').modal('hide');
                              $('#Modal-doc').modal('hide');
                          }
                        });
                     }
                  }else{
                    swal("Hubo un error no se puede proceder");
                  }
            }
        });



    });


});