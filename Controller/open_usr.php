<?php
    error_reporting(E_ERROR);
    session_start();
    include("../Model/Conexion.php");
    $doc = $_POST['id'];
    //$data = array();
    $cont = $pdo ->prepare("SELECT folio FROM open_folio WHERE id_open = '$doc'");
    $cont ->execute();
    $data_folio = $cont->fetchAll(PDO::FETCH_ASSOC);
    foreach($data_folio as $get){
        $folio = $get['folio'];
        //$doc = $get['id_documento']; 
        //$estatus = $get['estatus'];
    }
    //$rows = $cont->rowCount();
    //$data[0] = $rows;
    echo $folio;
?>

