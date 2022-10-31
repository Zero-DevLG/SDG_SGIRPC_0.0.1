<?php
session_start();
require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");
$op_control_o = $_POST['op_control'];


$list = $pdo->prepare("SELECT bi.id_documento,de.op_control FROM bis as bi INNER JOIN documentos_externos as de ON de.id_documento = bi.id_documento WHERE bi.op_control='$op_control_o'");
$list->execute();
$list_bis = $list->fetchAll(PDO::FETCH_ASSOC);


?>

<table id="lista_bis" class="table table-sm table-borderless">
    <thead>
        <th>Bis</th>
    </thead>
    <tbody>
        <th>
            <?php foreach ($list_bis as $show) { ?>
            <tr>
                <td><?php echo $show['id_documento']; ?></td>
                <td><?php echo $show['op_control']; ?></td>
            </tr>
            <?php } ?>
        </th>
    </tbody>
</table>