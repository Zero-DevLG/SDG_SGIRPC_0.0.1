<?php
header("Content-Type: text/html;charset=utf-8");
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=DocumentosTitular.csv;');



      $pdo = new PDO("mysql:host=localhost; dbname=copy_d", "gerencia", "12345");
      //$pdo = new PDO("mysql:dbname=copy_d;host=database;port:3306;charset=UTF8;", "root", "123");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $pdo->prepare("SELECT di.id_documento, de.fecha_oficio,de.fecha_recibido,de.remitente,de.cargo_r,de.anexos,de.folio,de.n_oficio,di.asunto,di.fecha_limite,di.destinatario,di.cargo_d,di.instruccion,ins.n_instruccion,di.inst_otro as inst_otro,opt.num,dir.titular,p.p_nombre as participante FROM documento_instruccion as di INNER JOIN op_control_t as opt ON opt.id_documento = di.id_documento INNER JOIN doc_ext_res as rep ON rep.id_documento = di.id_documento LEFT JOIN participantes as p ON p.id_documento = di.id_documento INNER JOIN documentos_externos as de ON di.id_documento = de.id_documento INNER JOIN instrucciones as ins ON ins.id_instruccion = di.instruccion INNER JOIN equipo_registro as dir ON rep.id_direccion = dir.id_direccion WHERE di.fecha_instruccion BETWEEN CAST('2022-01-01' as DATE) AND CAST('2022-12-31' as DATE) ");
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = $pdo->prepare("SELECT di.id_documento, de.fecha_oficio,de.fecha_recibido,de.remitente,de.cargo_r,de.anexos,de.folio,de.n_oficio,di.asunto,di.fecha_limite,di.destinatario,di.cargo_d,di.instruccion,ins.n_instruccion,di.inst_otro as inst_otro,opt.num,dir.titular,p.p_nombre as participante FROM documento_instruccion as di INNER JOIN op_control_t as opt ON opt.id_documento = di.id_documento INNER JOIN doc_ext_res as rep ON rep.id_documento = di.id_documento LEFT JOIN participantes as p ON p.id_documento = di.id_documento INNER JOIN documentos_externos as de ON di.id_documento = de.id_documento INNER JOIN instrucciones as ins ON ins.id_instruccion = di.instruccion INNER JOIN equipo_registro as dir ON rep.id_direccion = dir.id_direccion WHERE de.folio like '%BIS' AND di.fecha_instruccion BETWEEN CAST('2022-01-01' as DATE) AND CAST('2022-12-31' as DATE) ");
    $sql2->execute();
    $data2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

    date_default_timezone_set("America/Mexico_City");
    $DateAndTime = date('m-d-Y h:i:s a', time()); 

    if($sql){  

            echo "Reporte generado hasta la fecha y hora: ".$DateAndTime."\n";

            echo "id" . ",";
            echo "fecha oficio" . ",";
            echo "fecha recibido" . ",";
            echo "remitente" . ",";
            echo "cargo remitente" . ",";
            echo "anexos" . ",";
           // echo "direccion" . ",";
            echo "folio" . ",";
            echo "oficio" . ",";
            echo "asunto" . ",";
            echo "fecha limite" . ",";
            echo "destinatario" . ",";
            echo "cargo destinatario" . ",";
            echo "instruccion" . ",";
            echo "Otra instruccion" . ",";
            echo "Responsable".",";
            echo "Participante"."\n";

        foreach($data as $item){
            echo $item['id_documento']. ",";
            echo $item['fecha_oficio']. ",";
            echo $item['fecha_recibido']. ",";
            echo str_replace (',', '', utf8_decode($item['remitente'])).",";
            echo str_replace(',','',utf8_decode($item['cargo_r'])). ",";
            echo trim(str_replace(',','',utf8_decode($item['anexos']))) . ",";
            //echo trim(str_replace(',','',utf8_decode($item['direccion']))). ",";
            echo str_replace(',','',$item['folio']). ",";
            echo str_replace(',','',$item['n_oficio']). ",";
            echo str_replace(',','',utf8_decode($item['asunto'])). ",";
            echo $item['fecha_limite']. ",";
            echo str_replace(',','',utf8_decode($item['destinatario'])). ",";
            echo str_replace(',','',utf8_decode($item['cargo_d'])). ",";
            echo str_replace(',','',utf8_decode($item['n_instruccion'])). ",";
            echo str_replace(',','',utf8_decode($item['inst_otro'])). ",";
            echo str_replace(',','',utf8_decode($item['titular'])). ",";
            echo utf8_decode(utf8_decode($item['participante'])). "\n";
          
        }    
    
    }


    echo "Documentos BIS 2021";

    if($sql2){  

        echo "Reporte generado hasta la fecha y hora: ".$DateAndTime."\n";

        echo "id" . ",";
        echo "fecha oficio" . ",";
        echo "fecha recibido" . ",";
        echo "remitente" . ",";
        echo "cargo remitente" . ",";
        echo "anexos" . ",";
       // echo "direccion" . ",";
        echo "folio" . ",";
        echo "oficio" . ",";
        echo "asunto" . ",";
        echo "fecha limite" . ",";
        echo "destinatario" . ",";
        echo "cargo destinatario" . ",";
        echo "instruccion" . ",";
        echo "Otra instruccion" . ",";
        echo "Responsable".",";
        echo "Participante"."\n";

    foreach($data2 as $item){
        echo $item['id_documento']. ",";
        echo $item['fecha_oficio']. ",";
        echo $item['fecha_recibido']. ",";
        echo str_replace (',', '', utf8_decode($item['remitente'])).",";
        echo str_replace(',','',utf8_decode($item['cargo_r'])). ",";
        echo trim(str_replace(',','',utf8_decode($item['anexos']))) . ",";
        //echo trim(str_replace(',','',utf8_decode($item['direccion']))). ",";
        echo str_replace(',','',$item['folio']). ",";
        echo str_replace(',','',$item['n_oficio']). ",";
        echo str_replace(',','',utf8_decode($item['asunto'])). ",";
        echo $item['fecha_limite']. ",";
        echo str_replace(',','',utf8_decode($item['destinatario'])). ",";
        echo str_replace(',','',utf8_decode($item['cargo_d'])). ",";
        echo str_replace(',','',utf8_decode($item['n_instruccion'])). ",";
        echo str_replace(',','',utf8_decode($item['inst_otro'])). ",";
        echo str_replace(',','',utf8_decode($item['titular'])). ",";
        echo utf8_decode(utf8_decode($item['participante'])). "\n";
      
    }    

}




?>