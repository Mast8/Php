<?php 
	//include 'controldocente.php';
	include "../conn.php";
	include 'dashboard.php';
	

$id = $_SESSION['idD']; 



		if(isset($_GET['codGrupo'])){
			//consulta de su GRUPO y obtener nombre
            $idTarea=$_GET['codGrupo'];

            $sql1="SELECT NOMBRE_PRACTI, FECHA_SUBID, NOMBRE_PRACTI,g.COD_GRUPO, NOMBRE_FICHEROT,ID_PRACTICA_TAREA from docente d, grupo g, practica_tarea prt where d.ID_USUARIO= g.DOC_ID_USUARIO AND g.COD_GRUPO= prt.COD_GRUPO AND  d.ID_USUARIO= $id and g.COD_GRUPO='$idTarea' order by FECHA_SUBID";
            
            $query = $conn->query($sql1);
			$resultados = $query->num_rows;

 ?>
    <body>

		<?php 
			if($resultados < 1){
				?>

				<div class="content">
					<div id="pad-wrapper" class="form-page">
						<h2>No registro practicas</h2>
					</div>
				</div>

				<?php
			}
			else{
		?>

	<div class="content">
	        <div id="pad-wrapper" class="form-page">
	                <h2>Practicas para los estudiantes </h2>

	<table class="table">
	<thead>
		
		<th>NOMBRE PRACTICA</th>
		<th>FECHA Y HORA DE SUBIDA</th>
		<th>NOMBRE FICHERO</th>
		<th>OPCIONES</th>
		
		

	</thead>
	<?php while ( $r=$query->fetch_array()): ?>
	<tr>
		
		<td><?php echo $r["NOMBRE_PRACTI"]; ?> </td> 
		<td><?php echo $r["FECHA_SUBID"]; ?></td>
		<td><?php echo $r["NOMBRE_FICHEROT"]; ?></td>
		<td>
		  
			<a href="descargar.php?file=<?php echo $r['NOMBRE_FICHEROT'];?>" class="btn btn-sm btn-primary">
			<i class="fa fa-download" aria-hidden="true"></i></a> 
			<a href="listarpracticas.php?codGrupo=<?php echo $r["ID_PRACTICA_TAREA"];?>"   class="btn btn-sm btn-warning">
			<i class="fa fa-eye" aria-hidden="true"></i></a> 
			
		</td>

	</tr>
	<?php  endwhile; } } ?>

	</table>
	</body>