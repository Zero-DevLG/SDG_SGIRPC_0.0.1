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

    $('#option-1-2').click(()=>{
        console.log('test');
     let id_doc = localStorage.getItem('id_doc');    
     $.ajax({
         type:       'POST',
         url:        '../View/at-doc-view-dep.php',
         data:       {'id_doc':id_doc},
         success:    function(e){
             $('#data-at').html(e);
             $('#Modal-at-doc').modal('show');
         }       
     });
    }); 


    $('#option-1-1').click(()=>{
        console.log(localStorage.getItem('id_doc'));
        let id_doc = localStorage.getItem('id_doc');
        let id_inst = $('#id_ins').val();
        var formData = new FormData();

        formData.append('id_doc',id_doc);
        formData.append('id_ins',id_inst);

        $.ajax({
            type:       'POST',
            url:        '../controller/turn-doc-dep.php',
            data:       formData,
            contentType: false,
            processData: false,
            success:    function(e){
                $('#data-turn').html(e);
                $('#Modal-doc-turn').modal('show');
            }   
        });
    }); 


});