<?php
session_start();
require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");

$op_control = $_POST['op_control'];

$count = $pdo->prepare("SELECT COUNT(id_bis) FROM bis WHERE op_control='$op_control'");
$count->execute();
$row = $count->fetchColumn();


if ($row == '0') {
    $cont = 001;
    $bis = $op_control . "-BIS-" . $cont;
} else {
    $row2 = $row + 1;
    $bis = $op_control . "-BIS-" . $row2;
}

?>

<div id="cab_datos_folio">
    <h3>Folio seleccionado: <?php echo $op_control; ?></h3>
</div>
<div id="datos_bis">
    <h5>Bis disponible: <?php echo $bis; ?></h5>
    <h5>Numero de bis de este folio: <?php echo $row; ?> </h5>

</div>
<hr>