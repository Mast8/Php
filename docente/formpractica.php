<?php 
    
    include 'dashboard.php' ;
    require_once '../conn.php';
?>


<!doctype html>

<body>

  <div class="content">
    <div id="pad-wrapper" class="form-page">
      <div class="row header">

        <!-- Formulario REgistro-->
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">

                  <div class="spacing-1"></div>

          <fieldset>

          <legend class="text-center">Registrar practica</legend>

          <!-- <form method="post" action="crearpractica.php" method="POST"> -->
          <form action="crearpractica.php" method="post" enctype="multipart/form-data" > 



                    <div class="input-group">
                      <div class="input-group-addon"><i class=""></i> <span>*</span></div>
                      <input type="text" class="form-control" name="nombre" placeholder="Nombre de la practica" required>
                    </div>

                  <!-- Div espaciador -->
                  <div class="spacing-2"> </div>
                    <p></p>
      
                <div class="form-group">
                    <select class="form-control" name="codgrupo">
                        <option selected>Seleccione su grupo y materia</option>
                        <?php
                        $id = $_SESSION['idD'];
                        $sql1= "SELECT NOMBRE_GRUPO, NOMBRE_MATERIA, g.COD_GRUPO from usuario u, docente d, grupo g, materia m WHERE u.ID_USUARIO=d.ID_USUARIO and d.ID_USUARIO=g.DOC_ID_USUARIO and g.ID_MATERIA = m.ID_MATERIA and u.ID_USUARIO=$id ";
                        $result = $conn->query($sql1);

                        while($grupo = $result->fetch_assoc()) {
                          ?>
                              <option value="<?= $grupo['COD_GRUPO']?>">
                              <?= $grupo['NOMBRE_GRUPO'].' '.$grupo['NOMBRE_MATERIA']?>
                              </option>
                          <?php    } ?>  
                    </select>
                </div>

                <input id="datepicker0" class="form-control" width="276" value="Fecha de entrega" name="fecha_inicio"/>
                <br>
                
                <input type="file" name="myfile"><br>
                <p></p>

                  <div style="color:  #0000ff;"> Los campos con * son requeridos.</div>
                      <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                          <div class="spacing-2"></div>

                          <button type="submit" name="guardar" class="btn btn-success btn-block">Crear practica</button>
                        </div>
                      </div>

        </form>
            </div>
            
          </div>
        </div>
        </fieldset>
      </div>
    </div>
  </div>


</body>
<script>
  $('#datepicker0').datepicker({ format: 'yyyy-mm-dd' });

</script>

</html>
