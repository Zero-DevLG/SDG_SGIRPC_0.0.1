<?php 

include("Conexion.php");

$folio = $_POST['folio'];

//echo $folio;

$verificar_folio = $pdo->prepare("SELECT * FROM documentos_externos WHERE folio='$folio'");
$verificar_folio->execute();
$count = $verificar_folio->rowCount();

//echo $count;

echo json_encode($count);



?>
