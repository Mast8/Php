<?php 
include "../conn.php";
include 'dashboard.php';
include 'funcionesAuxi.php';

  $idAuxi = $_SESSION['idA']; 
  $nombre = $_SESSION['nameA'];
  $ape = $_SESSION['apeA'];
 //echo $nombre." ".$ape;
    if(isset($_GET['idPractica'])){
      //obtener observacion
      $idPractica=$_GET['idPractica'];
      $sql ="SELECT OBSERVACION from practica where ID_PRACTICA=$idPractica";
      $query = $conn->query($sql);
      $obs = mysqli_fetch_assoc($query);
      $detalle=$obs['OBSERVACION'];

      

      
?>

  <body>
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>Gestion de practicas </h3>
            </div>
            <form role="form" method="post" action="editarPracticas.php">

              <div class="form-group">
                <label for="name">OBSERVACION</label>
                <input type="text" class="form-control" name="observacion" value="<?php echo $detalle; ?>" required>
              </div>
              
              <input type="hidden" name="id" value="<?php echo $idPractica; ?>">
              <button type="submit" class="btn btn-success btn-block">EDITAR</button>

            </form>  
      </div>
    </div>
      
  </body>

      <?php 
     }else{

      
      $nomauxi=$nombre." ".$ape;
      $observacion = $_POST['observacion'];
      $idPractica = $_POST['id'];

        //consulta e insertar auxi y observacion y fecha boolean revisado
        $sql= "UPDATE practica SET REVISADO_POR='$nomauxi', FECHA_REVISION= NOW(), OBSERVACION='$observacion' WHERE ID_PRACTICA = '$idPractica' ";

        if (mysqli_query($conn, $sql)) {
            print "<script>alert(\"Edito la practica correctamente.\");window.location='listartareas.php';</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
     

  ?>