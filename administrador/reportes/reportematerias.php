<?php
	//include 'plantilla.php';
	require '../../conn.php';
	
	require '../../reporte/fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../reporte/images/logo.png', 5, 5, 15 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Materias',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	$query="SELECT * from materia order by NOMBRE_MATERIA";
	//$resultado = $mysqli->query($query);
	$resultado = $conn->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(60,6,'ID',1,0,'C',1);
	$pdf->Cell(130,6,'NOMBRE DE MATERIA',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
	while(/*$row = $resultado->fetch_assoc()*/ $row=$resultado->fetch_array())
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		 x= 0 o 1, 1 acaba, 0 continua celda			x   */
		$pdf->Cell(60,6,utf8_decode($row['ID_MATERIA']),1,0,'C');
		$pdf->Cell(130,6,$row['NOMBRE_MATERIA'],1,1,'');
		
	}
	$pdf->Output();
?>