<?php
require('../Model/conexion.php');
include('../Model/consultas.php');



$id_documento = $_POST['valorBusqueda'];
$consulta_doc_ext = $pdo->prepare("SELECT * FROM documentos_externos WHERE id_documento='$id_documento'");
$consulta_doc_ext->execute();
$lista_doc = $consulta_doc_ext->fetchAll(PDO::FETCH_ASSOC);



foreach ($lista_doc as $show) {
    $folio = $show['folio'];
}

//$bis = $folio . "-BIS-001";
//echo $folio . "<br>";
//echo $bis . "<br>";
//echo $id_documento . "<br>";
$count = $pdo->prepare("SELECT COUNT(id_bis) FROM bis WHERE folio='$folio'");
$count->execute();
$row = $count->fetchColumn();

if ($row == '0') {
    $cont = 001;
    $bis = $folio . "-BIS-" . $cont;
} else {
    $row2 = $row + 1;
    $bis = $folio . "-BIS-" . $row;
}

?>



<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!--
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    -->
    </head>
</head>

<body>
    <div id="cab_datos_folio">
        <h3>Folio seleccionado: <?php echo $folio; ?></h3>
    </div>
    <div id="datos_bis">
        <h5>Bis disponible: <?php echo $bis; ?></h5>
        <h5>Numero de bis de este folio: <?php echo $row; ?> </h5>

    </div>
    <hr>
    <div id="form_bis">
        <h3>Registrar Bis</h3>
        <input type="hidden" id="folio_o" class="form-control" value="<?php echo $folio; ?>">
        <input type="hidden" id="cont" class="form_control" value="<?php echo $row2; ?>">
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Organismo:</label>
                    <select class="form-control" name="txtorganismo" id="org" required>
                        <?php foreach ($lista_organismo as $mostrar) { ?>
                        <option value="<?php echo $mostrar['id_organismo']; ?>">
                            <?php echo $mostrar['nombre_organismo']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label>Otro:</label>
                    <input type="text" class="form-control" name="otro" id="otro" disabled>
                </div>
                <div class="col-md-6">
                    <label>No. de oficio</label>
                    <input type="text" name="n_oficio" class="form-control" id="n_oficio">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="">Tipo de Documento</label>
                    <select name="txttipo" id="txttipo" class="form-control">
                        <?php foreach ($lista_tipo as $mostrartipo) { ?>
                        <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                            <?php echo $mostrartipo['descripcion']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Folio:</label>
                    <input type="text" name="txtfolio2" id="txtfolio2" value="<?php echo $bis ?>" class="form-control"
                        disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label>Fecha del oficio</label>
                    <input name="txtfecha_o" id="txtfecha_o" class="form-control" type="date">
                </div>
                <div class="col-md-6">
                    <label>Fecha de recibido</label>
                    <input name="txtfecha_r" id="txtfecha_r" class="form-control" type="date">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label>Remitente</label>
                    <input name="txtremitente" id="txtremitente" class="form-control" type="text">
                </div>
                <div class="col-md-6">
                    <label>Cargo</label>
                    <input name="txtcargo_r" id="txtcargo_r" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-10">
                    <label>Anexos:</label>
                    <textarea class="form-control" name="txtAnexos" id="txtanexos" cols="30" rows="2"></textarea>

                </div>
            </div>
            <div class="form-row">
                <div class="col-md-10">
                    <label>Comentario:</label>
                    <textarea class="form-control" name="txtcomentario" id="txtcomentario" cols="30"
                        rows="5"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <button id="btnAdj" class="btn btn-danger">Adjuntar archivo</button>

                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input class="btn btn-success" value="Registrar documento" id="reg_doc" name="envia" />
                </div>
            </div>

        </div>
    </div>

</body>



<!-- Modal archivos adj -->
<div class="modal fade" id="modalAdjuntar" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width:600px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <ul class='nav nav-tabs'>

                    <li><a data-toggle="tab" href="#menu_a">Adjuntar documento</a></li>

                </ul>
                <div class="tab-content">

                    <div id="menu_a" class="tab-pane fade in active">
                        <input type="hidden" name="txtid_documento" id="txtid_documento"
                            value="<?php echo $id_documento; ?> ">

                        <div id="formArchivo"></div>
                    </div>
                </div>





            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $('#org').change(function() {
        var valor_o = $('#org').val();
        //alert(valor_o);
        if (valor_o == 24) {
            $("#otro").prop('disabled', false);
            swal("Se ha activado la casilla 'otro' para la insercion manual del organismo");
        } else {
            $("#otro").prop('disabled', true);
        }
    });

});
$('#btnAdj').click(function() {
    $('#modalAdjuntar').modal('show');
    var bis = $('#txtfolio2').val();
    alert(bis);
    //console.log(op_folio);
    $.ajax({
        type: "POST",
        url: "../Model/validar_archivo.php",
        data: {
            'op_folio': bis
        },
        success: function(r) {
            console.log(bis);
            $('#formArchivo').html(r);
        }
    });
});

$('#reg_doc').click(function() {


    let op_control = "BIS";
    let organismo = $('#org').val();
    let otro = $('#otro').val();
    let n_oficio = $('#n_oficio').val();
    let tipo_documento = $('#txttipo').val();
    let folio = $('#txtfolio2').val();
    let folio_o = $('#folio_o').val();
    let fecha_oficio = $('#txtfecha_o').val();
    let fecha_recibido = $('#txtfecha_r').val();
    let remitente = $('#txtremitente').val();
    let cargo_r = $('#txtcargo_r').val();
    let anexos = $('#txtanexos').val();
    let comentarios = $('#txtcomentario').val();
    let cont = $('#cont').val();

    let form_data = new FormData();
    form_data.append('txtorganismo', organismo);
    form_data.append('otro', otro);
    form_data.append('n_oficio', n_oficio);
    form_data.append('txttipo', tipo_documento);
    form_data.append('txtop_control', op_control);
    form_data.append('txtfolio', folio);
    form_data.append('folio_o', folio_o);
    form_data.append('txtfecha_o', fecha_oficio);
    form_data.append('txtfecha_r', fecha_recibido);
    form_data.append('txtremitente', remitente);
    form_data.append('txtcargo_r', cargo_r);
    form_data.append('txtAnexos', anexos);
    form_data.append('txtcomentario', comentarios);
    form_data.append('cont', cont);
    alert(op_control);
    $.ajax({
        type: "POST",
        url: "../View/upload2.php",
        data: form_data,
        contentType: false,
        processData: false,
        success: function() {
            swal("Correcto!!!, el BIS se movera al apartado de generados");
            $('#toggle').toggleClass('active');
            $('#overlay').toggleClass('active');
            $('#menu').toggleClass('active');
        }
    })


});
</script>