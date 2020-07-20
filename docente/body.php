<body>
    <!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">            
            <a class="navbar-brand" href="dashboard.php">
                <img src="../img/adm1.png" alt="logo" /> &nbsp &nbsp  &nbsp
                <font size=5 color="silver" face="Comic Sans MS,arial,verdana">Sistema de laboratorio</font>
            </a>
        </div>
        <ul class="nav navbar-nav pull-right hidden-xs">                       
            <li class="notification-dropdown hidden-xs hidden-sm">
                <a href="#" class="trigger">
                    <i class="icon-user"></i>
                </a>
                <div class="pop-dialog">                    
                </div>
            </li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    Bienvenido<?php echo ":".$_SESSION['nameD']  ?>

<br> <font size=3><MARQUEE><font face="Comic Sans MS,arial,verdana">Docente   </font></MARQUEE></font>
                </a>                
            </li>             
            <li class="settings hidden-xs hidden-sm">
                <a href="../logout.php" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </header>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="dashboard.php">
                    <i class="icon-home"></i>
                    <span>Inicio</span>
                </a>
                
            </li>    

              <!--<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-user"></i>
                    <span>Perfil</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#" >Editar perfil</a></li>                    
                </ul>
                
            </li> -->



            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Estudiantes</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="vergrupo.php" >Ver Grupos</a></li>    
                   
                    <li><a href="reportes/repest.php" >Reporte Estudiantes</a></li>
                    <li><a href="reportes/repaux.php" >Reporte Auxiliares</a></li>
                    <li><a href="grupAnt.php" >Grupos anteriores</a></li>
                </ul>     
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Auxiliares</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="listar_auxiliar.php" >Ver Auxiliares</a></li>    
                    <li><a href="formaux.php" >Anadir Auxiliar</a></li>  
                </ul>     
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Cursos</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="formgrup.php" >Registrar grupo</a></li> 
                    <li><a href="formIns.php" >Inscribirse a Materias</a></li>   
                </ul>
                <ul class="submenu">
                    <li><a href="formpractica.php" >Registrar practica</a></li>   
                </ul>
                            
            </li>  
        </ul>
    </div>
 

    <!-- scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.datepicker.js"></script>
    <script src="../js/jquery.uniform.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/jquery-ui-1.10.2.custom.min.js"></script>  
    <script src="../js/theme.js"></script>
    <script src="../js/personal.js"></script>

</body>