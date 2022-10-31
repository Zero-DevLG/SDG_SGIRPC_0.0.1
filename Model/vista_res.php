<?php
//Archivo de conexion a la base de datos
require('../Model/Conexion.php');
require("../Model/modals_dvas.php");
include('../Model/Consultas.php');
session_start();



//variable de busqueda que se recibe desde el index con JQUERY
$consultaBusqueda = $_POST['valorBusqueda'];
//echo "VALOR: " . $consultaBusqueda;
$_SESSION['id_doc_pdf'] =  $_POST['valorBusqueda'];
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$consultaBusqueda'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

//Variable que mostrara el contenido, se generara vacia para evitar los E-notice

//Comprueba si $consultaBusqueda esta seteado
if (isset($consultaBusqueda)) {
    //$consulta = $pdo->prepare("SELECT d.id_documento,d.fecha_oficio,d.n_folio,d.remitente,d.cargo_r,td.descripcion,d.asunto FROM documentos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento  WHERE d.id_documento = '$consultaBusqueda'");

    $consulta = $pdo->prepare("SELECT de.estatus,de.id_documento,de.folio,de.remitente,di.inst_otro,di.asunto,de.cargo_r,de.n_oficio,de.tipo_documento,td.descripcion,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,de.id_empleado_r,e.nombre,e.apellido,de.id_organismo,di.instruccion,di.destinatario,di.cargo_d,di.fecha_limite,di.fecha_instruccion,di.direccion,dir.direccion,di.area,a.area FROM documentos_externos as de INNER JOIN documento_instruccion as di ON de.id_documento = di.id_documento INNER JOIN tipo_documentos as td ON de.tipo_documento = td.id_tipo_doc INNER JOIN empleado as e ON e.id_empleado = de.id_empleado_r  INNER JOIN equipo_registro as dir ON dir.id_direccion = di.direccion INNER JOIN catalogo_dispositivo as a ON a.direccion = di.area WHERE  de.id_documento = '$consultaBusqueda'");
    $consulta->execute();
    //Obtiene la cantidad de filas que hay en la consulta
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $filas = $consulta->rowCount();

    $consulta2 = $pdo->prepare("SELECT i.n_instruccion,di.instruccion,di.direccion FROM documento_instruccion as di INNER JOIN instrucciones as i ON di.instruccion = i.id_instruccion WHERE di.id_documento ='$consultaBusqueda'");
    $consulta2->execute();
    $datos_ins = $consulta2->fetchAll(PDO::FETCH_ASSOC);



    if ($filas === 0) {
        $mensaje = "";
    } else {

        foreach ($datos_ins as $mostrar) {
            $nombre_instruccion = $mostrar['n_instruccion'];
            $id_instruccion = $mostrar['instruccion'];
            $id_direccion = $mostrar['direccion'];
        }

        //Si existen filas 

        //La variable resultado almacena el array que se generara en la connsulta 

        foreach ($datos as $mostrar) {
            # code...
            $id_documento = $mostrar['id_documento'];
            $fecha_o = $mostrar['fecha_oficio'];
            $fecha_registro = $mostrar['fecha_registro'];
            $fecha_r = $mostrar['fecha_recibido'];
            $fecha_l = $mostrar['fecha_limite'];
            $folio = $mostrar['folio'];
            $registro_n = $mostrar['nombre'];
            $registro_a = $mostrar['apellido'];
            $remitente = $mostrar['remitente'];
            $cargo_r = $mostrar['cargo_r'];
            $tipo_documento = $mostrar['descripcion'];
            $asunto = $mostrar['asunto'];
            $instruccion = $mostrar['inst_otro'];
            $direccion = $mostrar['direccion'];
            $estatus = $mostrar['estatus'];
            $area = $mostrar['area'];
        } ?>


<script src="../js/vdas.js"></script>

<body background="../img/fondo_hoja2.jpg">
<div id="resize">
    <img id="min" src="../img/iconos/min.png" alt="">
</div>
    <div id="cabezera">
        <img src="../img/LogoPC2.png">
    </div>
    <div id="load">

    </div>

    <div id='datos_cabezera'>

        <table class="table table-sm">
            <thead style="font-size:9px;">
            <input type="hidden" class="form-control" value="<?php echo $id_documento ?>" id="id_documento">
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
                <th>fecha limite documento</th>
            </thead>
            <tbody style="font-size:9px;">

                <td><?php echo $fecha_registro; ?></td>
                <td><?php echo $fecha_o; ?></td>
                <td><?php echo $fecha_r; ?></td>
                <td><?php echo $fecha_l; ?></td>
            </tbody>
        </table>

    </div>

    <table id="t-mostrar" class="table table-sm">
        <tr>
            <td>
                <h4>Folio:</h4>
            </td>
            <td>
                <h5><?php echo $folio; ?><span></span></h5>
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
                <h4>Asunto:</h4>
            </td>
            <td>
                <h5><?php echo $asunto; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Instruccion:</h4>
            </td>
            <?php if ($instruccion != "") { ?>
            <td>
                <h5><?php echo $instruccion; ?></h5>
            </td>
            <?php } else { ?>
            <td>
                <h5><?php echo $nombre_instruccion; ?></h5>
            </td>
            <?php } ?>


        </tr>

        <tr>
            <td>
                <h4>Direccion:</h4>
            </td>
            <td>
                <h5><?php echo $direccion; ?></h5>
            </td>
        </tr>

        <tr>
            <td>
                <h4>Area:</h4>
            </td>
            <td>
                <h5><?php echo $area; ?></h5>
            </td>
        </tr>

    </table>

    <img src="../img/iconos/postick.png" id="pizarra" alt="">
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

    <?php if($_SESSION['tipo_rol'] == 3){ ?>
        <div id="subnav_r_as2">
        <a href="#"><img id="submit_d" src="../img/star.png" title="Marcar como importante"></a>
        </div>
    <?php }else { ?>
        <div id="subnav_r_as">

        <!--
        <a href="#" id="myBtn2"><img id="ver_a" src="../img/iconos/ver_a.png" title="Ver Archivos"></a>
       

        -->
        <!--
        <a class="btn" href="#" id="myBtn7"><img id="chat" src="../img/iconos/chat.png"
                title="Anotaciones del documento"></a>
        -->
        <!--  <form action="../pdf2.php" method="POST" target="_blank">
            <input type="hidden" name="txtid_documento" value="
            <input type="image" src="../img/iconos/pdf.png" id="gen_pdf">
        </form>
                -->
      

        <div id="show_data_turn"></div>



    </div>    
   <?php } ?>
    







</body>

<?php



    } // fin del else

} //fin del isset
//Devolvemos el mensaje que tomara Jquery


?>