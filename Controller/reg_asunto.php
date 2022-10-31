<?php 
require("../Model/sessiones.php");
include("../Model/Conexion.php");
error_reporting(0);

$asunto = $_POST['asunto'];
$estado = $_POST['estado'];
$Fecha = date('Y-m-d');
$dir = "";
$dir_local = $_SESSION["id_direccion"];
$id_usr = $_SESSION['id_empleado'];
$destacado = $_POST['destacado'];
$publicado = 0;

$reg_asunto = $pdo->prepare("INSERT INTO actividades(id_empleado,asunto,fecha_registro,estado,id_direccion,destacado,publicado) VALUES('$id_usr','$asunto','$Fecha','$estado','$dir_local','$destacado',$publicado)");
$reg_asunto->execute();