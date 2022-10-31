<?php
require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");
$id = $_POST['id_documento'];


try {
    $update_doc = $pdo->prepare("UPDATE documentos_externos SET estatus = 6 WHERE id_documento = '$id'");
    $update_doc->execute();
    $Fecha = date('Y-m-d(H:i:s)');
    $if_exist = $pdo->prepare("SELECT * FROM document_date WHERE id_documento = '$id'");
    $if_exist->execute();
    $row = $if_exist->rowCount();
    if ($row == 0) {
        $insert_date = $pdo->prepare("INSERT INTO document_date(id_documento,date_submit) VALUES('$id','$Fecha')");
        $insert_date->execute();
    } else {
        $insert_date = $pdo->prepare("UPDATE document_date SET id_documento = '$id', date_submit = '$Fecha'");
        $insert_date->execute();
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}