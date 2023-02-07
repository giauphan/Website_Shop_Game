<?php

use Com\Tecnick\Pdf\Tcpdf;
class export_pdf {
    public function index(){
        $pdf = new Tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('My PDF File');
$pdf->SetSubject('Subject of the PDF file');
$pdf->SetKeywords('PDF, export, PHP');
    }
} 

