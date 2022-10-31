<?php
    require('../Model/Conexion.php');
    header('Content-Type: text/html; charset=iso-8859-1');
    date_default_timezone_set("America/Mexico_City");

    $id = $_POST['id'];
    $folio = $_POST['folio'];
    $date_r = $_POST['date_r'];
    $res = $_POST['res'];
    $Fecha = date('Y-m-d');

   

    try{
        $sql_ins = $pdo ->prepare("INSERT INTO tem_res(id_documento,folio_res,date_res,date_reg_res,res) VALUES('$id','$folio','$date_r','$Fecha','$res')");
        $sql_ins->execute();

        $update_doc = $pdo->prepare("UPDATE documentos_externos SET estatus = 701 WHERE id_documento = '$id'");
        $update_doc->execute();

        

        echo "Respuesta registrada correctamente, el documento se movera al apartado de DOCUMENTOS ATENDIDOS";
    }catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


?>