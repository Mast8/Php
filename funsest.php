
<?php
include('conn.php');

function obtenerest($id){
	global $conn;
	$sql = "SELECT * FROM estudiante WHERE ID_USUARIO=$id";
	$result = mysqli_query($conn, $sql);
	$usuario = mysqli_fetch_assoc($result);
	return $usuario;

}

function getPractica($idPractica){
	global $conn;
	$sql= "SELECT * From practica where ID_PRACTICA_TAREA=$idPractica";
	$result = mysqli_query($conn, $sql);
	$usuario = mysqli_fetch_assoc($result);
	return $usuario;

}


?>
