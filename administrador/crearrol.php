<?php 
 include '../conn.php';

if(isset($_POST['crerol'])){
		
		$rol = $_POST['rol'];
		$query = "INSERT INTO rol ( ROL) VALUES ('$rol')"; 
		if (mysqli_query($conn, $query)) {
			print "<script>alert(\"Se creo el rol con exito.\");window.location='roles.php';</script>";	

		} else {
			print "<script>alert(\"No se creo el rol con exito.\");window.location='roles.php';</script>";
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}
?>