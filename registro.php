<?php session_start(); ?>
<!doctype html>
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=3, minimal-ui">
    <link rel="icon" href="img/as.png" type="image/icon">
    <title>TIS</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/arsm.css">
    <link rel="stylesheet" href="css/styles.css">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/operaciones.js"></script>
    <title>Registrar usuario</title>
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
 <!-- Formulario REgistro-->
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-md-4 col-md-offset-4">
          
          <div class="spacing-1" style="margin-top:3em;"></div>

          <!-- Estructura del formulario -->
    
  <fieldset>

    <legend class="center">Registro</legend>
    <?php if(isset($_GET['error'])) { ?>             
              <p class="error" id="email_error"> <?php echo $_GET['error']; ?> </p> 
    <?php } ?>

    <form method="post" action="create-account.php" method="POST">
      
      <label class="sr-only" for="user">Nombres</label> 
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user"></i> <span> *</span></div>
        <input type="text" class="form-control" name="name" placeholder="Nombre Completo"> 
      </div>

      <!-- Div espaciador -->
      <div class="spacing-2"></div>

      <label class="sr-only" for="user">Apellidos</label>
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user"></i>    <span> *</span></div>
        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
      </div>
      <!-- Div espaciador -->
      <div class="spacing-2"></div>
             

      <label class="sr-only" for="user">Direccion</label>
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user"></i> <span> *</span></div>
        <input type="text" class="form-control" name="direccion" placeholder="Direccion">
      </div>
      <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <label class="sr-only" for="user">Telefono</label>
      <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-bug"></i> <span> *</span></div>
              <input type="text" class="form-control" name="telefono" placeholder="Telefono">
            </div>
      <!-- Div espaciador -->
            
            
            <div class="spacing-2"></div>

          <label class="sr-only" for="email">Correo Electronico</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-envelope"> <span> *</span></i></div>
              <input type="text" class="form-control" name="email" placeholder="Correo Electronico">
            </div>
              <!-- Div espaciador -->
            <div class="spacing-2"></div>
            <label class="sr-only" for="user">Codigo sis</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-bug"></i> <span> *</span></div>
              <input type="text" class="form-control" name="csis" placeholder="Codigo sis">
            </div>
             <div class="spacing-2"></div>
             

            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"> <span>*</span></i></div>
              <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Contraseña" >
            </div>
            <div class="spacing-2"></div>

      <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->

            <div class="spacing-2"></div>

            <!-- <label class="sr-only" for="Cbousuario">Tipo:</label> -->
            <!-- <div class="input-group"> -->
              <!-- <div class="input-group-addon" style="visibility:hidden" ><i class="fa fa-users"></i></div> -->

              <select name="Cbousuario" style="visibility:hidden" class="form-control"  placeholder="Tipo">
                <option value="4">Estudiante</option>
              </select> 
            <!-- </div> -->

            <div class="advice">Los campos con * son requeridos.</div>

            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
                  <button type="submit" class="btn btn-success btn-block">Registrarse</button>
                <div class="spacing-2"></div>
             </div>
            </div>
    </form>

    </div>    
    
  </div>
</div>
   
  </body>
</html>