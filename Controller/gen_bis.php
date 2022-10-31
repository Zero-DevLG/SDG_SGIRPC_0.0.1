<?php
    session_start();
   require('../Model/Conexion.php');
    date_default_timezone_set("America/Mexico_City");
    $id_e = $_SESSION['id_empleado'];
    $Fecha = date('Y-m-d');
    $option = $_POST['option'];
    $id = $_POST['id_documento'];
    $response = "";
    //$get_date = $pdo->prepare("SELECT fecha_registro FROM documentos_externos WHERE id_documento = '$id'");
    //$get_date ->execute();
    //$date = $get_date->fetchColumn();
    
       switch($option){
                case 1:
                    $get_folio = $pdo->prepare("SELECT de.folio,di.direccion FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE de.id_documento = '$id'");
                    $get_folio->execute();
                    $folio = $get_folio->fetchAll(PDO::FETCH_ASSOC);
                    foreach($folio as $get){
                        $folio2 = $get['folio'];
                        $dir = $get['direccion'];
                    }

                    $folio2 = $folio2 . "-BIS";
                    $insert_open = $pdo->prepare("INSERT INTO open_folio(id_documento,id_direccion,folio,date_open,active) VALUES('$id','$dir','$folio2','$Fecha',1)");
                    $insert_open->execute();
                    
                    echo "Se genero correctamente el BIS :". $folio2 ." este estara disponible en la opcion de folios libres para su uso";
                break;
                    case 2:
                        $get_max = $pdo->prepare("SELECT MAX(id_documento) FROM documentos_externos");
                        $get_max->execute();
                        $max = $get_max->fetchColumn();
                        $locate_doc = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$id'");
                        $locate_doc->execute();
                        $rows = $locate_doc->rowCount();
                        if($rows > 0){
                            $num = $locate_doc->fetchColumn();
                            $num2 = $num . "-BIS";
                            $max_u = $max + 1;
                            $insert_bis_1 = $pdo->prepare("INSERT INTO op_control(id_documento,siglas,num,bis) VALUES('$max_u','$num2','$num',1)");
                            $insert_bis_1->execute();
                            $insert_doc = $pdo->prepare("INSERT INTO documentos_externos(folio,id_empleado_r,op_control,estatus,id_direccion,tipo_documento,id_organismo) VALUES(null,'$id_e','$num2',1,1,1,24)");
                            $insert_doc->execute();
                           // documentos_externos(id_documento,n_oficio,folio,tipo_documento,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,asunto,estatus,id_direccion,op_control,anexos,comentario
                        }else{
                            $locate_doc_2 = $pdo->prepare("SELECT num FROM op_control_t WHERE id_documento = '$id'");
                            $locate_doc_2->execute();
                            $num = $locate_doc_2->fetchColumn();
                            $num2 = $num . "-BIS";
                            $max_u = $max + 1;
                            $insert_bis_1 = $pdo->prepare("INSERT INTO op_control_t(id_documento,siglas,num,bis) VALUES('$max_u','$num2','$num',1)");
                            $insert_bis_1->execute();
                            $insert_doc = $pdo->prepare("INSERT INTO documentos_externos(folio,id_empleado_r,op_control,estatus,id_direccion,tipo_documento,id_organismo) VALUES(null,'$id_e','$num2',1,1,1,24)");
                            $insert_doc->execute();
                        }
                       
                      
                        echo "Se genero el BIS: " . $num2. " este sera visible en el partado de generados";
                        break;
       }

    




?>