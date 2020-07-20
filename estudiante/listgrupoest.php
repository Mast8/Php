<?php 

  include '../conn.php';
  include 'dashboard.php';
  //include 'controlestudiante.php';
  $id = $_SESSION['idE']; 
  

  $sql = "SELECT usuario.NOMBRES,usuario.APELLIDOS, materia.NOMBRE_MATERIA, grupo.NOMBRE_GRUPO, grupo.COD_GRUPO, horario.HORA_ENTRADA , horario.HORA_SALIDA, laboratorio.NOMBRE_LABORATORIO, DIA
   FROM grupo, materia, docente, usuario,horario,laboratorio WHERE materia.ID_MATERIA = grupo.ID_MATERIA and grupo.DOC_ID_USUARIO = docente.ID_USUARIO and docente.ID_USUARIO= usuario.ID_USUARIO and grupo.COD_GRUPO = horario.COD_GRUPO and grupo.ID_LABORATORIO= laboratorio.ID_LABORATORIO";


  $query = $conn->query($sql);

?>


<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Grupos registrados </h2>

    <table class="table">
      <thead>
          <th>MATERIA</th>
          <th>NOMBRE DEL GRUPO</th>
          <th>DOCENTE</th>
          <th>DIA</th>
          <th>LABORATORIO</th>
          <th>HORA ENTRADA</th>
          <th>HORA SALIDA</th>
          <th>CODIGO DEL GRUPO</th>
          <th>OPCIONES</th>
      </thead>

      <tbody>
        <?php while ($row=$query->fetch_array() ): ?>
          <tr>
            <td><?php echo $row['NOMBRE_MATERIA']; ?></td>
            <td><?php echo $row['NOMBRE_GRUPO']; ?></td>
            <td><?php echo $row['NOMBRES']." ".$row['APELLIDOS']; ?></td>
            <td><?php echo $row['DIA']; ?></td>
            <td><?php echo $row['NOMBRE_LABORATORIO']; ?></td>
            <td><?php echo $row['HORA_ENTRADA']; ?></td>
            <td><?php echo $row['HORA_SALIDA']; ?></td>

            <form method="post" action="inscrgrupo.php" method="POST">

              <td> <input type="text" class="form-control" name="codigo" size="10" placeholder="Ingrese el codigo del grupo" required>  </td>
              <td style="width:150px;">
              
              <div class="col-xs-9 col-xs-offset-3">
              <div class="spacing-2"></div>
              <button type="submit" class="btn btn-success btn-block">Inscribirse</button>
              <div class="spacing-2"></div>
              <input type="hidden" name="cod" value="<?php echo $row['COD_GRUPO']; ?>">
              </div>
            </form>


              
            </td>

          </tr>
        <?php  endwhile; ?>          
      </tbody>
      </table>
 </div>
</div>

