<?php 
	
	include '../conn.php';
	include 'dashboard.php';
	include '../funsest.php';
	

	$nota = $_POST['nota'];
	$practica = $_POST['practica'];

	if(!empty($_POST['nota']) || !empty($_POST['practica'])){
		$update = "UPDATE practica SET NOTA_PRACTICA= $nota where ID_PRACTICA=$practica";
		
		if(mysqli_query($conn, $update) ){
			print "<script>alert(\"Se califico la practica.\");window.location='vergrupo.php';</script>";
		}
		else {
			print "<script>alert(\"No se califico la practica.\");window.location='vergrupo.php';</script>";
			echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}
	}
