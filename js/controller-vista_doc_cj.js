$(document).ready(()=>{



    $('#option-at-doc').click(()=>{
        console.log('test');
     let id_doc =  $('#id_documento').val();
     $.ajax({
         type:       'POST',
         url:        '../View/at-doc-view-cj.php',
         data:       {'id_doc':id_doc},
         success:    function(e){
             $('#data-at').html(e);
             $('#Modal-at-doc').modal('show');
         }       
     });
    }); 



});