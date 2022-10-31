<?php

include("../Model/navBar.php");
require("../Controller/consulta.php");

$bar = new navBaradmin();
$bar->construye();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
    .modal-header {
        padding: 9px 15px;
        border-bottom: 1px solid #eee;
        background-color: #0480be;
    }

    #table1 {
        position: absolute;
        left: 100px;
        width: 80%;
        height: 60%;
    }

    th {
        width: 10%;
        overflow-wrap: break-word;
        font-size: 70%;
    }

    td {
        width: fixed;
        overflow-wrap: break-word;
        font-size: 80%;
    }

    #box1 {
        position: absolute;
        left: 200px;
        width: 80%;
        background-color: aliceblue;
    }


    #formu {
        color: aliceblue;
        position: absolute;
        text-align: center;
        width: 800px;
        height: 900px;
        left: 300px;
        top: 120px;
        margin-bottom: 1.5em;
        background: rgba(0, 155, 62, 1);
        padding: 50px;
        border-radius: 10px 10px 15px 15px;
        -moz-border-radius: 15px 15px 15px 15px;
        -webkit-border-radius: 15px 15px 15px 15px;
        border: 0px solid #000000;
    }
    </style>


</head>

<body background="../img/fondo_ep.jpg">
    <br>
    <div class="form-group">
        <div class="form-row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <button class="btn btn-primary" style="color:white" target="Modal2">Registrar +</button>
                <br>
                <br>
            </div>


        </div>
        <div class="form-row">

            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table id="table1" class="table table-light table-hover table-sm table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Numero de Folio</th>
                            <th>Fecha de oficio</th>
                            <th>Numero de oficio</th>
                            <th>Asunto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="contenidobusqueda">
                        <?php foreach ($lista_consulta as $mostrar) { ?>
                        <tr>
                            <td><?php echo $mostrar['n_folio']; ?></td>
                            <td><?php echo $mostrar['fecha_oficio']; ?></td>
                            <td><?php echo $mostrar['n_oficio']; ?></td>
                            <td><?php echo $mostrar['asunto']; ?></td>
                            <td>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <form action="proceso.php" method="post">

                                                <input type="hidden" name="txtid_documento"
                                                    value="<?php echo $mostrar['id_documento']; ?>">
                                                <input type="image" src="../img/turnar.jpg" value="Instruccion"
                                                    name="accion" width="50px" title="turnar documento">

                                            </form>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <input id="agregar" type="image" src="../img/status.png" data-toggle="modal"
                                                data-target="#exampleModal" width="30px" title="estado del documento">
                                        </div>
                                        <div class="col-md-2"></div>
                                        <br>
                                        <br>
                                        <div class="col-md-2">
                                            <form action="../View/pdf.php" method="post" target="_blank">
                                                <input type="hidden" name="txtid_documento"
                                                    value="<?php echo $mostrar['id_documento']; ?>">
                                                <input type="image" src="../img/control.jpg" width="30px"
                                                    value="imprimir Control" name="accion" title="Imprimir Control">
                                            </form>

                                        </div>
                                    </div>
                                </div>



                            </td>
                        </tr>

                        <?php } ?>


                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="container">




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Estado del Documento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php

            $sentencia = $pdo->prepare("SELECT * from documentos where id_documento=1");
            $sentencia->execute();
            $lista_map = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            ?>

                        <div background="../img_maps/m1.png">

                            <?php foreach ($lista_map as $mostrar) { ?>
                            <h6 onclick="alert('<?php $mostrar['asunto'] ?>');"><?php echo $mostrar['area_o']; ?><img
                                    src="../img_maps/m1.png"></h6>


                            <?php } ?>

                        </div>



                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="container">




        <!-- Modal -->
        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Estado del Documento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php

            $sentencia = $pdo->prepare("SELECT * from documentos where id_documento=1");
            $sentencia->execute();
            $lista_map = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            ?>

                        <div background="../img_maps/m1.png">

                            <?php foreach ($lista_map as $mostrar) { ?>
                            <h6 onclick="alert('<?php $mostrar['asunto'] ?>');"><?php echo $mostrar['area_o']; ?><img
                                    src="../img_maps/m1.png"></h6>


                            <?php } ?>

                        </div>



                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


    </div>




</body>




</html>