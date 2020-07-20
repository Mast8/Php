<?php
session_start();
include 'geters.php';
include 'funsest.php';
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include 'conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// data sent from form login
			$email = $_POST['email']; 
			$contra = $_POST['password'];
			
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT ID_USUARIO, CORREO, PASSWORD, NOMBRES,APELLIDOS, ID_ROL,estado FROM usuario WHERE CORREO = '$email' ");			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
				$hash = $row['PASSWORD'];
				$idrol = $row['ID_ROL'];
				$idus = $row['ID_USUARIO'];
				$estad = $row['estado'];
				
				
				if(password_verify($_POST['password'], $hash)){

					if($idrol==4){
						
						$usuario = obtenerest($idus);
						$_SESSION['id_rolE'] = $idrol;
						$_SESSION['correoE'] = $row['CORREO'];
	          			$_SESSION['idE'] = $row['ID_USUARIO'];
	          			$_SESSION['nameE'] = $row['NOMBRES'];
	          			

						if($estad==0){
						//script para mostrar ventana emergente y redireccion a login(sergio)
		                print "<script>alert(\"Cuenta desactivada, comuniquese con el administrador..\");window.location='login.php';</script>";
                           
						}else{

							$nombre_usuario = $_SESSION['nameE'];
							$idE=$_SESSION['idE'];
							//obtener codigo sis
							$consulta= "SELECT COD_SYS from estudiante where ID_USUARIO= $idE";
							$result1 = mysqli_query($conn, $consulta);
							$estu = mysqli_fetch_assoc($result1);
							$csis = $estu['COD_SYS'];
							$_SESSION['codsysE'] =$csis;

							$sql = "INSERT into sesion (ID_USUARIO,COD_SYS,FECHA,HORA_CONECT) values('$idE','$csis',now(),now())";
							mysqli_query($conn,$sql) ; 

							
						header ('Location: estudiante/dashboard.php'); 
						}
					}else{
						if($idrol==3){
							$_SESSION['id_rolA'] = $idrol;
							$_SESSION['correoA'] = $row['CORREO'];
		          			$_SESSION['idA'] = $row['ID_USUARIO'];
		          			$_SESSION['nameA'] = $row['NOMBRES'];
		          			$_SESSION['apeA'] = $row['APELLIDOS'];
		          			//cuidado con header igual mando al docente siendo que no deberia
							//print "<script>alert(\"Bienvenido docente ". $row['NOMBRES']." ingresar al sistema.\");window.location='auxiliar/dashboard.php';</script>";
							header('Location: auxiliar/dashboard.php');
						}
						else{
							if($idrol==2){
								$_SESSION['id_rolD'] = $idrol;
								$_SESSION['correoD'] = $row['CORREO'];
			          			$_SESSION['idD'] = $row['ID_USUARIO'];
			          			$_SESSION['nameD'] = $row['NOMBRES'];

			          			//print "<script>alert(\"Bienvenido docente ". $row['NOMBRES']." ingresar al sistema.\");window.location='docente/dashboard.php';</script>";
								header('Location: docente/dashboard.php');
							}
							else {
								$_SESSION['id_rol'] = $idrol;
								$_SESSION['correo'] = $row['CORREO'];
			          			$_SESSION['id'] = $row['ID_USUARIO'];
			          			$_SESSION['name'] = $row['NOMBRES'];
								header('Location: administrador/dashboard.php');
							}
						}
					}
				}else{
					//echo 'No son iguales las contrasenas';
					print "<script>alert(\"Correo o contrasena equivocada.\");window.location='index.php';</script>";
				}

			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>