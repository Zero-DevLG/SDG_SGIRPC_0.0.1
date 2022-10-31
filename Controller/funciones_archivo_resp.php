<?php
session_start();
date_default_timezone_set("America/Mexico_City");
include("../model/Conexion.php");

    $option = $_POST['option'];
    $id_archivo = $_POST['id'];

    switch($option)
    {
        case '1':
            
        break;
        
        case '2':
            
            $sql1 = $pdo->prepare("DELETE  FROM archivos WHERE id_archivo = '$id_archivo'");
            $sql1->execute();
            echo 'Documento eliminado' . $id_archivo;
        break;

    }




?>