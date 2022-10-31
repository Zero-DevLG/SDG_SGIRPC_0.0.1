<?php
     require('../Model/Conexion.php');
     session_start();
     $id_documento = $_POST['id_documento'];
     date_default_timezone_set("America/Mexico_City");
     


     //Variables de sesion
        
       $id_direccion =  $_SESSION["id_direccion"];
       $id_empleado = $_SESSION["id_empleado"];
       $id_dir_s = $_SESSION['id_dir_s'];
       $id_jc =  $_SESSION['id_jc'];

        //Constantes
        $Fecha = date('Y-m-d');
    
    try {
        //code...
        //Se registra en archivados
        $sql = $pdo->prepare("INSERT INTO documentos_archivados(id_documento,id_dir_general,id_dir_int,id_jc,id_empleado,date) VALUES('$id_documento','$id_direccion','$id_dir_s','$id_jc','$id_empleado','$Fecha')");
        $sql->execute();


        $sql = $pdo->prepare("UPDATE documentos_externos SET estatus = 8 WHERE id_documento = '$id_documento'");
        $sql->execute();

        echo "Archivado correctamente";
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
   

?>