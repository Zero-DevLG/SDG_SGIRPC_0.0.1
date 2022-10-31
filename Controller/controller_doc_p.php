<?php
     session_start();
     date_default_timezone_set("America/Mexico_City");
     include('../Model/Conexion.php');

     //VARIABLES POST
     $id_documento = $_POST['id_documento'];

     
     try {
        //code...
        $sql = $pdo->prepare("UPDATE participantes SET confirm = 'Enterado' WHERE id_documento = '$id_documento'");
        $sql->execute();
        echo 'Operación realizada con exito';
     } catch(\Throwable $th) {
        //throw $th;
        echo $th;
     }
          





?>