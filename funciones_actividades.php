<?php

require('Model/Conexion.php');
require('Model/sessiones.php');

$id_actividad = $_SESSION['id_ac'];

$consulta_actividad = $pdo->prepare("SELECT t.id_seg,t.id_empleado,e.nombre,e.apellido,t.accion,t.fecha_limite FROM tarea as t INNER JOIN empleado as e ON e.id_empleado = t.id_empleado WHERE id_actividad = '$id_actividad'");
$consulta_actividad->execute();
$lista = $consulta_actividad->fetchAll(PDO::FETCH_ASSOC);

/*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
//Se guarda en un array dinamico 
$i = 0;
$tabla = "";
foreach ($lista as $mostrar) {
    //$tabla.='{"id_documento":"'. $mostrar['id_documento'] .'","folio":"'.$mostrar['folio'].'","oficio":"'.$mostrar['n_oficio'].'","asunto":"'.$mostrar['asunto'].'","fecha_registro":"'.$mostrar['fecha_registro'].'","fecha_oficio":"'.$mostrar['fecha_oficio'].'","fecha_recibido":"'.$mostrar['fecha_recibido'].'"},';

    $tabla .= '{"id_seg":"' . $mostrar['id_seg'] . '","nombre":"' . $mostrar['nombre'] . " " . $mostrar['apellido'] . '","accion":"' . $mostrar['accion'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';