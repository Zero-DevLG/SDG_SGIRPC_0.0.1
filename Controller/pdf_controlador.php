<?php

    
   require("../fpdf/fpdf.php");
    include("../Model/Conexion.php");

    //add new sourcesanspro 
    //$pdf = new FPDF('p','mm','A4');
    //$pdf->fontpath = '../fpdf/font';
     

   class PDF extends FPDF
    {
        
        function Header()
        {   
            
            $this->Image('../img_pdf/header.png',30,5,150);
            $this->Cell(30);
            $this->SetFont('Arial','B',12);
            $this->SetXY(40,25);
            $this->Cell(120,10,'VOLANTE DE TURNO 2021',0,0,'C');
            
            $this->Ln(20);
            
        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
        
        
        
        
    }





?>