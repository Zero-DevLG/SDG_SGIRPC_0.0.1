<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    require('../Model/Conexion.php');
    $date_reg = date('Y-m-d');
    $mDate = new DateTime();
    $hora = $mDate->format("H:i:s");
    $id = $_POST['id'];
    $date = $_POST['date'];
    $folio_res = $_POST['folio_resp'];
    $id_empleado = $_SESSION['id_empleado'];
    $file = $_FILES['file']['name'];
    $url = '../repos_resp/';
    $type = '3';

    try {
        $sql = $pdo->prepare("INSERT INTO doc_resp(id_documento,date_resp,date_reg,id_emp_reg,file,folio_res) VALUES('$id','$date','$date_reg','$id_empleado','','$folio_res')");
        $sql->execute();
    
    
        $sql2 = $pdo->prepare("SELECT id_resp FROM doc_resp WHERE id_documento = '$id'");
        $sql2->execute();
        $id_resp = $sql2->fetchColumn();
    
        $sql3 = $pdo->prepare("UPDATE documentos_externos SET id_resp ='$id_resp' WHERE id_documento = '$id'");
        $sql3->execute();

        $nombre_temporal = $_FILES['file']['tmp_name'];
        move_uploaded_file($nombre_temporal, '../repos_resp/' . $file);

        $sql_a = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES('$id','$url','$file','$type')");
        $sql_a->execute();

        $sql4 = $pdo->prepare("UPDATE documentos_externos SET estatus = 9 WHERE id_documento = '$id'");
        $sql4->execute();

        $sql5 = $pdo->prepare("INSERT INTO logs(id_usr,accion,id_documento,fecha_accion,hora_accion) VALUES('$id_empleado','Se respondio el documento','$id','$date_reg','$hora')");
        $sql5->execute();

        echo "Respuesta registrada";

    } catch (\Throwable $th) {
        echo $th;
    }


  

?>


