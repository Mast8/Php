<?php
	include "../conn.php";
	session_start();
	include 'controlestudiante.php';

	$idusuario = $_SESSION['idE']; 

	if(!empty($_GET["id"])){
				//elimina al estudiante de la grupo
				$idgrupo = $_GET["id"];
				$sql = "DELETE FROM estudiante_grupo where COD_GRUPO='$idgrupo' and ID_USUARIO=$idusuario";
				$query = $conn->query($sql);

				//obtener alumnos inscritos
				$numeroinscritos ="SELECT count( COD_GRUPO ) as inscritos from estudiante_grupo where COD_GRUPO='$idgrupo' group by COD_GRUPO";
				$query1 = $conn->query($numeroinscritos);
				$nroalumnos = mysqli_fetch_assoc($query1);
				$alumnos= $nroalumnos['inscritos'];

				//actualizar los inscritos + uno para insertar
				$inscritos = $alumnos +0;
				$up = "UPDATE grupo SET CAPACIDADG = $inscritos where COD_GRUPO='$idgrupo'";
	      				mysqli_query($conn, $up);


				if($query!=null){
					print "<script>alert(\"Se retiro del grupo exitosamente.\");window.location='listgrupoest.php';</script>";
				}else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					print "<script>alert(\"No se pudo retirar del grupo.\")";
				}
	}
?>