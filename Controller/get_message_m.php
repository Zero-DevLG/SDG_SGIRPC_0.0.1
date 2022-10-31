<?php
    require('../Model/Conexion.php');
    date_default_timezone_set("America/Mexico_City");
    $Fecha = date('Y-m-d');
    $id = $_POST['id'];

    //$data = array();
    $find_message = $pdo->prepare("SELECT message_dev,id_empleado FROM message_develop WHERE id_empleado = 44 order by id_message desc limit 1");
    $find_message->execute();
    $message = $find_message->fetchAll(PDO::FETCH_ASSOC);
    foreach($message as $get){
        $message = $get['message_dev'];
        $id_empleado = $get['id_empleado'];
    }
    $data = array("0" => $message, "1" => $id_empleado);
    echo json_encode($data);

?>
