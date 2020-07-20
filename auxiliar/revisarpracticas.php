<?php 
/*
	Ver las practicas de los de un tarea dada por el docente
	poder editar campos (un formulario sale y permite editar ciertos campos)

		Listar las practicas_tarea /despues crear
		con click en practica ver las practicas de los estudiantes
		opcione para editar(practica) auxi, nota, observacion 

	considerar un estado revisado(en practica) que marque(boton) las practicas revisadas
	tambien para las materias??

	atributos revisado por?, observacion, hora revision, NOTA

	Editar***
		boton sale formulario anadir observacion 
	*/

include "../conn.php";
include 'dashboard.php';
include 'funcionesauxi.php';

		

		if(isset($_GET['idTareaDocente'])){
			//consulta de su GRUPO y obtener nombre
            $idTarea=$_GET['idTareaDocente'];
            $sql1="SELECT prt.ID_PRACTICA_TAREA, NOMBRE_PRACTI, HORA_SUBIDA, NOMBRE_PRACTICA, ID_PRACTICA,NOTA_PRACTICA,REVISADO_POR,OBSERVACION, FECHA_REVISION, ASISTENCIA, NOMBRES,APELLIDOS, NOMBRE_FICHERO, prt.HORA_FECHA_ENTREGA, e.ID_USUARIO 
            FROM  usuario u, estudiante e, practica p, practica_tarea prt, grupo g where u.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO= p.ID_USUARIO and prt.COD_GRUPO=g.COD_GRUPO and prt.ID_PRACTICA_TAREA=p.ID_PRACTICA_TAREA and p.ID_PRACTICA_TAREA='$idTarea' order by HORA_SUBIDA";
            
            $query = $conn->query($sql1);
            // hacer consulta de now(); y comparar con la fecha maxima de entrega SELECT date(now())  ;

            $sql= "SELECT date(now()) as fecha ";
            $query1 = $conn->query($sql);
            $row = mysqli_fetch_assoc($query1);
            $fecha =$row['fecha'];

 ?>
    <body>
	<div class="content">
	        <div id="pad-wrapper" class="form-page">
	            <div class="row header">
	                <h3>Practicas de estudiantes </h3>
	            </div>

	<table class="table table-bordered table-hover">
	<thead>
		
		<th>NOMBRE TAREA</th>
		<th>FECHA Y HORA DE SUBIDA</th>
		<th>NOMBRE ARCHIVO</th>
		<th>REVISADO POR</th>
		<th>OBSERVACION</th>
		<th>FECHA REVISION</th>
		<th>NOMBRE ESTUDIANTE </th>
		<th>OPCIONES</th>
		<th>ASISTENCIA ESTUDIANTE</th>

	</thead>
	<?php while ($r=$query->fetch_array()): ?>
	<tr>
		
		<td><?php echo $r["NOMBRE_PRACTI"]; ?> </td> 
		<td><?php echo $r["HORA_SUBIDA"]; ?></td>
		<td><?php echo $r["NOMBRE_PRACTICA"]; ?> </td> 
		<td><?php echo $r["REVISADO_POR"]; ?> </td> 
		<td><?php echo $r["OBSERVACION"]; ?> </td>
		<td><?php echo $r["FECHA_REVISION"]; ?> </td>
		<td><?php echo $r["NOMBRES"]." ".$r["APELLIDOS"]; ?> </td>

		<td style="width:150px;"> 

		<?php 
	    if($fecha < $r["HORA_FECHA_ENTREGA"]){  ?>
			<a href="editarpracticas.php?idPractica=<?php echo $r["ID_PRACTICA"];?>"  class="btn btn-sm btn-warning">Editar</a> 
		<?php  } else ?>
			
			<a href="descargardeE.php?file=<?php echo $r["NOMBRE_FICHERO"];?>"  class="btn btn-sm btn-primary">Descargar</a>

			<a href="versesion.php?est=<?php echo $r["ID_USUARIO"];?>"  class="btn btn-sm btn-primary">Sesion</a>

			
		</td>

		<td>
		<?php if( $r["ASISTENCIA"] == 1){ ?>
			<a href="asistencia.php?idsi=<?php echo $r["ID_PRACTICA"];?>" class="btn btn-sm btn-primary">Asistio</a> 
			<?php } else { ?>
			
			<a href="asistencia.php?idno=<?php echo $r["ID_PRACTICA"];?>"  class="btn btn-sm btn-danger">Falto</a> 

			<?php  } ?>
		</td>

	</tr>
	<?php  endwhile; } ?>

	</table>
	</body>
