<?php
require('Conexion.php');

$cond = $_POST["direccion"];
$consulta_ar = $pdo->prepare("SELECT * FROM equipo_registro WHERE id_direccion = '" . $cond . "'");
$consulta_ar->execute();
$lista_ar = $consulta_ar->fetchAll(PDO::FETCH_ASSOC);

$cadena = "
<select class='form-control' id='txtcargod2' name='txtcargod'>";
foreach ($lista_ar as $mostrar) {
    $cadena .=  '<option value=' . $mostrar['cargo'] . '>' . $mostrar['cargo'] . '</option>';
}

echo $cadena . "</select>";