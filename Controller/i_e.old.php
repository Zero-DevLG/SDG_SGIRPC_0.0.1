<?php
session_start();
require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");


$direccion = $_POST['direccion'];
$id_documento = $_POST['id_documento'];
$destinatario = $_POST['destinatario'];
$cargod = $_POST['cargo_d'];
$instruccion = $_POST['instruccion'];
$asunto = $_POST['asunto'];
$prioridad = $_POST['prioridad'];
$fecha_limite = $_POST['fecha_limite'];
$folio = $_POST['folio'];
$folio2 = $_POST['folio2'];
$direccion_r = $_POST['direccion_r'];
$destinatario_r = $_POST['destinatario_r'];
$cargo_r = $_POST['cargo_r'];
$otro = $_POST['otro'];
$Fecha = date('Y-m-d');

if ($folio2) {
    $folio_reg = $folio2;
} else {
    $folio_reg = $folio;
}



if ($direccion_r) {
    $insert_res = $pdo->prepare("INSERT INTO doc_ext_res(id_documento,id_direccion,responsable,cargo_r) VALUES('$id_documento','$direccion_r','$destinatario_r','$cargo_r')");
    $insert_res->execute();
}







$sql_folio = $pdo->prepare("UPDATE documentos_externos SET folio='$folio_reg' WHERE id_documento = '$id_documento'");
$sql_folio->execute();


$sql = "INSERT INTO documento_instruccion(id_documento,direccion,instruccion,destinatario,cargo_d,asunto,fecha_limite,fecha_instruccion,prioridad) VALUES(:id_documento,:direccion,:area,:instruccion,:destinatario,:cargo_d,:asunto,:fecha_limite,:fecha_instruccion,:prioridad)";

$consulta_ins = $pdo->prepare("INSERT INTO documento_instruccion(id_documento,direccion,instruccion,destinatario,cargo_d,asunto,fecha_limite,fecha_instruccion,prioridad,inst_otro) VALUES(:id_documento,:direccion,:instruccion,:destinatario,:cargo_d,:asunto,:fecha_limite,:fecha_instruccion,:prioridad,:inst_otro)");
$consulta_ins->bindParam(':id_documento', $id_documento);
$consulta_ins->bindParam(':direccion', $direccion);
$consulta_ins->bindParam(':instruccion', $instruccion);
$consulta_ins->bindParam(':destinatario', $destinatario);
$consulta_ins->bindParam(':cargo_d', $cargod);
$consulta_ins->bindParam(':asunto', $asunto);
$consulta_ins->bindParam(':fecha_limite', $fecha_limite);
$consulta_ins->bindParam(':fecha_instruccion', $Fecha);
$consulta_ins->bindParam(':prioridad', $prioridad);
$consulta_ins->bindParam(':inst_otro', $otro);
$consulta_ins->execute();

$mDate = new DateTime();
$hora = $mDate->format("H:i:s");
$usuario = $_SESSION['usuario'];
$accion = "Insercion de instruccion";

$sql1 = "INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)";
$consulta_logIns = $pdo->prepare("INSERT INTO logs(usuario,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:accion,:query,:id_documento,:fecha_accion,:hora_accion)");
$consulta_logIns->bindParam(':usuario', $usuario);
$consulta_logIns->bindParam(':accion', $accion);
$consulta_logIns->bindParam(':query', $sql);
$consulta_logIns->bindParam(':id_documento', $id_documento);
$consulta_logIns->bindParam('fecha_accion', $Fecha);
$consulta_logIns->bindParam(':hora_accion', $hora);
$consulta_logIns->execute();

$dir_local = $_SESSION["id_direccion"];
$estado = 4;
$actualizar_estado = $pdo->prepare("UPDATE documentos_externos SET estatus=2 WHERE id_documento = :id_documento");
$actualizar_estado->bindPAram('id_documento', $id_documento);
$actualizar_estado->execute();


$sql1 = $pdo->prepare("SELECT contador FROM control_sp WHERE id_direccion = '$direccion'");
$sql1->execute();
$conteo = $sql1->fetchColumn();
$nuevo_conteo = $conteo + 1;

$sql_update = $pdo->prepare("UPDATE control_sp SET contador ='$nuevo_conteo' WHERE id_direccion = '$direccion'");
$sql_update->execute();


    /*

$mensaje2 = $direccion;
$mensaje2 .= $area;
$mensaje2 .= $id_documento;
$mensaje2 .= $destinatario;
$mensaje2 .= $cargod;
$mensaje2 .= $instruccion;
$mensaje2 .= $prioridad;
*/

   // $mensaje2 = "Instruccion registrada con exito: " . $id_documento;

//echo $mensaje2;