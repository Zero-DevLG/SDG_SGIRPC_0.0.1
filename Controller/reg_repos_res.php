<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    include('../Model/Conexion.php');
    // VARIABLES SESSION
    $id_emp = $_SESSION["id_empleado"];
    $id_direccion_g = $_SESSION["id_direccion"]; 

    // CONSTANTES
    $Fecha = date('Y-m-d');

    // VARIABLES POST
    $id_doc     = $_POST['id_doc'];
    $folio_resp = $_POST['folio_resp'];
    $fecha_resp = $_POST['fecha_resp'];
    $resp_repos = $_POST['resp_repos'];

    try {
        //code...
        //INSERTAMOS LA RESPUESTA
        $sql = $pdo->prepare("INSERT INTO repos_res(id_documento,folio_respuesta,fecha_respuesta,respuesta,fecha_reg_res,id_empleado,id_direccion_gen) VALUES('$id_doc','$folio_resp','$fecha_resp','$resp_repos','$Fecha','$id_emp',$id_direccion_g)");
        $sql->execute();

        // CAMBIAMOS EL ESTADO DEL DOCUMENTO 
        // $sql = $pdo->prepare("UPDATE documentos_externos_2021 SET estatus = 4 WHERE id_documento = '$id_doc'");
        // $sql->execute();


    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }    
?>