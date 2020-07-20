<?php
	//include 'controldocente.php';
	include "../conn.php";
	include 'dashboard.php';
	

$id = $_SESSION['id']; 

$sql1= "SELECT NOMBRES, APELLIDOS, HORA_CONECT, HORA_DESCON from usuario, estudiante, sesion where usuario.ID_USUARIO= estudiante.ID_USUARIO and estudiante.ID_USUARIO = sesion.ID_USUARIO ";
$query = $conn->query($sql1);


?>


<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>Sesiones de estudiantes </h3>
            </div>

<table class="table table-bordered table-hover">
<thead>
	
	<th>HORA DE CONEXION</th>
	<th>FECHA DESCONECCION</th>
	<th>APELLIDOS</th>
	<th>NOMBRES</th>
	<th>OPCIONES</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()): ?>
<tr>
	<td><?php echo $r["APELLIDOS"]; ?></td>
	<td><?php echo $r["NOMBRES"]; ?></td>
	<td><?php echo $r["HORA_CONECT"]; ?></td>
	<td><?php echo $r["HORA_DESCON"]; ?></td>
	
	<td style="width:150px;">
		<a href="./formedit.php?id=<?php echo $r["ID_USUARIO"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ID_USUARIO"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["ID_USUARIO"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="elimest.php?id="+<?php echo $r["ID_USUARIO"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>

</body>