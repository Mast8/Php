
	<?php
	include '../conn.php';

	session_start();
	//ANHADIDO PARA EL DORARGA
	$corre = $_SESSION['correo']; 
	
 	
	$sql1 = "SELECT * FROM usuario WHERE correo = '$corre'";
	
	$result1 = mysqli_query($conn, $sql1);
	$usuario = mysqli_fetch_assoc($result1);
	$id_usu = $usuario['ID_USUARIO'];
	
	

	$name = $_POST['name'];
	$des = $_POST['descripcion'];
	
	
		$query = "INSERT INTO materia ( NOMBRE, DESCRIPCION) VALUES ('$name', '$des')";

		if (mysqli_query($conn, $query)) {
			echo "<div class='alert alert-success mt-4' role='alert'><h3> Materia creada exitosamente.</h3>
			<a class='btn btn-outline-primary' href='dashboard.php' role='button'>Volver a dashboard</a></div>";	

		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
		
	
	//mysqli_close($conn);
	?>
