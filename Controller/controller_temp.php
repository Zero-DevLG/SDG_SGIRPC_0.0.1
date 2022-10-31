<?php
    session_start();
    date_default_timezone_set('America/Mexico_City');
    include("../Model/Conexion.php");
        if ($_SESSION['usuario'] == "") {
            header("location:../Controller/cerrar_sesion.php");
        }
    $id_emp     = $_SESSION['id_empleado'];
    $id_dir     = $_SESSION['id_direccion'];
    $folio_a    = $_POST['folio_a'];
    
    $DateAndTime = date(date('Y-m-d H:i:s'));
    $dis = 1;
    
    //Comprobamos si el numero de folio existe
        $sql= $pdo->prepare("SELECT id_temp FROM folio_temp WHERE folio_temp LIKE '%$folio_a%'");
        $sql->execute();
        $id_temp = $sql->fetchColumn();

        if($id_temp){
            $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 1 WHERE id_temp = '$id_temp'");
            $sql->execute();
        }else{
                //Se genera el folio temporal
                $sql = $pdo -> prepare("INSERT INTO folio_temp(folio_temp,id_direccion,disponible,date_reg,id_emp_reg) VALUES('$folio_a','$id_dir','$dis','$DateAndTime','$id_emp')");
                $sql->execute();
        }
   
    

?>