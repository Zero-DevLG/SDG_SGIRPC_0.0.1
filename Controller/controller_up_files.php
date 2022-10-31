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
    $id_documento = $_POST['id_documento'];
    $tipo = $_POST['tipo'];


           //Obtenemos el id de la direccion particular, jud o coordinacion en caso de que el empleado este adscrito a una
           $sql =  $pdo->prepare("SELECT id_dir_s,id_jc FROM empleado WHERE id_empleado = '$id_e'");
           $sql->execute();
           $data = $sql->fetchAll(PDO::FETCH_ASSOC);

           foreach($data as $get)
           {
               $id_dir_p = $get['id_dir_s'];
               $id_jc = $get['id_jc'];
           }

           if($id_dir_p != 0 || $id_jc != 0)
           {
               //OBTENEMOS EL ID del documento
            //    $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones WHERE id_instruccion = '$id_documento'");
            //    $sql->execute();
            //    $id_documento = $sql->fetchColumn();
           }



    switch($tipo)
    {
       case 1:
        switch($dir_general){

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

            $sql = $pdo->prepare("INSERT INTO archivo_instruccion(id_documento,url,a_nombre,id_direccion_general,id_direccion_p,id_jc) VALUES('$id_documento','$url','$nombre','$dir_general','$id_dir_p','$id_jc')");
            $sql->execute();
        
            move_uploaded_file($nombre_temporal, $url);
       break;
       case 2:
        switch($dir_general){

            case '18':
                $url = "../repos_dir/AS/repos_at/" . $nombre;
            break;

            case '16':
                $url = "../repos_dir/DGVCD/repos_at/" . $nombre;
            break;

            case '15':
                $url = "../repos_dir/DEAF/repos_at/" . $nombre;
            break;

            case '13':
                $url = "../repos_dir/DGAR/repos_at/" . $nombre;
            break;

            case '10':
                $url = "../repos_dir/DGTO/repos_at/" . $nombre;
            break;

            case '9':
                $url = "../repos_dir/DGR/repos_at/" . $nombre;
            break;

            case '8':
                $url = "../repos_dir/DEAJ/repos_at/" . $nombre;
            break;

        }
        
        //Obtenemos el ultimo registro

        $sql = $pdo->prepare("SELECT MAX(id_doc_at) FROM documentos_atendidos");
        $sql->execute();
        $max_id = $sql->fetchColumn();


        $sql = $pdo->prepare("INSERT INTO archivo_response(id_documento,url,a_nombre,id_direccion_general,id_direccion_p,id_jc,id_doc_at) VALUES('$id_documento','$url','$nombre',$dir_general,'$id_dir_p','$id_jc','$max_id')");
        $sql->execute();
        move_uploaded_file($nombre_temporal, $url);
       break; 
    } 

   
    



?>
