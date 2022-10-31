<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');

$_SESSION['id_actividad'] = $_POST['id_actividad'];
$id_empleado = $_POST['id_empleado'];
$id_actividad = $_POST['id_actividad'];
$status = 0;



try {
    $sql1 = $pdo->prepare("INSERT INTO tarea(id_empleado,id_actividad,status) VALUES('$id_empleado','$id_actividad','$status')");
    $sql1->execute();
} catch (Exception $e) {
    die("Error en Consulta: " . $e->getMessage());
}






//echo $id_empleado;