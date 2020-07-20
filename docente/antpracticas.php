<?php 
include "../conn.php";
include 'dashboard.php';
//include 'funcionesauxi.php';
$id = $_SESSION['idD']; 



		if(isset($_GET['codGrupo'])){
			//consulta de su GRUPO y obtener nombre BIEN
            $idTarea=$_GET['codGrupo'];
            $sql1="SELECT pt.COD_GRUPO,pt.NOMBRE_PRACTI,p.NOMBRE_PRACTICA, p.NOTA_PRACTICA, e.NOMBRES,e.APELLIDOS
            FROM practica_i p, practica_tarea_i pt, estudiante_i e, grupo_i g
            WHERE p.ID_PRACTICA_TAREA=pt.ID_PRACTICA_TAREA AND e.COD_SYS=p.COD_SYS AND g.COD_GRUPO=pt.COD_GRUPO AND g.COD_DOCENTE=$id and g.COD_GRUPO='$idTarea'";
            
            $query = $conn->query($sql1);
 ?>
    <body>
	<div class="content">
	        <div id="pad-wrapper" class="form-page">
	                <h2>Historial de Practicas de estudiantes </h2>

	<table class="table">
	<thead>
		
		<th>COD GRUPO</th>
		<th>PRACTICA</th>
		<th>PRACTICA ENTREGADA</th>
		<th>NOTA</th>
		<th>ESTUDIANTE</th>
		

	</thead>
	<?php while ( $r=$query->fetch_array()): ?>
	<tr>
		
		<td><?php echo $r["COD_GRUPO"]; ?> </td> 
		<td><?php echo $r["NOMBRE_PRACTI"]; ?></td>
		<td><?php echo $r["NOMBRE_PRACTICA"]; ?> </td> 
		<td><?php echo $r["NOTA_PRACTICA"]; ?> </td> 
		<td><?php echo $r["APELLIDOS"] .' '. $r["NOMBRES"]; ?> </td>
	</tr>
	<?php  endwhile; } ?>

	</table>
	</body>