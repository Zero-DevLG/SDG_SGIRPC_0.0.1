<?php

    $mysqli = new mysqli("localhost","gerencia","12345","copy_d");

    // Comprobar conexion

    if($mysqli->connect_errno)
    {
        printf("2");
        //exit();
    }

    /// Comprobar si el servidor sigue vivo

    if($mysqli->ping())
    {
        printf("1");
    }else{
        printf("2");
    }


    // Cerrar conexion 

    $mysqli->close();


?>