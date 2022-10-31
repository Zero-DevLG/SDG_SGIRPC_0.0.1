<?php
error_reporting(E_ERROR);
require('vendor/autoload.php');

//Recoger el contenifo 
ob_start();
require_once 'pdf_view.php';
$html = ob_get_clean();

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


try {
    $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->output();
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
    die('Error: ' . $e->getMessage());
}