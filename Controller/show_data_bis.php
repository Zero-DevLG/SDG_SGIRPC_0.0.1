<?php
session_start();
require('../Model/conexion.php');
date_default_timezone_set("America/Mexico_City");
$folio_o = $_POST['folio_o'];


$list = $pdo->prepare("SELECT folio_bis FROM bis WHERE folio='$folio_o'");
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
                <td><?php echo $show['folio_bis'] ?></td>
            </tr>
            <?php } ?>
        </th>
    </tbody>
</table>