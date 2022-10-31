<?php
error_reporting(E_ERROR);
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");

// Obtenemos data
$Fecha = date('Y-m-d');
$data_cont = array();
$data_cont_turn = array();
$data_cont_r = array();
$data_cont_limit = array();
$json2 = array();
$json3 = array();
$json4 = array();
$json5 = array();

    $data = $pdo->prepare("SELECT id_direccion,siglas,contador FROM control_sp WHERE id_direccion NOT IN(200,20,11,51,52,1,18)");
    $data->execute();
    $list_data = $data->fetchAll(PDO::FETCH_ASSOC);
    $rows = $data->rowCount();
    /*for($i = 0; $i<$rows;$i++)
    {
        $data_cont[$i] = $get['siglas'];
    }*/
    $i = 0;
    $j = 0;
    $z = 0;
    foreach($list_data as $get)
    {
        $data_cont[$i] = $get['siglas'];
        $i++;
    }

    foreach($list_data as $get2)
    {
        $data_cont_turn[$j] = $get2['contador'];
        $j++;
    }
    $data_id_dir = array();
    foreach($list_data as $get2)
    {
        $data_id_dir[$z] = $get2['id_direccion'];
        $z++;
    }
    //print_r($data_id_dir);
    $f_l = array();
    for($i=0;$i<$rows;$i++)
    {
        $data = $pdo->prepare("SELECT COUNT(de.id_documento) FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE di.fecha_limite < '$Fecha' AND di.direccion = '$data_id_dir[$i]'");
        $data->execute();
        $f_l[$i] = $data->fetchColumn();
        
    }
    $ct = array();
    for($i=0;$i<$rows;$i++)
    {
        $data = $pdo->prepare("SELECT COUNT(de.id_documento) FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE  di.direccion = '$data_id_dir[$i]'");
        $data->execute();
        $ct[$i] = $data->fetchColumn();
        
    }


    //print_r($f_l);

    
    
    

//echo "<br>";
//print_r($data_cont);
//$datosX = json_encode($next_date);
//$datosY = json_encode($data_cont);
//$datosY2 = json_encode($data_cont_turn);
//$json = array();
//$json = array("Fecha" => $next_date, "Data" => $data_cont);
    $json_p = array("0" => $data_cont, "1" => $ct,"2"=>$f_l );


echo json_encode($json_p);
//echo json_encode($data_cont);