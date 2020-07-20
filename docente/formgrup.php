<?php 
  
  include 'dashboard.php' ;

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

              <!-- Estructura del formulario -->

              <fieldset>

                <legend class="text-center">Registrar grupo</legend>

                <form method="post" action="crear_grup.php" method="POST">
                  <div class="input-group">
                    <div class="input-group-addon"><i class=""></i> <span>*</span></div>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del grupo" required>
                  </div>

               
                  <div class="spacing-2">
                    <p></p>
                  </div>


                  <div class="input-group">
                    <div class="input-group-addon"><i class=""></i><span>*</span></div>
                    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion" required>
                  </div>
                 
                  <div class="spacing-2">
                    <p></p>
                  </div>


                  <div class="input-group">
                    <div class="input-group-addon"><i class=""></i><span>*</span></div>
                    <input type="text" class="form-control" name="codgru" placeholder="Codigo para el grupo" required>
                  </div>

                  <p></p>

                  <div class="form-group">
                    <select class="form-control" name="materia">
                      <option selected>Seleccionar materia</option>
                    <?php 
                      require_once '../conn.php';

                      $id = $_SESSION['idD'];
                      $sql = "SELECT m.ID_MATERIA, m.NOMBRE_MATERIA FROM materia m, docente_materia dm WHERE m.ID_MATERIA=dm.ID_MATERIA and m.ID_MATERIA IN (SELECT dm.ID_MATERIA FROM docente_materia dm, docente d where dm.COD_DOCENTE=d.COD_DOCENTE and d.COD_DOCENTE IN(SELECT d.COD_DOCENTE from docente d, usuario u where d.ID_USUARIO=u.ID_USUARIO and u.ID_USUARIO=$id))";
                      $result1 = $conn->query($sql);
                      while($materia = $result1->fetch_array()) {
                    ?>
                        <option value="<?= $materia['ID_MATERIA']?>"><?= $materia['NOMBRE_MATERIA']?></option>
                    <?php    
                      }
                    ?>
                    </select>
                  </div>


                   <div class="form-group">
                    <select class="form-control" name="aula">
                      <option selected>Seleccionar aula</option>
                    <?php 
                      require_once '../conn.php';
                      //$id = $_SESSION['id'];

                      $sql = "SELECT * from laboratorio";
                      $result1 = $conn->query($sql);
                      while($laboratorio = $result1->fetch_array()) {
                    ?>
                        <option value="<?= $laboratorio['ID_LABORATORIO']?>"><?= $laboratorio['NOMBRE_LABORATORIO']?></option>
                    <?php    
                      }
                    ?>
                    </select>
                  </div>



                  <div class="form-group">
                    <select class="form-control" name="auxiliar">
                        <option selected>Seleccionar auxiliar</option>

                        <?php
                        require_once '../conn.php';

                        $id = $_SESSION['idD'];
                       

                        $sql1= "SELECT a.ID_USUARIO, u.APELLIDOS, u.NOMBRES from docente_auxiliar da, auxiliar a, usuario u where da.ID_USUARIO= a.ID_USUARIO and a.ID_USUARIO=u.ID_USUARIO and da.DOC_ID_USUARIO=$id ";
             
                      
                        $result = $conn->query($sql1);
                        while($auxiliar = $result->fetch_array()) {
                          ?>
                              <option value="<?= $auxiliar['ID_USUARIO']?>"><?= $auxiliar['NOMBRES'].' '.$auxiliar['APELLIDOS']?></option>
                          <?php    
                            }
                          ?>  
                    </select>
                  </div>


                  <input id="datepicker0" class="form-control" width="276" value="Fecha inicio" name="fecha_inicio"/>
                  <br>
                  <input id="datepicker1" class="form-control" width="276" value="Fecha final" name="fecha_fin"/>
                  <br>

                  <div class="form-group">
                    <select class="form-control" name="hora">
                      <option selected>Seleccionar hora</option>
                      
                      <option value="14:15-15:45">14:15 - 15:45</option>
                      <option value="15:45-17:15">15:45 - 17:15</option>
                      <option value="17:15-18:45">17:15 - 18:45</option>
                     
                    </select>
                  </div>

                  <div class="form-group">
                    <select class="form-control" name="dia">
                      <option selected>Seleccionar Dia</option>
                      
                      <option value="Martes">Martes</option>
                      <option value="Miercoles">Miercoles</option>
                      <option value="Viernes">Viernes</option>
                     
                    </select>
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

                  <div style="color:  #0000ff;"> Los campos con * son requeridos.</div>

                  <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                      <div class="spacing-2"></div>

                      <button type="submit" name="guardar" class="btn btn-success btn-block">Crear curso</button>
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
  </div>

</body>
<script>
  $('#datepicker0').datepicker({
    format: 'yyyy-mm-dd'
  });
  $('#datepicker1').datepicker({
    format: 'yyyy-mm-dd'
  });
</script>

</html>