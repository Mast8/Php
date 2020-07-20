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
			$this->Cell(120,10, 'Reporte De Docentes',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	$query="SELECT * from usuario u  where ID_ROL=2 order by APELLIDOS";
	
	$resultado = $conn->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(10,6,'ID',1,0,'C',1);
	$pdf->Cell(50,6,'NOMBRE COMPLETO',1,0,'C',1);
	$pdf->Cell(30,6,'TELEFONO' ,1,0,'C',1);
	$pdf->Cell(40,6,'DIRECCION',1,0,'C',1);
	$pdf->Cell(40,6,'CORREO'   ,1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while( $row=$resultado->fetch_array() )
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		*/
		$pdf->Cell(10,6,utf8_decode($row['ID_USUARIO']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['APELLIDOS']." ".$row['NOMBRES']),1,0,'');
		$pdf->Cell(30,6,$row['TELEFONO'],1,0,'');
		$pdf->Cell(40,6,utf8_decode($row['DIRECCION']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['CORREO']),1,1,'C');
	}
	$pdf->Output();
?>