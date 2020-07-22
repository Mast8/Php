
<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=3, minimal-ui">
    <link rel="icon" href="img/as.png" type="image/icon">
    <title>TIS</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/arsm.css">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/operaciones.js"></script>
  </head>

  <body>
		<nav class="navbar navbar-inverse" style="margin: 0; font-size:16px;">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">Sistema de Control de Laboratorio</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav navbar-right">
		    
		    		<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enlaces <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="http://websis.umss.edu.bo" target="_blank">Websis </a></li>
			            <li><a href="http://www.cs.umss.edu.bo" target="_blank">CS INF-SIS</a></li>
			            <li><a href="http://moodle3.umss.edu.bo" target="_blank">Moodle</a></li>
			            <li role="separator" class="divider"></li>
			            <!--<li><a href="#" class="disable center">ayuda</a></li>-->
			          </ul>
			        </li>
		    		<li class="dropdown"><a href="index.php">Inicio</a></li>
		    		<?php
                                   if(!empty($_SESSION)){
                                       if(!empty($_SESSION[id_rol])){ header('Location: administrador/dashboard.php'); }
                                       if(!empty($_SESSION[id_rolD])){ header('Location: docente/dashboard.php'); }
                                       if(!empty($_SESSION[id_rolA])){ header('Location: auxiliar/dashboard.php'); }
                                       if(!empty($_SESSION[id_rolE])){ header('Location: estudiante/dashboard.php'); }
                                   }else{
                                       echo '<li><a href="login.php">Login</a></li>';
                                       echo '<li><a href="registro.php">Registro</a></li>';
                                   }
                                ?>
		   	        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
    <!-- Formulario Login -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          <div class="spacing-1"></div>

          <!-- Estructura del formulario -->
          <fieldset>

            <legend class="center">Login</legend>

            <?php if(isset($_GET['error'])) { ?>             
              <p class="error" id="email_error"> <?php echo $_GET['error']; ?> </p> 
            <?php } ?>

            <!-- vewrifica conexion y si existe entonces te redirecciona-->
            <form action="vista-rol.php" method="POST" onsubmit="return Validate()" name="vform"> 
            <!-- <form action="vista-rol.php" method="POST">  -->
             <!--fin -->
            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Usuario</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i>  <span>*</span></div>
              <!--<input type="text" class="form-control" id="user" placeholder="Ingresa tu correo">-->
              <input type="email" class="form-control" name="email" placeholder="Ingrese su correo">
            </div>
            <div id="email_erro"></div> 

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i>  <span>*</span></div>
              <input type="password" class="form-control " name="password" placeholder="Ingrese su password" >
            </div>
            <div id="pass_error"></div> 
                  
             <div class="advice">Los campos con * son requeridos.</div>
            <!--  )-->
           

            <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
                <button type="submit" class="btn btn-success btn-block">Login</button>
               
              </form>
              </div>
            </div>

            <section class="text-accent center">
              <div class="spacing-2"></div>
              
              <p>
                No tiene una cuenta? <a href="registro.php"> Registrese</a>
              </p>
            </section>

          </fieldset>
        </div>
      </div>
    </div>

    <!-- / Final Formulario login -->

    <script src="js/validate.js"> </script>
  </body>
</html> 

