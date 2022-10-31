<?php

require('Model/conexion.php');

$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.op_control,de.folio,sp.detalle FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento INNER JOIN control_sp as sp ON sp.id_direccion = di.direccion WHERE de.op_control NOT IN ('BIS')");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","op_control":"' . $mostrar['op_control'] . '","folio":"' . $mostrar['folio'] . '","detalle":"' . $mostrar['detalle'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';