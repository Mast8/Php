<?php 
	/*	
		para cada grupo ver sus practicas_tarea
		en cada practica_tarea ver practicas estudiante
		
		 y opciones (en un formulario subir, editar, descargar)
	*/
	include "../conn.php";
	include 'dashboard.php';
	include '../auxiliar/funcionesAuxi.php';
	//include 'controlestudiante.php';       


	$idEstudiante = $_SESSION['idE']; 
	//$grupo = obtenerIdGrupo($idAuxi);
	//$idgrupo= $grupo['ID_GRUPO'];

	if(isset($_GET['idGrupo'])){
            $idgrupo= $_GET['idGrupo'];
           
	$sql1= "SELECT g.NOMBRE_GRUPO, PRT.HORA_FECHA_ENTREGA, prt.NOMBRE_PRACTI, prt.FECHA_SUBID, prt.ID_PRACTICA_TAREA, NOMBRE_FICHEROT  FROM grupo g, practica_tarea prt WHERE g.COD_GRUPO=prt.COD_GRUPO and g.COD_GRUPO='$idgrupo'";

	$query = $conn->query($sql1);

?>


<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Practicas del docente </h2>

	<table class="table">
	<thead>
		<th>GRUPO</th>
		<th>NOMBRE</th>
		<th>FECHA DE PUBLICACION</th>
		<th>FECHA LIMITE DE ENTREGA</th>
		
		<th>OPCIONES</th>
		
	</thead>
	<?php while ($r=$query->fetch_array()): ?>
	<tr>
		<td><?php echo $r["NOMBRE_GRUPO"]; ?></td>
		<td><?php echo $r["NOMBRE_PRACTI"]; ?> </td> 
		<td><?php echo $r["FECHA_SUBID"]; ?></td>
		<td><?php echo $r["HORA_FECHA_ENTREGA"]; ?></td>
		
		
		
		<td style="width:150px;"> 
	       

			<a href="listarMisPracticas.php?idTarea=<?php echo $r["ID_PRACTICA_TAREA"];?>"  class="btn btn-sm btn-warning">
			<i class="fa fa-eye" aria-hidden="true"></i></a> 
			<a href="subir.php?idTarea=<?php echo $r["ID_PRACTICA_TAREA"];?>"  class="btn btn-sm btn-danger">
			<i class="fa fa-upload" aria-hidden="true"></i> </a> 

			<a href="descargarT.php?file=<?php echo $r["NOMBRE_FICHEROT"];?>"  
			class="btn btn-sm btn-primary"> <i class="fa fa-download" 
                                    aria-hidden="true"></i>
			</a> 

			</script>
		</td>
	</tr>
	<?php endwhile;  } ?>
	</table>
</body>
