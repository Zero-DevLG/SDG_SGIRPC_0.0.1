<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');


$id_documento = $_POST['id_documento'];
$id_actividad = $_POST['id_actividad'];



try {
    $sql1 = $pdo->prepare("INSERT INTO link_documentos_externos(id_documento,id_actividad) VALUES('$id_documento','$id_actividad')");
    $sql1->execute();
    echo "Documento enlazado";
} catch (Exception $e) {
    die("Error en Consulta: " . $e->getMessage());
}






//echo $id_empleado;