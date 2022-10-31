<?php
    session_start();
     require('../Model/Conexion.php');
     date_default_timezone_set("America/Mexico_City");
    $usr = $_SESSION['id_empleado'];
    echo $usr;
    

?>