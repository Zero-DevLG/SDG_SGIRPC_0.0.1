<?php
//print_r($_POST['data']);
?>


<html>

<head>

    <link rel="stylesheet" type="text/css" href="../css/vista_d.css">
</head>

<body >

    <div id="cabezera">
        <img src="../img/LogoPC2.png">
        <h4 id="stf1">Fecha del oficio:</h4>
        <h5 id="f1">24 de Abril de 2020</h5>
        <h4 id="stf2">Fecha limite:</h4>
        <h5 id="f2">30 de Diciembre de 2020</h5>
        <h4 id="remitente">Remitente:</h4>
        <h5 id="remitente_1">Luz Elena Rivera Cano</h5>
        <h4 id="folio">Folio:</h4>
        <h5 id="folio_1">CDMX09122</h5>
        <h4 id="cargo">Cargo:</h4>
        <h5 id="cargo_1">Secretaria Particular de la Secretaria de Gestion Integral de Riesgos y Proteccion Civil</h5>
        <h4 id="t_d">Tipo de documento:</h4>
        <h5 id="t_d1">Nota Informativa</h5>



    </div>

    <div id="cuerpo">
        <h4 id="asunto">Asunto:</h4>
        <h5 id="asunto1">Solicitud de actualizacion de la pagina web de la Secretaria Integral de Riesgos y Proteccion
            Civil</h5>
        <h4 id="destino">Para:</h4>
        <h5 id="destino1">Luis Gabriel Verdiguel Carrillo</h5>
        <h4 id="cargo_d">Cargo:</h4>
        <h5 id="cargo_d1">Responsable del area de Coordinacion de Tecnologias de la Informacion</h5>
        <h4 id="ant">Anotaciones:</h4>
        <h5 id="ant1">Se anexa documentacion detallada de los cambios solicitados por cada direccion, asi como el
            material que debera ser respaldado para poder ser removido de la pagina de la secretaria.</h5>
    </div>

    <div id="subnav">
        <a href="#"><img id="resp" src="../img/iconos/enviar.png" title="Agregar instrucciones"></a>
        <a href="#"><img id="edt" src="../img/iconos/editar.png" title="Editar"></a>
        <a href="#"><img id="ver_a" src="../img/iconos/ver_a.png" title="Ver Archivos"></a>
    </div>





    <script>
    var id;
    var idT;
    obtener_localstorage();


    function obtener_localstorage() {
        if (localStorage.getItem("documento")) {
            id = localStorage.getItem("documento");
            idT = id;
            console.log("El id es: " + id);
            console.log("El idT es: " + idT);
            if (id != idT) {
                console.log("son diferentes");
            }
        } else {
            console.log("No hay nada");
        }


    }
    </script>

</body>

</html>