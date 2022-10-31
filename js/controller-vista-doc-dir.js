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

    $('#option-1-1').click(()=>{
        console.log(localStorage.getItem('id_doc'));
        let id_doc = localStorage.getItem('id_doc');
        $.ajax({
            type:       'POST',
            url:        '../controller/turn-doc-dir.php',
            data:       {'id_doc':id_doc},
            success:    function(e){
                $('#data-turn').html(e);
                $('#Modal-doc-turn').modal('show');
            }   
        });
    }); 

   $('#option-1-2').click(()=>{
       console.log('test');
    let id_doc = localStorage.getItem('id_doc');    
    $.ajax({
        type:       'POST',
        url:        '../View/at-doc-view.php',
        data:       {'id_doc':id_doc},
        success:    function(e){
            $('#data-at').html(e);
            $('#Modal-at-doc').modal('show');
        }       
    });
   }); 


   $('#option-1-3').click(()=>
   {
    let id_doc = localStorage.getItem('id_doc')
    swal("¿Desea archivar el documento?","El documento se movera a la seccion de archivados","warning", {
        buttons: {
          cerrar: {
            text: "Archivar",
            value: "1",
          },
          no_cerrar:{
              text: "No archivar",
              value: "0"
          },
        },
      }).then((value)=>{
        switch(value)
        {
            case "1":
                $.ajax({
                    type:       'POST',
                    url:        '../Controller/controller_arch_doc.php',
                    data:       {'id_documento': id_doc},
                    success:    function(e){
                        swal(e);
                        $('#Modal-doc').modal('toggle');
                    }
                });
            break;
            case "0":
            swal("No se archivo el documento");
        }
      });
   });
});