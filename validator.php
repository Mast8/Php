<?php 
// function obtenerdatos($correo) {
// 	global $conn;
// 	$sql1 = "SELECT * FROM usuario WHERE correo = '$correo'";
// 	$result1 = mysqli_query($conn, $sql1);
// 	$usuario = mysqli_fetch_assoc($result1);
// 	return $usuario;
// }

function vacio($data, $type) {
    if(empty($email)) {
        header("location: login.php?error=The field $type is required");
        //exit();
    }
}
?>