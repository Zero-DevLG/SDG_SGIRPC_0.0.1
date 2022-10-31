<?php
session_start();
include("../Model/Conexion_help.php");
include("../Model/Consultas.php");
include("../Model/consultas_desk.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/toastr.min.css">
    <link rel="stylesheet" href="../css/dropzone.css" />
    <link rel="stylesheet" href="../css/myticket.css?v=<?php echo (rand()); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/navi.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css?v=<?php echo (rand()); ?>">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/toastr.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <title>Myticket</title>
</head>
<body>
   <?php include('../Model/navi.php') ?> 
    <div id=btn>
        <button id="newTicket" class="btn btn-primary">+</button>
    </div>

</body>
            <div class='modal fade' tabindex='-1' role='dialog' id="reg_ticket">
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'><h3>Registrar Ticket</h3></h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>
            <div class='modal-body'>
            <div class="content">
            <div class="row">
                <div class="col-md-9 col-xs-3">
                    <label for="">Seleccione el tema de ayuda de la siguiente lista</label>
                    <select class="form-control" id="c_help">
                        <option value="0">Seleccione una opcion</option>
                        <?php foreach($list_catalog as $get){  ?>
                            <option value="<?php echo $get['id_fault'] ?>"><?php echo utf8_encode($get['fault']); ?></option>    
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Detalles:</label>
                    <textarea class="form-control" id="details" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div>
                <label>Para ayudarnos a identificar mas rapido su problema, agregue una foto o captura de pantalla del error</label>
                    <input type="file">
            </div>
            </div>
            </div>
            <div class='modal-footer'>
            <button type='button' class='btn btn-primary'>Registrar ticket</button>
            </div>
            </div>
            </div>
            </div>
</html>

<script>
    $(document).ready(function(){
        $('#newTicket').click(function(){
            $('#reg_ticket').modal('show');     
        });
    });
</script>