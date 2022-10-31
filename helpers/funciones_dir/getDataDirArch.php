<?php

require('../../Model/Conexion.php');
session_start();
$id_dir_general = $_SESSION["id_direccion"];

$consulta = $pdo->prepare("SELECT de.estatus,de.id_documento,de.folio,de.n_oficio,de.fecha_oficio,di.asunto,dar.id_doc_arch FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento INNER JOIN documentos_archivados as dar ON dar.id_documento = de.id_documento WHERE dar.id_dir_general = '$id_dir_general';");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] .'","n_oficio":"' . $mostrar['n_oficio'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] .  '","asunto":"' . $mostrar['asunto'] .  '","estatus":"' . $mostrar['estatus']  . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';