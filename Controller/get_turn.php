<?php 
    session_start();
    require('../Model/Conexion.php');

    $data_turn = $pdo -> prepare("SELECT Count(id_instruccion) FROM documento_instruccion");
    $data_turn->execute();
    $rows = $data_turn->fetchColumn();

    echo $rows;
?>