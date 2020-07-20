
<?php 

    include 'dashboard.php' ;
    
?>

<!doctype html>

 <!-- Formulario REgistro-->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          <div class="spacing-1"></div>

          <!-- Estructura del formulario -->
		
	<fieldset>

            <legend class="center">Registrar grupo</legend>
		
		<form method="post" action="crear_grup.php" method="POST">
			

		  <label class="sr-only" for="user">Materia</label> 
		  <div class="input-group">
              <div class="input-group-addon"><i class=""></i> <span>  Nombre  *  </span></div>
              <input type="text" class="form-control" name="name" placeholder="Nombre del grupo"required> 
            </div>
		  <!-- Div espaciador -->
            <div class="spacing-2"></div>


         <label class="sr-only" for="user">Descripcion</label>
		  <div class="input-group">
              <div class="input-group-addon"><i class=""></i>    <span>Descripcion * </span></div>
              <input type="text" class="form-control" name="descripcion" placeholder="Descripcion"required>
            </div>
		  <!-- Div espaciador -->
            <div class="spacing-2"></div>


            <label class="sr-only" for="user">Codigo para el</label>
            <div class="input-group">
              <div class="input-group-addon"><i class=""></i>    <span>Codigo del grupo * </span></div>
              <input type="text" class="form-control" name="codgru" placeholder="Codigo para el grupo"required>
            </div>
            
         

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
      		      <button type="submit" name ="guardar" class="btn btn-success btn-block">Crear curso</button>
      		  </div>
            </div>
		</form>		
		</div>		
		<div class="col-sm-12 col-md-6 col-lg-6">
			
		</div>
	</div>
</div>
   
	</body>
</html>