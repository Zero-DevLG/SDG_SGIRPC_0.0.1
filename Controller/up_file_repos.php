<?php
      include('../Model/Conexion.php');

      //VARIABLES POST
        $id_doc = $_POST['id_doc'];
        $nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];
        $url = '../../repositorio_sgirpc/repos_past/' . $nombre;

        try {
            //code...
            if(move_uploaded_file($nombre_temporal, $url))
            {
                $sql = $pdo->prepare("INSERT INTO archivos_repos(id_documento,url,a_nombre) VALUES('$id_doc','$url','$nombre')");
                $sql->execute();
            }else{
                echo "Error al adjuntar documento";
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }

?>