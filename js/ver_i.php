<?php
session_start();
require('../Model/Conexion.php');

$id_documento = $_POST['id_documento'];

$consulta_ins = $pdo->prepare("SELECT DISTINCT d.n_folio,d.fecha_registro,td.descripcion,e.descripcion,er.direccion,i.n_instruccion,di.id_instruccion,di.fecha_limite,di.prioridad from documentos as d INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN documento_ciclo as dc ON di.direccion = dc.ubicacion INNER JOIN estado as e ON e.id_estado = dc.estado INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN instrucciones as i ON i.id_instruccion = di.instruccion INNER JOIN equipo_registro as er ON er.id_direccion = dc.ubicacion WHERE d.id_documento = '" . $id_documento . "' AND (dc.estado = 4 OR dc.estado = 5 OR dc.estado = 5 OR dc.estado = 6 OR dc.estado =7 OR dc.estado = 8) ");
$consulta_ins->execute();
$lista_ins = $consulta_ins->execute();
$count_i = $consulta_ins->rowCount();
?>


<?php if ($count_i == 0) { ?>
<img src="../img/null_i.jpg" id="null_i">
<?php } else { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <title>Document</title>
</head>

<body>
    <table id="v_ins" class="table table-sm table-bordered">
        <thead class='table-info'>
            <th>Folio</th>
            <th>Fecha registro</th>
            <th>Estado</th>
            <th>Ubicacion</th>
            <th>Instruccion</th>
            <th>Fecha limite</th>
            <th>Prioridad</th>
        </thead>
        <tbody>
            <?php foreach ($consulta_ins as $mostrar) { ?>
            <tr>
                <td><?php echo $mostrar['n_folio']; ?></td>
                <td><?php echo $mostrar['fecha_registro']; ?></td>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <td><?php echo $mostrar['direccion']; ?></td>
                <td><?php echo $mostrar['n_instruccion']; ?></td>
                <td><?php echo $mostrar['fecha_limite']; ?></td>
                <td><?php echo $mostrar['prioridad']; ?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</body>

</html>
<?php } ?>