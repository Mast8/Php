<?php 
    include '../conn.php';
    include 'dashboard.php';

 
  $id = $_SESSION['idD']; 
  $sql = "SELECT * FROM materia";
 
  $query = $conn->query($sql);
 
            if (mysqli_query($conn, $sql)) {

            }
            else {
                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

?>
<!DOCTYPE html>
<html>

<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Materias Disponibles</h2>
            
<table class="table">

    <thead>
        <th>ID MATERIA</th>
        <th>NOMBRE</th>
        
        <th>Opciones</th>
    </thead>
    <tbody>
      <?php while ($row=$query->fetch_array()):?>
        <tr>
          <td><?php echo $row['ID_MATERIA']; ?>  </td>
          <td><?php echo $row['NOMBRE_MATERIA']; ?>  </td>
          
          <td style="width:150px;">
            <a href="inscribirse.php?idInscribirse=<?php echo $row["ID_MATERIA"];?>"  class="btn btn-sm btn-danger">Inscrbirse</a>
          </td>

        </tr>

     <?php endwhile;?>
</tbody>
</table>


</body>
</html>