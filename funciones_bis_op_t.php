<?php

require('Model/conexion.php');

$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,sp.detalle,op.num FROM documentos_externos as de INNER JOIN control_sp as sp ON sp.id_direccion = de.id_direccion INNER JOIN op_control_t as op ON op.id_documento = de.id_documento ");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","detalle":"' . $mostrar['detalle'] . '","num":"' . $mostrar['num'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';