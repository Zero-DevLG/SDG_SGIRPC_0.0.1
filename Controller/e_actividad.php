<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');


$id_actividad = $_POST['id_actividad'];



try {
    $sql1 = $pdo->prepare("DELETE FROM actividades WHERE id_actividad = '$id_actividad'");
    $sql1->execute();
    echo "Actividad eliminada correctamente!!!";
} catch (Exception $e) {
    die("Error en Consulta: " . $e->getMessage());
}






//echo $id_empleado;