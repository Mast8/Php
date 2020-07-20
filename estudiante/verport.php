<?php 

    
    include 'dashboard.php';
    include 'subirdescar.php';


  $idEst = $_SESSION['idE']; 

  
  $sql = "SELECT * FROM practica where ID_USUARIO=$idEst ";
  $query = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<body>

<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Practicas Subidas</h2>

    <table class="table">

      <thead>
          
          <th>FECHA DE SUBIDA</th>
          <th>NOMBRE  </th>
          <th>NOMBRE FICHERO</th>
          <th>OPCION</th>
      </thead>

      <tbody>
        <?php while ($row=$query->fetch_array()): ?>
          <tr>            
            <td data-label="FECHA DE SUBIDA"> <?php echo $row['HORA_SUBIDA']; ?></td>
            <td data-label="NOMBRE"><?php echo $row['NOMBRE_PRACTICA']; ?></td>
            <td data-label="NOMBRE FICHERO"><?php echo $row['NOMBRE_FICHERO']; ?></td>
            <td data-label="OPCION">
              <a href="descargar.php?file=<?php echo $row['NOMBRE_FICHERO'] ?>"class="btn btn-sm btn-primary">
			<i class="fa fa-download" aria-hidden="true"></i></a>  
            </td>             
          </tr>

        <?php endwhile; ?>
      </tbody>
    </table>

</body>
       </div>
        </div>
    </div>
</html>