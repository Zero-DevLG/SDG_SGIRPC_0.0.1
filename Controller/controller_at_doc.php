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

    switch($dir_general)
                {
                    case '18':
                        $folio_s = 'AS-' . $folio . '-' . $Year;
                    break;

                    case '16':
                        $folio_s = 'DGVCD-' . $folio . '-' . $Year;
                    break;
                    
                    case '15':
                        $folio_s = 'DEAF-' . $folio . '-' . $Year;
                    break;

                    case '13':
                        $folio_s = 'DGAR-' . $folio . '-' . $Year;
                    break;

                    case '10':
                        $folio_s = 'DGTO-' . $folio . '-' . $Year;
                    break;

                    case '9':
                        $folio_s = 'DGR-' . $folio . '-' . $Year;
                    break;

                    case '8':
                        $folio_s = 'DEAJ-' . $folio . '-' . $Year;
                    break;
                }



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
            //OBTENEMOS EL ID de la instruccion
            $id_inst = $id_documento;
            //Cambiamos el estatus de la instruccion
            $sql = $pdo->prepare("UPDATE instrucciones_direcciones SET estatus_ins = 1 WHERE id_instruccion = '$id_inst'");
            $sql->execute();
            //OBTENEMOS EL ID del documento
            $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones WHERE id_instruccion = '$id_documento'");
            $sql->execute();
            $id_documento = $sql->fetchColumn();
        }


         //Registramos la respuesta
            $sql = $pdo->prepare("INSERT INTO documentos_atendidos(id_documento,id_direccion_general,response,date_response,folio_response,date_reg,id_emp,id_dir_p,id_jc) VALUES('$id_documento','$dir_general','$response','$date_response','$folio','$fecha','$id_e','$id_dir_p','$id_jc')");
            $sql->execute();
       
        if($id_dir_p == 0 && $id_jc == 0)
        {
            //             if($folio)
            //             {   
            //                  //Cambiamos el estatus del folio en caso de que haya sido usado o no
            //                 $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 3, date_use = '$fecha', id_emp_use = '$id_e' WHERE folio_temp='$folio'");
            //                 $sql->execute();
            //             }
            //             else{
            //                 $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 1 WHERE folio_temp='$folio'");
            //                 $sql->execute();
            //             }
            // 

            //Obtenemos el ultimo estado del contador
            $sql = $pdo->prepare("SELECT contador_dir FROM control_sp WHERE id_direccion = '$dir_general'");
            $sql->execute();
            $ca = $sql->fetchColumn();

            $cn = $ca + 1;

            //Insertamos el nuevo estado del contador

            $sql = $pdo->prepare("UPDATE control_sp SET contador_dir = '$cn' WHERE id_direccion = '$dir_general'");
            $sql->execute();
        }

        
      
        //Cambiamos el estatus del documento general
            $sql = $pdo->prepare("UPDATE documentos_externos SET  estatus = 4 WHERE id_documento = '$id_documento'");
            $sql->execute();
        //Finaliza proceso
        echo "Documento atendido correctamente";
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
  





?>