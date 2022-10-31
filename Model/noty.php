<?php
session_start();
include("Conexion.php");
$dir = $_POST['direccion'];
$usr = $_SESSION['id_empleado'];
//echo $dir;
//echo $usr;

$sql1 = $pdo->prepare("SELECT e.foto,l.accion,l.id_documento,d.n_folio,l.fecha_accion from logs as l INNER JOIN empleado as e ON l.id_usr = e.id_empleado INNER JOIN documentos as d ON d.id_documento = l.id_documento  WHERE l.id_direccion='$dir' AND l.id_usr NOT IN ('$usr')");
$sql1->execute();
$lista_n = $sql1->fetchAll(PDO::FETCH_ASSOC);
$row = $sql1->rowCount();

$row2 = json_encode($row);

//print_r($lista_n);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table table-secondary">
        <tbody>
            <?php foreach ($lista_n as $mostrar) { ?>
            <tr>
                <td> <img src="../imagenes/<?php echo $mostrar['foto']; ?> " style="width: 30px;">
                </td>
                <td><?php echo $mostrar['accion']; ?></td>
                <td><?php echo $mostrar['n_folio']; ?></td>
                <td><?php echo $mostrar['fecha_accion']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>




<script>
var num = JSON.parse('<?php echo $row2; ?>');
</script>