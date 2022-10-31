<?php
    
    include("../Model/Conexion.php");
    
    $consulta=$pdo->prepare("SELECT * FROM documentos");
    $consulta->execute();
    $lista_consulta=$consulta->fetchAll(PDO::FETCH_ASSOC);

    

    




?>