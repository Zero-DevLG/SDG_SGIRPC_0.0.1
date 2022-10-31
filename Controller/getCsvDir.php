<?php
header("Content-Type: text/html;charset=utf-8");
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=DocumentosDirecciones.csv;');
date_default_timezone_set("America/Mexico_City");



      $pdo = new PDO("mysql:host=localhost; dbname=copy_d", "gerencia", "12345");
      //$pdo = new PDO("mysql:dbname=copy_d;host=database;port:3306;charset=UTF8;", "root", "123");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $pdo->prepare("SELECT di.id_documento,op.num,de.fecha_oficio,de.fecha_recibido,de.remitente,de.cargo_r,de.anexos,eq.direccion,de.folio,de.n_oficio,di.asunto,di.fecha_limite,di.destinatario,di.cargo_d,di.instruccion,ins.n_instruccion,di.inst_otro as inst_otro,p.p_nombre as participante FROM documento_instruccion as di LEFT JOIN participantes as p ON p.id_documento = di.id_documento INNER JOIN op_control as op ON di.id_documento = op.id_documento INNER JOIN equipo_registro as eq ON eq.id_direccion = di.direccion INNER JOIN documentos_externos as de ON de.id_documento = di.id_documento INNER JOIN instrucciones as ins ON di.instruccion = ins.id_instruccion ORDER BY `num` ASC ");
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $DateAndTime = date('m-d-Y h:i:s a', time()); 

    if($sql){  

        echo "Reporte generado hasta la fecha y hora: ".$DateAndTime."\n";

            echo "id" . ",";
            echo "fecha oficio" . ",";
            echo "fecha recibido" . ",";
            echo "remitente" . ",";
            echo "cargo remitente" . ",";
            echo "anexos" . ",";
            echo "direccion" . ",";
            echo "folio" . ",";
            echo "oficio" . ",";
            echo "asunto" . ",";
            echo "fecha limite" . ",";
            echo "destinatario" . ",";
            echo "cargo destinatario" . ",";
            echo "instruccion" . ",";
            echo "Otra instruccion" . "\n";

        foreach($data as $item){
            echo $item['id_documento']. ",";
            echo $item['fecha_oficio']. ",";
            echo $item['fecha_recibido']. ",";
            echo str_replace (',', '', utf8_decode($item['remitente'])).",";
            echo str_replace(',','',utf8_decode($item['cargo_r'])). ",";
            echo trim(str_replace(',','',utf8_decode($item['anexos']))) . ",";
            echo trim(str_replace(',','',utf8_decode($item['direccion']))). ",";
            echo str_replace(',','',$item['folio']). ",";
            echo str_replace(',','',$item['n_oficio']). ",";
            echo str_replace(',','',utf8_decode($item['asunto'])). ",";
            echo $item['fecha_limite']. ",";
            echo str_replace(',','',utf8_decode($item['destinatario'])). ",";
            echo str_replace(',','',utf8_decode($item['cargo_d'])). ",";
            echo str_replace(',','',utf8_decode($item['n_instruccion'])). ",";
            echo str_replace(',','',utf8_decode($item['inst_otro'])). ",";
            echo utf8_decode($item['participante']). "\n";
          
        }    
    
    }




?>