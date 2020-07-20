
<?php
	session_start();
	include 'conn.php';

	$fecha =date("Y-m-d");
	
	$dia = date("H:i:sa");
	
	//if($_SESSION['id_rolE']==4){
		$id =  $_SESSION['idE'];
		//obetener ultimo id de sesion ocn ese estudiante
		$s="SELECT max(ID_SESION) as ultimo from sesion where ID_USUARIO=$id";
		$result = mysqli_query($conn, $s);			
		$row = mysqli_fetch_assoc($result);
		$idsesion = $row['ultimo'];

		//actualizar sesion con la tupla del estudiante
		$sql = "UPDATE sesion SET HORA_DISCONNECT = now() where ID_SESION=$idsesion ";
		mysqli_query($conn,$sql) ; 
	//}

	//session_unset($_SESSION['email']);
	session_destroy();

	header('location: login.php');
?>