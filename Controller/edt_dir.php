<?php
    include("../Model/Conexion.php");

    $dir = $_POST['direccion'];
    $id_documento = $_POST['id_documento'];

    $update_dir = $pdo->prepare("UPDATE documentos_externos SET id_direccion = '$dir' WHERE id_documento = '$id_documento'");
    $update_dir->execute();


?>