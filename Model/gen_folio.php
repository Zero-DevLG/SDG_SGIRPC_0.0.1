<?php
session_start();
error_reporting(0);
require('conexion.php');
require('sessiones.php');


$tipo = $_POST['tipo'];
$dir_local = $_SESSION["id_direccion"];
$consulta_oDir = $pdo->prepare("SELECT * FROM contador WHERE id_dir='" . $dir_local . "' AND tipo='" . $tipo . "'");
$consulta_oDir->execute();
$datos_locales_dir = $consulta_oDir->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos_locales_dir as $mostrar) {
    $cont = $mostrar['conteo'];
}

//Construir Folio

switch ($dir_local) {
    case 15:
        $fol = "DEAF/" . $cont . "/2020";
        break;
    case 9:
        $fol = "DGR/" . $cont . "/2020";
        break;
    case 10:
        $fol = "DGTO/" . $cont . "/2020";
        break;
    case 11:
        $fol = "SP/" . $cont . "/2020";
        break;
    case 12:
        $fol = "DER/" . $cont . "/2020";
        break;
    case 13:
        $fol = "DGAR/" . $cont . "/2020";
        break;
    case 14:
        $fol = "DAT/" . $cont . "/2020";
        break;
    case 16:
        $fol = "DGVCD/" . $cont . "/2020";
        break;
}


$cadena = "<input class='form-control' name='txtfolio' type='text' value='" . $fol . "' disabled>";

echo $cadena;