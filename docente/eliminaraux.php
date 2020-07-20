<?php

    include "../conn.php";
    include 'dashboard.php';


        if(isset($_GET['idEliminar'])){
        	
            $idAuxi=$_GET['idEliminar'];

            $sql2 = "DELETE from docente_auxiliar where ID_USUARIO=$idAuxi";
            //$sql = "DELETE FROM usuario WHERE ID_USUARIO=$idAuxi";
            $sql1 = "UPDATE  grupo set ID_USUARIO='0' WHERE ID_USUARIO=$idAuxi";
             
			if( /*mysqli_query($conn, $sql) and mysqli_query($conn, $sql1) and */mysqli_query($conn, $sql2) ){
                //$sql = "DELETE FROM auxiliar WHERE ID_USUARIO=$idAuxi";
				print "<script>alert(\"Se elimino el auxiliar exitosamente.\");window.location='listar_auxiliar.php';</script>";
			}else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					//print "<script>alert(\"No se pudo eliminar el auxiliar.\");window.location='listar_auxiliar.php';</script>";
			}
        }
