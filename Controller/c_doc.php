<?php
    session_start();
    require('../Model/Conexion.php');
    date_default_timezone_set("America/Mexico_City");
    header('Content-Type: text/html; charset=iso-8859-1');
    $Fecha = date('Y-m-d');
    $id = $_POST['id'];
    $j = $_POST['j'];
    $id_empleado = $_SESSION['id_empleado'];
    try{
        $sql1 = $pdo->prepare("INSERT INTO documentos_cancelados(id_documento,fecha_cancelado,justify,id_empleado) VALUES('$id','$Fecha','$j','$id_empleado')");
        $sql1->execute();
        $sql2 = $pdo -> prepare("UPDATE documentos_externos SET estatus = 303 WHERE id_documento = '$id'");
        $sql2->execute();
        echo "Documento cancelado correctamente";
    }catch (Exception $e) {
    die('Error: ' . $e->getMessage());
    }
    


    




?>