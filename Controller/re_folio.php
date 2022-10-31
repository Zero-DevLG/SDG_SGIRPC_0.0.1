<?php
    require('../Model/Conexion.php');
    date_default_timezone_set("America/Mexico_City");
    $Fecha = date('Y-m-d');
    $option = $_POST['option'];
    $id = $_POST['id_documento'];
    $response = "";
    $get_date = $pdo->prepare("SELECT fecha_registro FROM documentos_externos WHERE id_documento = '$id'");
    $get_date ->execute();
    $date = $get_date->fetchColumn();
    /*if($date != $Fecha)
    {   
        $response = "Esta opcion solo es valida para documentos con fecha de registro del: " . $Fecha;
        echo $response;
    }else
    {*/
       switch($option){
                case 1:
                    $get_folio = $pdo->prepare("SELECT de.folio,di.direccion FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE de.id_documento = '$id'");
                    $get_folio->execute();
                    $folio = $get_folio->fetchAll(PDO::FETCH_ASSOC);
                    foreach($folio as $get){
                        $folio2 = $get['folio'];
                        $dir = $get['direccion'];
                    }
                    $insert_open = $pdo->prepare("INSERT INTO open_folio(id_documento,id_direccion,folio,date_open,active) VALUES('$id','$dir','$folio2','$Fecha',1)");
                    $insert_open->execute();
                    $change_route = $pdo->prepare("UPDATE documentos_externos SET estatus = 1 WHERE id_documento='$id'");
                    $change_route->execute();
                    $delete_ins = $pdo->prepare("DELETE FROM documento_instruccion WHERE id_documento = '$id'");
                    $delete_ins->execute();
                    $change_folio = $pdo->prepare("UPDATE documentos_externos SET folio = null WHERE id_documento='$id'");
                    $change_folio->execute();
                    $delete_resp = $pdo->prepare("DELETE FROM doc_ext_res WHERE id_documento = '$id'");
                    $delete_resp->execute();
                    
                    echo "El documento se movio con exito a la seccion de generados y se libero el folio:". $folio2 ." de este documento para ser usado en la opcion de folios libres";
                break;
                case 3:
                    $change_route = $pdo->prepare("UPDATE documentos_externos SET estatus = 2 WHERE id_documento='$id'");
                    $change_route->execute();
                    echo "El documento se movio con exito a la seccion de turnados";
                    break;
                    case 2:
                        $change_route = $pdo->prepare("UPDATE documentos_externos SET estatus = 1 WHERE id_documento='$id'");
                        $change_route->execute();
                        echo "El documento se movio con exito a la seccion de generados";
                        break;

       }

    //}




?>