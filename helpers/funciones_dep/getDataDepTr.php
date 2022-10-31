<?php

require('../../Model/Conexion.php');
session_start();
$id_dir_general = $_SESSION["id_direccion"];
$id_direccion_p =  $_SESSION['id_dir_s'];

$consulta = $pdo->prepare("SELECT de.estatus,id.id_instruccion,de.id_documento,de.folio,id.folio_dir,de.n_oficio,id.fecha_limite,dir.nombre_direccion,id.prioridad,dp.detalle,id.estatus_ins,idp.instruccion,dep.nombre_departamento FROM documentos_externos as de INNER JOIN instrucciones_direcciones as id ON de.id_documento = id.id_documento INNER JOIN direccion as dir ON dir.id_direccion = id.id_direccion INNER JOIN documento_prioridad as dp ON dp.id_p = id.prioridad INNER JOIN instruccion_direccion_p as idp ON idp.id_instruccion_g = id.id_instruccion INNER JOIN departamentos as dep ON dep.id_departamento = idp.id_jc WHERE id.id_direccion_general = '$id_dir_general' AND idp.id_direccion_p = '$id_direccion_p'  AND idp.estatus = 0");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_instruccion'] . '","folio":"' . $mostrar['folio'] .'","folio_dir":"' . $mostrar['folio_dir'] . '","n_oficio":"' . $mostrar['n_oficio'] .   '","fecha_limite":"' . $mostrar['fecha_limite'] . '","nombre_direccion":"' . $mostrar['nombre_departamento']  . '","detalle":"' . $mostrar['detalle']  . '","prioridad":"' . $mostrar['prioridad']  . '","estatus_ins":"' . $mostrar['estatus_ins']  .'","estatus":"' . $mostrar['estatus']  . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';