<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}


include("../Model/navBar.php");
$bar = new navBaradmin();
$bar->construye();
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>

    <link rel="stylesheet" type="text/css" href="../css/sheetslider.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/main_d.js"></script>
    <script src="../js/paginator.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/consulta_d.css" />
</head>

<body background="../img/fondo_p.jpg">


    <div id="seccion_Liz">


    </div>
    <div id="iframeI">
        <div id="mostrar_loading"></div>
        <div id="Contenido">
            <a href="javascript:location.reload()"><img id="reload" src="../img/iconos/actualizar.png"
                    title="Actualizar"></a>
            <ul class=" pagination" id="paginador">
            </ul>
            <table class="table table-hover  table-light  table-sm">
                <thead class="table-secondary">
                    <tr>
                        <th>Fecha limite</th>
                        <th>Folio</th>
                        <th>Asunto</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="table">
                </tbody>
            </table>

        </div>

    </div>

    <div id="iframeD">
        <iframe id="documentos_v" src="vista_documentos.php" frameborder="0" scrolling="1"></iframe>
    </div>



</body>

</html>