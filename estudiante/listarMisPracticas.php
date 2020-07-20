<?php 
	
		include "../conn.php";
		include 'dashboard.php';
		include '../auxiliar/funcionesAuxi.php';
        //include 'controlestudiante.php';

	$idEstudiante = $_SESSION['idE']; 

	if(isset($_GET['idTarea'])){
            $idPractica= $_GET['idTarea'];
           
	$sql1= "SELECT NOMBRE_PRACTICA, HORA_SUBIDA, FECHA_REVISION, OBSERVACION, REVISADO_POR, ASISTENCIA, NOTA_PRACTICA, NOMBRE_FICHERO FROM estudiante e, practica p where e.ID_USUARIO=p.ID_USUARIO and p.ID_USUARIO=$idEstudiante and ID_PRACTICA_TAREA=$idPractica order by HORA_SUBIDA asc ";

	$query = $conn->query($sql1);

?>


<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Practicas subidas </h2>

	<table class="table ">
	<thead>
		
		<th>NOMBRE PRACTICA</th>
		<th>FECHA DE SUBIDA</th>
		<th>FECHA REVISION</th>		
		<th>OBSERVACION</th>
		<th>REVISADO POR</th>
		<th>ASISTENCIA</th>
		<th>CALIFICACION</th>		
		<th>OPCIONES</th>
		
		
	</thead>
	<?php while ($row=$query->fetch_array()): ?>
	<tr>
	
		<td><?php echo $row["NOMBRE_PRACTICA"]; ?> </td> 
		<td><?php echo $row["HORA_SUBIDA"]; ?></td>
		<td><?php echo $row["FECHA_REVISION"]; ?></td>
		<td><?php echo $row["OBSERVACION"]; ?></td>
		<td><?php echo $row["REVISADO_POR"]; ?></td>

		<td> 
		<?php if( $row["ASISTENCIA"] == 1){ ?>
			<a href="#"disabled="true" class="btn btn-sm btn-primary"  >Asistio</a> 
			<?php } else { ?>
			
			<a href="#" disabled="true" class="btn btn-sm btn-danger">Falto</a> 

			<?php  } ?>
		</td>

		<td ><?php echo $row["NOTA_PRACTICA"]; ?></td>
		
		
		<td style="width:150px;"> 
	              

			<a href="descargar.php?file=<?php echo $row["NOMBRE_FICHERO"];?>"  class="btn btn-sm btn-primary">
			<i class="fa fa-download" aria-hidden="true"></i></a> 
			 

		</td> 
	</tr>
	<?php endwhile;  } ?>
	</table>
</body>
