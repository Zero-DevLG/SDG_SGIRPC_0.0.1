<?php
require('../Model/Conexion.php');
require('../Model/Consultas.php');
$consultaBusqueda = $_POST['id_documento'];
$cat_op = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$consultaBusqueda'");
$cat_op->execute();
$row_cat = $cat_op->rowCount();
$num = $cat_op->fetchColumn();

$op_bis = $pdo->prepare("SELECT folio,active FROM op_bis WHERE id_documento = '$consultaBusqueda'");
$op_bis->execute();
$list_bis_op = $op_bis->fetchAll(PDO::FETCH_ASSOC);
foreach ($list_bis_op as $show) {
    $folio_bis = $show['folio'];
    $active = $show['active'];
}

if ($row_cat != 0) {
    $consulta = $pdo->prepare("SELECT d.estatus,d.folio,d.id_documento,d.id_organismo,d.op_control,d.comentario,d.anexos,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.fecha_registro, e.nombre, e.apellido, d.id_organismo,d.remitente, d.cargo_r,d.asunto,d.tipo_documento,td.descripcion,d.id_organismo,o.nombre_organismo FROM documentos_externos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN empleado as e ON d.id_empleado_r = e.id_empleado INNER JOIN organismo as o ON o.id_organismo = d.id_organismo WHERE d.id_documento  =  '$consultaBusqueda'");
    $consulta->execute();
    //Obtiene la cantidad de filas que hay en la consulta
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $filas = $consulta->rowCount();

    $consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$consultaBusqueda'");
    $consulta_archivo->execute();
    $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

    $consulta_archivo = $pdo->prepare("SELECT * FROM archivos  where  id_documento = '" . $consultaBusqueda . "'");
    $consulta_archivo->execute();
    $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
    $count2 = $consulta_archivo->rowCount();
} else {
    $consulta = $pdo->prepare("SELECT d.estatus,d.folio,d.id_documento,d.id_organismo,d.op_control,d.comentario,d.anexos,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.fecha_registro, e.nombre, e.apellido, d.id_organismo,d.remitente, d.cargo_r,d.asunto,d.tipo_documento,td.descripcion,d.id_organismo,o.nombre_organismo FROM documentos_externos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN empleado as e ON d.id_empleado_r = e.id_empleado INNER JOIN organismo as o ON o.id_organismo = d.id_organismo WHERE d.id_documento  =  '$consultaBusqueda'");
    $consulta->execute();
    //Obtiene la cantidad de filas que hay en la consulta
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $filas = $consulta->rowCount();

    $consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$consultaBusqueda'");
    $consulta_archivo->execute();
    $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

    $consulta_archivo = $pdo->prepare("SELECT * FROM archivos  where  id_documento = '" . $consultaBusqueda . "'");
    $consulta_archivo->execute();
    $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
    $count2 = $consulta_archivo->rowCount();

    $cat_op = $pdo->prepare("SELECT num FROM op_control_t WHERE id_documento = '$consultaBusqueda'");
    $cat_op->execute();
    $row_cat = $cat_op->rowCount();
    $num = $cat_op->fetchColumn();
}


//Variable que mostrara el contenido, se generara vacia para evitar los E-notice

//Comprueba si $consultaBusqueda esta seteado
if (isset($consultaBusqueda)) {
    //$consulta = $pdo->prepare("SELECT d.id_documento,d.fecha_oficio,d.n_folio,d.remitente,d.cargo_r,td.descripcion,d.asunto FROM documentos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento  WHERE d.id_documento = '$consultaBusqueda'");


    if ($filas === 0) {
        $mensaje = "";
    } else {

        //Si existen filas 

        //La variable resultado almacena el array que se generara en la connsulta 

        foreach ($datos as $mostrar) {
            # code...
            $organismo = $mostrar['nombre_organismo'];
            $folio = $mostrar['folio'];
            $id_organismo = $mostrar['id_organismo'];
            $id_documento = $mostrar['id_documento'];
            $fecha_o = $mostrar['fecha_oficio'];
            $fecha_registro = $mostrar['fecha_registro'];
            $fecha_r = $mostrar['fecha_recibido'];
            $n_oficio = $mostrar['n_oficio'];
            $op_control = $mostrar['op_control'];
            $registro_n = $mostrar['nombre'];
            $registro_a = $mostrar['apellido'];
            $remitente = $mostrar['remitente'];
            $cargo_r = $mostrar['cargo_r'];
            $tipo_documento = $mostrar['descripcion'];
            $id_tipo_doc = $mostrar['tipo_documento'];
            $asunto = $mostrar['asunto'];
            $instruccion = $mostrar['n_instruccion'];
            $direccion = $mostrar['direccion'];
            $area = $mostrar['area'];
            $anexos = $mostrar['anexos'];
            $comentario = $mostrar['comentario'];
            $organismo = $mostrar['id_organismo'];
            $estatus = $mostrar['estatus'];
        }


        if ($organismo == 24) {
            $consulta_otro = $pdo->prepare("SELECT * FROM organismo_externo WHERE id_documento = '$id_documento'");
            $consulta_otro->execute();
            $lista = $consulta_otro->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lista as $mostrar) {
                $organismo = $mostrar['detalle'];
            }
        } else {
            $consulta_org = $pdo->prepare("SELECT * FROM organismo WHERE id_organismo = '$organismo'");
            $consulta_org->execute();
            $lista = $consulta_org->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lista as $mostrar) {
                $organismo = $mostrar['nombre_organismo'];
            }
        }

        $consulta_otros = $pdo->prepare("SELECT * FROM organismo_externo WHERE id_documento = '$consultaBusqueda'");
        $consulta_otros->execute();
        $lista_otros = $consulta_otros->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_otros as $mostrar) {
            $detalle = $mostrar['detalle'];
        }
    }
}
?>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div id="edt_form" class="form-group">
        <div class="form-row">
            <div class="col-md-12">
                <center>
                    <h2 style="color: forestgreen;"> Editar datos del documento</h2>
                    <input type="hidden" name="in_id_doc" id="txtid_documento" value="<?php echo $id_documento; ?> "
                        disabled>
                    <!--              
                                <div id="cambiar_folio">
                                    <h4>Cambiar el folio: </h4>
                                    <label class="swtich-container">
                                        <input type="checkbox" id="switch">
                                        <div class="slider">
                                            <span class="on">Si</span>
                                            <span class="off">No</span>
                                        </div>
                                    </label>
                                </div>
                            -->
                </center>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label>
                    Direccion:
                </label>
                <select class="form-control" id="direccion_edt_doc">
                    <?php foreach ($lista_sp as $mostrar) { ?>
                    <option value="<?php echo $mostrar['id_direccion'] ?>"><?php echo $mostrar['detalle'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-6">
                <br>
                <button class="btn btn-sm btn-primary" id="btn_edt_dir">Editar direccion</button>

            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-7">
                <label>
                    Organismo:
                </label>
                <select class="form-control" name="txtorganismo2" id="txtorganismo2" required>
                    <option value="<?php echo $id_organismo; ?>" selected><?php echo utf8_encode($organismo); ?>
                    </option>
                    <?php foreach ($lista_organismo as $mostrar) { ?>
                    <option value="<?php echo $mostrar['id_organismo']; ?>">
                        <?php echo utf8_encode($mostrar['nombre_organismo']); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-5">

                <label>Otro:</label>
                <input type="text" class="form-control" id="otro_2" value="<?php echo utf8_encode($detalle); ?>"
                    placeholder="<?php echo utf8_encode($detalle); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label>Numero de oficialia:</label>
                <input type="text" class="form-control" id="txtfolio2" name="txtfolio2"
                    value="<?php echo $op_control; ?>" placeholder="<?php echo $op_control ?>" disabled>
            </div>
            <div class="col-md-6">
                <label>Numero de oficio:</label>
                <input type="text" class="form-control" id="txtoficio2" name="txtoficio2"
                    value="<?php echo $n_oficio ?>" placeholder="<?php echo $n_oficio ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="">Fecha oficio:</label>
                <input type="date" id="fecha_oficio" class="form-control" value="<?php echo $fecha_o ?>" name="" id="">
            </div>
            <div class="col-md-6">
                <label for="">Fecha recibido:</label>
                <input type="date" id="fecha_recibido" value="<?php echo $fecha_r ?>" class="form-control" name=""
                    id="">
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-4">
                <label>Tipo del documento:</label>
                <select class="form-control" name="txttipo2" id="txttipo2" required>
                    <option value="<?php echo $id_tipo_doc; ?>" selected><?php echo $tipo_documento; ?>
                    </option>
                    <?php foreach ($lista_tipo as $mostrar2) { ?>
                    <option value="<?php echo $mostrar2['id_tipo_doc']; ?>">
                        <?php echo $mostrar2['descripcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label>Remitente:</label>
                <input type="text=" class="form-control" id="txtremitente2" value="<?php echo utf8_encode($remitente)?>"
                    placeholder="<?php echo $remitente ?>">
            </div>
            <div class="col-md-4">
                <label>Cargo del remitente:</label>
                <input type="text" class="form-control" id="txtcargor2" value="<?php echo utf8_encode($cargo_r) ?>"
                    placeholder="<?php echo ($cargo_r) ?>" required>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-12">
                <label>Anexos:</label>
                <input type="text" class="form-control" id="txtanexos2" value="<?php echo utf8_encode($anexos); ?>"
                    placeholder="<?php echo utf8_encode($anexos); ?>">
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-12">
                <label>Comentarios:</label>
                <input type="text" class="form-control" id="txtcomentarios2" value="<?php echo utf8_encode($comentario); ?>"
                    placeholder="<?php echo utf8_encode($comentario); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                <br>
                <button class="btn btn-success btn-sm" id="btnED">Editar documento</button>
            </div>
        </div>
    </div>
</body>

<script>
$('#btn_edt_dir').click(function() {
    let d1 = $('#direccion_edt_doc').val();
    let txtid_documento = $('#txtid_documento').val();
    var textoBusqueda = txtid_documento;
    console.log(textoBusqueda, d1);
    let form_data = new FormData();
    form_data.append('id_documento', txtid_documento);
    form_data.append('direccion', d1);
    $.ajax({
        data: form_data,
        url: '../Controller/edt_dir.php',
        type: 'POST',
        contentType: false,
        processData: false,
        success: function(message) {
            swal("Direccion editada");

        },
    });

});


$('#btnED').click(function() {
    txtid_documento = $('#txtid_documento').val();
    txtorganismo = $('#txtorganismo2').val();
    otro_o = $('#otro_2').val();
    txtfolio = $('#txtfolio2').val();
    txtoficio = $('#txtoficio2').val();
    txttipo = $('#txttipo2').val();
    txtremitente = $('#txtremitente2').val();
    txtcargor = $('#txtcargor2').val();
    txtasunto = $('#txtanexos2').val();
    txtcomentarios = $('#txtcomentarios2').val();
    fecha_recibido = $('#fecha_recibido').val();
    fecha_oficio = $('#fecha_oficio').val();
    //alert ("Asunto: " + txtasunto);
    //alert(txtorganismo + otro_o + txtfolio + txtoficio + txttipo + txtremitente + txtcargor + txtasunto);
    var form_data = new FormData();
    form_data.append('id_documento', txtid_documento);
    form_data.append('organismo', txtorganismo);
    form_data.append('otro', otro_o);
    form_data.append('folio', txtfolio, );
    form_data.append('oficio', txtoficio);
    form_data.append('fecha_oficio', fecha_oficio);
    form_data.append('fecha_recibido', fecha_recibido);
    form_data.append('tipo', txttipo);
    form_data.append('remitente', txtremitente);
    form_data.append('cargor', txtcargor);
    form_data.append('asunto', txtasunto);
    form_data.append('anexos', txtasunto);
    form_data.append('comentarios', txtcomentarios);
    var textoBusqueda = txtid_documento;
    console.log(fecha_recibido, fecha_oficio);
    console.log(JSON.stringify(form_data));
    $.ajax({
        data: form_data,
        url: "../Model/editar_documento.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function(s) {
            swal(s);
        },
    });

    //$("#ModalEd").modal('hide');
    if(localStorage.getItem("window") == 2)
    {
        
            //alert("prueba");
            $('#show_data').empty();   
            $('#subnav_r').css("z-index", 1);
            $('#subnav_r').animate({
                 width: "60px"
            });
            $('#subnav_r').animate({
                height: "190px"
            });

            $('#subnav_r').animate({
                backgroundColor: "#78a1dd"
            }, 700);

            $('#close_doc_reg').hide();
            $('#close_doc_reg').animate({
                left: "5px"
            });


    }else {
        $('#show_data').empty();
    $('#subnav_r').animate({
        width: "60px"
    });
    $('#subnav_r').animate({
        height: "190px"
    });

    $('#subnav_r').animate({
        backgroundColor: "#78a1dd"
    }, 700);

    $('#close_doc_reg').hide();
    $('#close_doc_reg').animate({
        left: "5px"
    });

    $('#iframeI').animate({
        width: "50%"
    });

    $('#iframeD').animate({
        left: "57%"
    }, 1000);

    $('#iframeD').animate({
        width: "42%"
    }, 1000);
    $('#subnav_r').animate({
        top: "280px"
    }, 100);
    }
   

    //$('#cambiar_folio').html(s);
    setTimeout(function() {
        if (textoBusqueda != "") {
            $.post(
                "../Model/vista_documento.php", {
                    valorBusqueda: textoBusqueda
                },
                function(mensaje2) {
                    $("#resultadoBusqueda").empty();
                    $("#resultadoBusqueda").html(mensaje2);
                }
            );
        }
    }, 2000);
});
</script>