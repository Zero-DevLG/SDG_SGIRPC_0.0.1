<?php

require('../../Model/Conexion.php');
session_start();
$id_dir_general = $_SESSION["id_direccion"];

// Variable POST

$year = $_POST['year'];

switch($year)
{
    case '2021':
        $db_year = "SELECT de.id_documento,de.n_oficio,de.folio,de.fecha_recibido,di.asunto FROM documentos_externos_2021 as de INNER JOIN doc_ext_res as res ON res.id_documento = de.id_documento INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE res.id_direccion = '$id_dir_general' AND estatus = 2 "; 
    break;

    case '2020':
        $db_year = "SELECT de.id_documento,de.n_oficio,de.folio,de.fecha_recibido,di.asunto FROM documentos_externos_2020 as de INNER JOIN doc_ext_res as res ON res.id_documento = de.id_documento INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE res.id_direccion = '$id_dir_general' AND estatus = 2 ";  
    break;

    case '2019':
        $db_year = "SELECT de.id_documento,de.n_oficio,de.folio,de.fecha_recibido,di.asunto FROM documentos_externos_2019 as de INNER JOIN doc_ext_res as res ON res.id_documento = de.id_documento INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE res.id_direccion = '$id_dir_general' AND estatus = 2";  
    break;
}

$consulta = $pdo->prepare($db_year);
$consulta->execute();
//Obtiene la cantidad de filas que hay en la consulta
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);


/*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
//Se guarda en un array dinamico 
$i = 0;
$tabla = "";
foreach ($datos as $mostrar) {
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . $mostrar['n_oficio'] . '","asunto":"' .  $mostrar['asunto'] . '","fecha_recibido":"' . $mostrar['fecha_recibido'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';