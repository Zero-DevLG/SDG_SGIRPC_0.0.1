<?php
include("Conexion.php");
header('Content-Type: text/html; charset=iso-8859-1');
$id_documento = $_POST['id_documento'];
$organismo = $_POST['organismo'];
$otro = utf8_decode($_POST['otro']);
$folio = $_POST['folio'];
$oficio = $_POST['oficio'];
$tipo = $_POST['tipo'];
$remitente = utf8_decode($_POST['remitente']);
$cargor = utf8_decode($_POST['cargor']);
$anexos = utf8_decode($_POST['anexos']);
$comentarios = utf8_decode($_POST['comentarios']);
$fecha_oficio = $_POST['fecha_oficio'];
$fecha_recibido = $_POST['fecha_recibido'];


$consulta_oe = $pdo->prepare("SELECT * FROM organismo_externo WHERE id_documento='$id_documento'");
$consulta_oe->execute();
$rows = $consulta_oe->rowCount();

try {
    if ($rows == 0) {
        $insertar_otro = $pdo->prepare("INSERT INTO organismo_externo(detalle,id_documento) VALUES('$otro','$id_documento')");
        $insertar_otro->execute();
    } else {
        $actualizar_otro = $pdo->prepare("UPDATE organismo_externo SET detalle = '$otro' WHERE id_documento = '$id_documento'");
        $actualizar_otro->execute();
    }

    $actualizar_datos = $pdo->prepare("UPDATE documentos_externos SET id_organismo='$organismo',op_control='$folio',tipo_documento='$tipo',n_oficio='$oficio',remitente='$remitente',cargo_r='$cargor',anexos = '$anexos',comentario='$comentarios',fecha_oficio='$fecha_oficio',fecha_recibido='$fecha_recibido' WHERE id_documento = '$id_documento'");
    $actualizar_datos->execute();
    $consulta = "Se han actualizado los datos correctamente";
    echo json_encode($consulta);
} catch (PDOException $e) {
    $txterror =  'Error: ' . $e->getMessage();
    echo json_encode($txterror);
}