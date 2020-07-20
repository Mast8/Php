<?php 
	include "../conn.php";


		if(isset($_GET['idno'])){
            $no=$_GET['idno'];
            $estado=1;
            $query = "UPDATE practica set ASISTENCIA =$estado where ID_PRACTICA=$no";
            if(mysqli_query($conn, $query)){
                header('Location:' . getenv('HTTP_REFERER'));
                echo "<script>alert(\"Se marco la asistencia del estudiante.\")";
            	//print "<script>window.location='listartareas.php';</script>";
			}else{
                print "<script>alert(\"Se pudo modificar la falta/asistencia del estudiante.\")";
				//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

        }

		if(isset($_GET['idsi'])) {
            $si=$_GET['idsi'];
            $estado=0;
            $query = "UPDATE practica set ASISTENCIA =$estado where ID_PRACTICA=$si";
            
            if(mysqli_query($conn, $query)){
                print "<script>alert(\"Se marco la asistencia del estudiante.\")";
                header('Location:' . getenv('HTTP_REFERER'));
            }else{
                print "<script>alert(\"Se pudo modificar la falta/asistencia del estudiante.\")";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                
            }
        }

?>