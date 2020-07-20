 <?php  
	session_start();
	if(!empty($_SESSION)){
            if($_SESSION['id_rolE'] != 4){
                   header('Location: ../index.php');
            }else{
                include 'head.php';
   	            include 'body.php';
            }
        }else{header('Location: ../index.php');}
?>	