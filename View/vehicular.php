<?php
require("../Model/sessiones.php");
include("../Model/Conexion.php");
include("../Model/Consultas.php");
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
   
    <script src="../js/paginator.min.js"></script>
    <script src="../js/select2.js"></script>


    <!--

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
-->
   




    <title>Panel de Administracion</title>
</head>

<body id="fondo" background="../img/fondo_p2.jpg">


    <div id="encabezado_p">
        <img id="logo" src="../img/LogoPC2.png" >
        <div id="menu_encabezado">
        <label id="linea_menu"></label>
        <label id="linea_menu2"></label>
        
        </div>
        <a href="#"><img id="home" src="../img/home2.png" title="Inicio" alt="" ></a>
        <a href="#"><img id="doc" src="../img/doc.png" title="Documentos" alt="" ></a>
        <a href="#"><img id="bitacora" src="../img/bitacora.png" title="Bitacora" alt="" ></a>
        <a href="../Controller/cerrar_sesion.php"><img id="logout" title="Cerrar sesion" src="../img/logout4.png" alt="" ></a>
        <div class="custom-control custom-switch" id="btn_nocturno">
            <input type="checkbox" class="custom-control-input" id="customSwitches">
            <label class="custom-control-label" for="customSwitches">Modo Nocturno</label>
        </div>


    </div>



    <div id="contenido_dinamico">
       
    </div>



</body>


</html>


<script>
    $(document).ready(function() {



        pagina = JSON.parse(localStorage.getItem("pagina"));
        modo = JSON.parse(localStorage.getItem("modo"));
        $("#contenido_dinamico").empty();

        switch(pagina){ 
            case 0:
                $('#contenido_dinamico').load('home.php');
            break;

            case 1:
                $('#contenido_dinamico').load('doc.php');
                break;
            case 2:
                $('#contenido_dinamico').load('bitacora.php');
                break;
        }
        


        $("#customSwitches").prop("checked", modo);

        if( $('#customSwitches').prop('checked') ) {
        $('#fondo').css( {'background-image': 'url("../img/fondo_noc.jpg")'});
        $('#encabezado_p').css('background-color','#b0b0b0');
        $('#dia_anterior').css('background-color','#a2a2a2');
        $('#dia_actual').css('background-color','#a2a2a2');
        $('#tareas_pendientes').css('background-color','#a2a2a2');
        $('#registrar_tareas').css('background-color','#a2a2a2');
        $('#pass_ol').css('color','#fff');

        
    
}else{
    
    $('#fondo').css( {'background-image': 'url("../img/fondo_p2.jpg")'});
    $('.form').css('background-color','#fff');
    $('#encabezado_p').css('background-color','#fff');
    $('#dia_anterior').css('background-color','#fff');
    $('#dia_actual').css('background-color','#fff');
    $('#tareas_pendientes').css('background-color','#fff');
    $('#registrar_tareas').css('background-color','#fff');
    $('.input-name').css('color','teal');
    $('.input-pass').css('color','teal');
    $('#pass_ol').css('color','blue');
    
    
}

       
  $("#customSwitches").change(function(){
    if( $('#customSwitches').prop('checked') ) {
        swal("Modo nocturno activado!");
        //alert('Seleccionado');
        $('#fondo').css( {'background-image': 'url("../img/fondo_noc.jpg")'});
        $('#pass_ol').css('color','#fff');
        $('#encabezado_p').css('background-color','#b0b0b0');
        $('#dia_anterior').css('background-color','#a2a2a2');
        $('#dia_actual').css('background-color','#a2a2a2');
        $('#tareas_pendientes').css('background-color','#a2a2a2');
        $('#registrar_tareas').css('background-color','#a2a2a2');
        localStorage.setItem("modo", JSON.stringify(true));

    
}else{
    swal("Modo nocturno desactivado!");
    $('#fondo').css( {'background-image': 'url("../img/fondo_p2.jpg")'});
    $('#encabezado_p').css('background-color','#fff');
    $('#dia_anterior').css('background-color','#fff');
    $('#dia_actual').css('background-color','#fff');
    $('#tareas_pendientes').css('background-color','#fff');
    $('#registrar_tareas').css('background-color','#fff');
    $('.form').css('background-color','#fff');
    $('.input-name').css('color','teal');
    $('.input-pass').css('color','teal');
    $('#pass_ol').css('color','blue');
    localStorage.setItem("modo", JSON.stringify(false));
    
    
}
   
  });


        $('#home').hover(function(){
           
            //alert('Hola mundo');
           
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
          
            $('#linea_menu2').animate({left:"+=60px"},50);
            $('#home').attr("src","../img/home2_select.png");
            
           
        },
        function(){
         
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
            if(c_linea.left<-1100){
                //alert("supero");
            }else{
            //alert(c_linea.left);
            $('#linea_menu2').animate({left:"-=60px"},50);
            $('#home').attr("src","../img/home2.png");
           
            }
            
            
        }
        );

        $('#doc').hover(function(){
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
           
            $('#linea_menu2').animate({left:"+=110px"},50);
            $('#doc').attr("src","../img/doc_select.png");
         
        },
        function(){
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
           
            $('#linea_menu2').animate({left:"-=110px"},50);
            $('#doc').attr("src","../img/doc.png");
           
            
            
        }
        );

        
        $('#bitacora').hover(function(){
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
           
            $('#linea_menu2').animate({left:"+=160px"},50);
            $('#bitacora').attr("src","../img/bitacora_select.png");
         
        },
        function(){
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
           
            $('#linea_menu2').animate({left:"-=160px"},50);
            $('#bitacora').attr("src","../img/bitacora.png");
            
        }
        );

        $('#logout').hover(function(){
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
           
            $('#linea_menu2').css("border-bottom","2px solid red");
            $('#linea_menu2').animate({left:"+=210px"},50);
            $('#logout').attr("src","../img/logout_select.png");
         
        },
        function(){
            var c_linea = $('#linea_menu2').position();
            $('#linea_menu2').css("border-bottom","2px solid  #2479e9");
            //alert(JSON.stringify(c_linea));
           
            $('#linea_menu2').animate({left:"-=210px"},50);
            $('#logout').attr("src","../img/logout4.png");
            
        }
        );


       
        

        $('#bitacora').click(function(){
                    pagina = 2;
                    $("#contenido_dinamico").empty();
                    $("#contenido_dinamico").html("<img id='loading_p' src='../img/loading_p2.gif'>");
                    setTimeout(function(){
                        $('#contenido_dinamico').load('bitacora.php');
                    },900);
                   
                 
                    //alert("Exito");
                   
                    //$('#contenido_dinamico').html('');
                    localStorage.setItem("pagina", JSON.stringify(pagina));
                    //alert(pagina);
                    //alert(JSON.parse(localStorage.getItem("pagina")));
                
            });
    

        $('#doc').click(function(){
                    pagina = 1;
                    
                    $("#contenido_dinamico").empty();
                    $("#contenido_dinamico").html("<img id='loading_p' src='../img/loading_p2.gif'>");
                    setTimeout(function(){
                        $('#contenido_dinamico').load('doc.php');
                    },900);
                    //alert("Exito");
                    //$('#contenido_dinamico').html();
                  
                    localStorage.setItem("pagina", JSON.stringify(pagina));
                    //alert(pagina);
        });

    });
    </script>
