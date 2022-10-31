<?php

require('../../Model/Conexion.php');
session_start();
$id_dir_general = $_SESSION["id_direccion"];
$id_dir_p =  $_SESSION['id_dir_s'];

$consulta = $pdo->prepare("SELECT  DISTINCT de.id_documento,da.id_doc_at,de.estatus,de.folio,de.n_oficio,de.fecha_oficio,da.date_response,da.response,da.folio_response,dir.nombre_direccion,dep.nombre_departamento FROM documentos_externos as de INNER JOIN documentos_atendidos as da ON da.id_documento = de.id_documento INNER JOIN direccion as dir ON dir.id_direccion = da.id_dir_p INNER JOIN departamentos as dep ON dep.id_departamento = da.id_jc WHERE da.id_direccion_general = '$id_dir_general' AND da.id_dir_p = '$id_dir_p' ");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] .'","folio_respuesta":"' . $mostrar['folio_response'] . '","n_oficio":"' . $mostrar['n_oficio'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] .  '","fecha_respuesta":"' . $mostrar['date_response'] . '","nombre_direccion":"' . $mostrar['nombre_direccion']  . '","nombre_departamento":"' . $mostrar['nombre_departamento']  . '","respuesta":"' . $mostrar['response']  . '","estatus":"' . $mostrar['estatus']  . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';