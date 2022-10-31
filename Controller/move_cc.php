<?php
session_start();
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");

$id_document = $_POST['id_document'];

try {
    $update_document = $pdo->prepare("UPDATE documentos_externos SET estatus = 402 WHERE id_documento = '$id_document'");
    $update_document->execute();
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}