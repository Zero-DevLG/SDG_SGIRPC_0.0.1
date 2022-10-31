<?php
//Archivo de conexion a la base de datos
require('../Model/conexion.php');
include('../Model/consultas.php');




//variable de busqueda que se recibe desde el index con JQUERY
$consultaBusqueda = $_POST['valorBusqueda'];
//echo "VALOR: " . $consultaBusqueda;

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);



//Variable que mostrara el contenido, se generara vacia para evitar los E-notice

//Comprueba si $consultaBusqueda esta seteado
if (isset($consultaBusqueda)) {
    //$consulta = $pdo->prepare("SELECT d.id_documento,d.fecha_oficio,d.n_folio,d.remitente,d.cargo_r,td.descripcion,d.asunto FROM documentos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento  WHERE d.id_documento = '$consultaBusqueda'");

    $consulta = $pdo->prepare("SELECT d.folio,d.id_documento,d.id_organismo,d.op_control,d.comentario,d.anexos,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.fecha_registro, e.nombre, e.apellido, d.id_organismo,d.remitente, d.cargo_r,d.asunto,d.tipo_documento,td.descripcion,d.id_organismo,o.nombre_organismo FROM documentos_externos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN empleado as e ON d.id_empleado_r = e.id_empleado INNER JOIN organismo as o ON o.id_organismo = d.id_organismo WHERE d.id_documento  =  '$consultaBusqueda'");
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


?>

<!DOCTYPE html>
<html lang="es">


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

<body background="../img/fondo_hoja2.jpg">
    <div id="cabezera">
        <img src="../img/LogoPC2.png">
    </div>


    <div id='datos_cabezera'>

        <table class="table table-sm">
            <thead style="font-size:9px;">
                <th>Tipo del documento</th>
                <th>Registro</th>
            </thead>
            <tbody style="font-size:9px;">
                <td><?php echo $tipo_documento; ?></td>
                <td><?php echo $registro_n . " " . $registro_a; ?></td>
            </tbody>
        </table>

        <table class="table table-sm">
            <thead style="font-size:9px;">
                <th>Fecha de regristro</th>
                <th>Fecha del documento</th>
                <th>Fecha de recibido</th>

            </thead>
            <tbody style="font-size:9px;">

                <td><?php echo $fecha_registro; ?></td>
                <td><?php echo $fecha_o; ?></td>
                <td><?php echo $fecha_r; ?></td>

            </tbody>
        </table>

    </div>

    <table id="t-mostrar" class="table table-sm">
        <tr>
            <td>
                <h4>Numero de Control:</h4>
            </td>
            <td>
                <h5><?php echo $op_control; ?><span></span></h5>
            </td>
        </tr>
        <tr>
        <tr>
            <td>
                <h4>Oficio:</h4>
            </td>
            <td>
                <h5><?php echo $n_oficio; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Remitente:</h4>
            </td>
            <td>
                <h5><?php echo $remitente; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Cargo:</h4>
            </td>
            <td>
                <h5><?php echo $cargo_r; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Organismo:</h4>
            </td>
            <td>
                <h5><?php echo $organismo; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Anexos:</h4>
            </td>
            <td>
                <h5><?php echo $anexos; ?><span></span></h5>
            </td>
        </tr>
        <tr>

        </tr>

    </table>

    <div id="subnav_r">
        <?php if ($_SESSION['tipo_rol'] == 1) { ?>
        <a href="#" id="myBtn6"><img id="ver_res" src="../img/iconos/enviar.png" title="Asignar instrucciones"></a>
        <?php } ?>
        <a href="#" id="btnEd"><img id="edt" src="../img/iconos/editar.png" title="Editar"></a>
    </div>

    <img src="../img/iconos/postick.png" id="pizarra" alt="">
    <div id="documentos_adjuntos">
        <h5>Documentos Adjuntos</h5>
        <table>
            <tbody>
                <?php foreach ($lista_archivo as $mostrar) { ?>
                <tr>
                    <td><a href="<?php echo $mostrar['url']; ?>"><?php echo $mostrar['a_nombre']; ?></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="comentarios">
        <h5>
            Comentarios
        </h5>
        <p>
            <?php echo $comentario; ?>
        </p>
    </div>



    <?php



    } // fin del else

} //fin del isset
//Devolvemos el mensaje que tomara Jquery


    ?>
</body>


<!-- Modal para responder documento  -->
<!-- Modal -->
<div class="modal fade" id="modalRespuesta" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width:600px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <ul class='nav nav-tabs'>
                    <li><a data-toggle="tab" href="#menu_participantes">Participantes</a></li>
                    <!--<li>modulo inhabilitado en caso de ser necesario
                            <a data-toggle="tab" href="#menu_a">Adjuntar documento</a></li>-->
                    <li><a data-toggle="tab" href="#menu_datos" id="as_instruccion">Datos</a></li>

                </ul>
                <div class="tab-content">


                    <div id="menu_participantes" class="tab-pane fade in active">
                        <input type="hidden" name="txtid_documento" id="txtid_documento"
                            value="<?php echo $id_documento; ?> ">

                        <div id="part">
                        </div>

                    </div>
                    <!--
                        <div id="menu_a" class="tab-pane fade">
                            <input type="hidden" name="txtid_documento" id="txtid_documento"
                                value="<?php //echo $id_documento; 
                                        ?> ">
                            <div id="formArchivo"></div>
                        </div>
                        -->
                    <div id="menu_datos" class="tab-pane fade">
                        <div id="mostrar_datos">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div id="cab_ai">
                                            <h2 id="title_ai"> Asignar Instrucciones</h2>
                                            <input type="hidden" name="in_id_doc" id="txtid_documento"
                                                value="<?php echo $id_documento; ?> " disabled>
                                            <input type="hidden" name="fol_id_doc" id="folio"
                                                value="<?php echo $folio; ?> " disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-7">
                                        <label>
                                            Direccion:
                                        </label>
                                        <select class="form-control" name="txtdireccion" id="txtdireccion" required>
                                            <option value="100">Seleccione una direccion</option>
                                            <?php foreach ($lista_dir as $mostrar) { ?>
                                            <option value="<?php echo $mostrar['id_direccion']; ?>">
                                                <?php echo $mostrar['detalle']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                                if ($op_control == "BIS") { ?>
                                        <label for="">Folio:</label>
                                        <input type="text" id="folio_gen2" value="<?php echo $folio; ?>"
                                            class="form-control">
                                        <?php } else { ?>
                                        <label for="">Folio:</label>
                                        <input type="text" id="folio_gen" value="" class="form-control">
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Destinatario:</label>
                                        <div id="selectlista3"></div>

                                    </div>
                                    <div class="col-md-6">
                                        <label>Cargo destinatario</label>
                                        <div id="selectlista4"></div>

                                    </div>
                                </div>
                                <div id="target">
                                    <hr>
                                    <h5 id="data_resp">Datos del responsable</h5>
                                    <div class="form-row">
                                        <div class="col-md-7">
                                            <label>
                                                Direccion:
                                            </label>
                                            <select class="form-control" name="txtdireccion" id="txtdireccion_r"
                                                required>
                                                <option value="0">Seleccione una direccion</option>
                                                <?php foreach ($lista_dir as $mostrar) { ?>
                                                <option value="<?php echo $mostrar['id_direccion']; ?>">
                                                    <?php echo $mostrar['detalle']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label>Destinatario:</label>
                                            <div id="selectlista_dr"></div>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Cargo destinatario</label>
                                            <div id="selectlista_cr"></div>

                                        </div>
                                    </div>

                                    <hr>

                                </div>
                                <div class="form-row">

                                    <div class="col-md-4">
                                        <label>Prioridad:</label>
                                        <select class="form-control" name="txtprioridad" id="txtprioridad" required>
                                            <option value="extra urgente">Extra urgente</option>
                                            <option value="urgente">Urgente</option>
                                            <option value="normal">Normal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Fecha limite</label>
                                        <input type="date" class="form-control" id="txtfecha_limite" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Instruccion:</label>
                                        <select name="txtinstruccion" id="txtinstruccion" class="form-control">
                                            <?php foreach ($lista_ins as $show) { ?>
                                            <option value="<?php echo $show['id_instruccion']; ?>">
                                                <?php echo $show['n_instruccion']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Otro:</label>
                                        <input type="text" id="otro_ins" class="form-control" disabled>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Asunto:</label>
                                        <textarea class="form-control" name="txtasunto" id="txtasunto" cols="30"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div id="btn_asignar">

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>





            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>








<!-- Modal para editar documento  -->
<!-- Modal -->
<div class="modal fade" id="ModalEd" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width: 600px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <center>
                                <h2 style="color: forestgreen;"> Editar datos del documento</h2>
                                <input type="hidden" name="in_id_doc" id="txtid_documento"
                                    value="<?php echo $id_documento; ?> " disabled>
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
                        <div class="col-md-7">
                            <label>
                                Organismo:
                            </label>
                            <select class="form-control" name="txtorganismo" id="txtorganismo" required>
                                <option value="<?php echo $id_organismo; ?>" selected><?php echo $organismo; ?>
                                </option>
                                <?php foreach ($lista_organismo as $mostrar) { ?>
                                <option value="<?php echo $mostrar['id_organismo']; ?>">
                                    <?php echo $mostrar['nombre_organismo']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-5">

                            <label>Otro:</label>
                            <input type="text" class="form-control" id="otro_2" value="<?php echo $detalle; ?>"
                                placeholder="<?php echo $detalle; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Folio:</label>
                            <input type="text" class="form-control" id="txtfolio" name="txtfolio"
                                value="<?php echo $op_control; ?>" placeholder="<?php echo $op_control ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label>Numero de oficio:</label>
                            <input type="text" class="form-control" id="txtoficio" name="txtoficio"
                                value="<?php echo $n_oficio ?>" placeholder="<?php echo $n_oficio ?>" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label>Tipo del documento:</label>
                            <select class="form-control" name="txttipo" id="txttipo" required>
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
                            <input type="text=" class="form-control" id="txtremitente" value="<?php echo $remitente ?>"
                                placeholder="<?php echo $remitente ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Cargo del remitente:</label>
                            <input type="text" class="form-control" id="txtcargor" value="<?php echo $cargo_r ?>"
                                placeholder="<?php echo $cargo_r ?>" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Anexos:</label>
                            <input type="text" class="form-control" id="txtanexos" value="<?php echo $anexos; ?>"
                                placeholder="<?php echo $anexos; ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Comentarios:</label>
                            <input type="text" class="form-control" id="txtcomentarios"
                                value="<?php echo $comentario; ?>" placeholder="<?php echo $comentario; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm" id="btnED">Editar documento</button>
            </div>
        </div>

    </div>
</div> <!-- Fin del modal instruccion individual -->




<script>
$(document).ready(function() {
    $('#target').hide();

    $('#txtinstruccion').change(function() {
        let ins = $('#txtinstruccion').val();
        if (ins == 11) {
            $("#otro_ins").prop('disabled', false);
            swal("Se ha activado la casilla 'otro' para la insercion manual de la instruccion");
        } else {
            $("#otro_ins").prop('disabled', true);
        }
    });

    $('#txtdireccion').change(function() {
        var dir = $('#txtdireccion').val();
        console.log(dir);
        $.ajax({
            data: {
                'direccion': dir
            },
            url: '../Controller/folio_dir.php',
            type: 'POST',
            success: function(message) {
                var new_folio = message.replace(/['"]+/g, '');
                console.log(new_folio);
                $('#folio_gen').val(new_folio);
            },
        });
    });

    $('#btnED').click(function() {
        txtid_documento = $('#txtid_documento').val();
        txtorganismo = $('#txtorganismo').val();
        otro_o = $('#otro_2').val();
        txtfolio = $('#txtfolio').val();
        txtoficio = $('#txtoficio').val();
        txttipo = $('#txttipo').val();
        txtremitente = $('#txtremitente').val();
        txtcargor = $('#txtcargor').val();
        txtasunto = $('#txtanexos').val();
        txtcomentarios = $('#txtcomentarios').val();
        //alert ("Asunto: " + txtasunto);
        //alert(txtorganismo + otro_o + txtfolio + txtoficio + txttipo + txtremitente + txtcargor + txtasunto);
        var form_data = new FormData();
        form_data.append('id_documento', txtid_documento);
        form_data.append('organismo', txtorganismo);
        form_data.append('otro', otro_o);
        form_data.append('folio', txtfolio, );
        form_data.append('oficio', txtoficio);
        form_data.append('tipo', txttipo);
        form_data.append('remitente', txtremitente);
        form_data.append('cargor', txtcargor);
        form_data.append('asunto', txtasunto);
        form_data.append('anexos', txtasunto);
        form_data.append('comentarios', txtcomentarios);
        var textoBusqueda = txtid_documento;

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

        $("#ModalEd").modal('hide');



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
        }, 900);
    });


    $('#switch').change(function() {
        if ($('#switch').prop('checked')) {

            $("#txtfolio").prop('disabled', false);
            //alert("Esta seleccionado");
        } else {
            $("#txtfolio").prop('disabled', true);
            //alert("Esta sin seleccionar");
        }


        //alert($('#switch').val());
    });

    //Validar Formulario
    $('#txtfolio').keyup(function() {
        var folio = $('#txtfolio').val();
        console.log(folio);
        $.ajax({
            url: "../Model/comprobar_folio.php",
            type: "POST",
            data: "folio=" + $('#txtfolio').val(),
            dataType: 'json',
            success: function(response) {
                console.log("el folio es: " + folio);
                console.log(response);

                if (response >= 1) {
                    $('#respuesta_folio').empty();
                    $('#respuesta_folio').html("<h5 style='color:red;'>El folio: " +
                        folio +
                        " esta ocupado <img src='../img/iconos/-.png' style='width:35px;'></h5>"
                    );
                    $('#btnED').attr("disabled", true);
                    //alert("Folio ocupado");
                } else {
                    //no hacer nada
                    $('#respuesta_folio').empty();
                    $('#respuesta_folio').html("<h5 style='color:green;'>El folio: " +
                        folio +
                        " esta disponible <img src='../img/iconos/success.png' style='width:15px;'></h5>"
                    );
                    $('#btnED').attr("disabled", false);
                }
            },
        });
    });


    //


    $('#as_instruccion').click(function() {
        var id_documento = $('#txtid_documento').val();
        $.ajax({
            type: "POST",
            url: "../Model/validar_instruccion.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                $('#btn_asignar').html(r);
            }
        });



        //alert("Hola");
    });


    $("#myBtn6").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $('#modalRespuesta').modal('show');
        txtid_documento = $('#txtid_documento').val();
        /*$.ajax({
            type: "POST",
            url: "../Model/validar_archivo.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                console.log("Datos enviados exitosamente para cargar archivo");
                $('#formArchivo').html(r);
            }
        });*/
        //alert(txtid_documento);
        $.ajax({
            data: {
                'id_documento': txtid_documento
            },
            type: "POST",
            url: "../Model/participantes.php",
            success: function(r) {
                //alert("Datos enviados exitosamente para cargar particip[antes");
                $('#part').html(r);
            }
        });



    });


    $('#btnEd').click(function() {
        $('#ModalEd').modal('show');
    });


    $("#myBtn").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $('#myModal').modal('show');
    });

    $("#myBtn2").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $.ajax({
            type: "POST",
            url: "participantes.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                alert("Datos enviados exitosamente para cargar particip[antes");
                $('#part').html(r);
            }
        });
        $.ajax({
            type: "POST",
            url: "validar_archivo.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                console.log("Datos enviados exitosamente para cargar archivo");
                $('#formArchivo').html(r);
            }
        });






        $('#ModalArchivo').modal('show');


    });

    $("#enviar_m").click(function() {
        event.preventDefault();
        jQuery.noConflict();

        var mensaje = $("#mensaje").val();
        var txtid_documento = $('#txtid_documento').val();


        $.post(
            "../Controller/mensajes.php", {
                id_documento: txtid_documento,
                mensaje: mensaje
            },
            function(historial) {
                console.log(historial);
                $('#contenidoMensaje').html(historial);
            }
        )



    });

    $("#myBtn7").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        var txtid_documento = $('#txtid_documento').val();

        $.post(
            "../Controller/ver_mensajes.php", {
                id_documento: txtid_documento,
            },
            function(historial) {
                console.log(historial);
                $('#contenidoMensaje').html(historial);


            }
        )


        $('#ModalMensaje').modal('show');
        var div = document.getElementById('modal_mensaje');
        div.scrollTop = '9999';
    });




    $("#myBtn5").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $('#Modalv_i').modal('show');
        console.log("Enviando datos al control de instrucciones");
        console.log("Dato enviado: " + $('#id_doc').val(), );
        $.ajax({
            type: "POST",
            url: "../js/ver_i.php",
            data: "id_documento=" + $('#id_doc').val(),
            success: function(r) {
                console.log("Datos enviados exitosamente para ver instruccion");
                $('#tableIns').html(r);
            }
        });


    });



    $("#myBtn3").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $('#ModalGPS').modal('show');
        console.log("Enviando datos al GPS");
        console.log("Dato enviado: " + $('#id_doc').val(), );
        $.ajax({
            type: "POST",
            url: "../Model/gps.php",
            data: "id_documento=" + $('#id_doc').val(),
            success: function(r) {
                console.log("Datos enviados exitosamente");
                $('#contenido-gps').html(r);
            }
        });


    });


    $("#area").click(function() {
        var isChecked = document.getElementById("area").checked;
        console.log(isChecked);
        document.getElementById("area2").disabled = !isChecked;
    });
});
</script>





<script>
$(document).ready(function() {
    recargarLista();
    recargarLista_2();


    $('#txtorganismo').change(function() {
        var valor_o = $('#txtorganismo').val();
        console.log(valor_o);
        if (valor_o == 24) {
            $("#otro_2").prop('disabled', false);
        } else {
            $("#otro_2").prop('disabled', true);
        }
    });




    $('#txtdireccion').change(function() {
        let val = $('#txtdireccion').val();
        if (val == 1) {
            recargarLista();
            $('#target').show();
        } else {
            recargarLista();
            $('#target').hide();

        }
    });


    $('#txtdireccion_r').change(function() {
        recargarLista_2();
        //$('#target').show();

    });
});
</script>

<script>
function recargarLista_2() {
    console.log("Preparando datos");
    console.log($('#txtdireccion_r').val());
    $.ajax({
        type: "POST",
        url: "../Model/consulta_dest_r.php",
        data: "direccion=" + $('#txtdireccion_r').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_dr').html(r);
            console.log($('#txtdestinatario_r').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo_r.php",
        data: "direccion=" + $('#txtdireccion_r').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_cr').html(r);
            console.log($('#txtcargod_r').val());
        }
    });
};


function recargarLista() {
    console.log("Preparando datos");
    console.log($('#txtdireccion').val());
    $.ajax({
        type: "POST",
        url: "../Model/consultas_ajax.php",
        data: "direccion=" + $('#txtdireccion').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista3').html(r);
            console.log($('#txtdestinatario').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo.php",
        data: "direccion=" + $('#txtdireccion').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista4').html(r);
            console.log($('#txtcargod').val());
        }
    });
};
</script>
<?php clearstatcache();  ?>


<script type="text/javascript">
var numero = 0; //Esta es una variable de control para mantener nombres
//diferentes de cada campo creado dinamicamente.
evento = function(evt) { //esta funcion nos devuelve el tipo de evento disparado
    return (!evt) ? event : evt;
}

//Aqui se hace la magia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function() {
    //Creamos un nuevo div para que contenga el nuevo campo
    nDiv = document.createElement('div');
    //con esto se establece la clase de la div
    nDiv.className = 'archivo';
    //este es el id de la div, aqui la utilidad de la variable numero
    //nos permite darle un id unico
    nDiv.id = 'file' + (++numero);
    //creamos el input para el formulario:
    nCampo = document.createElement('input');
    //le damos un nombre, es importante que lo nombren como vector, pues todos los campos
    //compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
    nCampo.name = 'archivos[]';
    //Establecemos el tipo de campo
    nCampo.type = 'file';
    //Ahora creamos un link para poder eliminar un campo que ya no deseemos
    a = document.createElement('a');
    //El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
    a.name = nDiv.id;
    //Este link no debe ir a ningun lado
    a.href = '#';
    //Establecemos que dispare esta funcion en click
    a.onclick = elimCamp;
    //Con esto ponemos el texto del link
    a.innerHTML = 'Eliminar';
    //Bien es el momento de integrar lo que hemos creado al documento,
    //primero usamos la función appendChild para adicionar el campo file nuevo
    nDiv.appendChild(nCampo);
    //Adicionamos el Link
    nDiv.appendChild(a);
    //Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
    //con esta función obtenemos una referencia a ella para usar de nuevo appendChild
    //y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
    container = document.getElementById('adjuntos');
    container.appendChild(nDiv);
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function(evt) {
    evt = evento(evt);
    nCampo = rObj(evt);
    div = document.getElementById(nCampo.name);
    div.parentNode.removeChild(div);
}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function(evt) {
    return evt.srcElement ? evt.srcElement : evt.target;
}
</script>


</html>