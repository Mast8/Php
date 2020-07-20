<?php 
    //include 'controldocente.php'; 
    include '../conn.php';
    include 'dashboard.php';
    
     
  $id = $_SESSION['idD']; 
  
  $sql = "SELECT  u.ID_USUARIO, u.NOMBRES, u.APELLIDOS, a.COD_AUXILIAR FROM usuario u, auxiliar a 
  WHERE u.ID_USUARIO=a.ID_USUARIO and a.COD_AUXILIAR IN 
  (SELECT a.COD_AUXILIAR FROM auxiliar a, docente_auxiliar da 
   WHERE a.COD_AUXILIAR=da.COD_AUXILIAR and a.COD_AUXILIAR IN 
   (SELECT COD_AUXILIAR FROM docente_auxiliar da, docente d 
    WHERE da.COD_DOCENTE=d.COD_DOCENTE and d.ID_USUARIO IN
    (SELECT ID_USUARIO from usuario where ID_USUARIO=$id )))";
 
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
            <div class="row header">
                <h3>Auxiliares registrados </h3>
            </div>
<table class="table">

<thead>
    <th>ID USUARIO</th>
    <th>COD AUXILIAR</th>
    <th>NOMBRES</th>
    <th>APELLIDOS</th>
    
    

</thead>
<tbody>
  <?php while ($row=$query->fetch_array()):?>
    <tr>
      <td><?php echo $row['ID_USUARIO']; ?></td>
      <td><?php echo $row['COD_AUXILIAR']; ?>  </td>
      <td><?php echo $row['NOMBRES']; ?>  </td>
      <td><?php echo $row['APELLIDOS']; ?></td>
      
    </tr>

 <?php endwhile;?>
</tbody>
</table>


</body>
</html>

<body>
<button class="btn btn-danger" onclick="location.href='./reportes/repaux.php'">Imprimir Reporte</button>
</body>
</html>