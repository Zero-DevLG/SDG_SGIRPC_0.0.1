<?php

require('Model/conexion.php');
require('Model/sessiones.php');


$id_actividad = $_SESSION['id_ac'];
$consulta_doc = $pdo->prepare("SELECT ld.id_link,de.folio,de.n_oficio  FROM link_documentos_externos as ld INNER JOIN documentos_externos as de ON de.id_documento = ld.id_documento WHERE ld.id_actividad = '$id_actividad'");
$consulta_doc->execute();
$lista = $consulta_doc->fetchAll(PDO::FETCH_ASSOC);


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

    $tabla .= '{"id_link":"' . $mostrar['id_link'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . $mostrar['n_oficio'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';