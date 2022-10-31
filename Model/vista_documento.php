<?php
//Archivo de conexion a la base de datos
require('../Model/Conexion.php');
include('../Model/Consultas.php');
error_reporting(E_ERROR);


//variable de busqueda que se recibe desde el index con JQUERY
$consultaBusqueda = $_POST['valorBusqueda'];
$id_usr = $_SESSION['id_empleado'];
$date_in = date('Y-m-d,H:i:s');
$delete_pointer = $pdo->prepare("DELETE  FROM temp_doc_usr WHERE id_user = '$id_usr'");
$delete_pointer->execute();
$new_pointer = $pdo->prepare("INSERT INTO temp_doc_usr(id_doc,id_user,date_in) VALUES('$consultaBusqueda','$id_usr','$date_in')");
$new_pointer->execute();
//echo "VALOR: " . $consultaBusqueda;
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

$cat_op = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$consultaBusqueda'");
$cat_op->execute();
$row_cat = $cat_op->rowCount();
$num = $cat_op->fetchColumn();


$cat_op2 = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$consultaBusqueda'");
$cat_op2->execute();
$row_cat2 = $cat_op2->rowCount();
$num2 = $cat_op2->fetchColumn();



$op_bis = $pdo->prepare("SELECT folio,active FROM op_bis WHERE id_documento = '$consultaBusqueda'");
$op_bis->execute();
$list_bis_op = $op_bis->fetchAll(PDO::FETCH_ASSOC);
foreach ($list_bis_op as $show) {
    $folio_bis = $show['folio'];
    $active = $show['active'];
}


if($row_cat2 != 0){
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

    $cat_op = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$consultaBusqueda'");
    $cat_op->execute();
    $row_cat = $cat_op->rowCount();
    $num = $cat_op->fetchColumn();
}
else if ($row_cat != 0) {
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




    //Si existen filas 

    //La variable resultado almacena el array que se generara en la connsulta 

    foreach ($datos as $mostrar) {
        # code...
        $organismo = $mostrar['nombre_organismo'];
        $folio =$mostrar['folio'];
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

    if ($estatus == 303) {
        $data_inst = $pdo->prepare("SELECT de.folio,di.destinatario,eq.titular,di.cargo_d,eq.cargo,di.asunto FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento INNER JOIN equipo_registro as eq ON di.direccion = eq.id_direccion WHERE de.id_documento = '$consultaBusqueda'");
        $data_inst->execute();
        $list_data = $data_inst->fetchAll(PDO::FETCH_ASSOC);
        foreach ($list_data as $show) {
            $folio_ins = $show['folio'];
            $titular = $show['titular'];
            $cargo = $show['cargo'];
            $asunto2 = $show['asunto'];
        }
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
?>

<script src="../js/vd.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>

<body>
    <div id="main_data_view">
        <div id="cabezera">
            <img src="../img/Logo_2022.jpg">
            <?php if ($estatus == 303) { ?>
            <img src="../img/iconos/cancel.png" style="position: absolute;" alt="">
            <?php } ?>
        </div>
        <div id='datos_cabezera'>

            <table class="table table-sm">
                <thead style="font-size:9px;">
                    <th>estatus</th>
                    <th>Tipo del documento</th>
                    <th>Registro</th>
                </thead>
                <tbody style="font-size:9px;">
                    <td><?php echo $estatus;  ?></td>
                    <td><?php echo $tipo_documento; ?></td>
                    <td><?php echo $registro_n . " " . $registro_a; ?></td>
                    <input type="hidden" id="prev_folio" value="<?php echo $folio; ?>">
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
                    <h4><?php echo $num; ?></h4>
                </td>

                <td>
                    <h5><?php  ?><span></span></h5>
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
                    <!--<button id="btn_p">p</button>-->
                </td>
            </tr>
            <tr>

            </tr>


        
        </table>
            <?php if ($estatus != 303) { ?>
            <div id="subnav_r">
                <a href="#"><img src="../img/iconos/close.png" id="close_doc_reg" title="cerrar" alt=""></a>
                <a href="#"><img id="ver_res" src="../img/iconos/enviar.png" title="Asignar instrucciones"></a>
                <a href="#"><img id="edt" src="../img/iconos/editar.png" title="Editar datos del documento"></a>
                <a href="#"><img id="edt2" src="../img/iconos/adjuntos.png" title="Editar archivos adjuntos"></a>
                <a href="#"><img id="rebuild_3" src="../img/iconos/return_doc.png" title="Regresar a turnados"></a>
            <!-- <a href="#"><img id="er" src="../img/iconos/eliminar.png" title="Eliminar este registro"></a> --> 
                <div id="show_data">
                        <div id="data_2">

                        </div>
                </div>
            </div>
            <?php } ?>
            <div id="documentos_adjuntos">
                <h5>Documentos Adjuntos</h5>
                <table>
                    <tbody>
                        <?php foreach ($lista_archivo as $mostrar) { ?>
                        <tr>
                            <td><a href="<?php echo $mostrar['url']; ?>" target="blank"><?php echo $mostrar['a_nombre']; ?></a>
                            </td>
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

            <?php if ($estatus == 303) { ?>
                    <div id="data_cancell">
                        <hr id="linea_cancell">
                        <h3>Datos del turno del documento cancelado:</h3>
                        <div id="data_info">
                            <table id="table_data_c" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <th>Destinatario</th>
                                    <th>Cargo</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5><?php echo $titular;  ?></h5>
                                        </td>
                                        <td>
                                            <h5><?php echo $cargo;  ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Folio del turno</th>
                                        <td><?php echo $folio_ins;  ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Asunto</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $asunto2;  ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
            <?php } ?>
    </div>
</body>

<div id="usr_in_doc">
    <img src="../img/iconos/users.png">
    <hr>
    <div id="number_usr"></div>
</div>
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
                            value="<?php echo $consultaBusqueda; ?> ">

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
                                    <div class="col-md-6">
                                        <label>Tipo de documento</label>
                                        <input type="text" class="form-control" id="tipe_doc"
                                            value="<?php echo $tipo_documento; ?>" disabled>
                                    </div>
                                    <?php if ($tipo_documento == "Copia de conocimiento") { ?>
                                    <div class="col-md-6">
                                        <button id="btnCC" class="btn btn-sm btn-primary">Mover documento a copias de
                                            conocimiento</button>
                                    </div>
                                    <?php } ?>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="">Generar folio:</label>
                                        <input type="hidden" id="bis_folio" value="<?php echo $folio_bis; ?>">
                                        <?php if ($active == 1) { ?>
                                        <select class="form-control" name="op_g" id="op_g">
                                            <option value="1">Folio unico</option>
                                            <option value="2">Folio por direccion</option>
                                            <option value="3">Usar bis</option>
                                        </select>
                                        <?php } else { ?>

                                        <select class="form-control" name="op_g" id="op_g" disabled>
                                            <option value="0">Selecciona una opcion</option>
                                            <option value="2" selected>Folio por direccion</option>
                                        </select>
                                        <?php } ?>
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

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm" id="btnED">Editar documento</button>
            </div>
        </div>

    </div>
</div> <!-- Fin del modal instruccion individual -->

<!-- Modal loading Data -->
<div class="modal fade" id="ModalLoadingData" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width: 600px;">
            </div>
            <div class="modal-body">

                <img id="data_loading" src="../img/loading_p2.gif">
                <h4 id="title_loading">Calculando folios...espere un momento</h4>
            </div>

        </div>

    </div>
</div> <!-- Fin del modal data -->

</html>