<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');


$id_link = $_POST['id_link'];




try {
    $sql1 = $pdo->prepare("DELETE  FROM link_documentos_externos WHERE id_link = '$id_link'");
    $sql1->execute();
    echo "Documento eliminado correctamente!!!";
} catch (Exception $e) {
    die("Error en Consulta: " . $e->getMessage());
}






//echo $id_empleado;