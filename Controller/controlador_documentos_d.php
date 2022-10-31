<?php
     include("../Model/Conexion.php");

    $direccion=$_SESSION['direccion']; 
    
    $sentencia_d = $pdo->prepare("SELECT * FROM documentos WHERE area_o = '$direccion'");
    $sentencia_d->execute();

    $listaDocumentos=$sentencia_d->fetchAll(PDO::FETCH_ASSOC);


    
    
    



?>