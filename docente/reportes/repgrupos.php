<?php
	session_start();
	include '../controldocente.php';
	require '../../conn.php';
	require '../../reporte/fpdf/fpdf.php';
	
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../reporte/images/logo.png', 5, 5, 15 );
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de Grupos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 7);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}


	$id = $_SESSION['idD'];
	$datos = "SELECT g.COD_GRUPO, g.NOMBRE_GRUPO, m.NOMBRE_MATERIA, g.CAPACIDADG, l.CAPACIDAD, h.HORA_ENTRADA, h.HORA_SALIDA 
    FROM grupo g, docente d, materia m, horario h, laboratorio l 
    WHERE d.ID_USUARIO=g.DOC_ID_USUARIO and g.ID_MATERIA=m.ID_MATERIA and g.COD_GRUPO=h.COD_GRUPO and g.ID_LABORATORIO=l.ID_LABORATORIO and d.ID_USUARIO=$id
    order by HORA_ENTRADA asc";
	
	$resultado = $conn->query($datos);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(20,6,'COD GRUPO',1,0,'C',1);
	$pdf->Cell(65,6,'MATERIA',1,0,'C',1);
	$pdf->Cell(15,6,'GRUPO',1,0,'C',1);
	$pdf->Cell(20,6,'CAPACIDAD',1,0,'C',1);
    $pdf->Cell(18,6,'ALUMNOS',1,0,'C',1);
    $pdf->Cell(20,6,'ENTRADA',1,0,'C',1);
    $pdf->Cell(20,6,'SALIDA',1,1,'C',1);

	$pdf->SetFont('Arial','',8);
	
	while( $row=$resultado->fetch_array() )
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		*/
		$pdf->Cell(20,6,utf8_decode($row['COD_GRUPO']),1,0,'C');
        $pdf->Cell(65,6,utf8_decode($row['NOMBRE_MATERIA']),1,0,'C');
        $pdf->Cell(15,6,utf8_decode($row['NOMBRE_GRUPO']),1,0,'');
		$pdf->Cell(20,6,$row['CAPACIDAD'],1,0,'');
		$pdf->Cell(18,6,$row['CAPACIDADG'],1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['HORA_ENTRADA']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['HORA_SALIDA']),1,1,'C');
	}
	$pdf->Output();
?>