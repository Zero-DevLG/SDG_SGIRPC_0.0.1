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


$(document).ready(()=>{


     //DROPZONE
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
 
 
    
    

    $('#add_dep').click(()=>
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


    $('#close_turn').click(()=>{
        $('#Modal-doc-turn').modal('hide');
    });


    $('#turn_doc_dep').click(()=>
    {
        
        var instruccion = $('#txt_instruccion').val();
        var formData = new FormData();
        var id_instruccion_dir_gen = localStorage.getItem('id_doc');
        formData.append('instruccion',instruccion);
        formData.append('arrayNames',JSON.stringify(arrayNames));
        formData.append('id_ins',id_instruccion_dir_gen);
        if(arrayNames.length == 0 || instruccion == '' || id_instruccion_dir_gen == '' ){
            console.log('Test G');
            swal('Error','Favor de llenar todos los campos');
        }else{
            console.log('Test');
            console.log(instruccion, arrayNames);
            $.ajax({
                type:           'POST',
                url:            '../Controller/controller_turn_doc_dep.php',
                data:           formData,
                contentType:    false,
                processData:    false,
                success:        function(e)
                {
                    for (var i = 0; i < arrayFiles.length; i++) {
                        var datosFiles = new FormData();
                        var tipo = 1  ; 
                        datosFiles.append("file", arrayFiles[i]);
                        datosFiles.append("id_ins",id_instruccion_dir_gen);
                        datosFiles.append("tipo",tipo);
      
                          $.ajax({
                            type:         'POST',
                            url:          '../Controller/controller_up_files_dep.php',
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
    
                }
            });
          
        }
       
    });
   

    

}); 

