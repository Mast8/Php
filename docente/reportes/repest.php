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
			$this->Cell(120,10, 'Reporte de Estudiantes',0,0,'C');
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

          //revisar el group by de grupos(con uno si funciona pero con dos o mas?) FUNCIONA!
    $datos = "SELECT avg(NOTA_PRACTICA) as prom , count(ASISTENCIA)as totalses, SUM(CASE WHEN ASISTENCIA=1 THEN 1 ELSE 0 END) as asis , e.ID_USUARIO as est, e.COD_SYS, NOMBRES, APELLIDOS, NOTA_PRACTICA, NOMBRE_GRUPO, g.COD_GRUPO
	 from usuario u, estudiante e, practica p, practica_tarea prt, grupo g, docente d 
	 where u.ID_USUARIO= e.ID_USUARIO and e.ID_USUARIO= p.ID_USUARIO and p.ID_PRACTICA_TAREA=prt.ID_PRACTICA_TAREA and prt.COD_GRUPO= g.COD_GRUPO and g.DOC_ID_USUARIO= d.ID_USUARIO and d.ID_USUARIO=$id group by e.ID_USUARIO,g.COD_GRUPO ";
	
	$resultado = $conn->query($datos);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);

	
	$pdf->Cell(12,6,'GRUPO',1,0,'C',1);
    $pdf->Cell(15,6,'COD SYS',1,0,'C',1);
    $pdf->Cell(65,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(20,6,'PROMEDIO',1,0,'C',1);
	$pdf->Cell(20,6,'ASISTIO',1,0,'C',1);
	$pdf->Cell(25,6,'# SESIONES',1,0,'C',1);
	$pdf->Cell(25,6,'ASISTENCIA(%)',1,1,'C',1);

	$pdf->SetFont('Arial','',8);
	
	while( $row=$resultado->fetch_array() )
	{
		
		$pdf->Cell(12,6,utf8_decode($row['NOMBRE_GRUPO']),1,0,'C');
		$pdf->Cell(15,6,utf8_decode($row['COD_SYS']),1,0,'C');
		$pdf->Cell(65,6,utf8_decode($row['APELLIDOS']." ".$row['NOMBRES']),1,0,'');
		$pdf->Cell(20,6,utf8_decode($row['prom']),1,0,'C');		
		//$pdf->Cell(25,6,utf8_decode($row['asis']/$row['totalses']*100 ),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['asis'] ),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['totalses'] ),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['asis']/$row['totalses']*100 )."%",1,1,'C');


	}
	$pdf->Output();
?>