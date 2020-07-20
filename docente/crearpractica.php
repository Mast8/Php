<?php 
	require_once '../conn.php';
    session_start();
    include 'controldocente.php';

	if(isset($_POST['guardar'])){
		
		$nombre = $_POST['nombre'];
		$codgrupo = $_POST['codgrupo'];
		$fecha_inicio = $_POST['fecha_inicio'];
		//$fecha_fin = $_POST['fecha_fin'];


		$filename = $_FILES['myfile']['name'];
    
    //$destination = "uploads/{$id_usu}/" . $filename;
    $destination = "../uploadsd/" . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    $maxsize = 5 * 1024 * 1024;

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'txt', 'rar', 'png','jpg','jpeg'])) {
        print "<script>alert(\"La extencion debe ser .zip, .pdf, .docx, .rar o .txt.\");window.location='formpractica.php';</script>";
    } 
    // file shouldn't be larger than 5.24Megabytes
    elseif ($_FILES['myfile']['size'] > $maxsize) { 
            echo "El archivo sobrepasa los 5.24MB";
    }
    else {
        if(file_exists("../uploadsd/" . $filename)){
            echo $filename . " archivo ya existe.";
        } 
        else{
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {

               registrarDatos($nombre, $codgrupo, $fecha_inicio,$conn,$filename );
            
            }
        }
    }


		
	}

	function registrarDatos($nombre, $codgrupo, $fecha_inicio,$conn,$fich){
		if( !empty($nombre) and !empty($codgrupo) and !empty($fecha_inicio)  ){
			$sql = "INSERT INTO practica_tarea (COD_GRUPO, NOMBRE_PRACTI, HORA_FECHA_ENTREGA, FECHA_SUBID, NOMBRE_FICHEROT) VALUES ('$codgrupo','$nombre','$fecha_inicio', NOW(), '$fich')";

			if(mysqli_query($conn, $sql)){
				print "<script>alert(\"Se registro la practica exitosamente.\");window.location='vergrupo.php';</script>";
			}else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				print "<script>alert(\"No se pudo registrar la practica la practica.\")window.location='formgrupt.php';</script>";
			}
		}
	}


?>