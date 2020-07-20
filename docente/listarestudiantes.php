<?php
	include "../conn.php";
	include 'dashboard.php';
	


		if(isset($_GET['idHabil'])){
            $idEstudiante=$_GET['idHabil'];
            $idgrup = $_SESSION['grupo'];
            $estado=1;
            
            $query = "UPDATE estudiante_grupo set HABILITADO='$estado' where ID_USUARIO=$idEstudiante and COD_GRUPO='$idgrup'";
            if(mysqli_query($conn, $query)){
            	print "<script>alert(\"Se habilito al estudiante.\");window.location='vergrupo.php';</script>";
            }
        }

        if(isset($_GET['idEliminar'])){
        	
        	$idgrup = $_SESSION['grupo'];
            $idEstudiante=$_GET['idEliminar'];
            $sql = "DELETE FROM estudiante_grupo where COD_GRUPO='$idgrup' and ID_USUARIO=$idEstudiante";

			if(mysqli_query($conn, $sql)){
				//contar alumnos inscritos al grupo
				$numeroroinscritos ="SELECT count( COD_GRUPO ) as inscritos from estudiante_grupo where COD_GRUPO='$idgrup' group by COD_GRUPO";
				$query1 = $conn->query($numeroroinscritos);
				$nroalumnos = mysqli_fetch_assoc($query1);
				$nroinscritos= $nroalumnos['inscritos'];

				$inscritos = $nroinscritos + 0;
				$up = "UPDATE grupo SET CAPACIDADG= $inscritos where COD_GRUPO='$idgrup'";
			      		mysqli_query($conn, $up);

				print "<script>alert(\"Se retiro al alumno del grupo exitosamente.\");window.location='vergrupo.php';</script>";
			}else{
				//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				print "<script>alert(\"No se pudo retirar al estudiante del grupo.\");window.location='vergrupo.php';</script>";
			}
        }

        if(isset($_GET['idEstado'])){
            $idEstudiante=$_GET['idEstado'];
            $idgrup = $_SESSION['grupo'];
            $estado=0;
            
            $query = "UPDATE estudiante_grupo set HABILITADO='$estado' where ID_USUARIO=$idEstudiante and COD_GRUPO='$idgrup'";
            if(mysqli_query($conn, $query)){
            	print "<script>window.location='vergrupo.php';</script>";
            }else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				print "<script>alert(\"No se pudo retirar al estudiante del grupo.\");window.location='vergrupo.php';</script>";
			}

        }

		if(isset($_GET['codGrupo'])) {
            $idgrupo = $_GET['codGrupo'];
            $_SESSION['grupo'] = $idgrupo;
		//estaria bien como un auxi tendra solo un grupo tiene q velar por ese grupo
		$sql1= "SELECT eg.HABILITADO, u.NOMBRES,u.APELLIDOS, u.ID_USUARIO,g.NOMBRE_GRUPO FROM usuario u, estudiante e, estudiante_grupo eg, grupo g WHERE u.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO= eg.ID_USUARIO and eg.COD_GRUPO=g.COD_GRUPO and g.COD_GRUPO='$idgrupo' order by u.APELLIDOS";
		$query = $conn->query($sql1);
		//print_r($query->num_rows);
		$resultados = $query->num_rows;
		
			
?>


<body>
	<?php 
		if($resultados < 1){
			?>
			
			<div class="content">
				<div id="pad-wrapper" class="form-page">
					<h2>No cuenta con estudiantes registrados</h2>
				</div>
			</div>

			<?php
		}
		else{
	?>
	<div class="content">
        <div id="pad-wrapper" class="form-page">
			<h2>Estudiantes registrados</h2>
	<table class="table">
	<thead>
		<th>APELLIDOS</th>
		<th>NOMBRES</th>
		<th>ID ESTUDIANTE</th>
		<th>GRUPO</th>
		<th>OPCIONES</th>
	</thead>
	<?php while ($r=$query->fetch_array()): ?>
	<tr>
		<td data-label><?php echo $r["APELLIDOS"]; ?></td>
		<td><?php echo $r["NOMBRES"]; ?></td>
		<td><?php echo $r["ID_USUARIO"]; ?></td>
		<td><?php echo $r["NOMBRE_GRUPO"]; ?></td>
		
		<td style="width:150px;"> <?php 
	        if($r["HABILITADO"]==1) { ?>

			<a href="listarestudiantes.php?idEstado=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('Esta seguro que quiere deshabilitar a este estudiante?');"" class="btn btn-sm btn-warning">Deshabilitar</a> 
			<?php }
	        else { ?> 
			
			<a href="listarestudiantes.php?idHabil=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('Esta seguro que quiere habilitar a este estudiante?');"" class="btn btn-primary">Habilitar</a>
			
			<a href="listarestudiantes.php?idEliminar=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('Esta seguro que quiere expulsar a este estudiante?');"" class="btn btn-danger">Retirar</a> 

			<?php } ?>

		</td>
	</tr>
	<?php  endwhile; } } ?>
	</table>
</body>

<!--
<div class="form-group">
	<div class="form-control">
		<button onclick="imprimir() "> Imprimir </button>
	</div>
</div>
<script>
	function imprimir(){
		window.print();
	}
</script>
-->