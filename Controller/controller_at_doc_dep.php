<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    include('../Model/Conexion.php');
    
    //Constantes
    $dir_general = $_SESSION["id_direccion"];
    $id_e = $_SESSION["id_empleado"];
    $fecha = date('Y-m-d H:i:s');
    $Year = date("Y");

    //Variables
    $id_documento = $_POST['id_documento'];
    $folio = $_POST['folio'];
    $date_response = $_POST['f_r'];
    $response = htmlspecialchars($_POST['response']);

  
    // echo "id_documento " .  $id_documento;

    try {

        //Obtenemos el id de la direccion particular, jud o coordinacion en caso de que el empleado este adscrito a una
        $sql =  $pdo->prepare("SELECT id_dir_s, id_jc FROM empleado WHERE id_empleado = '$id_e'");
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $get)
        {
            $id_dir_p = $get['id_dir_s'];
            $id_jc = $get['id_jc'];
        }

        if($id_dir_p != 0 || $id_jc != 0)
        {

            //Si la instruccion es unicamente atendida por direccion
            if($id_jc == 0){
              //Obtenemos el ID de la instruccion de la direccion general
              $sql =  $pdo->prepare("SELECT id_instruccion FROM instrucciones_direcciones WHERE id_documento = '$id_documento'");
              $sql->execute();
              $id_instruccion_g = $sql->fetchColumn();
              //Se   actualiza el estatus de la instruccion
              $sql = $pdo->prepare("UPDATE instrucciones_direcciones SET estatus_ins = 1 WHERE id_instruccion = '$id_instruccion_g'");
              $sql->execute();
            }
            //OBTENEMOS EL ID de la instruccion
            //$id_inst = $id_documento;
            $sql = $pdo->prepare("SELECT id_instruccion_p FROM instruccion_direccion_p WHERE id_documento = '$id_documento' AND  id_jc = '$id_jc'");
            $sql->execute();
            $id_inst_p = $sql->fetchColumn();
            //Cambiamos el estatus de la instruccion
            $sql = $pdo->prepare("UPDATE instruccion_direccion_p SET estatus = 1 WHERE id_instruccion_p = '$id_inst_p'");
            $sql->execute();
            //OBTENEMOS EL ID del documento
            // $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones WHERE id_instruccion = '$id_documento'");
            // $sql->execute();
            // $id_documento = $sql->fetchColumn();
        }else{
            $sql = $pdo->prepare("UPDATE documentos_externos SET  estatus = 4 WHERE id_documento = '$id_documento'");
            $sql->execute();
        }


         //Registramos la respuesta
            $sql = $pdo->prepare("INSERT INTO documentos_atendidos(id_documento,id_direccion_general,response,date_response,folio_response,date_reg,id_emp,id_dir_p,id_jc) VALUES('$id_documento','$dir_general','$response','$date_response','$folio','$fecha','$id_e','$id_dir_p','$id_jc')");
            $sql->execute();
       
    

        
      
        //Cambiamos el estatus del documento general
           
        //Finaliza proceso
        echo "Documento atendido correctamente";
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
  





?>