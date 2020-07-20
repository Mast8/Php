<?php 

require_once('../conn.php');

function obtenerIdGrupo($id) {
	global $conn;
	$usuario=null;
	$sql = "SELECT COD_GRUPO FROM grupo WHERE ID_USUARIO = '$id'";
	$result = mysqli_query($conn, $sql);
	if($result){
			$usuario = mysqli_fetch_assoc($result);
	}
	return $usuario;
}

function obtenerAuxi($id) {
	global $conn;
	$usuario=null;
	$sql = "SELECT * FROM usuario WHERE ID_USUARIO = '$id'";
	$result = mysqli_query($conn, $sql);
	if($result){
			$usuario = mysqli_fetch_assoc($result);
	}
	return $usuario;
}

function obtenerEstudiante($id){
	global $conn;
	$sql = "SELECT * FROM estudiante WHERE ID_USUARIO=$id";
	$result = mysqli_query($conn, $sql);
	$estudiante = mysqli_fetch_assoc($result);
	return $estudiante;
}

function espulsarEstudiante($idEstudiante,$idGrupo){
	$sql = "DELETE FROM estudiante_grupo where COD_GRUPO=$idGrupo and ID_USUARIO=$idEstudiante";
			$query = $conn->query($sql);

			if($query!=null){
				print "<script>alert(\"Se retiro al alumno del grupo exitosamente.\")";
			}else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					print "<script>alert(\"No se pudo retirar al estudiante del grupo.\")";
			}
	}

?>