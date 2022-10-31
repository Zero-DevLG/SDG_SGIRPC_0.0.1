<?php
session_start();
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");


$id_documento = $_POST["documento"];
$tipo = $_POST['tipo'];
$consulta_cat = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$id_documento'");
$consulta_cat->execute();
$row_cat = $consulta_cat->rowCount();
$consulta_cat3 = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$id_documento'");
$consulta_cat3->execute();
$row_cat3 = $consulta_cat3->rowCount();

$nombre = $_FILES['file']['name'];
$nombre_temporal = $_FILES['file']['tmp_name'];
$url = "../repos_resp/" . $nombre;


    try {
        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES('$id_documento','$url','$nombre','$tipo')");
        $sentencia_ia->execute();
        
        move_uploaded_file($nombre_temporal, '../repos_resp/' . $nombre);
        
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }

   



?>
