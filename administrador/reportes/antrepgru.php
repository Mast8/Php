<?php
	require '../../conn.php';
	require '../../reporte/fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../reporte/images/logo.png', 5, 5, 15 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de grupos semestre pasado',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	
	//$query ="SELECT NOMBRE_GRUPO, MATERIA, COD_GRUPO, NOMBRES, APELLIDOS from grupo_i g, auxiliar_i a where g.COD_AUXILIAR=a.COD_AUXILIAR ";
	$query ="SELECT NOMBRE_GRUPO, MATERIA, COD_GRUPO from grupo_i g";
	
	
	$resultado = $conn->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(25,6,'GRUPO',1,0,'C',1);
	$pdf->Cell(90,6,'NOMBRE DE MATERIA',1,0,'C',1);
	$pdf->Cell(20,6,'CODIGO',1,1,'C',1);
	/*$pdf->Cell(20,6,'DIA',1,1,'C',1);
	$pdf->Cell(20,6,'ENTRADA',1,0,'C',1);
	$pdf->Cell(20,6,'SALIDA',1,1,'C',1);*/

	$pdf->SetFont('Arial','',10);
	
	while(/*$row = $resultado->fetch_assoc()*/ $row=$resultado->fetch_array())
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		 x= 0 o 1, 1 acaba, 0 continua celda			x   */
		 $pdf->Cell(25,6,$row['NOMBRE_GRUPO'],1,0,'');
		$pdf->Cell(90,6,utf8_decode($row['MATERIA']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['COD_GRUPO']),1,1,'');
		//$pdf->Cell(20,6,utf8_decode($row['APELLIDOS']),1,1,'');
		/*$pdf->Cell(20,6,utf8_decode($row['NOMBRE_GRUPO']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['HORA_ENTRADA']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['HORA_SALIDA']),1,1,'');*/
		
		
	}
	$pdf->Output();
?>