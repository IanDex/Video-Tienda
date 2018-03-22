<?php
	include 'plantilla.php';
	require '../Modelo/conn.php';

	$query = "SELECT * FROM peliculas ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Codigo',1,0,'C',1);
	$pdf->Cell(70,6,'Nombre',1,0,'C',1);
	$pdf->Cell(70,6,'Descripcion',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['Codigo']),1,0,'C');
		$pdf->Cell(70,6,$row['Nombre'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['Descripcion']),1,1,'C');
	}
	$pdf->Output();
?>