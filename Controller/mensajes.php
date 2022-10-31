<?php
session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("../Model/Conexion.php");
$usuario = $_SESSION['usuario'];
$mensaje = $_POST['mensaje'];
$id_documento = $_POST['id_documento'];
$tipo_mensaje = 1;
$estado_mensaje = 0;
$mDate = new DateTime();
$hora = $mDate->format("H:i:s");
$Fecha = date('Y-m-d');
$foto = $_SESSION['foto'];
$consulta_insercion = $pdo->prepare("INSERT INTO mensaje_documento(id_documento,usuario,tipo_mensaje,mensaje,estado_mensaje,fecha_mensaje,hora_mensaje,foto_user) VALUES (:id_documento,:usuario,:tipo_mensaje,:mensaje,:estado_mensaje,:fecha_mensaje,:hora_mensaje,:foto_user)");
$consulta_insercion->bindParam(':id_documento', $id_documento);
$consulta_insercion->bindParam(':usuario', $usuario);
$consulta_insercion->bindParam(':tipo_mensaje', $tipo_mensaje);
$consulta_insercion->bindParam(':mensaje', $mensaje);
$consulta_insercion->bindParam(':estado_mensaje', $estado_mensaje);
$consulta_insercion->bindParam(':fecha_mensaje', $Fecha);
$consulta_insercion->bindParam(':hora_mensaje', $hora);
$consulta_insercion->bindParam(':foto_user', $foto);

$consulta_insercion->execute();
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