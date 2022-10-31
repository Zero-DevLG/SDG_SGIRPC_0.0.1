<?php
include("../Model/Conexion.php");

$organismo = $_POST['otro'];
//$remitente = $_GET['term'];

$rem = $pdo->prepare("SELECT DISTINCT detalle  FROM organismo_externo WHERE detalle LIKE '%$organismo%'");
$rem->execute();
$rows = $rem->rowCount();
$list_res = $rem->fetchAll(PDO::FETCH_ASSOC);
$json = array();
if ($rows != 0) {
    foreach ($list_res as $show) {
        $json[] = $show['detalle'];
    }
    echo json_encode($json);
}