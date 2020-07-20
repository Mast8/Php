<?php 

include '../conn.php';
include 'dashboard.php';


  $sql = "SELECT * FROM laboratorio";
  $query = $conn->query($sql);

?>


<div class="content">
      <div id="pad-wrapper" class="form-page">
          <div class="row header">
                <h3>Aulas registradas </h3>
            </div>

             
<!-- Button trigger modal -->


<table class="table">

  <thead>
    <th>NOMBRE DEL AULA</th>
    <th>CAPACIDAD</th>
  </thead>

  <tbody>
        <?php while ($row=$query->fetch_array()):?>
          <tr>
            <td>  <?php echo $row['NOMBRE_LABORATORIO']; ?>  </td>
            <td><?php echo $row['CAPACIDAD']; ?></td>
            
          </tr>

        <?php endwhile;?>
  </tbody>

</table>


           
    </div>
</div>

