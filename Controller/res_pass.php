<?php
include("../Model/Conexion.php");

$email = $_POST['email'];
$sql = $pdo->prepare("SELECT * FROM empleado WHERE email = '$email'");
$sql->execute();
$count = $sql->rowCount();

if ($count == 0) {
    $resp = 0;
} else {
    $resp = 1;
    $solicitud = 1;
    $estado = 0;
    $sql2 = $pdo->prepare("INSERT INTO soporte(email,tipo_solicitud,estado) VALUES('$email','$solicitud','$estado')");
    $sql2->execute();
}

echo json_encode($resp);