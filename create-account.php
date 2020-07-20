<!doctype html>
<html lang="en">
  <head>
    <title>CREAR CUENTA NUEVA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

<div class="container">

	<?php
	include 'conn.php';
	include 'geters.php';
	//include 'email/email.php';

	// Consulta para comprobar si el correo electrónico ya existe.
	$checkEmail = "SELECT * FROM usuario WHERE CORREO = '$_POST[email]' ";
	// Variable $result hold the connection data and the query
	$result = $conn-> query($checkEmail);
	// Variable $count hold the result of the query
	$count = mysqli_num_rows($result);

	// If count == 1 that means the email is already on the database
	if ($count == 1) {
		print "<script>alert(\"Ese correo ya esta registrado.\");window.location='registro.php';</script>";
	} else {
	/*
		Si el correo electrónico no existe, los datos del formulario se envían a la
		Base de datos y se crea la cuenta. esta parte se conecta con los nombres de las etiquetas
	*/
			$name = $_POST['name'];
			$ape = $_POST['apellidos'];
			$cods = $_POST['csis'];
			$dir = $_POST['direccion'];
			$telef = $_POST['telefono'];
			$tipo = $_POST['Cbousuario'];
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
			// La función password_hash () convierte la contraseña en un hash antes de enviarla a la base de datos
			$passHash = password_hash($pass, PASSWORD_DEFAULT);
			
			// Consulta para enviar hash de nombre, correo electrónico y contraseña  y demas datos a la base de datos
			$query = "INSERT INTO usuario (NOMBRES, APELLIDOS, DIRECCION, TELEFONO,CORREO,PASSWORD,ID_ROL) VALUES ('$name', '$ape', '$dir', '$telef', '$email', '$passHash','$tipo')";

			if (mysqli_query($conn, $query)) {
					$usuario = obtenerdatos($email);
					$id_usu = $usuario['ID_USUARIO']; 


					if ($tipo==4) {
						/*$dirname = "estudiante/uploads/".$id_usu;
			  			mkdir($dirname);*/

			  		$query = "INSERT INTO estudiante (ID_USUARIO, COD_SYS) VALUES ('$id_usu', '$cods')";
			  			if(mysqli_query($conn, $query)){
							print "<script>alert(\"Se registro en el sistema.\");window.location='login.php';</script>";
						} else {
							echo "Error: " . $query . "<br>" . mysqli_error($conn);
							print "<script>alert(\"No se pudo registrar.\")";
						}
					} else {
						//auxiliar
						if ($tipo==3) {
							
							$query = "INSERT INTO auxiliar (ID_USUARIO, COD_AUXILIAR) VALUES ('$id_usu', '$cods')";
							if(mysqli_query($conn, $query)){
							print "<script>alert(\"Se registro en el sistema.\");window.location='login.php';</script>";
							} else {
								echo "Error: " . $query . "<br>" . mysqli_error($conn);
								print "<script>alert(\"No se pudo registrar.\")";
							}
						} else {
							//docente
							if ($tipo==2) {
								$query = "INSERT INTO docente (ID_USUARIO, COD_DOCENTE) VALUES ('$id_usu', '$cods')";
								if(mysqli_query($conn, $query)){
								print "<script>alert(\"Se registro en el sistema.\");window.location='login.php';</script>";
								} else {
									echo "Error: " . $query . "<br>" . mysqli_error($conn);
									print "<script>alert(\"No se pudo registrar.\")";
								}
							} else {
								
								$query = "INSERT INTO adaministrador (ID_USUARIO, COD_ADMIN) VALUES ('$id_usu', '$cods')";
								if(mysqli_query($conn, $query)){
								print "<script>alert(\"Se registro en el sistema.\");window.location='login.php';</script>";
								} else {
									//echo "Error: " . $query . "<br>" . mysqli_error($conn);
									print "<script>alert(\"No se pudo registrar.\")";
								}
							}
							
						}
						
					}
					
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}	
		}	
		mysqli_close($conn);
	?>
</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>