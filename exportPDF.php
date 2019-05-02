<?php
require __DIR__ . '/vendor/autoload.php';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->AddPage();
$pdf->writeHTML($_GET['html'], true, false, true, false, '');
$pdf->AddPage();
$svgString = '<svg viewBox="10 0 80 80">
    <ellipse cx="240" cy="100" rx="220" ry="30" style="fill:purple" />
    <ellipse cx="220" cy="70" rx="190" ry="20" style="fill:lime" />
    <ellipse cx="210" cy="45" rx="170" ry="15" style="fill:yellow" />
    Sorry, your browser does not support inline SVG.
    </svg>';
$pdf->ImageSVG('@' . $svgString, $x=15, $y=30, $w='', $h='', $link='http://www.tcpdf.org', $align='', $palign='', $border=1, $fitonpage=false);
$pdf->Write(0, $txt='', '', 0, 'L', true, 0, false, false, 0);
$pdf->Output('hi', 'I');
