<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    if (!isset($_SESSION["usuario"])) {
        header("location:index.php");
    }
    include("../Model/Conexion.php");
    
    
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {

        $id_documento = $_POST["documento"];
    $consulta_cat = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$id_documento'");
    $consulta_cat->execute();
    $row_cat = $consulta_cat->rowCount();
    $consulta_cat3 = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$id_documento'");
    $consulta_cat3->execute();
    $row_cat3 = $consulta_cat3->rowCount();
    if ($row_cat3 != 0) {
        $nombre = $_FILES['file']['name'];
        $nombre = $nombre . "-AC";
        //$nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];

        //echo "El documento es: " . $id_documento;
        //echo "El archivo es: " . $nombre;
        //echo "El archivo temp  es: " . $nombre_temporal;


        $url = "../repos/doc_AC/" . $nombre;

        $tipo_archivo = 3;
        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES(:id_documento,:url,:a_nombre,:tipo_archivo)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);
        $sentencia_ia->bindParam(':tipo_archivo', $tipo_archivo);

        $sentencia_ia->execute();

        move_uploaded_file($nombre_temporal, '../repos/doc_AC/' . $nombre);
    }else if ($row_cat != 0) {
        $nombre = $_FILES['file']['name'];
        $nombre = $nombre . "-A";
        //$nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];

        //echo "El documento es: " . $id_documento;
        //echo "El archivo es: " . $nombre;
        //echo "El archivo temp  es: " . $nombre_temporal;


        $url = "../repos/doc_areas/" . $nombre;

        $tipo_archivo = 3;
        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES(:id_documento,:url,:a_nombre,:tipo_archivo)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);
        $sentencia_ia->bindParam(':tipo_archivo', $tipo_archivo);
        $sentencia_ia->execute();

        move_uploaded_file($nombre_temporal, '../repos/doc_areas/' . $nombre);
    } else {
        $nombre = $_FILES['file']['name'];
        $nombre = $nombre . "-T";
        //$nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];

        //echo "El documento es: " . $id_documento;
        //echo "El archivo es: " . $nombre;
        //echo "El archivo temp  es: " . $nombre_temporal;


        $url = "../imagenes/" . $nombre;

        $tipo_archivo = 3;
        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES(:id_documento,:url,:a_nombre,:tipo_archivo)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);
        $sentencia_ia->bindParam(':tipo_archivo', $tipo_archivo);
        $sentencia_ia->execute();

        move_uploaded_file($nombre_temporal, '../imagenes/' . $nombre);
    }
}
    


?>