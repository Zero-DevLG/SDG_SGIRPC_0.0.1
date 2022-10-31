<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    include('../Model/Conexion.php');
    $dir_general = $_SESSION["id_direccion"];
    $id_e = $_SESSION["id_empleado"];
    $fecha = date('Y-m-d H:i:s');
    
    ///VARIABLES POST
    $nombre = $_FILES['file']['name'];
    $nombre_temporal = $_FILES['file']['tmp_name'];
    //$id_documento = $_POST['id_documento'];
    $tipo = $_POST['tipo'];
    $id_ins = $_POST['id_ins'];

    //Obtenemos el id del documento
    $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones WHERE id_instruccion = '$id_ins'");
    $sql->execute();
    $id_documento = $sql->fetchColumn();

    switch($tipo)
    {
       case 1:
        switch($dir_general){
            case '13':
                $url = "../repos_dir/DGAR/repos_ins/" . $nombre;
            break;

            case '18':
                $url = "../repos_dir/AS/repos_ins/" . $nombre;
            break;

            case '16':
                $url = "../repos_dir/DGVCD/repos_ins/" . $nombre;
            break;

            case '15':
                $url = "../repos_dir/DEAF/repos_ins/" . $nombre;
            break;

            case '13':
                $url = "../repos_dir/DGAR/repos_ins/" . $nombre;
            break;

            case '10':
                $url = "../repos_dir/DGTO/repos_ins/" . $nombre;
            break;

            case '9':
                $url = "../repos_dir/DGR/repos_ins/" . $nombre;
            break;

            case '8':
                $url = "../repos_dir/DEAJ/repos_ins/" . $nombre;
            break;

        }
    
        $sql = $pdo->prepare("INSERT INTO archivo_instruccion(id_documento,url,a_nombre) VALUES('$id_documento','$url','$nombre')");
        $sql->execute();
    
        move_uploaded_file($nombre_temporal, $url);
       break;
       
       case 2:
        switch($dir_general){
            case '13':
                $url = "../repos_dir/DGAR/repos_at/" . $nombre;
            break;
        }
    
        $sql = $pdo->prepare("INSERT INTO archivo_response(id_documento,url,a_nombre) VALUES('$id_documento','$url','$nombre')");
        $sql->execute();
    
        move_uploaded_file($nombre_temporal, $url);
       break; 
    } 

   
    



?>