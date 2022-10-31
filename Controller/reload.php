<?php


session_start();
require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");

$folio_o = $_POST['folio_o'];

$count = $pdo->prepare("SELECT COUNT(id_bis) FROM bis WHERE folio='$folio_o'");
$count->execute();
$row = $count->fetchColumn();


if ($row == '0') {
    $cont = 001;
    $bis = $folio_o . "-BIS-" . $cont;
} else {
    $row2 = $row + 1;
    $bis = $folio_o . "-BIS-" . $row;
}

?>

<div id="cab_datos_folio">
    <h3>Folio seleccionado: <?php echo $folio_o; ?></h3>
</div>
<div id="datos_bis">
    <h5>Bis disponible: <?php echo $bis; ?></h5>
    <h5>Numero de bis de este folio: <?php echo $row; ?> </h5>

</div>
<hr>