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
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown"
                >
                    Bienvenido<?php echo ":".$_SESSION['name']  ?>

<br> <font size=3><MARQUEE><font face="Comic Sans MS,arial,verdana">Administrador   </font></MARQUEE></font>
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

              <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-user"></i>
                    <span>Reportes</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="reportes/reportematerias.php" >Materias</a></li>
                    <li><a href="reportes/reportedocentes.php" >Docentes</a></li>    
                    <li><a href="reportes/reportegrupos.php" >Grupos actuales</a></li>
                    <li><a href="reportes/antrepgru.php" >Grupos semestre pasado</a></li>
                </ul>
                
            </li>
            

            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Registro</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="regadm.php" >Registrar cuenta</a></li> 
                    <!-- <li><a href="roles.php" >Registrar rol</a></li> -->
                    <li><a href="formaula.php" >Registrar aula</a></li> 
                </ul>       
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span> Listas </span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="tablamat.php" >Materias</a></li>   
                    <li><a href="listaraulas.php" >Aulas</a></li>
                </ul> 
                            
            </li>  
            <li>
            <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Cuentas</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="validarCuentaEst.php" >Ver Cuentas</a>
                    </li>   
                </ul> </li>

                <li>
            <a href="formConfirm.php">
                    <i class="btn btn-success btn-block"></i>
                    <span>Reiniciar Sistema</span>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- end sidebar   
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h2>Bienvenido </h2>
                <?php
                // incluir dentro de esto lo que queramos
                    //include 'listmat.php';
                ?>

            </div>
        </div>
    </div>
    --> 

    <!-- scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>  
    <script src="js/theme.js"></script>
    <script src="js/personal.js"></script>

</body>