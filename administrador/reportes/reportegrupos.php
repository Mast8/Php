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
			$this->Cell(120,10, 'Reporte De Grupos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	$query="SELECT u.NOMBRES, u.APELLIDOS,NOMBRE_MATERIA, HORA_ENTRADA,HORA_SALIDA, g.COD_GRUPO,g.NOMBRE_GRUPO, DIA from usuario u, docente d, grupo g, materia m,horario h where u.ID_USUARIO=d.ID_USUARIO AND d.ID_USUARIO=g.DOC_ID_USUARIO AND g.COD_GRUPO= h.COD_GRUPO AND g.ID_MATERIA=m.ID_MATERIA order by NOMBRE_MATERIA";
	
	$resultado = $conn->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(20,6,'GRUPO',1,0,'C',1);
	$pdf->Cell(90,6,'NOMBRE DE MATERIA',1,0,'C',1);
	$pdf->Cell(20,6,'CODIGO',1,0,'C',1);
	$pdf->Cell(20,6,'DIA',1,0,'C',1);
	$pdf->Cell(20,6,'ENTRADA',1,0,'C',1);
	$pdf->Cell(20,6,'SALIDA',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while(/*$row = $resultado->fetch_assoc()*/ $row=$resultado->fetch_array())
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		 x= 0 o 1, 1 acaba, 0 continua celda			x   */
		 $pdf->Cell(20,6,$row['NOMBRE_GRUPO'],1,0,'');
		$pdf->Cell(90,6,utf8_decode($row['NOMBRE_MATERIA']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['COD_GRUPO']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['DIA']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['HORA_ENTRADA']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['HORA_SALIDA']),1,1,'');
		
		
	}
	$pdf->Output();
?>