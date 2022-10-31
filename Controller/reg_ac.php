<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');


$id_seg = $_POST['id_seg'];
$fecha_limite = $_POST['fecha_limite'];
$estado = $_POST['estado'];
$actividad = $_POST['actividad'];


try {
    $sql1 = $pdo->prepare("UPDATE tarea SET accion = '$actividad', fecha_limite = '$fecha_limite' WHERE id_seg = '$id_seg'");
    $sql1->execute();
    echo "Actividad registrada";
} catch (Exception $e) {
    die("Error en registro: " . $e->getMessage());
}