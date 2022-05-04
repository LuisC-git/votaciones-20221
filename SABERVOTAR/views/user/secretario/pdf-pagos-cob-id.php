<?php

//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola AFsuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../../../vendor/TCPDF/tcpdf.php');
require_once('../../../models/model.conteo.php');
session_start();
$_SESSION['usuario'];

// extend TCPF with custom functions
class MYPDF extends TCPDF
{
}
// create new PDF document
$pdf = new MYPDF('portraid', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SABERVOTAR');
$pdf->SetTitle('Resultados');
$pdf->SetSubject('TCPDF Tutoriasssl');
$pdf->SetKeywords('TCPDssFS, PDF, exwssample, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 011', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();


// data loading
// $data = $pdf->LoadData('data/table_data_demo.txt');

$data = array();
// $id= 5;
// $conteo->getOne($id);

$pdf->image("../../../resources/img/Acta.png", 15, 29, 180);
$id = $_GET["id2"];
$rs = $db->recordSet(" SELECT vw_conteo.VotoCont,vw_conteo.NombrePar
FROM vw_conteo WHERE vw_conteo.IdUsu =" . $_SESSION['usuario']->IdUsu ." AND  vw_conteo.IdEle=$id ");

$rs2 = $db->recordSet("SELECT sum(vw_conteo.VotoCont) as totalvotos
FROM vw_conteo WHERE vw_conteo.IdUsu =" . $_SESSION['usuario']->IdUsu." AND  vw_conteo.IdEle=$id ");
$arre = array("FEDERALES", "GUBERNAMENTALES", "PRESIDENCIA MUNICIPAL", "AYUNTAMIENTO","LOCALES","PRESIDENCIA");

$pdf->setXY(50, 90);
$pdf->cell(0, 0, $arre[$id-1]);

$id = $_GET["id"];
$conteo->getOne($id);
//$pdf->setXY(100,50);$pdf->cell(0,0,$conteo->data->IdCont);	
$pdf->setXY(50, 70);
$pdf->cell(0, 0, $conteo->data->TipoCas);
$pdf->setXY(120, 90);
$pdf->cell(0, 0, $conteo->data->HoraInc);
$pdf->setXY(160, 90);
$pdf->cell(0, 0, $conteo->data->HoraFin);
$pdf->setXY(140, 50);
$pdf->cell(0, 0, $conteo->data->NombreMun);
$pdf->setXY(60, 52);
$pdf->cell(0, 0, $conteo->data->NombreEst);
$pdf->setXY(140, 70);
$pdf->cell(0, 0, $conteo->data->SeccionCas);


$contador = 4;
while ($row = $db->next($rs)) {
	$contador = $contador + 12;
	$x = 150;
	$y = 108 + $contador;
	$x1 = 20;
	$y1 = 108 + $contador;
	$pdf->setXY($x, $y);
	$pdf->cell(0, 0, $row->VotoCont);
	$pdf->setXY($x1, $y1);
	$pdf->cell(0, 0, $row->NombrePar);
}

while ($row = $db->next($rs2)) {
	$pdf->setXY(150, 218);
	$pdf->cell(0, 0, $row->totalvotos);
}
// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
