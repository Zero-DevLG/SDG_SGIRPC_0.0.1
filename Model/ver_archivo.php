<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("Conexion.php");

$id_documento = $_POST['id_documento'];
$Fecha = date('Y-m-d');

$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '" . $id_documento . "' ORDER BY tipo_archivo");
$consulta_archivo->execute();
$lista_archivo2 = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
$count2 = $consulta_archivo->rowCount();

?>

<?php if ($count2 == 0) { ?>
<img style="position: relative; left: 150px;" src="../img/null_a2.jpg">

<?php } else { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="form-group">
        <div class="form-row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12">
                <div class="container" style="width: 80%;">
                    <table class='table table-sm table-bordered'>
                        <thead class='table-success'>
                            <th>Nombre del archivo</th>
                            <th>Tipo de Archivo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_archivo2 as $mostrar) { ?>
                            <tr>
                                <td><a href="<?php echo $mostrar['url']; ?>"><?php echo $mostrar['a_nombre']; ?></a>
                                </td>
                                <td><?php echo $mostrar['tipo_archivo']; ?></td>
                                <td><a href="#"><img src="../img/iconos/eliminar.png"
                                            title="Generar solicitud para  eliminar este elemento" width="40px"></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>