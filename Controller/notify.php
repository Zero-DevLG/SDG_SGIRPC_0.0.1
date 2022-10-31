<?php
    error_reporting(E_ERROR);
    session_start();
    include("../Model/Conexion.php");
    $op = $_POST['op'];
    if($op == 1){
        $cont = $pdo ->prepare("SELECT MAX(id_instruccion) FROM documento_instruccion");
        $cont ->execute();
        $rows = $cont->fetchColumn();
        echo $rows;
    }
    if($op == 2){
        $cont = $pdo ->prepare("SELECT MAX(id_documento) FROM documentos_externos");
        $cont ->execute();
        $rows = $cont->fetchColumn();
        echo $rows;
    }
    if($op == 3){
        $cont = $pdo ->prepare("SELECT MAX(id_open) FROM open_folio");
        $cont ->execute();
        $rows = $cont->fetchColumn();
        echo $rows;
    }

   
?>