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


$(document).ready(()=>{
    getHeight();
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


});