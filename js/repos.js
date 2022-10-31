function load()
{
      $('#modalLoading').modal('show');
        setTimeout(() => {
            $('#modalLoading').modal('hide');
        }, 2000);
}

function getYear(e)
{
    let year = e;
    $.ajax({
        type:       'POST',
        url:        '../View/getDataYear.php',
        data:       {'year':year},
        success:    function(e)
        {
            $('#getViewYear').empty();
            $('#getViewYear').html(e);
        }
    });
}



$(document).ready(()=>{



    // SIDEREPOS
    $('#y-2021').click(()=>
    {
        let y = $('#y-2021 h4').text();
        getYear(y);
    });

    $('#y-2020').click(()=>
    {
        let y = $('#y-2020 h4').text();
        getYear(y);
    });

    $('#y-2019').click(()=>
    {
        let y = $('#y-2019 h4').text();
        getYear(y);
    });
  


});