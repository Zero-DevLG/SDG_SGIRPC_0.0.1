<?php
session_start();
include("Model/Conexion.php");


$id = $_SESSION['id_doc_pdf'];

//Obtenemos el folio de la direccion general
$sql = $pdo->prepare("SELECT id.folio_dir,dp.detalle,id.instruccion,id.i FROM instrucciones_direcciones as id INNER JOIN documento_prioridad as dp ON dp.id_p = id.prioridad  WHERE id.id_documento = '$id';");
$sql->execute();
$data= $sql->fetchAll(PDO::FETCH_ASSOC);

foreach($data as $get)
{
    $folio_dir_g = $get['folio_dir'];
    $prioridad_g = $get['detalle'];
    $instruccion_g = $get['instruccion'];
    $view_td = $get['i'];
}

//Obtenemos las direcciones a las que fue turnado
$sql = $pdo->prepare("SELECT dp.nombre_direccion FROM instrucciones_direcciones as id INNER JOIN  direccion as dp ON dp.id_direccion = id.id_direccion WHERE id.id_documento = '$id'");
$sql->execute();
$data2 = $sql->fetchAll(PDO::FETCH_ASSOC);


//Obtenemos el director general

$sql = $pdo->prepare("SELECT DISTINCT er.titular FROM equipo_registro as er INNER JOIN instrucciones_direcciones as id ON id.id_direccion_general = er.id_direccion WHERE id.id_documento = '$id'");
$sql->execute();
$dir_titular = $sql->fetchColumn();





$cat_fol = $pdo->prepare("SELECT num FROM op_control_t WHERE id_documento = '$id'");
$cat_fol->execute();
$cont_t = $cat_fol ->rowCount();

$cat_fol2 = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$id'");
$cat_fol2->execute();
$cont_ac = $cat_fol2 ->rowCount();


$sentencia = $pdo->prepare("SELECT *,di.asunto,di.direccion FROM documentos_externos as de INNER JOIN documento_instruccion as di On di.id_documento = de.id_documento WHERE de.id_documento='$id'");
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
        <img id="img_header" src="assets/logos/logo_2022.png" alt="">
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
            <tr>
                <th colspan="2">FOLIO DIRECCIÓN GENERAL</th>
                <th colspan="2">Prioridad</th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $folio_dir_g; ?></td>
                <td colspan="2"><?php echo $prioridad_g; ?></td>
            </tr>
            <tr>
                <th colspan="4">Instrucción</th>
            </tr>
            <tr>
                <td id="asunto" colspan="4"><?php echo $instruccion_g; ?></td>
            </tr>
            <tr >
                <th  colspan="4">Turnado a</th>
            </tr>
            <tr>
                <td colspan="4">
                   
                        <?php foreach($data2 as $get){?>
                            <h5><?php echo $get['nombre_direccion']; ?></h5>
                        <?php } ?>  
                    
                      
                </td>
            </tr>
            <?php if($view_td==1){ ?>
            <tr>
                <th colspan="4">Ver este asunto con: <?php echo $dir_titular; ?> </th>
            </tr>
            <?php } ?>
                
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


        </table>
    </div>

</body>

</html>