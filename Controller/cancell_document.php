<?php
session_start();

require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");

$Fecha = date('Y-m-d');

$justify = $_POST['justify'];
$id_document = $_POST['id_document'];
$id_empleado = $_SESSION['id_empleado'];

$insert_cancell = $pdo->prepare("INSERT INTO documentos_cancelados(id_documento,fecha_cancelado,justify,id_empleado) VALUES('$id_document','$Fecha','$justify','$id_empleado')");
$insert_cancell->execute();

$update_document = $pdo->prepare("UPDATE documentos_externos SET estatus = 303 WHERE id_documento = '$id_document'");
$update_document->execute();