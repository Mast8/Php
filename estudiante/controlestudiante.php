<?php 
	//session_start();
	$idus = $_SESSION['id_rolE'];
    if(!$idus == 4){
        header("Location: ../index.php");
    }

?>