<?php

require('Model/conexion.php');
require('Model/sessiones.php');

$id_direccion = $_SESSION['id_direccion'];
$id_empleado =  $_SESSION["id_empleado"];

$consulta_doc_ex = $pdo->prepare("SELECT * FROM actividades WHERE publicado = 0 AND id_direccion = '$id_direccion' AND id_empleado = '$id_empleado'");
$consulta_doc_ex->execute();
$lista = $consulta_doc_ex->fetchAll(PDO::FETCH_ASSOC);

/*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
//Se guarda en un array dinamico 
$i = 0;
$tabla = "";
foreach ($lista as $mostrar) {
    //$tabla.='{"id_documento":"'. $mostrar['id_documento'] .'","folio":"'.$mostrar['folio'].'","oficio":"'.$mostrar['n_oficio'].'","asunto":"'.$mostrar['asunto'].'","fecha_registro":"'.$mostrar['fecha_registro'].'","fecha_oficio":"'.$mostrar['fecha_oficio'].'","fecha_recibido":"'.$mostrar['fecha_recibido'].'"},';

    $tabla .= '{"id_actividad":"' . $mostrar['id_actividad'] . '","asunto":"' . $mostrar['asunto'] . '","fecha_registro":"' . $mostrar['fecha_registro'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';