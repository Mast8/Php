<?php 
	
	include '../conn.php';
	include 'dashboard.php';
	include '../funsest.php';


	$id_usu = $_SESSION['idE']; 
	$estu = obtenerest($id_usu);
	$sis = $estu['COD_SYS'];

	//codigo escrito por estudiante
	$codGrupo = $_POST['codigo'];  
	//codigo definido por el docente
	$grupo = $_POST['cod'];

	if(!empty($_POST)){
		//echo $codGrupo.$grupo;
		

		if($codGrupo == $grupo){
			
			//obtiene alumnos inscritos
			
			$alumnosinscritos=obteneralumnosinscritos($codGrupo);
			$nroinscritos= $alumnosinscritos['inscritos'];

			//obtener limite del laboratorio, capacidadg inesesario?
			$limite = "SELECT CAPACIDAD from laboratorio l, grupo g where l.ID_LABORATORIO= g.ID_LABORATORIO and g.COD_GRUPO='$grupo'";
			$query1 = $conn->query($limite);
			$row = mysqli_fetch_assoc($query1);
			$limiteaula= $row['CAPACIDAD'];
			
			//corregir el eliminar del docente
			if($nroinscritos < $limiteaula){
			
				
				$sql1 = "INSERT INTO estudiante_grupo (ID_USUARIO, COD_SYS, COD_GRUPO) VALUES ('$id_usu','$sis','$codGrupo')";

					if (mysqli_query($conn, $sql1)) {

						//actualizar otra vez
						$alumnosinscritos=obteneralumnosinscritos($codGrupo);
						$nroinscritos= $alumnosinscritos['inscritos'];

						$inscritos = $nroinscritos ;
						echo $inscritos;
			      		$up = "UPDATE grupo SET CAPACIDADG= $inscritos where COD_GRUPO='$codGrupo'";
			      		mysqli_query($conn, $up);
			      		print "<script>alert(\"Se inscribio al grupo.\");window.location='listgrupoest.php';</script>";
					}
					else{
						print "<script>alert(\"Ya esta registrado en la materia.\");window.location='listgrupoest.php';</script>";
						echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
					}
			}
			else {
				print "<script>alert(\"El grupo esta lleno intente en otro momento.\");window.location='listgrupoest.php';</script>";
			}

		}else{
		print "<script>alert(\"Codigo incorrecto para el grupo.\");window.location='listgrupoest.php';</script>";
		}
	}
	

	function obteneralumnosinscritos($codGrupo){
	global $conn;
		$numeroroinscritos ="SELECT count( COD_GRUPO ) as inscritos from estudiante_grupo where COD_GRUPO='$codGrupo' group by COD_GRUPO";
		$query1 = $conn->query($numeroroinscritos);
		$nroalumnos = mysqli_fetch_assoc($query1);
	return $nroalumnos;

	}
?>
