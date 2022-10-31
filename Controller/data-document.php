<?php

    require('../Model/Conexion.php');
    $id_document = $_POST['id-document'];
    
    $m = 1;
    $sql1 = $pdo->prepare("SELECT d.id_documento,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.id_organismo,org.nombre_organismo,d.remitente,d.cargo_r,d.anexos,di.asunto,di.fecha_limite,di.instruccion,i.n_instruccion,di.inst_otro FROM documentos_externos as d INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN instrucciones as i ON i.id_instruccion = di.instruccion INNER JOIN organismo as org ON org.id_organismo = d.id_organismo WHERE d.id_documento = '$id_document'");
    $sql1->execute();
    $data = $sql1->fetchAll(PDO::FETCH_ASSOC);

    if($data)
    {
        foreach($data as $get)
        {
            $id_documento = $get['id_documento'];
            $n_oficio = $get['n_oficio'];
            $folio = $get['folio'];
            $fecha_oficio = $get['fecha_oficio'];
            $fecha_recibido = $get['fecha_recibido'];
            $id_organismo = $get['id_organismo'];
            $org_nombre = $get['nombre_organismo'];
            $remitente = $get['remitente'];
            $cargo_r = $get['cargo_r'];
            $anexos = $get['anexos'];
            $asunto = $get['asunto'];
            $fecha_limite = $get['fecha_limite'];
            $id_instruccion = $get['instruccion'];
            $n_instruccion = $get['n_instruccion'];
            $inst_otro = $get['inst_otro'];

        }

        if($id_organismo == 24)
        {
            $sql2 = $pdo->prepare("SELECT detalle FROM organismo_externo WHERE id_documento ='$id_documento'");
            $sql2->execute();
            $tmp_organismo = $sql2->fetchColumn();
            $org_nombre = $tmp_organismo;
        }

        if($id_instruccion == 11)
        {
            $n_instruccion = $inst_otro;
        }

        // Obtener archivos adjuntos

        $sql3 = $pdo->prepare("SELECT a.url,a.a_nombre FROM archivos as a WHERE a.id_documento ='$id_documento'");
        $sql3->execute();
        $data_a = $sql3->fetchAll(PDO::FETCH_ASSOC);


    }else{
        $m = 0;
    }

?>
