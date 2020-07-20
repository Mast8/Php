<?php 
  include 'dashboard.php';

  //$id_usu = $_SESSION['id_rol']; creo que nada q ver pero se queda porciaca
  $id_usu = $_SESSION['idE'];
 
  if(isset($_GET['idTarea'])){
            $idPracticaTarea= $_GET['idTarea'];

?>

<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
            
              <div class="col-xs-6 col-md-6 col-md-offset-4">
            

        <form action="subirdescar.php" method="post" enctype="multipart/form-data" >
          <h3>Subir archivo</h3>
          <input type="file" name="myfile"><br>
          <p></p>
          
          <p></p>
          <div class="input-group">
              <div class="input-group-addon"><i class=""></i> <span>Nombre de su practica</span></div>
              <input type="text" class="form-control" name="nombre" size ="30" placeholder="Nombre de su practica"  required >
          </div>

          <p></p>
          
          <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
              <button type="submit" name="save" class="btn btn-success btn-block" >Subir</button>
            </div>
          </div>

          <input type="hidden" name="practica" value="<?=$idPracticaTarea;?>">
          <input type="hidden" name="idEst" value="<?=$id_usu;?>">
        </form>

      </div>
      </div>
    </div>
  </body>
</html>

<?php
} ?>
