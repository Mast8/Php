
	<?php
	include '../conn.php';

	$name = $_POST['nombre'];
	//$des = $_POST['descripcion'];
	
	
		$query = "INSERT INTO materia (NOMBRE_MATERIA) VALUES ('$name')";
		if (mysqli_query($conn, $query)) {
			print "<script>alert(\"Se registro la materia.\");window.location='tablamat.php';</script>";

		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
			print "<script>alert(\"No se pudo registrar.\")";
		}	
		
	
	//mysqli_close($conn);
	?>
