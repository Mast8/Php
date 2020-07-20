

<!doctype html>
<body>



 <!-- Formulario REgistro-->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          <div class="spacing-1"></div>

          <!-- Estructura del formulario -->
		
	<fieldset>

            <legend class="center">Registrar Materia</legend>
		
		<form method="post" action="crear_mat.php" method="POST">
			
		  <label class="sr-only" for="user">Materia</label> 
		  <div class="input-group">
              <div class="input-group-addon"><i class=""></i> <span>Nombre *</span></div>
              <input type="text" class="form-control" name="name" placeholder="Nombre de la materia"required> 
            </div>
		  
            <div class="spacing-2"></div>


         <label class="sr-only" for="user">Descripcion</label>
		  <div class="input-group">
              <div class="input-group-addon"><i class=""></i>    <span>Descripcion *</span></div>
              <input type="text" class="form-control" name="descripcion" placeholder="Descripcion"required>
            </div>
            
		  <div class="spacing-2"></div>

            <div style="color:  #0000ff;">Los campos con * son requeridos.</div>

    <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
		  <button type="submit" name ="guardar" class="btn btn-success btn-block">Registrar materia</button>
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