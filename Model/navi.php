<?php
require("../Model/sessiones.php");
?>

<nav class="navbar navbar-expand navbar-light bg-light">
  <a class="navbar-brand" href="#"><img id="logo" src="../img/iconos/logo_2022.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <!--
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
        -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Generar reporte
        </a> -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="../Controller/getCsvDir.php">CSV Turnos Direcciones General</a>
        <a class="dropdown-item" href="../Controller/getCsvT.php">CSV Turnos Titular de la Secretaria</a>
        <a class="dropdown-item" href="../Controller/getCsvT_2021.php">CSV Turnos Titular de la Secretaria - 2021</a>
          <div class="dropdown-divider"></div>
          <!--<a class="dropdown-item" href="#">Something else here</a>-->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    
    
  </div>
  <a class="nav-link" href="#"><img id="logout" title="Cerrar sesion" src="../img/logout4.png"
            alt=""></a>
</nav>



<script>
$('#logout').click(function(){
  
    doc =   localStorage.getItem("doc");
    //alert(doc);
    $.ajax({
    type: 'POST',
    url: '../Controller/end_usr.php',
    data: { 'last_doc' : doc },
    success: function(){
       //swal(e);
        location.href ="../Controller/cerrar_sesion.php";
    },
    });
});


$(document).ready(function() {

    

    $('#reg_2').click(function(){
        $('#data_small_device').show(500);

        $('#data_small_device').animate({
        left: "5%"
    });

    $('#data_small_device').animate({
        width: "85%"
    });
    $('#data_small_device').animate({
        height: "90%"
    });

    $('#data_small_device').animate({
        backgroundColor: "#5c5c5c"
    }, 700);



    //$('#body_nav').css("background-color", "#43464d");

    $('#img_usr').animate({
        top: "10%"
    }, 1500);

    $('#close_2').animate({
        left: "0px"
    })
    $('#close_2').show(2000);
    
    $.ajax({
    type: 'POST',
    url: '../Controller/small_reg.php',
    data: '',
    success: function(e){
        $('#get_data').html(e);
    },
    });
    

})



    $('#img_usr_2').click(function() {
        //alert("Hoal");
        $('#data_small_device').show(500);

        $('#data_small_device').animate({
        width: "860px"
        });
        $('#data_small_device').animate({
        height: "90%"
        });

        $('#data_small_device').animate({
        backgroundColor: "#5c5c5c"
        }, 700);



        //$('#body_nav').css("background-color", "#43464d");

        $('#img_usr').animate({
             top: "10%"
            }, 1500);

        $('#close_2').animate({
            left: "0px"
            })
        $('#close_2').show(2000);

        /////Consulta AJAX
        $.ajax({
        type: 'POST',
        url: '../Controller/usr_info.php',
        data: '',
        contentType: false,
        processData: false,
            success: function(e) {
                $('#data_info').empty()
                setTimeout(() => {
                $('#data_info').html(e)
            }, 1200);

            },
        });

        $.ajax({
            type: 'POST',
            url: '../Controller/usr_info_dir.php',
            data: '',
            contentType: false,
            processData: false,
            success: function(e) {
            $('#data_info').empty()
            setTimeout(() => {
            $('#data_info_dir').html(e)
            }, 1200);

            },
        });




    });
    $('#close_2').click(function() {
        

        $('#data_small_device').hide(500);

        $('#data_small_device').animate({
            width: "50px"
        });
        $('#data_small_device').animate({
            height: "10%"
        });

        $('#data_small_device').animate({
            backgroundColor: "#5c5c5c"
        }, 700);
      
        $('#close_2').hide();
        $('#close_2').animate({
            left: "5px"
        })
        $('#data_info_2').empty()


    })
   







    
});
</script>

