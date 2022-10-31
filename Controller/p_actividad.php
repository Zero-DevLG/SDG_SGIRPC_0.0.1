<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');


$id_actividad = $_POST['id_actividad'];
$Fecha = date('Y-m-d');


try {
    $sql1 = $pdo->prepare("UPDATE actividades SET publicado = 1, fecha_publicacion = '$Fecha'  WHERE id_actividad = '$id_actividad'");
    $sql1->execute();
    echo "Actividad publicada correctamente!!!";
} catch (Exception $e) {
    die("Error en Consulta: " . $e->getMessage());
}






//echo $id_empleado;