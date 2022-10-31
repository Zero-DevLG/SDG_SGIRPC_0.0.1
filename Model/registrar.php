<?php

include("Conexion.php");
date_default_timezone_set("America/Mexico_City");
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$genero = $_POST['genero'];
if ($genero == "femenino") {
    $foto = "usr_girl.png";
} else {
    $foto = "usr_boy.png";
}
$folio = $_POST["folio"];
$num_e = $_POST['num_e'];
$activo = 100;
$Fecha = date('Y-m-d');

try{
    $reg_usr_temp = $pdo->prepare("INSERT INTO empleado(nombre,apellido,activo,foto,n_empleado,id_direccion,email,genero,fecha_registro,cpu_fol) VALUES('$nombre','$apellido','$activo','$foto','$num_e','$direccion','$correo','$genero','$Fecha','$folio')");
$reg_usr_temp->execute();
}catch (Exception $e) {
die('Error: ' . $e->getMessage());
}
