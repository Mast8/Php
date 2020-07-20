<?php 

	/*
		Listar las practicas_tarea /despues crear
		con click en practica ver las practicas de los estudiantes
		opcione para editar(practica) auxi, nota, observacion 
	*/

include "../conn.php";
include 'dashboard.php';
include 'funcionesauxi.php';
        

//obtener el id del grupo del auxiliar(como es unico en un grupo)
	$idAuxi = $_SESSION['idA']; 
	$grupo = obtenerIdGrupo($idAuxi);
	$idgrupo= $grupo['COD_GRUPO'];

	$sql1= "SELECT g.NOMBRE_GRUPO, prt.HORA_FECHA_ENTREGA, prt.NOMBRE_PRACTI, prt.FECHA_SUBID, prt.ID_PRACTICA_TAREA, NOMBRE_FICHEROT
		FROM auxiliar a, grupo g, practica_tarea prt 
		WHERE a.ID_USUARIO= g.ID_USUARIO and g.COD_GRUPO=prt.COD_GRUPO and g.COD_GRUPO='$idgrupo'";

	$query = $conn->query($sql1);

?>


<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>Practicas del docente </h3>
            </div>

	<table class="table table-bordered table-hover">
	<thead>
		
		<th>NOMBRE</th>
		<th>FECHA DE PUBLICACION</th>
		<th>FECHA LIMITE DE ENTREGA</th>
		<th>GRUPO</th>
		<th>NOMBRE FICHERO</th>
		<th>OPCIONES</th>
		
	</thead>
	<?php while ($r=$query->fetch_array()): ?>
	<tr>
		
		<td><?php echo $r["NOMBRE_PRACTI"]; ?> </td> 
		<td><?php echo $r["FECHA_SUBID"]; ?></td>
		<td><?php echo $r["HORA_FECHA_ENTREGA"]; ?></td>
		<td><?php echo $r["NOMBRE_GRUPO"]; ?></td>
		<td><?php echo $r["NOMBRE_FICHEROT"]; ?></td>
		
		
		<td style="width:150px;"> 
	       
			<a style="margin-bottom: 10px;" href="revisarpracticas.php?idTareaDocente=<?php echo $r["ID_PRACTICA_TAREA"];?>"  class="btn btn-sm btn-warning">Ver Practicas</a> 

			<a href="descargardd.php?file=<?php echo $r["NOMBRE_FICHEROT"];?>"  class="btn btn-sm btn-primary">Descargar</a> 
			
		</td>

	</tr>
	<?php endwhile; ?>
	</table>
</body>

