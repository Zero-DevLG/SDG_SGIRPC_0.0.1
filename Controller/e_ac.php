<?php
include("../Model/Conexion.php");
//include("../Model/Consultas.php");
require('../Model/sessiones.php');


try {

    $id_seg = $_POST['id_seg'];
    $sql_e = $pdo->prepare("DELETE  FROM tarea WHERE id_seg = '$id_seg'");
    $sql_e->execute();
    echo "Actividad Eliminada";
} catch (Exception $e) {
    die("Error en registro: " . $e->getMessage());
}