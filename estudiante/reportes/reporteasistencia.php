<?php
	
	require '../../conn.php';
	require '../../reporte/fpdf/fpdf.php';

	session_start();
	$idestudiante= $_SESSION['idE'];
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../reporte/images/logo.png', 5, 5, 15 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de asistencia y nota de las practicas',0,0,'C');
			
			$this->Ln(21);
			/* no sirve ya
			/$this->Cell(120,10, '1 significa asistencia ',1,1,'C' );
			$this->Cell(120,10, '0 significa falta',1,0,'C' );
			*/
			$this->Ln(23);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );

			
		}		
	}

	$query="
		SELECT NOMBRE_PRACTI,APELLIDOS,NOMBRES,ASISTENCIA,HORA_SUBIDA , NOTA_PRACTICA, NOMBRE_GRUPO
		from usuario u,estudiante e, practica p, practica_tarea prt,grupo g  where u.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO=p.ID_USUARIO and p.ID_PRACTICA_TAREA= prt.ID_PRACTICA_TAREA and prt.COD_GRUPO= g.COD_GRUPO and u.ID_USUARIO=$idestudiante 
		order by HORA_SUBIDA asc";
	
	$resultado = $conn->query($query);
	
	//consulta para contar asisencias
	$querya="
		SELECT count(ASISTENCIA)as totalp, SUM(CASE WHEN ASISTENCIA=0 THEN 1 ELSE 0 END) as faltas 
		from usuario u,estudiante e, practica p, practica_tarea prt where u.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO=p.ID_USUARIO and p.ID_PRACTICA_TAREA= prt.ID_PRACTICA_TAREA and  u.ID_USUARIO=$idestudiante 
		group by u.id_usuario";

	//$querya="SELECT count(ASISTENCIA)as totalp from usuario u,estudiante e, practica p, practica_tarea prt where u.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO=p.ID_USUARIO and p.ID_PRACTICA_TAREA= prt.ID_PRACTICA_TAREA and  u.ID_USUARIO=$idestudiante";
	$asistencia = $conn->query($querya);

	$asis =$asistencia->fetch_array();

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(15,6,'GRUPO',1,0,'C',1);
	$pdf->Cell(45,6,'PRACTICA',1,0,'C',1);
	$pdf->Cell(50,6,'NOMBRE COMPLETO',1,0,'C',1);
	$pdf->Cell(40,6,'FECHA DE SUBIDA',1,0,'C',1);
	$pdf->Cell(20,6,'NOTA',1,0,'C',1);
	$pdf->Cell(29,6,'ASISTENCIA',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while( $row=$resultado->fetch_array() )
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		*/
		$pdf->Cell(15,6,utf8_decode($row['NOMBRE_GRUPO']),1,0,'C');
		$pdf->Cell(45,6,utf8_decode($row['NOMBRE_PRACTI']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['APELLIDOS']." ".$row['NOMBRES']),1,0,'');
		$pdf->Cell(40,6,$row['HORA_SUBIDA'],1,0,'');
		$pdf->Cell(20,6,$row['NOTA_PRACTICA'],1,0,'C');
		if ($row['ASISTENCIA'] == 1 ) {
			$asistio = 'Si';
		}
		else {
			$asistio = 'No';
		}
		//$pdf->Cell(29,6,($row['ASISTENCIA']),1,1,'C');
		$pdf->Cell(29,6,($asistio),1,1,'C');
		
	}
	$diferencia = $asis['totalp']-$asis['faltas'];

	$pdf->Cell(60,6,'Total faltas',1,0,'',1);
	$pdf->Cell(50,6,($asis['faltas']),1,1,'C');
	$pdf->Cell(60,6,'Total asistencias',1,0,'',1);
	$pdf->Cell(50,6,($diferencia),1,1,'C');

	$pdf->Cell(60,6,'Total sesiones',1,0,'',1);
	$pdf->Cell(50,6,($asis['totalp']),1,1,'C');

	$pdf->Output();
?>