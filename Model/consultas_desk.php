<?php
    session_start();
    include("../Model/Conexion_help.php");
    $catalog = $pdo->prepare("SELECT id_fault,fault FROM fault_catalog WHERE active = 1");
    $catalog->execute();
    $list_catalog = $catalog->fetchAll(PDO::FETCH_ASSOC);
    


?>