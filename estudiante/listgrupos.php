<?php 

    include '../conn.php';
    include 'dashboard.php';
    //include 'controlestudiante.php';

      $id = $_SESSION['idE']; 


          $sql = "SELECT NOMBRE_MATERIA, NOMBRE_GRUPO, NOMBRES, APELLIDOS,HORA_ENTRADA, HORA_SALIDA, eg.HABILITADO, g.COD_GRUPO 
          from usuario u,estudiante e,estudiante_grupo eg, grupo g, horario h, materia m, docente d 
          where e.ID_USUARIO=eg.ID_USUARIO  and eg.COD_GRUPO=g.COD_GRUPO and g.COD_GRUPO=h.COD_GRUPO and m.ID_MATERIA=g.ID_MATERIA and g.DOC_ID_USUARIO=d.ID_USUARIO and d.ID_USUARIO=u.ID_USUARIO and e.ID_USUARIO=$id 
          order by HORA_ENTRADA asc";


  $query = $conn->query($sql);
?>

<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Grupos inscritos </h2>

  <table class="table">
    <thead>
        <th>MATERIA</th>
        <th>NOMBRE DEL GRUPO</th>
        <th>Docente</th>
        <th>Hora entrada</th>
        <th>Hora salida</th>
        <th>Opciones</th>
    </thead>

    <tbody>
      <?php while ($row=$query->fetch_array()): ?>
        <tr>
          <td><?php echo $row['NOMBRE_MATERIA']; ?></td>
          <td><?php echo $row['NOMBRE_GRUPO']; ?></td>
          <td><?php echo $row['NOMBRES']." ".$row['APELLIDOS']; ?></td>
          <td><?php echo $row['HORA_ENTRADA']; ?></td>
          <td><?php echo $row['HORA_SALIDA']; ?></td>

          
          <td style="width:150px;">
              <?php if ($row['HABILITADO']==1 ) { ?>
              <a href="listarTareas.php?idGrupo=<?php echo $row["COD_GRUPO"]; ?>" style="margin-bottom: 10px;" class="btn btn-sm btn-primary">Ver Practicas</a>

              <a href="retirarmateria.php?id=<?php echo $row["COD_GRUPO"]; ?>" onclick="return confirm('Esta seguro que quiere retirarse de este grupo?');"" style="margin-bottom: 10px;" class="btn btn-sm btn-warning">Retirar Grupo</a> 
              <?php  } else { ?>

              <a href="retirarmateria.php?id=<?php echo $row["COD_GRUPO"]; ?>" onclick="return confirm('Esta seguro que quiere retirarse de este grupo?');""  style="margin-bottom: 10px;" class="btn btn-danger">Grupo bloqueado, Retirar</a> 
            
          </td>
        </tr>

      <?php } endwhile; ?>
    </tbody>

  </table>
 </div>
</div>

