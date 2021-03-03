<?php
include 'database.php';
$db = new database();
require('./pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Data Anggota",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'KTP', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'nama', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jenis kelamin', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'telepon', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
foreach($db->tampil_anggota() as $x){
    $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $x['ktp'],1, 0, 'C');
	$pdf->Cell(5, 0.8,  $x['nama'], 1, 0,'C');
	$pdf->Cell(4, 0.8,  $x['jk'], 1, 0,'C');
	$pdf->Cell(4, 0.8,  $x['alamat'], 1, 0,'C');
	$pdf->Cell(4, 0.8,  $x['telepon'], 1, 1,'C');
	$no++;
}
$pdf->Output("Cetak data anggota.pdf","I");

?>
