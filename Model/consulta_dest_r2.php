<?php
require('Conexion.php');

$cond = $_POST["direccion"];
$consulta_ar = $pdo->prepare("SELECT * FROM equipo_registro WHERE id_direccion = '" . $cond . "'");
$consulta_ar->execute();
$lista_ar = $consulta_ar->fetchAll(PDO::FETCH_ASSOC);

$cadena = "
<select class='form-control' name=txtdestinatario id='destinatario_r2'>";
foreach ($lista_ar as $mostrar) {
    $cadena .=  '<option value=' . $mostrar['titular'] . '>' . $mostrar['titular'] . '</option>';
}

echo $cadena . "</select>";