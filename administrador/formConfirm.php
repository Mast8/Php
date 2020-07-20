<?php 

include 'dashboard.php' ;
//session_start()  


;?>

<!doctype html>

 <!-- Formulario REgistro-->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          <div class="spacing-1"></div>

          <!-- Estructura del formulario -->
		
	<fieldset>

            <legend class="center">Confirmacion de Reinicio</legend>
		
		<form method="post" action="reiniciar_sistema.php" method="POST">
			<!--<div class="form-group">				
				<input type="text" class="form-control" name="name" placeholder="Enter your name" required>			
		  </div>-->
		  


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

            <div style="color:  #0000ff;">
            Si reinicia el sistema se borraran los siguientes elementos
            usuarios del tipo Auxiliares y Estudiantes.
            Con respecto a los grupos los mismos, todas las tareas practicas y respectivas practicas entregadas.
            
            </div>
            <div> 
            
            </div>

    <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
		  <button type="submit" name ="reiniciar" class="btn btn-success btn-block">Reiniciar</button>
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