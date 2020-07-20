<?php
	require_once '../conn.php';
	require_once '../geters.php';
	session_start();

	if(isset($_POST['guardar'])){
		$docente = $_SESSION['idD'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$codgru = $_POST['codgru'];
		$materia = $_POST['materia'];
		$auxiliar = $_POST['auxiliar'];
		$fecha_inicio = $_POST['fecha_inicio'];
		$fecha_fin = $_POST['fecha_fin'];
		$hora = $_POST['hora'];

		$dia = $_POST['dia'];
		$aula = $_POST['aula'];
		
		if(!empty($nombre) || !empty($descripcion) || !empty($codgru) || !empty($materia)  || $auxiliar == 0 || !empty($fecha_inicio) || !empty($fecha_fin) || !empty($hora) || !empty($dia) || !empty($aula)){
			
		$sqll1 = "SELECT COD_DOCENTE FROM docente WHERE ID_USUARIO=$docente";
		$res1 = mysqli_query($conn, $sqll1);
		$doc = mysqli_fetch_assoc($res1);
		//$doc = obtenerdoc($docente);

		$codoc = $doc['COD_DOCENTE'];
		//$aux = obtenerauxi($auxiliar);
		$sqll2 = "SELECT COD_AUXILIAR FROM auxiliar WHERE ID_USUARIO=$auxiliar";
		$res2 = mysqli_query($conn, $sqll2);
		$aux = mysqli_fetch_assoc($res2);

			//revisar auxiliar repetido
			$checkEmail = "SELECT ID_USUARIO FROM grupo WHERE ID_USUARIO=$auxiliar";
			$result = $conn-> query($checkEmail);
			$count = mysqli_num_rows($result);// error si se envia combobox por defecto
			if ($count == 1) {
				print "<script>alert(\"El auxiliar ya esta registrado.\");window.location='formgrup.php';</script>";
			}

		$codaux = $aux['COD_AUXILIAR'];
		registrarDatos($nombre, $descripcion, $codgru, $materia, $auxiliar, $fecha_inicio, $fecha_fin, $hora, $conn, $docente, $codoc, $codaux,  $dia, $aula);
		}else {
			echo "<p class='error'>* agrega tu nombre </p>";
			//print "<script>alert(\"Debe llenar los campos.\")window.location='formgrupt.php';</script>";
		}
	}

	function registrarDatos($nombre, $descripcion, $codgru, $materia, $auxiliar, $fecha_inicio, $fecha_fin, $hora, $conn, $docente, $codoc, $codaux,$dia,$aula){
		/*if(!empty($nombre) and !empty($descripcion) and !empty($codgru) and !empty($materia) and !empty($auxiliar) and !empty($fecha_inicio) and !empty($fecha_fin) and !empty($hora)and !empty($dia) and !empty($aula)){*/

			registrarGrupo($nombre, $descripcion, $codgru, $materia, $auxiliar, $fecha_inicio, $fecha_fin, $conn, $docente, $codoc, $codaux,$aula);
			registrarHorario($hora, $codgru, $conn,$dia);
		//}
	}
	//obtener codauxiliar y enviar
	function registrarGrupo($nombre, $descripcion, $codgru, $materia, $auxiliar, $fecha_inicio, $fecha_fin, $conn, $docente, $codoc, $codaux,$aula){
		$sql = "INSERT INTO grupo (COD_GRUPO, ID_MATERIA, ID_USUARIO, COD_AUXILIAR, DOC_ID_USUARIO, COD_DOCENTE, NOMBRE_GRUPO, FECHA_INI, FECHA_FIN, ID_LABORATORIO) 
		VALUES('$codgru', $materia, $auxiliar, '$codaux', '$docente', '$codoc','$nombre', '$fecha_inicio', '$fecha_fin',$aula)";
		mysqli_query($conn, $sql);

		
		//mysqli_query($conn, $sql);
	}

	function registrarHorario($hora, $codgru, $conn,$dia){
		$hora_total = explode("-", $hora);
		$hora_ini = $hora_total[0];
		$hora_fin = $hora_total[1];
		$sql = "INSERT INTO horario(COD_GRUPO, HORA_ENTRADA, HORA_SALIDA,DIA) 
		VALUES('$codgru', '$hora_ini', '$hora_fin','$dia')";
		
		if(mysqli_query($conn, $sql)){
			print "<script>alert(\"Se creo el grupo exitosamente.\");window.location='vergrupo.php';</script>";
		}else{
			echo "<p class='error'>* Se repite el horario, aula y dia </p>";
			//echo "Error: " . $sql . "<br>" . mysqli_error($conn); no repetir codgrupo
			//print "<script>alert(\"No se pudo crear del grupo.\")window.location='formgrupt.php';</script>";
		}

	}
	