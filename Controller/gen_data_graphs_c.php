<?php
error_reporting(E_ERROR);
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");

// Obtenemos data

$data_cont = array();
$data_cont_turn = array();
$data_cont_r = array();
$data_cont_limit = array();
$json2 = array();
$json3 = array();
$json4 = array();
$json5 = array();

    $data = $pdo->prepare("SELECT nombre,id_empleado FROM empleado  WHERE id_empleado NOT IN(44,22,25,26,27,28,29,43,30,45,42,40,39,41,35,33)");
    $data->execute();
    $list_data = $data->fetchAll(PDO::FETCH_ASSOC);
    $rows = $data->rowCount();
    //print_r($data);
    //print_r(utf8_encode($list_data));
    /*for($i = 0; $i<$rows;$i++)
    {
        $data_cont[$i] = $get['siglas'];
    }*/
    $i = 0;
    $j = 0;
    foreach($list_data as $get)
    {
        $data_cont[$i] = $get['nombre'];
        $i++;
    }
    $data_id = array();
    foreach($list_data as $get)
    {
        $data_id[$j] = $get['id_empleado'];
        $j++;
    }

    //print_r($data_id);

    //print_r($data_cont);
    /*
    foreach($list_data as $get2)
    {
        $data_cont_turn[$j] = $get2['contador'];
        $j++;
    }
    */
    
    $usr_cont = array();
    for($w=0;$w<$rows;$w++)
    {
        $conteos= $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_externos WHERE id_empleado_r = '$data_id[$w]'");
        $conteos->execute();
        $usr_cont[$w] = $conteos->fetchColumn();
    }
    $usr_cont_turn = array();
    for($w=0;$w<$rows;$w++)
    {
        $conteos= $pdo->prepare("SELECT COUNT(id_instruccion) FROM documento_instruccion WHERE id_empleado = '$data_id[$w]'");
        $conteos->execute();
        $usr_cont_turn[$w] = $conteos->fetchColumn();
    }
//echo "<br>";
//print_r($data_cont);
//$datosX = json_encode($next_date);
//$datosY = json_encode($data_cont);
//$datosY2 = json_encode($data_cont_turn);
//$json = array();
//$json = array("Fecha" => $next_date, "Data" => $data_cont);
$json_p = array("0" => $data_cont, "1" => $usr_cont, "2" => $usr_cont_turn);


//print_r($usr_cont);
//print_r($usr_cont);

echo json_encode($json_p);
//echo json_encode($data_cont);