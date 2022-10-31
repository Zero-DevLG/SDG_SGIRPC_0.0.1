<?php
    session_start();
    require("../Model/Conexion.php");
    $id_usr = $_SESSION['id_empleado'];
    $delete_pointer = $pdo->prepare("DELETE  FROM temp_doc_usr WHERE id_user = '$id_usr'");
    $delete_pointer->execute();
    $sql = $pdo->prepare("UPDATE empleado SET online = 0 WHERE id_empleado = '$id_usr'");
    $sql->execute();
    session_destroy();
    header("location:../index.php");