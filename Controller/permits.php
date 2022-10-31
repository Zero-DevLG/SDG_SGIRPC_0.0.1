<?php 
error_reporting(E_ERROR);
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");
$id = $_POST['usr'];
$permits = $pdo->prepare("SELECT * FROM modulos_sis WHERE id_empleado = '$id'");
$permits->execute();
$list_permits = $permits->fetchAll(PDO::FETCH_ASSOC);
foreach($list_permits as $get){
    $tic = $get['tic'];
    $doc = $get['doc'];
    $v = $get['v'];
    $root = $get['r'];
}
$data_permits = array("0"=>$tic,"1"=>$doc,"2"=>$v, "3" => $root);
echo json_encode($data_permits);



?>