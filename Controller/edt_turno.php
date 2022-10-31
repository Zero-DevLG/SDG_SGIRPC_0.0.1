<?php
require('../Model/Conexion.php');
header('Content-Type: text/html; charset=iso-8859-1');


$id_documento = $_POST['id_documento'];
$direccion = $_POST['direccion'];
$instruccion = $_POST['instruccion'];
$inst_otro = $_POST['inst_otro'];
$destinatario = $_POST['destinatario'];
$cargo_d = $_POST['cargo_d'];
$asunto = $_POST['asunto'];
$fecha_limite = $_POST['fecha_limite'];
$prioridad = $_POST['prioridad'];
$dest_res = $_POST['dest_res'];
$cargo_res = $_POST['cargo_res'];
$direccion_r2 =$_POST['direccion_r2'];

$update_inst = $pdo->prepare("UPDATE documento_instruccion SET direccion ='$direccion',instruccion = '$instruccion',inst_otro = '$inst_otro',destinatario = '$destinatario',cargo_d = '$cargo_d', asunto = '$asunto',fecha_limite = '$fecha_limite',prioridad = '$prioridad' WHERE id_documento = '$id_documento'");
$update_inst->execute();

$update_res = $pdo->prepare("UPDATE doc_ext_res SET id_direccion = '$direccion_r2' WHERE id_documento = '$id_documento'");
$update_res ->execute();

echo "Datos de turno actualizados correctamente";


?>