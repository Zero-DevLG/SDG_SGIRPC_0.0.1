<?php

session_start();
date_default_timezone_set("America/Mexico_City");
#$direccion_o = $_SESSION['direccion'];
//header('Content-Type: text/html; charset=iso-8859-1');


include("../Model/Conexion.php");
$id_empleado_r = $_SESSION['id_empleado'];



if($id_empleado_r){
    
$otro = $_POST['otro'];

$Fecha = date('Y-m-d');

try {


  
     $txtorganismo = (isset($_POST['txtorganismo'])) ? $_POST['txtorganismo'] : "";
    $n_oficio = (isset($_POST['n_oficio'])) ? $_POST['n_oficio'] : "";
    $txtfolio = (isset($_POST['txtfolio'])) ? $_POST['txtfolio'] : "";
    $txttipo = (isset($_POST['txttipo'])) ? $_POST['txttipo'] : "";
    $txtfecha_o = (isset($_POST['txtfecha_o'])) ? $_POST['txtfecha_o'] : "";
    $txtremitente = (isset($_POST['txtremitente'])) ? $_POST['txtremitente'] : "";
    $txtfecha_r = (isset($_POST['txtfecha_r'])) ? $_POST['txtfecha_r'] : "";
    $txtcargo_r = (isset($_POST['txtcargo_r'])) ? $_POST['txtcargo_r'] : "";
    $txtAnexos = (isset($_POST['txtAnexos'])) ? $_POST['txtAnexos'] : "";
    $txtComentario = (isset($_POST['txtcomentario'])) ? $_POST['txtcomentario'] : "";
    $txtop_control = (isset($_POST['txtop_control'])) ? $_POST['txtop_control'] : "";
    $txtotro = (isset($_POST['otro'])) ? $_POST['otro'] : "";
    //$txtotro = utf8_encode($txtotro);
    $folio_o = (isset($_POST['folio_o'])) ? $_POST['folio_o'] : "";
    //$folio_o = $_POST['folio_o'];
    $cont = (isset($_POST['cont'])) ? $_POST['cont'] : "";
    //$cont = $_POST['cont'];
    $num = (isset($_POST['num'])) ? $_POST['num'] : "";
    //$num = $_POST['num'];
    $txtestatus = 1;
    $op_c = (isset($_POST['top_c'])) ? $_POST['top_c'] : "";
    //$op_c = $_POST['top_c'];
    //$direccion_cat = $_POST['direccion_cat'];
    $direccion_cat = (isset($_POST['direccion_cat'])) ? $_POST['direccion_cat'] : "";
    $bis = (isset($_POST['bis'])) ? $_POST['bis'] : "";
    //$bis = $_POST['bis'];
    $bis_cat = (isset($_POST['bis_cat'])) ? $_POST['bis_cat'] : "";
    //$bis_cat = $_POST['bis_cat'];
    $cat_of = (isset($_POST['cat_of'])) ? $_POST['cat_of'] : "";
    //$cat_of = $_POST['cat_of'];

    if ($txtotro != "") {
        $if = $pdo->prepare("SELECT nombre_organismo FROM organismo WHERE '$txtotro'");
        $if->execute();
        $row_or = $if->rowCount();
        if ($row_or != 0) {

            $insert_org = $pdo->prepare("INSERT IGNORE INTO organismo(nombre_organismo) VALUES('$txtotro')");
            $insert_org->execute();
        }


        /*$delete_otro = $pdo->prepare("DELETE FROM organismo WHERE nombre_organismo = 'otro'");
        $delete_otro->execute();
    
        $insert_org = $pdo->prepare("INSERT IGNORE INTO organismo(nombre_organismo) VALUES('otro')");
        $insert_org->execute();
        */
    }


    /*
    echo $n_oficio . "<br>";
    echo $txtfolio . "<br>";
    echo $txtfecha_o . "<br>";
    echo $txtfecha_r . "<br>";
    echo $Fecha . "<br>";
    echo $id_empleado_r . "<br>";
    echo $txtorganismo . "<br>";
    echo $txtremitente . "<br>";
    echo $txtcargo_r . "<br>";
    echo $txtasunto . "<br>";
    */

    if ($bis != 1) {
        if($op_c == 52){
            $sentencia = $pdo->prepare("INSERT INTO documentos_externos(n_oficio,tipo_documento,fecha_oficio,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,estatus,id_direccion,op_control,anexos,comentario) VALUES (:n_oficio,:tipo_documento,:fecha_oficio,:fecha_recibido,:fecha_registro,:id_empleado_r,:id_organismo,:remitente,:cargo_r,:estatus,:id_direccion,:op_control,:anexos,:comentario)");
            $sentencia->bindParam(':n_oficio', $n_oficio);
            $sentencia->bindParam(':id_direccion', $direccion_cat);
            $sentencia->bindParam(':op_control', $txtfolio);
            $sentencia->bindParam(':tipo_documento', $txttipo);
            $sentencia->bindParam(':fecha_oficio', $txtfecha_o);
            $sentencia->bindParam(':fecha_recibido', $txtfecha_r);
            $sentencia->bindParam(':fecha_registro', $Fecha);
            $sentencia->bindParam(':id_empleado_r', $id_empleado_r);
            $sentencia->bindParam(':id_organismo', $txtorganismo);
            $sentencia->bindParam(':remitente', $txtremitente);
            $sentencia->bindParam(':cargo_r', $txtcargo_r);
            $sentencia->bindParam(':estatus', $txtestatus);
            $sentencia->bindParam(':anexos',$txtAnexos);
            $sentencia->bindParam(':comentario', $txtComentario);
            $sentencia->execute();

            //Buscamos que no haya un numero eliminado
            $search_free = $pdo->prepare("SELECT num FROM free_num WHERE cat=3");
            $search_free->execute();
            $rows = $search_free->rowCount();
            $num = $search_free->fetchColumn();
            if($rows !=0){

                $select_id_doc = $pdo->prepare("SELECT MAX(id_documento)  FROM documentos_externos");
                $select_id_doc->execute();
                $row_id = $select_id_doc->fetchColumn();
                $insert_op = $pdo->prepare("INSERT INTO op_control_ac(id_documento,num) VALUES('$row_id','$num')");
                $insert_op->execute();
                $delete_free = $pdo->prepare("DELETE  FROM free_num WHERE cat = 3");
                $delete_free->execute();
            }else{
                $sql1 = $pdo->prepare("SELECT contador FROM control_sp WHERE id_direccion = 52");
                $sql1->execute();
                $conteo = $sql1->fetchColumn();
    
                $select_id_doc = $pdo->prepare("SELECT MAX(id_documento)  FROM documentos_externos");
                $select_id_doc->execute();
                $row_id = $select_id_doc->fetchColumn();
    
                $insert_op = $pdo->prepare("INSERT INTO op_control_ac(id_documento,num) VALUES('$row_id','$conteo')");
                $insert_op->execute();
                $nuevo_conteo = $conteo + 1;

                $sql_update = $pdo->prepare("UPDATE control_sp SET contador ='$nuevo_conteo' WHERE id_direccion = 52");
                $sql_update->execute();
            }


        }
        if ($op_c == 200) {


            $sentencia = $pdo->prepare("INSERT INTO documentos_externos(n_oficio,tipo_documento,fecha_oficio,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,estatus,id_direccion,op_control,anexos,comentario) VALUES (:n_oficio,:tipo_documento,:fecha_oficio,:fecha_recibido,:fecha_registro,:id_empleado_r,:id_organismo,:remitente,:cargo_r,:estatus,:id_direccion,:op_control,:anexos,:comentario)");
            $sentencia->bindParam(':n_oficio', $n_oficio);
            $sentencia->bindParam(':id_direccion', $direccion_cat);
            $sentencia->bindParam(':op_control', $txtfolio);
            $sentencia->bindParam(':tipo_documento', $txttipo);
            $sentencia->bindParam(':fecha_oficio', $txtfecha_o);
            $sentencia->bindParam(':fecha_recibido', $txtfecha_r);
            $sentencia->bindParam(':fecha_registro', $Fecha);
            $sentencia->bindParam(':id_empleado_r', $id_empleado_r);
            $sentencia->bindParam(':id_organismo', $txtorganismo);
            $sentencia->bindParam(':remitente', $txtremitente);
            $sentencia->bindParam(':cargo_r', $txtcargo_r);
            $sentencia->bindParam(':estatus', $txtestatus);
            $sentencia->bindParam(':anexos', $txtAnexos);
            $sentencia->bindParam(':comentario',$txtComentario);
            $sentencia->execute();
            //'".utf8_decode($otro)."'
            $search_free = $pdo->prepare("SELECT num FROM free_num WHERE cat=1");
            $search_free->execute();
            $rows = $search_free->rowCount();
            $num = $search_free->fetchColumn();
            if($rows !=0){

                $select_id_doc = $pdo->prepare("SELECT MAX(id_documento)  FROM documentos_externos");
                $select_id_doc->execute();
                $row_id = $select_id_doc->fetchColumn();
    
                $insert_op = $pdo->prepare("INSERT INTO op_control(id_documento,num) VALUES('$row_id','$num')");
                $insert_op->execute();
               

                $delete_free = $pdo->prepare("DELETE  FROM free_num WHERE cat = 1");
                $delete_free->execute();

                




            }else{
                $sql1 = $pdo->prepare("SELECT contador FROM control_sp WHERE id_direccion = 200");
                $sql1->execute();
                $conteo = $sql1->fetchColumn();
    
                $select_id_doc = $pdo->prepare("SELECT MAX(id_documento)  FROM documentos_externos");
                $select_id_doc->execute();
                $row_id = $select_id_doc->fetchColumn();
    
                $insert_op = $pdo->prepare("INSERT INTO op_control(id_documento,num) VALUES('$row_id','$conteo')");
                $insert_op->execute();
                $nuevo_conteo = $conteo + 1;

                $sql_update = $pdo->prepare("UPDATE control_sp SET contador ='$nuevo_conteo' WHERE id_direccion = 200");
                $sql_update->execute();
            }
          
        } else if($op_c == 20) {
            $sentencia = $pdo->prepare("INSERT INTO documentos_externos(n_oficio,tipo_documento,fecha_oficio,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,estatus,id_direccion,op_control,anexos,comentario) VALUES (:n_oficio,:tipo_documento,:fecha_oficio,:fecha_recibido,:fecha_registro,:id_empleado_r,:id_organismo,:remitente,:cargo_r,:estatus,:id_direccion,:op_control,:anexos,:comentario)");
            $sentencia->bindParam(':n_oficio', $n_oficio);
            $sentencia->bindParam(':id_direccion', $direccion_cat);
            $sentencia->bindParam(':op_control', $txtfolio);
            $sentencia->bindParam(':tipo_documento', $txttipo);
            $sentencia->bindParam(':fecha_oficio', $txtfecha_o);
            $sentencia->bindParam(':fecha_recibido', $txtfecha_r);
            $sentencia->bindParam(':fecha_registro', $Fecha);
            $sentencia->bindParam(':id_empleado_r', $id_empleado_r);
            $sentencia->bindParam(':id_organismo', $txtorganismo);
            $sentencia->bindParam(':remitente', $txtremitente);
            $sentencia->bindParam(':cargo_r', $txtcargo_r);
            $sentencia->bindParam(':estatus', $txtestatus);
            $sentencia->bindParam(':anexos', $txtAnexos);
            $sentencia->bindParam(':comentario', $txtComentario);
            $sentencia->execute();

            
            $search_free = $pdo->prepare("SELECT num FROM free_num WHERE cat=2");
            $search_free->execute();
            $rows = $search_free->rowCount();
            $num = $search_free->fetchColumn();
            if($rows !=0){
                $delete_free = $pdo->prepare("DELETE  FROM free_num WHERE cat = 2");
                $delete_free->execute();
                $select_id_doc = $pdo->prepare("SELECT MAX(id_documento)  FROM documentos_externos");
                $select_id_doc->execute();
                $row_id = $select_id_doc->fetchColumn();
           
    
                $insert_op = $pdo->prepare("INSERT INTO op_control_t(id_documento,num) VALUES('$row_id','$num')");
                $insert_op->execute();

            }else{
                $sql1 = $pdo->prepare("SELECT contador FROM control_sp WHERE id_direccion = 20");
            $sql1->execute();
            $conteo = $sql1->fetchColumn();
            $select_id_doc = $pdo->prepare("SELECT MAX(id_documento)  FROM documentos_externos");
            $select_id_doc->execute();
            $row_id = $select_id_doc->fetchColumn();
       

            $insert_op = $pdo->prepare("INSERT INTO op_control_t(id_documento,num) VALUES('$row_id','$conteo')");
            $insert_op->execute();
                $nuevo_conteo = $conteo + 1;
                $sql_update = $pdo->prepare("UPDATE control_sp SET contador ='$nuevo_conteo' WHERE id_direccion = 20");
                $sql_update->execute();
            }
          
        }
    } else  if ($bis == 1) {

        if ($bis_cat == 1) {
            $sentencia = $pdo->prepare("INSERT INTO documentos_externos(n_oficio,tipo_documento,fecha_oficio,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,estatus,id_direccion,op_control,anexos,comentario) VALUES (:n_oficio,:tipo_documento,:fecha_oficio,:fecha_recibido,:fecha_registro,:id_empleado_r,:id_organismo,:remitente,:cargo_r,:estatus,:id_direccion,:op_control,:anexos,:comentario)");
            $sentencia->bindParam(':n_oficio', $n_oficio);
            $sentencia->bindParam(':op_control', $txtop_control);
            $sentencia->bindParam(':tipo_documento', $txttipo);
            $sentencia->bindParam(':fecha_oficio', $txtfecha_o);
            $sentencia->bindParam(':fecha_recibido', $txtfecha_r);
            $sentencia->bindParam(':fecha_registro', $Fecha);
            $sentencia->bindParam(':id_empleado_r', $id_empleado_r);
            $sentencia->bindParam(':id_organismo', $txtorganismo);
            $sentencia->bindParam(':remitente', $txtremitente);
            $sentencia->bindParam(':cargo_r', $txtcargo_r);
            $sentencia->bindParam(':estatus', $txtestatus);
            $sentencia->bindParam(':anexos', $txtAnexos);
            $sentencia->bindParam(':id_direccion', $direccion_cat);
            $sentencia->bindParam(':comentario', $txtComentario);
            $sentencia->execute();
        } else if ($bis_cat == 2) {
            $sentencia = $pdo->prepare("INSERT INTO documentos_externos(n_oficio,tipo_documento,fecha_oficio,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,estatus,id_direccion,op_control,anexos,comentario) VALUES (:n_oficio,:tipo_documento,:fecha_oficio,:fecha_recibido,:fecha_registro,:id_empleado_r,:id_organismo,:remitente,:cargo_r,:estatus,:id_direccion,:op_control,:anexos,:comentario)");
            $sentencia->bindParam(':n_oficio', $n_oficio);
            $sentencia->bindParam(':op_control', $txtop_control);
            $sentencia->bindParam(':tipo_documento', $txttipo);
            $sentencia->bindParam(':fecha_oficio', $txtfecha_o);
            $sentencia->bindParam(':fecha_recibido', $txtfecha_r);
            $sentencia->bindParam(':fecha_registro', $Fecha);
            $sentencia->bindParam(':id_empleado_r', $id_empleado_r);
            $sentencia->bindParam(':id_organismo', $txtorganismo);
            $sentencia->bindParam(':remitente', $txtremitente);
            $sentencia->bindParam(':cargo_r', $txtcargo_r);
            $sentencia->bindParam(':estatus', $txtestatus);
            $sentencia->bindParam(':anexos', $txtAnexos);
            $sentencia->bindParam(':id_direccion', $direccion_cat);
            $sentencia->bindParam(':comentario', $txtComentario);
            $sentencia->execute();
        } else if ($bis_cat == 3) {
        }




        $sentencia = $pdo->prepare("INSERT INTO documentos_externos(n_oficio,folio,tipo_documento,fecha_oficio,fecha_recibido,fecha_registro,id_empleado_r,id_organismo,remitente,cargo_r,estatus,op_control,anexos,comentario) VALUES (:n_oficio,:folio,:tipo_documento,:fecha_oficio,:fecha_recibido,:fecha_registro,:id_empleado_r,:id_organismo,:remitente,:cargo_r,:estatus,:op_control,:anexos,:comentario)");
        $sentencia->bindParam(':n_oficio', $n_oficio);
        $sentencia->bindParam(':folio', $txtfolio);
        $sentencia->bindParam(':op_control', $txtop_control);
        $sentencia->bindParam(':tipo_documento', $txttipo);
        $sentencia->bindParam(':fecha_oficio', $txtfecha_o);
        $sentencia->bindParam(':fecha_recibido', $txtfecha_r);
        $sentencia->bindParam(':fecha_registro', $Fecha);
        $sentencia->bindParam(':id_empleado_r', $id_empleado_r);
        $sentencia->bindParam(':id_organismo', $txtorganismo);
        $sentencia->bindParam(':remitente', $txtremitente);
        $sentencia->bindParam(':cargo_r', $txtcargo_r);
        $sentencia->bindParam(':estatus', $txtestatus);
        $sentencia->bindParam(':anexos', $txtAnexos);
        $sentencia->bindParam(':comentario',$txtComentario);
        $sentencia->execute();


        $id_ciclo = $pdo->prepare("SELECT MAX(id_documento) FROM documentos_externos");
        $id_ciclo->execute();
        $ciclo = $id_ciclo->fetchall(PDO::FETCH_BOTH);
        foreach ($ciclo as $mostrar) {
            $id_max = $mostrar[0];
        }

        $insert_bis = $pdo->prepare("INSERT INTO bis(id_documento,folio,folio_bis,count) VALUES('$id_max','$folio_o','$txtfolio','$cont')");
        $insert_bis->execute();
    }






    $id_ciclo = $pdo->prepare("SELECT MAX(id_documento) FROM documentos_externos");
    $id_ciclo->execute();
    $id_max = $id_ciclo->fetchColumn();
    
    $mDate = new DateTime();
    $hora = $mDate->format("H:i:s");
    echo $hora;
    $usuario = $_SESSION['usuario'];
    $accion = "Registro de documento documento externo";
    $id_empleado = $_SESSION['id_empleado'];
    $id_dir = $_SESSION['id_direccion'];

    $sql1 = "INSERT INTO logs(id_usr,accion,id_documento,fecha_accion,hora_accion) VALUES(:id_usr,:accion,:id_documento,:fecha_accion,:hora_accion)";
    $consulta_logIns = $pdo->prepare("INSERT INTO logs(id_usr,accion,id_documento,fecha_accion,hora_accion) VALUES(:id_usr,:accion,:id_documento,:fecha_accion,:hora_accion)");
  
    $consulta_logIns->bindParam(':accion', $accion);
   
    $consulta_logIns->bindParam(':id_documento', $id_max);
    $consulta_logIns->bindParam('fecha_accion', $Fecha);
    $consulta_logIns->bindParam(':hora_accion', $hora);
    $consulta_logIns->bindParam(':id_usr', $id_empleado);

    $consulta_logIns->execute();


    if ($otro != "") {
        $sql_otro = $pdo->prepare("INSERT INTO organismo_externo(detalle,id_documento) VALUES('".utf8_decode($otro)."','$id_max')");
        $sql_otro->execute();
    }


    if ($bis == 1) {
        $consulta_archivo = $pdo->prepare("SELECT * FROM temp_a  where  op_folio = '$txtop_control'");
        $consulta_archivo->execute();
        $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

        if ($bis_cat == 1) {
            $insert_bis = $pdo->prepare("INSERT INTO bis(id_documento,count,op_control) VALUES('$id_max','$cont','$num')");
            $insert_bis->execute();

            $insert_op_control = $pdo->prepare("INSERT INTO op_control(id_documento,num,bis) VALUES('$id_max','$txtop_control',1)");
            $insert_op_control->execute();

            $consulta_archivo = $pdo->prepare("SELECT * FROM temp_a  where  op_folio = '" . $txtop_control . "'");
            $consulta_archivo->execute();
            $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lista_archivo as $mostrar_a) {
                $id_temp = $mostrar_a['id_temp'];
                $url = $mostrar_a['url'];
                $a_nombre = $mostrar_a['a_nombre'];
            }
            $nombre = $a_nombre . "-A";
            $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre) VALUES(:id_documento,:url,:a_nombre)");
            $sentencia_ia->bindParam(':id_documento', $id_max);
            $sentencia_ia->bindParam(':url', $url);
            $sentencia_ia->bindParam(':a_nombre', $nombre);
            $sentencia_ia->execute();

            rename($url, "../repos/$nombre");
            $delete_temp = $pdo->prepare("DELETE  FROM temp_a WHERE id_temp = '$id_temp'");
            $delete_temp->execute();
        }
    } else if ($bis_cat == 2) {
        $insert_bis = $pdo->prepare("INSERT INTO bis(id_documento,count,op_control) VALUES('$id_max','$cont','$num')");
        $insert_bis->execute();

        $insert_op_control = $pdo->prepare("INSERT INTO op_control_t(id_documento,num,bis) VALUES('$id_max','$num',1)");
        $insert_op_control->execute();

        $consulta_archivo = $pdo->prepare("SELECT * FROM temp_a  where  op_folio = '" . $num . "'");
        $consulta_archivo->execute();
        $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lista_archivo as $mostrar_a) {
            $id_temp = $mostrar_a['id_temp'];
            $url = $mostrar_a['url'];
            $a_nombre = $mostrar_a['a_nombre'];
        }
        $nombre = $a_nombre . "-A";
        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre) VALUES(:id_documento,:url,:a_nombre)");
        $sentencia_ia->bindParam(':id_documento', $id_max);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);
        $sentencia_ia->execute();

        rename($url, "../imagenes/$nombre");
        $delete_temp = $pdo->prepare("DELETE  FROM temp_a WHERE id_temp = '$id_temp'");
        $delete_temp->execute();
    } else {
        $consulta_archivo = $pdo->prepare("SELECT * FROM temp_a  where  op_folio = '$txtfolio'");
        $consulta_archivo->execute();
        $lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
        $num_files = $consulta_archivo->rowCount();
        
      
            foreach ($lista_archivo as $mostrar_a) {
                $id_temp = $mostrar_a['id_temp'];
                $url = $mostrar_a['url'];
                $a_nombre = $mostrar_a['a_nombre'];

                $insertar_archivo = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre) VALUES('$id_max','$url','$a_nombre')");
                $insertar_archivo->execute();
            }
    
           
        
       
    }




    $delete_temp = $pdo->prepare("DELETE  FROM temp_a WHERE id_temp = '$id_temp'");
    $delete_temp->execute();

    $id_temp = "";
    $url = "";
    $a_nombre = "";
    

    echo "Documento registrado";

    
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
}else{
    echo "Error al registrar documento";
}


