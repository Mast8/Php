<?php 
  //include 'controldocente.php';
  include '../conn.php';
  include 'dashboard.php';
  
   
  $id = $_SESSION['idD']; 
  
 
  $sql ="SELECT g.COD_GRUPO, g.NOMBRE_GRUPO, m.NOMBRE_MATERIA, g.CAPACIDADG, l.CAPACIDAD, h.HORA_ENTRADA, h.HORA_SALIDA, DIA, u.NOMBRES, u.APELLIDOS
        FROM grupo g, docente d, materia m, horario h, laboratorio l, auxiliar a, usuario u 
        WHERE d.ID_USUARIO=g.DOC_ID_USUARIO and g.ID_MATERIA=m.ID_MATERIA and g.COD_GRUPO=h.COD_GRUPO and g.ID_LABORATORIO=l.ID_LABORATORIO and d.ID_USUARIO=$id and g.ID_USUARIO=a.ID_USUARIO and a.ID_USUARIO= u.ID_USUARIO
        order by HORA_ENTRADA asc";
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
                <h1>Mis Grupos </h1>
<table class="table">

    <thead>
        <th>COD GRUPO</th>
        <th>MATERIA</th>
        <th>GRUPO</th>
        <th>AUXILIAR</th>
        <th>CAPACIDAD AULA</th>
        <th>ALUMNOS INSCRITOS</th>
        <th>DIA</th>
        <th>HORA ENTRADA</th>
        <th>HORA SALIDA</th>
        <th>OPCIONES</th>
    </thead>

    <tbody>
      <?php while ($row=$query->fetch_array()):?>
        <tr>
          <td><?php echo $row['COD_GRUPO']; ?>  </td>
          <td><?php echo $row['NOMBRE_MATERIA']; ?></td>
          <td><?php echo $row['NOMBRE_GRUPO']; ?></td>
          <td><?php echo $row['APELLIDOS']." ".$row['NOMBRES']; ?></td>
          <td><?php echo $row['CAPACIDAD']; ?></td>
          <td><?php echo $row['CAPACIDADG']; ?></td>
          <td><?php echo $row['DIA']; ?></td>
          <td><?php echo $row['HORA_ENTRADA']; ?></td>
          <td><?php echo $row['HORA_SALIDA']; ?></td>

          <td style="width:150px;">
            <a href="listarestudiantes.php?codGrupo=<?php echo $row["COD_GRUPO"];?>" style="
        margin-bottom: 10px;
    " class="btn btn-sm btn-warning">Ver estudiantes</a>
            <a href="listarpracticasT.php?codGrupo=<?php echo $row["COD_GRUPO"];?>" style="
        margin-bottom: 10px;
    " class="btn btn-sm btn-primary">Ver practicas</a>

            
          </td>

        </tr>

     <?php endwhile;?>
</tbody>
</table>
</body>

</html>
  <body>
    <button class="btn btn-danger" onclick="location.href='./reportes/repgrupos.php'">Imprimir Reporte</button>
  </body>
</html>