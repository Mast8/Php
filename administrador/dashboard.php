
  <?php  
    session_start();
    $idus = $_SESSION['id_rol'];
    if(!$idus == 1){
        header("Location: ../index.php");
    }
   include 'head.php';
   include 'body.php';
?>

<!DOCTYPE html>
<html lang="es">



</html>