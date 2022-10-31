<?php
include("../Model/Conexion.php");

$cargo = $_POST['cargo'];
//$remitente = $_GET['term'];

$rem = $pdo->prepare("SELECT DISTINCT cargo_r FROM documentos_externos WHERE cargo_r LIKE '%$cargo%'");
$rem->execute();
$rows = $rem->rowCount();
$list_res = $rem->fetchAll(PDO::FETCH_ASSOC);
$json = array();
if ($rows != 0) {
    foreach ($list_res as $show) {
        $json[] = $show['cargo_r'];
    }
    echo json_encode($json);
}