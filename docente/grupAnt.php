<?php 

include '../conn.php';
include 'dashboard.php';
 
  $id = $_SESSION['idD']; 
  

  $sql ="SELECT g.COD_GRUPO,g.NOMBRE_GRUPO,g.MATERIA,g.FECHA_INI,a.NOMBRES,a.APELLIDOS 
  FROM grupo_i g, auxiliar_i a 
  WHERE g.COD_AUXILIAR=a.COD_AUXILIAR AND g.COD_DOCENTE=$id 
  ORDER BY FECHA_INI";
  $query = $conn->query($sql);
 
  if (mysqli_query($conn, $sql)) {
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

?>
<!DOCTYPE html>
<html>

<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Historial de Grupos </h2>
<table class="table">

<thead>
    <th>FECHA</th>
    <th>COD GRUPO</th>
    <th>MATERIA</th>
    <th>GRUPO</th>
    <th>AUXILIAR</th>
    <th>OPCIONES</th>
</thead>
<tbody>
  <?php while ($row=$query->fetch_array()):?>
    <tr>
      <td><?php echo $row['FECHA_INI']; ?></td>
      <td><?php echo $row['COD_GRUPO']; ?>  </td>
      <td><?php echo $row['MATERIA']; ?></td>
      <td><?php echo $row['NOMBRE_GRUPO']; ?></td>
      <td><?php echo $row['NOMBRES'] . ' ' . $row['APELLIDOS']; ?></td>

      <td style="width:150px;">
        <a href="antEstudiantes.php?codGrupo=<?php echo $row["COD_GRUPO"];?>" style="margin-bottom: 10px;"  class="btn btn-sm btn-warning">Ver estudiantes</a>
        <a href="antPracticas.php?codGrupo=<?php echo $row["COD_GRUPO"];?>" class="btn btn-sm btn-primary">Ver practicas</a>

     
        
      </td>

    </tr>

 <?php endwhile;?>
</tbody>
</table>
