<?php 

require("sessiones.php");
include("Conexion.php");
include("Consultas.php");


error_reporting(0);
//$Fecha = date('Y-m-d');
$Fecha = $_POST['fecha_bit'];
$dir_local = $_SESSION["id_direccion"];
$consulta_datos = $pdo->prepare("SELECT * FROM documentos_externos WHERE fecha_registro BETWEEN '0000-00-00' AND '$Fecha'");
$consulta_datos->execute();
$resultado = $consulta_datos->rowCount();

$consulta_hoy = $pdo->prepare("SELECT * FROM documentos_externos WHERE fecha_registro = '$Fecha' ");
$consulta_hoy->execute();
$resultado_hoy = $consulta_hoy->rowCount();
//echo $resultado;

$consulta_pendientes = $pdo->prepare("SELECT * FROM documentos_externos WHERE fecha_registro BETWEEN '0000-00-00' AND '$Fecha' AND  estatus = 1  ");
$consulta_pendientes->execute();
$resultado_pendientes = $consulta_pendientes->rowCount();

$consulta_asuntos = $pdo->prepare("SELECT * FROM actividades WHERE fecha_registro BETWEEN '0000-00-00' AND '$Fecha'");
$consulta_asuntos->execute();
$resultado_asuntos = $consulta_asuntos->rowCount();

$consulta_hoy_asuntos = $pdo->prepare("SELECT * FROM actividades WHERE fecha_registro = '$Fecha' ");
$consulta_hoy_asuntos->execute();
$resultado_hoy_asuntos = $consulta_hoy_asuntos->rowCount();
//echo $resultado;

$consulta_pendientes_asuntos = $pdo->prepare("SELECT * FROM actividades WHERE fecha_registro BETWEEN '0000-00-00' AND '$Fecha' AND  estado = 0  ");
$consulta_pendientes_asuntos->execute();
$resultado_pendientes_asuntos = $consulta_pendientes_asuntos->rowCount();

$consulta_pendientes_hoy_asuntos = $pdo->prepare("SELECT * FROM actividades WHERE fecha_registro = '$Fecha' AND estado = 0");
$consulta_pendientes_hoy_asuntos->execute();
$resultado_pendientes_hoy_asuntos = $consulta_pendientes_hoy_asuntos->rowCount();




?>

<body>
    <label for="">La fecha de hoy: <?php echo $Fecha;  ?>  </label>
    <label for="">Documentos:</label>
    <table class="table table-sm table-borderless table-striped">
        <tr>
        <td>Documentos registrados (total):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado ."</p>"; ?></td>
        </tr>
        <tr>
        <td>Documentos registrados (hoy):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado_hoy ."</p>"; ?></td>
        </tr>
        <tr>
        <td>Documentos sin asignar (total):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado_pendientes ."</p>"; ?></td>
        </tr>
    </table>
    <label for="">Asuntos:</label>
    <table class="table table-sm table-borderless table-striped">
        <tr>
        <td>Asuntos registrados (total):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado_asuntos ."</p>"; ?></td>
        </tr>
        <tr>
        <td>Asuntos registrados (hoy):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado_hoy_asuntos ."</p>"; ?></td>
        </tr>
        <tr>
        <td>Asuntos sin atender (total):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado_pendientes_asuntos ."</p>"; ?></td>
        </tr>
        <tr>
        <td>Asuntos sin atender (hoy):</td>
        <td><?php echo "<p style='color: blue;'>". $resultado_pendientes_hoy_asuntos ."</p>"; ?></td>
        </tr>
    </table>

    
</body>


