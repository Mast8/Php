<?php 
	include 'dashboard.php';
?>



<body>

	<div class="content">
    <div id="pad-wrapper" class="form-page">
      <div class="row header">
                <h2>Registro Aulas </h2>
      </div>

      <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          
          <div class="spacing-2"></div>
			<fieldset>

    <legend class="center">Registrar aula</legend>
		<form method="post" action="crearaula.php" method="POST">
			
        <div class="spacing-2"></div>
        <label class="sr-only" for="user">Nombre</label>
  		  <div class="input-group" style="margin-bottom: 10px;">
            <div class="input-group-addon"><i class="fa fa-bug"></i> <span> *</span></div>
            <input type="text" class="form-control" name="aula" placeholder="Nombre del aula"required>
        </div>

        <div class="spacing-2"></div>
        <label class="sr-only" for="user">Capacidad</label>
        <div class="input-group" style="margin-bottom: 10px;">
            <div class="input-group-addon"><i class="fa fa-bug"></i> <span> *</span></div>
            <input type="number" class="form-control" name="capacidad" placeholder="Capacidad del aula"required>
        </div>

        <div class="spacing-2"></div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
          		  <button type="submit" name ="crerol" class="btn btn-success btn-block">Registrar aula</button>
    		   </div>
        </div>

		</form>		

		        </div>		
      		<div class="col-sm-12 col-md-6 col-lg-6">
      			
      		</div>
	     </div>
      </div>
    </div>
  </div>

</body>
</html>