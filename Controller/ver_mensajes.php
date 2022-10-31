<?php
session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("../Model/Conexion.php");
$usuario = $_SESSION['usuario'];
$foto = $_SESSION['foto'];
$id_documento = $_POST['id_documento'];



$consulta_lectura1 = $pdo->prepare("SELECT * FROM mensaje_documento WHERE id_documento='" . $id_documento . "'");
$consulta_lectura1->execute();
$lista_mensajes1 = $consulta_lectura1->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php foreach ($lista_mensajes1 as $mostrar) { ?>

    <?php if ($mostrar['usuario'] != $usuario) { ?>
    <img id="usr_o" width="25px" height="25px" style="border-radius: 50px;"
        src="../imagenes/<?php echo $mostrar['foto_user']; ?>" />
    <div id="mensaje_o">
        <p><?php echo $mostrar['mensaje']; ?></p>

        <h5><?php echo $mostrar['fecha_mensaje'] . "/" . $mostrar['hora_mensaje']; ?>
        </h5>

    </div>
    <?php } else { ?>
    <img id="usr_p" width="25px" height="25px" style="border-radius: 50px;"
        src="../imagenes/<?php echo $mostrar['foto_user']; ?>" />
    <div id="mensaje_p">
        <?php echo $mostrar['mensaje']; ?><br>
        <h5 id="fecha_hora"><?php echo $mostrar['fecha_mensaje'] . "/" . $mostrar['hora_mensaje']; ?></h5>
    </div>
    <?php } ?>

    <span id="final"></span>
    <?php } ?>

</body>

</html>