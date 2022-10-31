<?php

require('../../Model/Conexion.php');
session_start();
$id_dir_general = $_SESSION["id_direccion"];

$consulta = $pdo->prepare("SELECT de.estatus,de.id_documento,de.folio,dres.id_direccion,sp.detalle,de.remitente,di.asunto,de.n_oficio,de.fecha_oficio,di.fecha_limite,p.id_participante,p.id_direccion,er.direccion,p.confirm FROM documentos_externos as de INNER JOIN documento_instruccion as di ON de.id_documento = di.id_documento INNER JOIN participantes as p ON p.id_documento = de.id_documento INNER JOIN doc_ext_res as dres ON dres.id_documento = de.id_documento INNER JOIN control_sp as sp ON sp.id_direccion = dres.id_direccion INNER JOIN equipo_registro as er ON er.id_direccion = p.id_direccion WHERE p.id_direccion = '$id_dir_general'");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] .  '","folio":"' . $mostrar['folio'] .'","dir_o":"' . $mostrar['detalle'] .'","dir_p":"' . $mostrar['direccion'] . '","oficio":"' . $mostrar['n_oficio'] . '","asunto":"' .  $mostrar['asunto'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","remitente":"' . $mostrar['remitente'] . '","estatus":"' . $mostrar['estatus'] . '","confirm":"' . $mostrar['confirm'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';