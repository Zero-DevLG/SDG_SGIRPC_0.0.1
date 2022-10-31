<?php

require('../Model/Conexion.php');
session_start();

$f1 = $_POST['fi'];
$f2 = $_POST['ff'];

$consulta_reporte = $pdo->prepare("SELECT * FROM documentos_externos WHERE fecha_registro BETWEEN '$f1' AND '$f2'");
$consulta_reporte->execute();
$data = $consulta_reporte->fetchAll(PDO::FETCH_ASSOC);

foreach($data as $get){
    echo $get['id_documento'].",";
    echo $get['folio'].",";
    echo $get['n_oficio'].",";
}

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=export.csv;');



?>