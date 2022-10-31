function getHeight()
{
    var h = 0;
    h = $(window).height() + 15;
    $('.sidebar-p').css('height',h);
}

function load()
{
      $('#modalLoading').modal('show');
        setTimeout(() => {
            $('#modalLoading').modal('hide');
        }, 2000);
}


function goHome()
{
    $('#iframeI-2').empty();
    load();
    $.ajax({
        type:       'POST',
        url:        '../View/home_in.php',
        success:    function(e){
            $('#iframeI-2').html(e);  
        }
    })
}


$(document).ready(()=>
{

    goHome();
    
   getHeight();

    $('#home-option').click(()=>
    {

    });


    // Sidebar
    $('.sidebar-p').hover(()=>{
        $('.sidebar-p').css('width','250px');
        // $('.img-side').hide();
        $('.title-option').show(300);
    },()=>
    {
        $('.title-option').hide();
        $('.sidebar-p').css('width','40px');
        // $('.img-side').show();
    });

    $('#option-de').click(()=>
    {
        $('#iframeI-2').empty();
        load();
        $.ajax({
            type:       'POST',
            url:        '../View/doc_ex_dir.php',
            success:    function(e){
                $('#iframeI-2').html(e);  
            }
        })
    });

    $('#option-t').click(()=>{
        load();
        $('#load-data').show();
        setTimeout(() => {
            $.ajax(
                {
                    type:       'POST',
                    url:        '../View/dashboard.php',
                    success:    function (e) {
                        $('#load-data').hide();
                        $('#iframeI-2').html(e);  
                      }
                }); 
        }, 2000);
       
    });

    $('#option-rep').click(()=>{
        load();
        $('#load-data').show();
        setTimeout(() => {
            $.ajax(
                {
                    type:       'POST',
                    url:        '../View/repos.php',
                    success:    function (e) {
                        $('#load-data').hide();
                        $('#iframeI-2').html(e);  
                      }
                }); 
        }, 500);
       
    });



});



