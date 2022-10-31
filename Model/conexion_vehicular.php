<?php

$servidor = "mysql:dbname=control_vehicular;host=127.0.0.1";
$usuario = "gerencia";
$password = "civilwars2016";


try {

    $pdo = new PDO($servidor, $usuario, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo "Conexion mala: (" . $e->getMessage() . ")";
}