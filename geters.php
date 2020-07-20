<?php 

require_once('conn.php');


function obtenerdatos($correo) {
	global $conn;
	$sql1 = "SELECT * FROM usuario WHERE correo = '$correo'";
	$result1 = mysqli_query($conn, $sql1);
	$usuario = mysqli_fetch_assoc($result1);
	return $usuario;
}

function obtenerporta($id){
	global $conn;
	$sql = "SELECT * FROM portafolio WHERE ID_USUARIO=$id";
	$result = mysqli_query($conn, $sql);
	$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $files;
}
function obtenerauxi($id){
	global $conn;
	$sql = "SELECT * FROM auxiliar WHERE ID_USUARIO=$id";
	$result = mysqli_query($conn, $sql);
	$auxiliar = mysqli_fetch_assoc($result);
	return $auxiliar;
}
function obtenerdoc($id){
	global $conn;
	$sql = "SELECT * FROM docente WHERE ID_USUARIO=$id";
	$result = mysqli_query($conn, $sql);
	$docente = mysqli_fetch_assoc($result);
	return $docente;
}

function registrarsesi($user){
	global $conn;
	$id = $user['ID_USUARIO'];
	$csis = $user['COD_SYS'];

	$sql = "INSERT INTO sesion (ID_USUARIO, COD_SYS, HORA_CONECT) VALUES ('$id', '$csis',NOW())";
	$result = mysqli_query($conn, $sql);
	$usuario = mysqli_fetch_assoc($result);
}

?>