
<?php
    require('../Model/Conexion.php');
    date_default_timezone_set("America/Mexico_City");
    $Fecha = date('Y-m-d');

    $find_message = $pdo->prepare("SELECT Max(id_message) FROM message_develop");
    $find_message->execute();
    $rows = $find_message->fetchColumn();
    echo $rows;


?>
