<?php
session_start();
include("Model/Conexion.php");


$id = $_SESSION['id_doc_pdf'];

$cat_fol = $pdo->prepare("SELECT num FROM op_control_t WHERE id_documento = '$id'");
$cat_fol->execute();
$cont_t = $cat_fol ->rowCount();

$cat_fol2 = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$id'");
$cat_fol2->execute();
$cont_ac = $cat_fol2 ->rowCount();


$sentencia = $pdo->prepare("SELECT *,di.asunto,di.direccion FROM documentos_externos_2021 as de INNER JOIN documento_instruccion as di On di.id_documento = de.id_documento WHERE de.id_documento='$id'");
$sentencia_i = $pdo->prepare("SELECT di.id_instruccion,di.id_documento,di.instruccion,i.n_instruccion,di.fecha_limite,di.asunto,di.inst_otro,p.detalle FROM documento_instruccion as di INNER JOIN instrucciones as i ON i.id_instruccion=di.instruccion INNER JOIN prioridad as p ON p.id_estatus_p = di.prioridad  WHERE di.id_documento='$id'");
$sentencia_p = $pdo->prepare("SELECT *,er.titular,er.cargo FROM participantes as p INNER JOIN equipo_registro as er ON er.id_direccion = p.id_direccion WHERE id_documento='$id'");
$sentencia_p->execute();
$count_p = $sentencia_p->rowCount();
$sentencia->execute();
$sentencia_i->execute();
$documento = $sentencia->fetchAll(PDO::FETCH_ASSOC);
$documento_i = $sentencia_i->fetchAll(PDO::FETCH_ASSOC);
$documento_p = $sentencia_p->fetchAll(PDO::FETCH_ASSOC);
$i = $sentencia_p->rowCount();

$consulta_resp = $pdo->prepare("SELECT rs.id_res,er.titular,er.cargo FROM doc_ext_res as rs INNER JOIN equipo_registro as er ON rs.id_direccion = er.id_direccion WHERE rs.id_documento ='$id'");
$consulta_resp->execute();
$lista_res = $consulta_resp->fetchAll(PDO::FETCH_ASSOC);
$cont_res = $consulta_resp->rowCount();

foreach ($documento as $show) {
    $n_oficio = $show['n_oficio'];
    $fecha_oficio = $show['fecha_oficio'];
    $fecha_recibido = $show['fecha_recibido'];
    $folio = $show['folio'];
    $remitente = $show['remitente'];
    $cargo_r = $show['cargo_r'];
    $asunto = $show['asunto'];
    $id_direccion = $show['direccion'];
    $anexos = $show['anexos'];
}
foreach ($lista_res as $show) {
    $titular = $show['titular'];
    $cargo = $show['cargo'];
}

foreach ($documento_i as $show) {
    $instruccion = $show['n_instruccion'];
    $otro = $show['inst_otro'];
    $fecha_limite = $show['fecha_limite'];
    $prioridad = $show['detalle'];
}

$directivos = $pdo -> prepare("SELECT di.direccion,er.direccion,er.titular,er.cargo FROM documento_instruccion as di INNER JOIN equipo_registro as er ON er.id_direccion = di.direccion WHERE di.id_documento = '$id'");
$directivos ->execute();
$list_dir = $directivos->fetchAll(PDO::FETCH_ASSOC);

foreach($list_dir as $show)
{
    $titular_A = $show['titular'];
    $cargo_A = $show['cargo'];
    $direccion = $show['direccion'];
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="pdf.css">

</head>

<body>
    <div id="header">
        <img id="img_header" src="img/logo_1.png" alt="">
        <h3 id="title">VOLANTE DE TURNO 2022</h3>
    </div>
    <div id="data">
        <table cellspacing="0" style="width: 100%; border:2px solid;position: relative;">
            <thead>
                <tr>
                    <th>NO.FOLIO</th>
                    <th>FECHA DEL OFICIO</th>
                    <th>FECHA DE RECIBIDO</th>
                    <th>NO. OFICIO</th>
                </tr>

            </thead>
            <tr>
                <td><?php echo $folio ?></td>
                <td><?php echo $fecha_oficio ?></td>
                <td><?php echo $fecha_recibido ?></td>
                <td id="n_oficio"><?php echo $n_oficio ?></td>
            </tr>
            <tr>
                <th colspan="2">REMITENTE</th>
                <th colspan="2">CARGO REMITENTE</th>
            </tr>
            <tr>
                <td id="remitente" colspan="2"><?php echo $remitente ?></td>
                <td id="cargo_rem" colspan="2"><?php echo $cargo_r ?></td>
            </tr>
            <tr>
                <th colspan="1">ASUNTO</th>
                <td id="asunto" colspan="3"><?php echo  $asunto ?></td>

            </tr>
            <?php if($id_direccion != 1 && $id_direccion != 51){ ?>
                <tr>
                <th colspan="2">REPRESENTANTE</th>
                <th colspan="2">CARGO </th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $titular_A ?></td>
                <td colspan="2"><?php echo $cargo_A ?></td>
            </tr>

            <?php } ?>
             <?php   if($cont_t != 0 || $cont_ac !=0){ ?>
                         <tr>
                <th colspan="2">DIRIGIDO A</th>
                <th colspan="2">CARGO </th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $titular_A ?></td>
                <td colspan="2"><?php echo $cargo_A ?></td>
            </tr>
       <?php } ?>
            

       <?php  if ($cont_res != 0) { ?>
            <tr>
                <th colspan="2">RESPONSABLE</th>
                <th colspan="2">CARGO </th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $titular ?></td>
                <td colspan="2"><?php echo $cargo ?></td>
            </tr>
            <?php } ?>
            <?php if ($count_p != 0) {
                foreach ($documento_p as $read) { ?>
            <tr>
                <th colspan="2">PARTICIPANTE</th>
                <th colspan="2">CARGO </th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $read['titular'] ?></td>
                <td colspan="2"><?php echo $read['cargo'] ?></td>
            </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th colspan="2">INSTRUCCION</th>
                <?php if ($otro != "") { ?>
                <td colspan="2" id="inst_XL"><?php echo $otro ?></td>
                <?php } else { ?>
                <td colspan="2"><?php echo $instruccion ?></td>
                <?php } ?>
            </tr>
            <tr>
                <th colspan="2">RECIBE</th>
                <th colspan="2">FECHA y HORA</th>
            </tr>
            <tr>
                <th class="empty" colspan="2"><?php echo "   " ?></th>
                <td class="empty" colspan="2"><?php echo "   " ?></td>
            </tr>
            <tr>
                <th colspan="2">FECHA LIMITE DE RESPUESTA</th>
                <td class="empty" colspan="2"><?php echo $fecha_limite; ?></td>
            </tr>
            <tr>
                <th colspan="2">ANEXOS:</th>
                <td class="empty" colspan="2"><?php echo $anexos; ?></td>
            </tr>

            <tr>
                <th colspan="2">PRIORIDAD:</th>
                <td class="empty" colspan="2"><?php echo $prioridad; ?></td>
            </tr>


        </table>
    </div>

</body>

</html>