<?php

require('Model/Conexion.php');
session_start();
$dir = $_SESSION['id_direccion'];
$consulta = $pdo->prepare("SELECT de.estatus,de.id_documento,de.folio,de.n_oficio,di.asunto,de.fecha_oficio,di.fecha_limite,de.remitente FROM documentos_externos as de INNER JOIN documento_instruccion as di ON de.id_documento = di.id_documento INNER JOIN doc_ext_res as r ON r.id_documento = di.id_documento WHERE r.id_direccion = '$dir'");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . utf8_encode($mostrar['n_oficio']) . '","asunto":"' . utf8_encode($mostrar['asunto']) . '","num":"' . $mostrar['num'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","remitente":"' . utf8_encode($mostrar['remitente']) . '","estatus":"' . $mostrar['estatus'] . '","bis":"' . $mostrar['bis'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';