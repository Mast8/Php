<?php  

	session_start();
	//include 'controlsesion.php';
	$idus = $_SESSION['id_rolA'];
    if(!$idus == 3){
    	header('Location: ../index.php');
      
    }
    
   	include 'head.php';
   	include 'body.php';
  
?>
<!DOCTYPE html>
<html lang="es">

    <!-- end navbar -->

   
</html>