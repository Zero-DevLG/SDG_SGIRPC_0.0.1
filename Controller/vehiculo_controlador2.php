<?php

include("../Model/conexion_vehicular.php");
date_default_timezone_set("America/Mexico_City");

$Fecha = date('Y-m-d');

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtplacas = (isset($_POST['txtplacas'])) ? $_POST['txtplacas'] : "";
$txttipo = (isset($_POST['txttipo'])) ? $_POST['txttipo'] : "";
$txtmarca = (isset($_POST['txtmarca'])) ? $_POST['txtmarca'] : "";
$txtmodelo = (isset($_POST['txtmodelo'])) ? $_POST['txtmodelo'] : "";
$txtdireccion = (isset($_POST['txtdireccion'])) ? $_POST['txtdireccion'] : "";
$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto'] : "";
$estatus = 1;



$sentencia_ins = $pdo->prepare("INSERT INTO vehiculo(placas,tipo_vehiculo,marca,modelo,foto,direccion,fecha_registro,estatus) VALUES(:placas,:tipo_vehiculo,:marca,:modelo,:foto,:direccion,:fecha_registro,:estatus)");
$sentencia_ins->bindParam(':placas', $txtplacas);
$sentencia_ins->bindParam(':tipo_vehiculo', $txttipo);
$fecha = new DateTime();
$nombreArchivo = ($txtfoto != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtfoto"]["name"] : "default.gif";
$tmpFoto = $_FILES["txtfoto"]["tmp_name"];
if ($tmpFoto != "") {
    move_uploaded_file($tmpFoto, "../imagenes/" . $nombreArchivo);
}
$sentencia_ins->bindParam(':foto', $nombreArchivo);
$sentencia_ins->bindParam(':marca', $txtmarca);
$sentencia_ins->bindParam(':modelo', $txtmodelo);
$sentencia_ins->bindParam(':direccion', $txtdireccion);
$sentencia_ins->bindParam(':fecha_registro', $Fecha);
$sentencia_ins->bindParam(':estatus', $estatus);

/*
        echo $txtplacas;
        echo $txttipo;
        echo $nombreArchivo;
        echo $txtmarca;
        echo $txtmodelo;
        echo $txtdireccion;
        echo $Fecha;
*/
$sentencia_ins->execute();
$sentencia_ins = null;

header('Location: ../View/vehicular2.php');


$sentencia0 = $pdo->prepare("SELECT * FROM empleado ");
$sentencia0->execute();

$listaEmpleados = $sentencia0->fetchAll(PDO::FETCH_ASSOC);

$sentencia_a = $pdo->prepare("SELECT * FROM catalogo_dispositivo");
$sentencia_a->execute();

$listaAreas = $sentencia_a->fetchAll(PDO::FETCH_ASSOC);


$sentencia_d = $pdo->prepare("SELECT * FROM direccion");
$sentencia_d->execute();

$listaDireccion = $sentencia_d->fetchAll(PDO::FETCH_ASSOC);

$sentencia0 = null;
$pdo = null;
$sentencia_a = null;
$sentencia_d = null;