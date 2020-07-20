
<?php
include '../conn.php';

	$name = $_POST['aula'];
	$capa = $_POST['capacidad'];
	
	
		$query = "INSERT INTO laboratorio ( NOMBRE_LABORATORIO, CAPACIDAD) VALUES ('$name', $capa)";

		if (mysqli_query($conn, $query)) {
			print "<script>alert(\"Aula registrada exitosamente.\");window.location='listaraulas.php';</script>";

		} else {
			print "<script>alert(\"Aula registrada exitosamente.\");window.location='tablamat.php';</script>";
			//echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
		
?>
