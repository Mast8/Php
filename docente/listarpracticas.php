<?php 
	//include 'controldocente.php';
	include "../conn.php";
	include 'dashboard.php';
	

	$id = $_SESSION['idD']; 



		if(isset($_GET['codGrupo'])){
			//consulta de su GRUPO y obtener nombre
            $idTarea=$_GET['codGrupo'];
            $sql1="SELECT NOMBRE_PRACTI, HORA_SUBIDA, NOMBRE_PRACTICA, REVISADO_POR, OBSERVACION, FECHA_REVISION, ASISTENCIA, NOTA_PRACTICA, ID_PRACTICA, NOMBRE_FICHERO, NOMBRES, APELLIDOS, e.ID_USUARIO from docente d, grupo g, practica_tarea prt, practica p,estudiante e, usuario u where d.ID_USUARIO= g.DOC_ID_USUARIO and g.COD_GRUPO= prt.COD_GRUPO and prt.ID_PRACTICA_TAREA=p.ID_PRACTICA_TAREA  and p.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO= u.ID_USUARIO and d.ID_USUARIO= $id and prt.ID_PRACTICA_TAREA='$idTarea'
            order by HORA_SUBIDA";
            
            $query = $conn->query($sql1);
			$resultados = $query->num_rows;

 ?>
    <body>
		<?php 
			if($resultados < 1){
				?>

				<div class="content">
					<div id="pad-wrapper" class="form-page">
						<h2>No recibio practicas de los estudiantes.</h2>
					</div>
				</div>

				<?php
			}
			else{
		?>

	<div class="content">
	        <div id="pad-wrapper" class="form-page">
	                <h2>Practicas de recibidas de los estudiantes. </h2>

	<table class="table">
	<thead>
		
		<th>NOMBRE TAREA</th>
		<th>FECHA Y HORA DE SUBIDA</th>
		<th>NOMBRE ESTUDIANTE</th>
		<th>NOMBRE PRACTICA</th>
		<th>REVISADO POR</th>
		<th>OBSERVACION AUXILIAR</th>
		<th>FECHA REVISION</th>
		<th>NOTA</th>
		<th>OPCIONES</th>
		<th>ASISTENCIA ESTUDIANTE</th>
		

	</thead>
	<?php while ( $r=$query->fetch_array()): ?>
	<tr>
		
		<td><?php echo $r["NOMBRE_PRACTI"]; ?> </td> 
		<td><?php echo $r["HORA_SUBIDA"]; ?></td>
		<td><?php echo $r["NOMBRES"]." ".$r["APELLIDOS"]; ?></td>
		<td><?php echo $r["NOMBRE_PRACTICA"]; ?> </td> 
		<td><?php echo $r["REVISADO_POR"]; ?> </td> 
		<td><?php echo $r["OBSERVACION"]; ?> </td>
		<td><?php echo $r["FECHA_REVISION"]; ?> </td>
		<td>
		  <form method="post" action="calificar.php" method="POST">
		       <input type="number" class="form-control" name="nota" size="15" required value= "<?php echo $r['NOTA_PRACTICA']; ?>">  
		      

		        <td style="width:150px;">
		        
		        <div class="col-xs-9 col-xs-offset-3">
		                
		        <button type="submit" class="btn btn-sm btn-success btn-block" >Editar</button>
		       
		        <input type="hidden" name="practica" value="<?php echo $r['ID_PRACTICA']; ?>">
		         </div>
	       </form>
			
			<a href="descargarP.php?file=<?php echo $r['NOMBRE_FICHERO'];?>"  class="btn btn-sm btn-primary">
			<i class="fa fa-download" aria-hidden="true"></i></a> 

			<a href="versesiones.php?est=<?php echo $r['ID_USUARIO'];?>"  class="btn btn-sm btn-warning">
			<i class="fa fa-eye" aria-hidden="true"></i></a> 


		
		</td>

		<td>
		<?php if( $r["ASISTENCIA"] == 1){ ?>
			<a href="../auxiliar/asistencia.php?idsi=<?php echo $r["ID_PRACTICA"];?>" class="btn btn-sm btn-primary">Asistio</a> 
			<?php } else { ?>
			
			<a href="../auxiliar/asistencia.php?idno=<?php echo $r["ID_PRACTICA"];?>"  class="btn btn-sm btn-danger">Falto</a> 

			<?php  } ?>
		</td>


	</tr>
	<?php  endwhile; }  } ?>

	</table>
	</body>