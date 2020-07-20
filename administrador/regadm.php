<?php 
include 'dashboard.php'; 

?>

<body>

  <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
               
		
     <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          
            <fieldset>

            <legend class="center">Registrar Cuenta</legend>


		      <form method="post" action="../create-account.php" method="POST">
     
			
		        <label class="sr-only" for="user">Nombres</label> 
		        <div class="input-group" style="margin-bottom: 10px;">
              <div class="input-group-addon"><i class="fa fa-user"></i> <span> *</span></div>
              <input type="text" class="form-control" name="name" placeholder="Nombre Completo"required> 
            </div>

		  
           


            <label class="sr-only" for="user">Apellidos</label>
		        <div class="input-group" style="margin-bottom: 10px;">
              <div class="input-group-addon"><i class="fa fa-user"></i>    <span> *</span></div>
              <input type="text" class="form-control" name="apellidos" placeholder="Apellidos"required>
            </div>
		  <!-- Div espaciador -->
            <div class="spacing-2"></div>
             
             
             <label class="sr-only" for="user">Codigo Tipo</label>
             <div class="input-group">
               <div class="input-group-addon"><i class="fa fa-user"></i> <span> *</span></div>
               <input type="number" id="cod-tipo" class="form-control" name="csis" placeholder="Codigo Tipo"required>
             </div>
      <!-- Div espaciador -->
            <div class="spacing-2"></div>

             <label class="sr-only" for="user">Direccion</label>
		  <div class="input-group"style="margin-bottom: 10px;">
              <div class="input-group-addon"><i class="fa fa-user"></i> <span> *</span></div>
              <input type="text" class="form-control" name="direccion" placeholder="Direccion"required>
            </div>
		  <!-- Div espaciador -->
            <div class="spacing-2"></div>

          <label class="sr-only" for="user">Telefono</label>
		        <div class="input-group"style="margin-bottom: 10px;">
              <div class="input-group-addon"><i class="fa fa-bug"></i> <span> *</span></div>
              <input type="number" class="form-control" name="telefono" placeholder="Telefono"required>
            </div>
		  <!-- Div espaciador -->
            <div class="spacing-2"></div>
            <p></p>
            <!--combobox para el tipo de usuario-->
           <!--  <label class="sr-only" for="Cbousuario">Tipo:</label>
            
            <div class="form-group">
                    <select class="form-control" name="rol">
                        <option selected>Seleccione rol </option>
                    <?php
                        require_once '../conn.php';
                        $sql1= "SELECT * from rol";
                        $result = $conn->query($sql1);

                        while($rol = $result->fetch_assoc()) {
                          ?>
                              <option value="<?= $rol['ID_ROL'] ?>">
                              <?= $rol['ROL'] ?>
                              </option>
                          <?php    } ?>  
                    </select>
                </div>
          -->

          <label class="sr-only" for="Cbousuario">Tipo:</label>
            <div class="input-group" style="margin-bottom: 10px;">
              <div class="input-group-addon"  ><i class="fa fa-users"></i></div>

              <select name="Cbousuario" class="form-control"  placeholder="Tipo">
                <option value="4">Estudiante</option>
                <option value="3">Auxiliar</option>
                <option value="2">Docente</option>
                <option value="1">Administrador</option>
              </select> 
            </div>

            

          <label class="sr-only" for="email">Correo Electronico</label>
            <div class="input-group" style="margin-bottom: 10px;">
              <div class="input-group-addon"><i class="fa fa-envelope"> <span> *</span></i></div>
              <input type="email" class="form-control" name="email" placeholder="Correo Electronico"required>
            </div>
              <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group" style="margin-bottom: 10px;">
              <div class="input-group-addon"><i class="fa fa-lock"> <span>*</span></i></div>
              <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Contraseña" required>
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

            <div style="color:  #0000ff;">Los campos con * son requeridos.</div>

                <div class="row">
                  <div class="col-xs-8 col-xs-offset-2">
                    <div class="spacing-2"></div>
      		          <button type="submit" class="btn btn-success btn-block">Registrar</button>
                      <div class="spacing-2"></div>
    		          </div>
                </div>
		    </form>		
		  </div>		
           </div>  
            </div>		
	
                </div>
                  <script src="js/check.js"></script>
             </form>
                            </div>
                                  </div>
          </div>
        </div>
      </div>
         
  


 </body>
