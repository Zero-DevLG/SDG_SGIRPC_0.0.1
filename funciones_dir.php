<?php

require('Model/Conexion.php');
session_start();
$dir = $_SESSION['id_direccion'];
$consulta = $pdo->prepare("SELECT de.remitente,de.estatus,opt.bis,de.id_documento,opt.num,de.folio,de.remitente,di.asunto,de.cargo_r,de.n_oficio,de.tipo_documento,td.descripcion,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,de.id_empleado_r,e.nombre,e.apellido,de.id_organismo,di.instruccion,di.destinatario,di.cargo_d,di.fecha_limite,di.fecha_instruccion,di.direccion,dir.direccion,di.area,a.area FROM documentos_externos as de INNER JOIN documento_instruccion as di ON de.id_documento = di.id_documento INNER JOIN tipo_documentos as td ON de.tipo_documento = td.id_tipo_doc INNER JOIN empleado as e ON e.id_empleado = de.id_empleado_r INNER JOIN equipo_registro as dir ON dir.id_direccion = di.direccion INNER JOIN catalogo_dispositivo as a ON a.direccion = di.area INNER JOIN op_control as opt ON opt.id_documento = de.id_documento WHERE de.estatus =2 AND di.direccion = '$dir'");
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
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . utf8_encode($mostrar['n_oficio']) . '","asunto":"' . utf8_encode($mostrar['asunto']) . '","num":"' . $mostrar['num'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","remitente":"' . utf8_encode($mostrar['remitente']) . '","estatus":"' . $mostrar['estatus'] . '","bis":"' . $mostrar['bis'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';