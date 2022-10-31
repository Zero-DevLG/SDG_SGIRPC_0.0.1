<?php
require("../Model/sessiones.php");
include("../Model/Conexion.php");
include("../Model/Consultas.php");

?>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/bis.js"></script>
    <script src="../js/navi.js"></script>
    <script src="../js/jquery.selectlistactions.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bis.css?v=<?php echo (rand()); ?>">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">

</head>

<body background="../img/fondo_p2.jpg">
    <?php include("../Model/navi.php"); ?>
    <div id="list_doc">
        <div id="cab_bis">
            <img id="banner_bis" src="../img//banners//banner_bis.jpg" alt="">
        </div>
        <ul class='nav nav-tabs' id="tabs_documentos">
            <li><a data-toggle="tab" href="#menu_ft">Folios turnados</a></li>
            <li><a data-toggle="tab" href="#menu_op">Oficila de partes</a></li>
        </ul>
        <div class="tab-content">
            <div id="menu_ft" class="tab-pane fade in active">
                <div id="datos_bis">
                    <table id="table_bis" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Op control</th>
                                <th>Folio</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="menu_op" class="tab-pane fade in">
                <ul class='nav nav-tabs' id="tabs_documentos">
                    <li><a data-toggle="tab" href="#menu_op_a">Areas</a></li>
                    <li><a data-toggle="tab" href="#menu_op_t">Titular</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menu_op_a" class="tab-pane fade in active">
                        <div id="datos_bis">
                            <table id="table_bis_op" style="cursor:pointer;"
                                class="table table-sm table-borderedless table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Direccion</th>
                                        <th>Control oficialia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="menu_op_t" class="tab-pane fade in">
                        <div id="datos_bis">
                            <table id="table_bis_op_t" style="cursor:pointer;"
                                class="table table-sm table-borderedless table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Direccion</th>
                                        <th>Control oficialia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>



    </div>
    </div>

    <div id="container-bis">
        <div id="cab_datos_folio">
            <h3>Selecciona un folio para generar un BIS</h3>
            <img src="../img/null_bis.jpg" id="null_bis">
        </div>
    </div>

</body>