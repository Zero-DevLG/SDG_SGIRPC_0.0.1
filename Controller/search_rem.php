<?php
include("../Model/Conexion.php");

$remitente = $_POST['rem'];
//$remitente = $_GET['term'];

$rem = $pdo->prepare("SELECT DISTINCT remitente FROM documentos_externos WHERE remitente LIKE '%$remitente%'");
$rem->execute();
$rows = $rem->rowCount();
$list_res = $rem->fetchAll(PDO::FETCH_ASSOC);
$json = array();
if ($rows != 0) {
    foreach ($list_res as $show) {
        $json[] = $show['remitente'];
    }
    echo json_encode($json);
}