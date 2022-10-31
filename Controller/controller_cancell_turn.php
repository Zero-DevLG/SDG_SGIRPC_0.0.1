<?php
     session_start();
     date_default_timezone_set("America/Mexico_City");
     include('../Model/Conexion.php');
     $date = date('Y-m-d');
     $time = date('H:i:s');
     $id_documento = $_POST['id_documento'];
    $option = $_POST['option'];
    try {

        switch($option)
        {
            case 1 :
                    //code...
                //Obtenemos el folio_code del turno
                $sql = $pdo->prepare("SELECT DISTINCT folio_code FROM instrucciones_direcciones WHERE id_documento = '$id_documento'");
                $sql->execute();
                $folio_code = $sql->fetchColumn();

                //Se cambia el estatus del folio
                $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 1 WHERE folio_temp='$folio_code'");
                $sql->execute();
                //Se eliminara la instruccion de direccion
                $sql = $pdo->prepare("DELETE  FROM instrucciones_direcciones WHERE id_documento = '$id_documento'");
                $sql->execute();
                //Se cambia el estatus del documento general
                $sql = $pdo->prepare("UPDATE documentos_externos SET estatus = 2 WHERE id_documento = '$id_documento'");
                $sql->execute();
                //Se borraran todos los documentos adjuntos a esa instruccion
                    //Se obtienen todos los registros
                $sql = $pdo->prepare("SELECT a.id_archivo_dir,a.url FROM archivo_instruccion as a WHERE id_documento = '  $id_documento'");
                $sql->execute();
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);    
                    //Se procede a elimnar los archivos del disco local
                foreach($data as $get)
                {
                    if(unlink($get['url'])){
                        //Si se completa el borrado del archivo se procede a borrar su registro en la BD
                        $sql = $pdo->prepare("DELETE  FROM archivo_instruccion WHERE id_archivo_dir = '$get[id_archivo_dir]'");
                        $sql->execute();
                    }
                }

                // //Se almcena la accion en los logs
                // $sql = $pdo->prepare("INSERT INTO logs(id_usr,accion,id_documento,fecha_accion,hora_accion) VALUES()");
                // $sql->execute();



                echo "Registro borrado exitosamente";
            break;
            case 2 :
                
            break;
        }

        
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }

   
    



?>