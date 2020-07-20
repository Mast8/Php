<?php
	session_start();
	//include 'controldocente.php';
	require '../../conn.php';
	require '../../reporte/fpdf/fpdf.php';
	
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../reporte/images/logo.png', 5, 5, 15 );
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de Auxiliares',0,0,'C');
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
	$datos = "SELECT  u.ID_USUARIO, u.NOMBRES, u.APELLIDOS, a.COD_AUXILIAR, g.COD_GRUPO FROM usuario u, auxiliar a, grupo g 
    WHERE u.ID_USUARIO=a.ID_USUARIO and g.COD_AUXILIAR=a.COD_AUXILIAR and a.COD_AUXILIAR IN 
    (SELECT a.COD_AUXILIAR FROM auxiliar a, docente_auxiliar da 
     WHERE a.COD_AUXILIAR=da.COD_AUXILIAR and a.COD_AUXILIAR IN 
     (SELECT COD_AUXILIAR FROM docente_auxiliar da, docente d 
      WHERE da.COD_DOCENTE=d.COD_DOCENTE and d.ID_USUARIO IN
      (SELECT ID_USUARIO from usuario where ID_USUARIO=$id )))";
	
	$resultado = $conn->query($datos);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(33,6,'COD AUXILIAR',1,0,'C',1);
    $pdf->Cell(80,6,'NOMBRE COMPLETO',1,0,'C',1);
    $pdf->Cell(30,6,'COD GRUPO',1,1,'C',1);
	/*$pdf->Cell(25,6,'PROMEDIO',1,0,'C',1);
	$pdf->Cell(30,6,'ASISTENCIA(%)',1,1,'C',1);*/

	$pdf->SetFont('Arial','',10);
	
	while( $row=$resultado->fetch_array() )
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		*/
		$pdf->Cell(33,6,utf8_decode($row['COD_AUXILIAR']),1,0,'C');
		$pdf->Cell(80,6,utf8_decode($row['APELLIDOS']." ".$row['NOMBRES']),1,0,'');
        $pdf->Cell(30,6,utf8_decode($row['COD_GRUPO']),1,1,'C');

	}
	$pdf->Output();
?>