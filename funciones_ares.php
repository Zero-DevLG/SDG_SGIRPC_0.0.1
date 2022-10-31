<?php

require('Model/Conexion.php');

$consulta = $pdo->prepare("SELECT d.id_documento,d.folio,op.num,res.folio_res,res.date_res,di.asunto FROM documentos_externos AS d INNER JOIN documento_instruccion AS di ON d.id_documento = di.id_documento INNER JOIN op_control AS op ON op.id_documento = d.id_documento INNER JOIN tem_res AS res ON res.id_documento = d.id_documento ");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","op_control":"' . $mostrar['num'] . '","folio_res":"' . $mostrar['folio_res'] . '","date_res":"' . $mostrar['date_res'] . '","asunto":"' . $mostrar['asunto'] .'"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';