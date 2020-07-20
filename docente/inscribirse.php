<?php
    
    include "../conn.php";
    include 'dashboard.php';
    include_once '../geters.php';
    
    
    $id = $_SESSION['idD']; 
    $datosUsu = obtenerdoc($id);
    $codoc = $datosUsu['COD_DOCENTE'];
    //$idDocente = $_SESSION['id']; 

        if(isset($_GET['idInscribirse'])){
        	//session_start();
        	//$idgrup = $_SESSION['grupo'];
            $idMat=$_GET['idInscribirse'];

            $sql = "INSERT INTO docente_materia(ID_USUARIO, COD_DOCENTE, ID_MATERIA) VALUES ('$id','$codoc','$idMat')";
			
			if(mysqli_query($conn, $sql)){
				print "<script>alert(\"Se inscribio a la materia exitosamente.\");window.location='formIns.php';</script>";
			}else{
                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				print "<script>alert(\"Ya esta inscrito en la materia .\");window.location='formIns.php';</script>";
			}
        }