<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");
    include('../Model/Conexion.php');
    $dir_general = $_SESSION["id_direccion"];
    $id_e = $_SESSION["id_empleado"];
    $fecha = date('Y-m-d H:i:s'); 
    $arrayIdDir = array();
    $arrayNames = array();
    $arrayNames = json_decode($_POST['arrayNames']);


    
    $folio = $_POST['folio'];
    $p = $_POST['p'];
    $f_l = $_POST['f_l'];
    $ct = $_POST['ct'];
    $ins = $_POST['ins'];
    $id_documento = $_POST['id_doc'];
    $id = $_POST['id_doc'];
    $Year = date("Y");
    $i = $_POST['ct'];

    // switch($dir_general)
    //             {
    //                 case '18':
    //                     $folio_s = 'AS-' . $folio . '-' . $Year;
    //                 break;

    //                 case '16':
    //                     $folio_s = 'DGVCD-' . $folio . '-' . $Year;
    //                 break;
                    
    //                 case '15':
    //                     $folio_s = 'DEAF-' . $folio . '-' . $Year;
    //                 break;

    //                 case '13':
    //                     $folio_s = 'DGAR-' . $folio . '-' . $Year;
    //                 break;

    //                 case '10':
    //                     $folio_s = 'DGTO-' . $folio . '-' . $Year;
    //                 break;

    //                 case '9':
    //                     $folio_s = 'DGR-' . $folio . '-' . $Year;
    //                 break;

    //                 case '8':
    //                     $folio_s = 'DEAJ-' . $folio . '-' . $Year;
    //                 break;
    //             }

    try {
        //code...
        //Obtenemos los id de las direcciones
        $max = sizeof($arrayNames);
        for($i = 0; $i < $max; $i++)
        {
            $sql = $pdo->prepare("SELECT id_direccion FROM direccion WHERE  nombre_direccion = '$arrayNames[$i]'");
            $sql->execute();
            $data = $sql->fetchColumn();
            array_push($arrayIdDir,$data);
        }

         //Inserta segun el nuevo array
         $max = sizeof($arrayIdDir);
         for($i=0;$i<$max;$i++)
         {
            $sql = $pdo->prepare("INSERT INTO instrucciones_direcciones(id_documento,folio_dir,id_direccion_general,id_direccion,prioridad,fecha_limite,instruccion,fecha_reg,id_empleado_reg,i,folio_code) VALUES('$id','$folio','$dir_general','$arrayIdDir[$i]','$p','$f_l','$ins','$fecha','$id_e','$ct','$folio')");
            $sql->execute();
         }
        //Cambiando status al folio
        // $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 3, date_use = '$fecha', id_emp_use = '$id_e' WHERE folio_temp = '$folio'");
        // $sql->execute();
        ////Cambiando status del documento
        $sql = $pdo->prepare("UPDATE documentos_externos SET estatus = 3 WHERE id_documento = '$id_documento'");
        $sql->execute();
        /// Se Obtiene el id registrado
        $sql = $pdo->prepare("SELECT MAX(id_instruccion) FROM instrucciones_direcciones");
        $sql->execute();
        $id = $sql->fetchColumn();
        
         //Se aumenta el contador de las direcciones
            //Se obtiene el contador actual
            $sql = $pdo->prepare("SELECT contador_dir FROM control_sp WHERE id_direccion = '$dir_general'");
            $sql->execute();
            $ca = $sql->fetchColumn();

            $nc = $ca + 1;

            //Actualizamos el contador
            $sql = $pdo->prepare("UPDATE control_sp SET contador_dir = '$nc' WHERE id_direccion = '$dir_general'");
            $sql->execute();


        echo $id;

    } catch (\Throwable $th) {
        //throw $th;
    }
?>
