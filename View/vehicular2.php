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


    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/vehicular_registro.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" type="text/css" href="../css/datos_vehiculo.css?v=<?php echo (rand()); ?>" />
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
        <img id="logo" src="../img/LogoPC2.png">
        <div id="menu_encabezado">
            <label id="linea_menu"></label>
            <label id="linea_menu2"></label>

        </div>
        <a href="#"><img id="home" src="../img/home2.png" title="Inicio" alt=""></a>
        <a href="#"><img id="car" src="../img/iconos/reg_vehiculo.png" title="Control de Vehiculos" alt=""></a>
        <a href="#"><img id="gas" src="../img/iconos/gas.png" title="Control de combustibles" alt=""></a>
        <a href="#"><img id="seguros" src="../img/iconos/seguros.png" title="Control de seguros" alt=""></a>
        <a href="../Controller/cerrar_sesion.php"><img id="logout" title="Cerrar sesion" src="../img/logout4.png"
                alt=""></a>


        <div id="datos_usuario">
            <img style="width: 40px;" src="../imagenes/<?php echo $_SESSION["foto"]; ?>" />
            <table id="tabla_datos" class="table table-borderless">
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td><?php echo $_SESSION["nombre"] . " " . $_SESSION['apellido']; ?></td>
                    <td>
                        Ultimo inicio de sesion:
                    </td>
                    <td>
                        <?php echo  $_SESSION['last_login'];  ?>
                    </td>
                </tr>
            </table>

            <table id="tabla_direccion" class="table table-borderless">
                <tr>
                    <td>Direccion:</td>
                    <td id="td_direccion"><?php echo $_SESSION["direccion"]; ?></td>
                </tr>
            </table>
        </div>

    </div>



    <div id="contenido_dinamico">

    </div>



</body>


</html>


<script>
$(document).ready(function() {
    localStorage.setItem("pagina", 1);
    pagina = JSON.parse(localStorage.getItem("pagina"));
    modo = JSON.parse(localStorage.getItem("modo"));
    $("#contenido_dinamico").empty();

    switch (pagina) {
        case 0:
            $('#contenido_dinamico').load('home.php');
            break;

        case 1:
            $('#contenido_dinamico').load('registro_vehiculos.php');
            break;
        case 2:
            $('#contenido_dinamico').load('bitacora.php');
            break;
    }








    $('#home').hover(function() {

            //alert('Hola mundo');

            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "+=60px"
            }, 50);
            $('#home').attr("src", "../img/home2_select.png");


        },
        function() {

            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));
            if (c_linea.left < -1100) {
                //alert("supero");
            } else {
                //alert(c_linea.left);
                $('#linea_menu2').animate({
                    left: "-=60px"
                }, 50);
                $('#home').attr("src", "../img/home2.png");

            }


        }
    );

    $('#car').hover(function() {
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "+=110px"
            }, 50);
            $('#car').attr("src", "../img/iconos/reg_vehiculo_select.png");

        },
        function() {
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "-=110px"
            }, 50);
            $('#car').attr("src", "../img/iconos/reg_vehiculo.png");



        }
    );


    $('#gas').hover(function() {
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "+=160px"
            }, 50);
            $('#gas').attr("src", "../img/iconos/gas_select.png");

        },
        function() {
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "-=160px"
            }, 50);
            $('#gas').attr("src", "../img/iconos/gas.png");

        }
    );

    $('#seguros').hover(function() {
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));


            $('#linea_menu2').animate({
                left: "+=210px"
            }, 50);
            $('#seguros').attr("src", "../img/iconos/seguros_select.png");

        },
        function() {
            var c_linea = $('#linea_menu2').position();
            $('#linea_menu2').css("border-bottom", "2px solid  #2479e9");
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "-=210px"
            }, 50);
            $('#seguros').attr("src", "../img/iconos/seguros.png");

        }
    );


    $('#logout').hover(function() {
            //alert('Hola mundo');
            var c_linea = $('#linea_menu2').position();
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').css("border-bottom", "2px solid red");
            $('#linea_menu2').animate({
                left: "+=210px"
            }, 50);
            $('#logout').attr("src", "../img/logout_select.png");

        },
        function() {
            var c_linea = $('#linea_menu2').position();
            $('#linea_menu2').css("border-bottom", "2px solid  #2479e9");
            //alert(JSON.stringify(c_linea));

            $('#linea_menu2').animate({
                left: "-=210px"
            }, 50);
            $('#logout').attr("src", "../img/logout4.png");

        }
    );





    $('#bitacora').click(function() {
        pagina = 2;
        $("#contenido_dinamico").empty();
        $("#contenido_dinamico").html("<img id='loading_p' src='../img/loading_p2.gif'>");
        setTimeout(function() {
            $('#contenido_dinamico').load('bitacora.php');
        }, 900);


        //alert("Exito");

        //$('#contenido_dinamico').html('');
        localStorage.setItem("pagina", JSON.stringify(pagina));
        //alert(pagina);
        //alert(JSON.parse(localStorage.getItem("pagina")));

    });


    $('#car').click(function() {
        pagina = 1;

        $("#contenido_dinamico").empty();
        $("#contenido_dinamico").html("<img id='loading_p' src='../img/loading_p2.gif'>");
        setTimeout(function() {
            $('#contenido_dinamico').load('registro_vehiculos.php');
        }, 900);
        //alert("Exito");
        //$('#contenido_dinamico').html();

        localStorage.setItem("pagina", JSON.stringify(pagina));
        //alert(pagina);
    });

});
</script>