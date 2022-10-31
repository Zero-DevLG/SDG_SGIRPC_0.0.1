<?php

require('Model/Conexion.php');

$consulta_doc_ex = $pdo->prepare("
SELECT de.id_documento,de.n_oficio,eq.codigo,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,op.num,op.bis,de.estatus FROM documentos_externos as de INNER JOIN op_control as op ON op.id_documento = de.id_documento INNER JOIN equipo_registro as eq ON eq.id_direccion = de.id_direccion WHERE estatus = 1 OR estatus = 303 ");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","siglas":"' . $mostrar['codigo'] . '","op_control":"' . $mostrar['num'] . '","oficio":"' . $mostrar['n_oficio'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_recibido":"' . $mostrar['fecha_recibido'] . '","estatus":"' . $mostrar['estatus'] . '","bis":"' . $mostrar['bis'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';