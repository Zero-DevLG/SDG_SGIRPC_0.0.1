<?php

require('Model/Conexion.php');

$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.op_control, de.fecha_oficio,de.fecha_recibido,de.fecha_registro,sp.siglas FROM documentos_externos as de INNER JOIN control_sp as sp ON sp.id_direccion = de.id_direccion WHERE de.estatus=402");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","siglas":"' . $mostrar['siglas'] . '","op_control":"' . $mostrar['op_control'] . '","oficio":"' . $mostrar['n_oficio'] . '","fecha_registro":"' . $mostrar['fecha_registro'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_recibido":"' . $mostrar['fecha_recibido'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';