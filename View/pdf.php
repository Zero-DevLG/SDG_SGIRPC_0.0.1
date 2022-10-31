<?php

include("../Controller/pdf_controlador.php");
include("../Model/Conexion.php");

$id = $_POST['txtid_documento'];

$sentencia = $pdo->prepare("SELECT *,di.asunto FROM documentos_externos as de INNER JOIN documento_instruccion as di On di.id_documento = de.id_documento WHERE de.id_documento='$id'");
$sentencia_i = $pdo->prepare("SELECT di.id_instruccion,di.id_documento,di.instruccion,i.n_instruccion,di.fecha_limite,di.asunto,di.inst_otro FROM documento_instruccion as di INNER JOIN instrucciones as i ON i.id_instruccion=di.instruccion  WHERE di.id_documento='$id'");
$sentencia_p = $pdo->prepare("SELECT *,er.titular,er.cargo FROM participantes as p INNER JOIN equipo_registro as er ON er.id_direccion = p.id_direccion WHERE id_documento='$id'");
$sentencia_p->execute();
$count_p = $sentencia_p->rowCount();
$sentencia->execute();
$sentencia_i->execute();
$documento = $sentencia->fetchAll(PDO::FETCH_ASSOC);
$documento_i = $sentencia_i->fetchAll(PDO::FETCH_ASSOC);
$documento_p = $sentencia_p->fetchAll(PDO::FETCH_ASSOC);
$i = $sentencia_p->rowCount();

$consulta_resp = $pdo->prepare("SELECT rs.id_res,er.titular,er.cargo FROM doc_ext_res as rs INNER JOIN equipo_registro as er ON rs.id_direccion = er.id_direccion WHERE rs.id_documento ='$id'");
$consulta_resp->execute();
$lista_res = $consulta_resp->fetchAll(PDO::FETCH_ASSOC);
$cont_res = $consulta_resp->rowCount();

foreach ($lista_res as $show) {
    $titular_res = $show['titular'];
    $cargo_res = $show['cargo'];
}

$pdf = new PDF();

$pdf->AddPage();


//$pdf->AddFont('SourceSansPro-Black','B','SourceSansPro-Black.php');

foreach ($documento as $mostrar) {


    $pdf->SetXY(20, 40);
    $pdf->setFont('Arial', 'B', 8);
    $pdf->Cell(33, 10, 'No.FOLIO', 1, 0, 'C');
    $pdf->Cell(33, 10, 'FECHA DEL OFICIO', 1, 0, 'C');
    $pdf->Cell(33, 10, 'FECHA DE RECIBIDO', 1, 0, 'C');
    $pdf->Cell(65, 10, 'NO. DE OFICIO', 1, 1, 'C');

    $pdf->SetXY(20, 50);
    $pdf->Cell(33, 10, $mostrar["folio"], 1, 0, 'C');
    $pdf->Cell(33, 10, $mostrar["fecha_oficio"], 1, 0, 'C');
    $pdf->Cell(33, 10, $mostrar["fecha_recibido"], 1, 0, 'C');
    $pdf->Cell(65, 10, $mostrar["n_oficio"], 1, 1, 'C');


    $pdf->SetXY(20, 60);
    $pdf->setFont('Arial', 'B', 8);
    $pdf->Cell(66, 10, 'REMITENTE', 1, 0, 'C');
    $pdf->Cell(98, 10, 'CARGO', 1, 1, 'C');
    $pdf->SetXY(20, 70);
    $pdf->Cell(66, 10, utf8_decode($mostrar["remitente"]), 1, 0, 'C');
    $pdf->setFont('Arial', 'B', 6);
    $pdf->Cell(98, 10, utf8_decode($mostrar["cargo_r"]), 1, 0, 'C');


    $asunto2 = htmlspecialchars($mostrar['asunto'], ENT_QUOTES);
    // Produce un string vacío
    $longitud = strlen($mostrar['asunto']);
    $items = round($longitud / 70) + 1;
    //echo $items;
    $linf = 0;
    $lsup = 70;
    $asunto = $mostrar['asunto'];


    //$asunto5 = str_replace("\n", "<br>", $asunto);

    //echo $items;
    if ($items > 4) {
        $y = 105;
        $yh = 25;
        $l = 6.2;
    }
    if ($items == 3) {
        $y = 98.5;
        $yh = 18.7;
        $l = 6.2;
    }
    if ($items == 2) {
        $y = 95;
        $yh = 15;
        $l = 7.5;
    }

    //echo $y;
    //$pdf->Cell(98, 15, utf8_decode($asunto), 1, 0, 'C');
    $asunto2 = utf8_decode($mostrar['asunto']);
    $asunto3 = htmlentities($asunto2, ENT_IGNORE);
}
if ($cont_res != 0) {
    $pdf->SetXY(20, 80);
    $pdf->Cell(66, 10, 'RESPONSABLE', 1, 0, 'C');
    $pdf->Cell(98, 10, 'CARGO RESPONSABLE', 1, 1, 'C');
    $pdf->SetXY(20, 90);
    $pdf->Cell(66, 10, utf8_decode($titular_res), 1, 0, 'C');
    $pdf->Cell(98, 10, utf8_decode($cargo_res), 1, 1, 'C');
    $y = 100;
} else {
    $y = 80;
}



if ($count_p == 0) {
    $u = $y;
    $r = 0;
    $pdf->SetXY(20, $y);
    $pdf->Cell(66, 10, 'INSTRUCCION', 1, 0, 'C');

    $pdf->SetXY(20, 95);
    foreach ($documento_i as $mostrar3) {
        # code...
        $pdf->SetXY(86, $u);
        if ($mostrar3['inst_otro'] != "") {
            $pdf->Cell(98, 10,  utf8_decode($mostrar3["inst_otro"]), 1, 0, 'C');
            $u = $u + 10;
            $r = $u;
        } else {
            $pdf->Cell(98, 10,  utf8_decode($mostrar3["n_instruccion"]), 1, 0, 'C');
            $u = $u + 10;
            $r = $u;
        }
    }

    $pdf->SetXY(20, $r);
    $pdf->Cell(80, 10, 'RECIBE', 1, 0, 'C');
    $pdf->Cell(84, 10, 'FECHA Y HORA', 1, 0, 'C');
    $r = $r + 10;
    $pdf->SetXY(20, $r);
    $pdf->Cell(80, 10, '', 1, 0, 'C');
    $pdf->Cell(84, 10, '', 1, 0, 'C');
    $r = $r + 10;

    $pdf->SetXY(20, $r);
    $pdf->Cell(80, 10, 'FECHA LIMITE DE RESPUESTA', 1, 0, 'C');

    foreach ($documento_i as $mostrar3) {
        # code...
        $pdf->Cell(84, 10, $mostrar3["fecha_limite"], 1, 0, 'C');
    }
    $r = $r + 10;
    $pdf->SetXY(20, $r);
    $pdf->setFont('Arial', 'B', 7);
    $pdf->Cell(164, 10, 'ASUNTO', 1, 0, 'C');
    //$pdf->Cell(40, $yh, "This is a multi-line text string\nNew line\nNew line", 1, 0, 'C');

    //$pdf->Cell(40, 20, $pdf->MultiCell(124, $l, $asunto2, 1, 'L'), 1, 0, 'C');

    $pdf->SetXY(20, $r + 10);
    $pdf->MultiCell(164, 7, utf8_decode($asunto), 1, 'L');
    // $pdf->SetXY(20, $r + 50);
    //$pdf->Cell(164, 10, $asunto, 1, 'L');

    $pdf->Output();
} else {
    $pdf->SetXY(20, 95);
    $pdf->Cell(66, 10, "PARTICIPANTES", 1, 0, 'C');
    $pdf->Cell(98, 10, "CARGO", 1, 0, 'C');


    //print_r($documento_p);
    //echo "<h1>"$i;
    $u = 105;
    $r = 0;
    foreach ($documento_p as $mostrar2) {
        # code...
        $pdf->SetXY(20, $u);
        $pdf->Cell(66, 10, utf8_decode($mostrar2["titular"]), 1, 0, 'C');
        $pdf->Cell(98, 10, $mostrar2["cargo"], 1, 0, 'C');

        $u = $u + 10;
        $r = $u;
    }



    //echo "<h1> esta es ".$r."</h1>";
    $pdf->SetXY(20, $r);
    $pdf->Cell(66, 10, 'INSTRUCCION', 1, 0, 'C');

    $pdf->SetXY(86, $r);
    foreach ($documento_i as $mostrar3) {
        # code...
        $pdf->SetXY(86, $u);
        if ($mostrar3['inst_otro'] != "") {
            $pdf->Cell(98, 10, $mostrar3["inst_otro"], 1, 0, 'C');
            $u = $u + 10;
            $r = $u;
        } else {
            $pdf->Cell(98, 10, $mostrar3["n_instruccion"], 1, 0, 'C');
            $u = $u + 10;
            $r = $u;
        }
    }

    $pdf->SetXY(20, $r);
    $pdf->Cell(80, 10, 'RECIBE', 1, 0, 'C');
    $pdf->Cell(84, 10, 'FECHA Y HORA', 1, 0, 'C');
    $r = $r + 10;
    $pdf->SetXY(20, $r);
    $pdf->Cell(80, 10, '', 1, 0, 'C');
    $pdf->Cell(84, 10, '', 1, 0, 'C');
    $r = $r + 10;

    $pdf->SetXY(20, $r);
    $pdf->Cell(80, 10, 'FECHA LIMITE DE RESPUESTA', 1, 0, 'C');

    foreach ($documento_i as $mostrar3) {
        # code...
        $pdf->Cell(84, 10, $mostrar3["fecha_limite"], 1, 0, 'C');
    }

    $pdf->Output();


    /*
$pdf = new FPDF();
    $pdf->addPage();
    $pdf->setFont('Arial','B',15);
    
    $pdf->SetX(50);
    $pdf->Cell(100,10,'Prueba de documento de control',1,1,'C');
    $pdf->Cell(100,10,'Prueba de documento de control 2',1,0,'C');
    
    $pdf->Output();

*/
}