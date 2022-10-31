<?php
session_start();
require('Model/Conexion.php');
$sql = $_SESSION['sql'];
//$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.op_control, de.fecha_oficio,de.fecha_recibido,de.fecha_registro FROM documentos_externos as de WHERE de.estatus=1 AND de.op_control like '%OP-T-%'");

$consulta = $pdo->prepare($sql);

//$consulta_doc_ex = $pdo->prepare("SELECT op.bis,de.estatus,de.id_documento,de.n_oficio,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,op.num FROM documentos_externos as de INNER JOIN op_control_t as op ON op.id_documento = de.id_documento WHERE estatus = 1 OR estatus = 303 OR estatus = 301");
$consulta->execute();
$lista = $consulta->fetchAll(PDO::FETCH_ASSOC);

/*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
//Se guarda en un array dinamico 
$i = 0;
$tabla = "";
foreach ($lista as $mostrar) {
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . utf8_encode($mostrar['n_oficio']) . '","asunto":"' . utf8_encode($mostrar['asunto']) . '","numero_oficialia":"' . $mostrar['op_control'] . '","fecha_recibido":"' . $mostrar['fecha_recibido'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","estatus":"' . $mostrar['estatus'] .'"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';