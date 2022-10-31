<?php

require('Model/Conexion.php');

$consulta = $pdo->prepare("SELECT de.estatus,opt.bis,de.id_documento,opt.num,de.folio,de.remitente,di.asunto,de.n_oficio,de.fecha_oficio,di.fecha_limite FROM documentos_externos as de INNER JOIN documento_instruccion as di ON de.id_documento = di.id_documento INNER JOIN op_control_t as opt ON opt.id_documento = de.id_documento WHERE de.estatus =2 OR de.estatus =6 ");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . $mostrar['n_oficio'] . '","asunto":"' .  $mostrar['asunto'] . '","num":"' . $mostrar['num'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","remitente":"' . $mostrar['remitente'] . '","estatus":"' . $mostrar['estatus'] . '","bis":"' . $mostrar['bis'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';