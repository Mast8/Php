<?php
	
	require '../conn.php';
	require '../reporte/fpdf/fpdf.php';
	session_start();
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../reporte/images/logo.png', 5, 5, 15 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte de Estudiantes',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

	include('../conn.php');
	$id = $_SESSION['idA'];
	$sql = "SELECT g.COD_GRUPO FROM auxiliar a, grupo g WHERE a.ID_USUARIO=g.ID_USUARIO AND a.ID_USUARIO=$id";
    $res1 = mysqli_query($conn, $sql);
    $grupo = mysqli_fetch_assoc($res1);
    $codGrupo = $grupo['COD_GRUPO'];
	$datos = "SELECT u.NOMBRES,u.APELLIDOS,GE.COD_SYS from usuario u,estudiante_grupo ge where ge.ID_USUARIO=u.ID_USUARIO AND GE.COD_GRUPO='$codGrupo'";
	
	$resultado = $conn->query($datos);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	//(a,b,c,d,e,f,g) abcd, e 0 continua fila 1 acaba fila
	$pdf->Cell(30,6,'CODIGO SYS',1,0,'C',1);
	$pdf->Cell(80,6,'NOMBRE COMPLETO',1,0,'C',1);
	$pdf->Cell(30,6,'PROMEDIO',1,0,'C',1);
	$pdf->Cell(35,6,'ASISTENCIA(%)',1,1,'C',1);
	//$pdf->Cell(40,6,'CORREO',1,1,'C',1);*/

	$pdf->SetFont('Arial','',10);
	
	while( $row=$resultado->fetch_array() )
	{
		/*(a,b,c,d,e,f) a ancho celda, b altura, c dato, 
			ideal 160
		*/
		$pdf->Cell(30,6,utf8_decode($row['COD_SYS']),1,0,'C');
		$pdf->Cell(80,6,utf8_decode($row['APELLIDOS']." ".$row['NOMBRES']),1,0,'');

		include('../conn.php');
		$sql1 = "SELECT e.COD_SYS, AVG(p.NOTA_PRACTICA) AS PROMEDIO FROM estudiante e, practica p WHERE e.ID_USUARIO=p.ID_USUARIO and e.COD_SYS 
		in(SELECT e.COD_SYS FROM estudiante e, estudiante_grupo eg WHERE e.ID_USUARIO=eg.ID_USUARIO and eg.COD_GRUPO='$codGrupo')";
		$res = $conn->query($sql1);
		$cero=0;
		while($rs=$res->fetch_array()){
			if ($row["COD_SYS"]==$rs["COD_SYS"]) {
            
				$pdf->Cell(30,6,utf8_decode($rs["PROMEDIO"]),1,0,'C') ;
			 } else {
				$pdf->Cell(30,6,utf8_decode($cero),1,0,'C') ;
			 }
		}
		$sql3 = "SELECT e.COD_SYS, COUNT(p.ASISTENCIA) AS TOTAL, SUM(CASE WHEN p.ASISTENCIA = 0 THEN 1 ELSE 0 END) AS FALTAS FROM estudiante e, practica p WHERE e.ID_USUARIO=p.ID_USUARIO and e.COD_SYS 
		in(SELECT e.COD_SYS FROM estudiante e, estudiante_grupo eg WHERE e.ID_USUARIO=eg.ID_USUARIO and eg.COD_GRUPO='$codGrupo')";
		$res3 = $conn->query($sql3);
		$cero1='0%';
		while($ros=$res3->fetch_array()){
			if ($row["COD_SYS"]==$ros["COD_SYS"]) {
				if ($ros['FALTAS']==$ros['TOTAL']) {
					$pdf->Cell(35,6,utf8_decode($cero1),1,1,'C') ;
				  } else {
				  	$div=(($ros['TOTAL']-$ros['FALTAS'])/$ros['TOTAL'])*100;
				  	$pdf->Cell(35,6,utf8_decode($div.'%'),1,1,'C') ;
				  }
			} else {
				$pdf->Cell(35,6,utf8_decode($cero1),1,1,'C') ;
			}
		}
		/*$pdf->Cell(30,6,$row['TELEFONO'],1,0,'');
		$pdf->Cell(40,6,utf8_decode($row['DIRECCION']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['CORREO']),1,1,'C');*/
	}
	$pdf->Output();
?>