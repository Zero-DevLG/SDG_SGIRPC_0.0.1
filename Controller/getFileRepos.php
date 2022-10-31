<?php
require('../Model/Conexion.php');


    //VARIABLES POST
    $id_documento = $_POST['id-document'];

    // Obtenemos la url del archivo
    $sql = $pdo->prepare("SELECT url FROM archivos_repos WHERE id_documento = '$id_documento'");
    $sql->execute();
    $url_file = $sql->fetchColumn();

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$url_file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

 // Read the file
 if( readfile($url_file))
 {
    echo "Exito";
 }else{
    echo "Error";
 }



?>