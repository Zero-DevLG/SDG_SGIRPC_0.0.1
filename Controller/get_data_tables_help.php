<?php

require('../Model/Conexion.php');

//$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.op_control, de.fecha_oficio,de.fecha_recibido,de.fecha_registro FROM documentos_externos as de WHERE de.estatus=1 AND de.op_control like '%OP-T-%'");

$consulta_doc_ex = $pdo->prepare("SELECT *,cp.detalle FROM empleado as de INNER JOIN control_sp as cp ON de.id_direccion = cp.id_direccion");
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
    $tabla .= '{"id":"' . $mostrar['id_empleado'] . '","nombre":"' . utf8_encode($mostrar['nombre']) . " " . utf8_encode($mostrar['apellido']). '","direccion":"' . $mostrar['detalle'] . '","fecha_registro":"' . $mostrar['fecha_registro'] . '","correo":"' . $mostrar['email'] . '","n_empleado":"' . $mostrar['n_empleado'] . '","activo":"' . $mostrar['activo'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';