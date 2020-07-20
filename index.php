<?php session_start(); ?>    
<!DOCTYPE html>
		<html lang="pt-br">
	   		
	<!-- peswtaña pricipal y librerias -->

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=3, minimal-ui">
	    <link rel="icon" href="img/as.png" type="image/icon">
	    <title>TIS</title>

	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/font-awesome.min.css">
	    <link rel="stylesheet" href="css/sweetalert.css">
	    <link rel="stylesheet" href="css/style.css">
	    <link rel="stylesheet" href="css/arsm.css">


	   <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/sweetalert.min.js"></script>
	    <script src="js/operaciones.js"></script>


		<nav class="navbar navbar-inverse" style="margin: 0;">
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
                                <?php
                                   if(!empty($_SESSION)){
                                       if(!empty($_SESSION['id_rol'])){ echo '<li><a href="administrador/dashboard.php">Dashboard</a></li>'; }
                                       if(!empty($_SESSION['id_rolD'])){ echo '<li><a href="docente/dashboard.php">Dashboard</a></li>'; }
                                       if(!empty($_SESSION['id_rolA'])){ echo '<li><a href="auxiliar/dashboard.php">Dashboard</a></li>'; }
                                       if(!empty($_SESSION['id_rolE'])){ echo '<li><a href="estudiante/dashboard.php">Dashboard</a></li>'; }
                                   }else{
                                       echo '<li><a href="login.php">Login</a></li>';
                                       echo '<li><a href="registro.php">Registro</a></li>';
                                   }
                                ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</html>
<?php include 'carrousel.php';?>							