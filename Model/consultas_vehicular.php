<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
require('conexion_vehicular.php');
require('sessiones.php');

$Fecha = date('Y-m-d');
$dir = "";
$dir_local = $_SESSION["id_direccion"];


$consulta_vehicular = $pdo->prepare("SELECT v.id_vehiculo,v.placas,t.detalle,v.marca,v.modelo,v.foto,d.direccion FROM vehiculo as v INNER JOIN direccion as d INNER JOIN catalogo_vehiculo as t WHERE v.direccion = d.id_direccion AND t.id_catalogo = v.tipo_vehiculo AND estatus = 1 ");
$consulta_vehicular->execute();
$lista_vehiculos = $consulta_vehicular->fetchAll(PDO::FETCH_ASSOC);


$consulta_catalogo = $pdo->prepare("SELECT * FROM catalogo_vehiculo");
$consulta_catalogo->execute();
$lista_catalogo = $consulta_catalogo->fetchAll(PDO::FETCH_ASSOC);

$consulta_driver = $pdo->prepare("SELECT d.id_driver,d.nombre,d.apellido,di.direccion,d.tipo_licencia,d.foto FROM drivers as d INNER JOIN direccion as di ON d.direccion = di.id_direccion");
$consulta_driver->execute();
$lista_driver = $consulta_driver->fetchAll(PDO::FETCH_ASSOC);


$sentencia_d = $pdo->prepare("SELECT * FROM direccion");
$sentencia_d->execute();

$listaDireccion = $sentencia_d->fetchAll(PDO::FETCH_ASSOC);