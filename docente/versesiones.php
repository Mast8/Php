<?php 

include '../conn.php';
include 'dashboard.php';
  
  
    if(isset($_GET['est'])){
      $idest=$_GET['est'];
      $sql = "SELECT e.ID_USUARIO, e.COD_SYS, HORA_CONECT,HORA_DISCONNECT, NOMBRES,APELLIDOS FROM sesion s, estudiante e, usuario u  where s.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO=u.ID_USUARIO and s.ID_USUARIO=$idest";
      
      $result = mysqli_query($conn, $sql);/*
      $result->fetch_array();
      $row=['NOMBRES'.'APELLIDOS'];*/
      if (mysqli_query($conn, $sql)) {
                    
      }
      else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
?>


<?php if($result->num_rows>0): ?>

<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Sesiones del estudiante  </h2>

<table class="table">
    <thead>
        <th>ESTUDIANTE</th>
        <th>COD_SYS</th>
        <th>FECHA CONEXION</th>
        <th>FECHA DESCONEXION</th>
        
    </thead>

    <?php while ($r=$result->fetch_array()): ?>
    <tr>
        <td><?php echo $r["APELLIDOS"]." ". $r["NOMBRES"]; ?></td>
        <td><?php echo $r["COD_SYS"]; ?></td>
        <td><?php echo $r["HORA_CONECT"]; ?></td>
        <td><?php echo $r["HORA_DISCONNECT"]; ?></td>
      
    </tr>
    <?php endwhile; ?>

</table>

<?php else: ?>
  <p class="alert alert-warning">No hay resultados</p>
<?php endif; } ?>
