var arrayDep = [];
var arrayNames = [];


function myFunction(event) { 
  //alert(event.target.nodeName);
  // console.log(event.target.textContent);
  // console.log(event.target);
  let name = event.target.textContent;
  arrayNames = arrayNames.filter(item => item !== name);
  console.log(JSON.stringify(arrayNames));
  //console.log(event.target.text());
  $('#selected-p').empty();

  for(i = 0; i< arrayNames.length;i++)
  {
      $('#selected-p').append('<div id="option-s">'+ arrayNames[i]+'</div>');    
  }
}

function pulsar(e) {
  if (e.which === 13 && !e.shiftKey) {
    e.preventDefault();
    console.log('prevented');
    return false;
  }
}

String.prototype.replaceAt = function(index, replacement) {
  return this.substr(0, index) + replacement + this.substr(index + replacement.length);
}

$(document).ready(()=>
{

  //Funciones Cajon


  $('body').bind('cut copy paste', function(event) {
    event.preventDefault();

  }); 


  $('#txt_instruccion').keyup((e)=>{
    p = $("#txt_instruccion").val();
     let Ncadena = p.replace(/[<,>,&,|]/g,"");
      $("#txt_instruccion").val(Ncadena);
  });

  ///
  var ct = 0
  
  $('#add_dir').click(()=>
  {
     
      if(arrayNames.includes($('#destiny option:selected').text()) || $('#destiny').val() == 0 )
      {
         console.log('Ya existe el elmento o no se ha seleccionado una opcion valida');
          
      }else{
          arrayNames.push($('#destiny option:selected').text());  
          $('#selected-p').empty();

          for(i = 0; i< arrayNames.length;i++)
          {
              $('#selected-p').append('<div id="option-s">'+ arrayNames[i]+'</div>');    
          }
         
      }
  });
  
  
  
  
  
  //scrip atencion_p
   $('#ct').change(()=>{
    if($('#ct').prop('checked'))
    {
        ct = 1;
        $('#folio_asignado').css('color','black');
    }else{
        ct = 0;
    }
});


  //Almacena Folio
  localStorage.setItem('f_a', $('#folio_asignado').val());
  
  //Comprobar si hubo un folio anterior
  if(localStorage.getItem('f_a'))
  {

  }


  ///Operaciones DropZone
  var arrayFiles = [];
  
  Dropzone.options.fileZone = {

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

  $("#fileZone").dropzone();


  //Limpiar DropZone
  $('#clear_drop').click(function() {
    Dropzone.forElement("#fileZone").removeAllFiles(true);
    });

    //Subir archivos
    $('#up_database').click(()=>{

    })

    //Cerrar sin turnar
    $('#close_turn').click(()=>{

        var folio_a = $('#folio_asignado').val();

        swal("Desea salir sin turnar?", {
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
                        $('#Modal-doc-turn').modal('toggle');
                      }
                  })
                break;
           
              default:
                swal("Se permanecera en la ventana actual");
            }
          });
    });

    //Obtener departamentos de las direcciones
    $('#destiny').change(()=>{
      let dir_gen = $('#destiny').val();
      console.log(dir_gen);
      $.ajax({
        type:     'POST',
        url:      '../Controller/controller_dep.php',
        data:     {'dir_gen':dir_gen},
        success:  function(e){
          $('#test').html(e);
        }
      });
    });

    //Turnar documento
    $('#turn_doc').click(()=>{
       var folio = $('#folio_asignado').val();
       var dir  = $('#destiny').val();
       var dep = $('#test').val();
       var p = $('#prioridad').val();
       var f_l = $('#f_l').val();
       var ins = $('#txt_instruccion').val();
       var id_doc = localStorage.getItem('id_doc');

      if(folio == '' ||  p == '' || f_l == '' || ins == ''  || arrayNames.length == 0)
      {
        swal('Error : Datos vacios');
      }else{
        var formData = new FormData();
        formData.append('folio',folio);
        //formData.append('dir',dir);
        //formData.append('dep',dep);
        formData.append('p',p);
        formData.append('f_l',f_l);
        formData.append('ct',ct);
        formData.append('ins',ins);
        formData.append('id_doc',id_doc);
        formData.append('arrayNames',JSON.stringify(arrayNames));

       $.ajax({
          type:     'POST',
          url:      '../Controller/controller_up_inst_dir.php',
          data:     formData,
          contentType: false,
          processData: false,
          success:  function(e){
              console.log(e);
              if(e){
                for (var i = 0; i < arrayFiles.length; i++) {
                  var datosFiles = new FormData();
                  var tipo = 1  ; 
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
                          swal("Turnado correctamente",e);
                          $('#Modal-doc-turn').modal('hide');
                          $('#Modal-doc').modal('hide');
                      }
                    });
                 }
              }else{
                swal("Hubo un error no se puede proceder");
              }
          }
       });
      }

      //  console.log(folio,dir,dep,p,f_l,ct,ins);
    });
});