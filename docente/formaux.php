<?php 
  include 'dashboard.php' ;
  
?>
<!doctype html>
<body>
 <!-- Formulario REgistro-->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          <div class="spacing-1" style="margin-bottom:3em;"></div>

          <!-- Estructura del formulario -->
    
  <fieldset>

            <legend class="center">Registrar Auxiliar</legend>
    
    <form method="post" action="crear_auxiliar.php" method="POST">
      
      
      <div class="input-group" style="margin-bottom:10px;">
              <div class="input-group-addon"><i class=""></i> <span>*</span></div>
              <input type="text" class="form-control" name="nombre" placeholder="Nombres" required>
      </div>

      <!-- Div espaciador -->
            <div class="spacing-2"></div>


      <div class="input-group" style="margin-bottom:10px;">
              <div class="input-group-addon"><i class=""></i> <span>*</span></div>
              <input type="text" class="form-control" name="apellidos" placeholder="Apellidos"required>
            </div>
      <!-- Div espaciador -->
            <div class="spacing-2"></div>
             
      <div class="input-group" style="margin-bottom:10px;">
        <div class="input-group-addon"><i class=""></i> <span>*</span></div>
        <input type="number" class="form-control" name="cod_aux" placeholder="Codigo Auxiliar"required>
      </div>
      <!-- Div espaciador -->
      <div class="spacing-2"></div>



      <div class="input-group"style="margin-bottom:10px;">
            <div class="input-group-addon"><i class=""></i> <span>*</span></div>
              <input type="text" class="form-control" name="direccion" placeholder="Direccion"required>
            </div>
      <!-- Div espaciador -->
            <div class="spacing-2"></div>

      <div class="input-group" style="margin-bottom:10px;">
              <div class="input-group-addon"><i class=""></i> <span>*</span></div>
              <input type="number" class="form-control" name="telefono" placeholder="Telefono"required>
            </div>
      <!-- Div espaciador -->
            
            
            <div class="spacing-2"></div>

            <div class="input-group" style="margin-bottom:10px;">
              <div class="input-group-addon"><i class=""></i> <span>*</span></div>
              <input type="email" class="form-control" name="email" placeholder="Correo Electronico"required>
            </div>
              <!-- Div espaciador -->
            <div class="spacing-2"></div>

            
            <div class="input-group" style="margin-bottom:10px;">
              <div class="input-group-addon"><i class=""></i> <span>*</span></div>
              <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Contraseña" required>
            </div>
            <div class="spacing-2"></div>

             <!-- Div espaciador -->
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

            <label class="sr-only" for="Cbousuario">Tipo:</label>
            <div class="input-group">
              <div class="input-group-addon" style="visibility:hidden" ><i class="fa fa-users"></i></div>

              <select name="Cbousuario" style="visibility:hidden" class="form-control"  placeholder="Tipo">
                <option value="3">Auxiliar</option>
                </select> </div>

            <div style="color:  #0000ff;">Los campos con * son requeridos.</div>

    <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
      <button type="submit" name="registrar" class="btn btn-success btn-block">Registrar</button>
      <div class="spacing-2"></div>

      
       </div>
            </div>
    </form>   
    </div>    
    
  </div>
</div>
   
  </body>
</html>