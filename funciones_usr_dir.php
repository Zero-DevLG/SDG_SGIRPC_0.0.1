<?php

require('Model/Conexion.php');
session_start();
$id_usr = $_SESSION['id_empleado'];

$consulta = $pdo->prepare("SELECT de.id_documento,op.num,de.folio,de.fecha_registro FROM documentos_externos as de INNER JOIN  op_control as op ON op.id_documento = de.id_documento WHERE de.id_empleado_r = '$id_usr'");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] .  '","num":"' . $mostrar['num'] .  '","fecha_registro":"' . $mostrar['fecha_registro']  . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';