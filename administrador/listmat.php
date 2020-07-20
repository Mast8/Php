<?php 

include '../conn.php';
include 'dashboard.php';

  $id = $_SESSION['id']; 
  
  //echo $id;

  $sql = "SELECT * FROM materia";
  $query = $conn->query($sql);

?>


  <div class="content">
      <div id="pad-wrapper" class="form-page">
          <div class="row header">
                <h3>Materias registradas </h3>
          </div>

             
<!-- Button trigger modal -->
  <a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar</a>
        <br><br>

        <table class="table">
              <thead>
                  <th>ID</th>
                  <th>Nombre</th>

              </thead>

              <tbody>
                  <?php while ($row=$query->fetch_array()): ?>
                    <tr>
                      <td>  <?php echo $row['ID_MATERIA']; ?>  </td>
                      <td><?php echo utf8_decode($row['NOMBRE_MATERIA']); ?></td>
                      <!--<td><?php echo $row['DESCRIPCION_MAT']; ?></td> -->
                      
                    </tr>
                  <?php endwhile; ?>
              </tbody>

        </table>

    </div>
  </div>

