<?php
require('conexion.php');


$id_documento = $_POST["id_documento"];
$consulta_gps = $pdo->prepare("SELECT o.origen,o.estado,o.ubicacion,er.direccion,d.n_folio,d.fecha_registro FROM documento_ciclo as o INNER JOIN equipo_registro as er ON o.origen = er.id_direccion INNER JOIN documentos as d ON d.id_documento = o.id_documento WHERE o.id_documento='" . $id_documento . "' AND o.estado=1");
$consulta_gps->execute();
$gps_datos = $consulta_gps->fetchAll(PDO::FETCH_ASSOC);

foreach ($gps_datos as $mostrar) {
    $origen = $mostrar['direccion'];
    $folio = $mostrar['n_folio'];
    $fecha_reg = $mostrar['fecha_registro'];
}


echo "<div id='gps_nav'><img id='entidad' src='../img/iconos/entidad4.png'><h3>" . $origen . "</h3><br>" .
    "<input id='folio_or' type='text' title='Se registro en la fecha " . $fecha_reg . "' value=' " . $folio . "' disabled></div>";


$consulta_gps_u = $pdo->prepare("SELECT o.origen,o.estado,o.ubicacion,er.direccion FROM documento_ciclo as o INNER JOIN equipo_registro as er ON o.ubicacion = er.id_direccion INNER JOIN documento_instruccion as di ON di.id_documento = o.id_documento WHERE o.id_documento='" . $id_documento . "' AND (o.estado=4 OR o.estado=5 OR o.estado=6 OR o.estado=7 OR o.estado=8)");
$consulta_gps_u->execute();
$gps_datos2 = $consulta_gps_u->fetchAll(PDO::FETCH_ASSOC);
$count_gps = $consulta_gps_u->rowCount();

if ($count_gps > 0) {

    foreach ($gps_datos2 as $mostrar2) {
        $ubicacion = $mostrar2['direccion'];
        // $folio_u = $mostrar2['n_folio'];
    }

    echo "<div id='gps_nav2'><img id='entidad_desf' src='../img/iconos/entidad4.png'><h3>" . $ubicacion . "</h3><br>" .
        "<input id='folio_or2' type='text'  disabled>" . $folio . "</div>";
}