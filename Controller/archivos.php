<?php
session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("../Model/Conexion.php");


$Fecha = date('Y-m-d');

//Metodo 2

if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
   #Todo tu codigo si el archivo se recibió correctamente.
   $documento= $_POST["documento"];
   $file = $_FILES['file']['name'];

   $url = "../imagenes/" . $nombre;
$tipo_archivo = 1;

$sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES(:id_documento,:url,:a_nombre,:tipo_archivo)");
$sentencia_ia->bindParam(':id_documento', $id_documento);
$sentencia_ia->bindParam(':url', $url);
$sentencia_ia->bindParam(':a_nombre', $nombre);
$sentencia_ia->bindParam(':tipo_archivo', $tipo_archivo);

$sentencia_ia->execute();


}




$id_documento = $_POST['txtid_documento2'];
$nombre_temporal = $_FILES['archivo']['tmp_name'];
$nombre = $_FILES['archivo']['name'];
move_uploaded_file($nombre_temporal, '../imagenes/' . $nombre);




/*
$fecha = new DateTime();
$tmp_name = $archivo_e;
$nombreArchivo = $archivo_e;
//$tmpFoto = $_FILES["archivo_e"]["name"];
if ($tmp_name != "") {
    move_uploaded_file($tmp_name, "../imagenes/" . $nombreArchivo);
*/
$url = "../imagenes/" . $nombre;
$tipo_archivo = 1;

$sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre,tipo_archivo) VALUES(:id_documento,:url,:a_nombre,:tipo_archivo)");
$sentencia_ia->bindParam(':id_documento', $id_documento);
$sentencia_ia->bindParam(':url', $url);
$sentencia_ia->bindParam(':a_nombre', $nombre);
$sentencia_ia->bindParam(':tipo_archivo', $tipo_archivo);

$sentencia_ia->execute();
//}

/*
if (isset($_FILES["archivo_ac"])) {

    $archivo_ac = (isset($_FILES['archivo_ac']["name"])) ? $_FILES['archivo_ac'] : "";


    $fecha = new DateTime();
    $tmp_name = $archivo_ac;
    $nombreArchivo = $archivo_ac["name"];
    $tmpFoto = $_FILES["archivo_ac"]["name"];
    if ($tmp_name != "") {
        move_uploaded_file($tmp_name, "../imagenes/" . $nombreArchivo);

        $url = "../imagenes/" . $nombreArchivo;
        $tipo_archivo = 3;

        $sentencia_ia = $pdo->prepare("INSERT INTO archivos (id_documento,url,a_nombre,tipo_archivo) VALUES (:id_documento,:url,:a_nombre,:tipo_archivo)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombreArchivo);
        $sentencia_ia->bindParam(':tipo_archivo', $tipo_archivo);

        $sentencia_ia->execute();
    }
}





//Preguntamos si nuestro arreglo 'archivos' fue definido
if (isset($_FILES["archivos"])) {
    //de se asi, para procesar los archivos subidos al servidor solo debemos recorrerlo
    //obtenemos la cantidad de elementos que tiene el arreglo archivos
    $tot = count($_FILES["archivos"]["name"]);
    //este for recorre el arreglo
    for ($i = 0; $i < $tot; $i++) {
        //con el indice $i, poemos obtener la propiedad que desemos de cada archivo
        //para trabajar con este
        $tmp_name = $_FILES["archivos"]["tmp_name"][$i];
        $name = $_FILES["archivos"]["name"][$i];
        if ($tmp_name != "") {
            $tipo_archivo = 2;
            $url = "../imagenes/" . $name;
            move_uploaded_file($tmp_name, "../imagenes/" . $name);
            $sentencia_0 = $pdo->prepare("INSERT INTO archivos (id_documento,url,a_nombre,tipo_archivo) VALUES ('$id_documento','$url','$name','$tipo_archivo')");
            $sentencia_0->execute();
        }


        // echo("<b>Archivo </b> $key ");
        echo ("<br />");
        echo ("<b>el nombre original:</b> ");
        echo ($name);
        echo ("<br />");
        echo ("<b>el nombre temporal:</b> \n");
        echo ($tmp_name);
        echo ("<br />");
    }
}

//header("location:../View/tabla_consulta.php");

*/