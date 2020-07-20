<?php

include "../conn.php";
include 'dashboard.php';
/* rrecojer la info de los estudiantes tablas estudiante ,rol.usuario la cual servira para la habilitacion y desabilitacion de las cuentas de estudiantes id_usuario el auxiliar o docente podra habilitar y desabilitar la cuenta del estudiante para el ingreso al sistema
*/
 
$idAuxi = $_SESSION['id']; 

		if(isset($_GET['idEstado'])){
            $idEstudiante=$_GET['idEstado'];
            $estado=0;
            $query = "UPDATE usuario set ESTADO='$estado' where ID_USUARIO=$idEstudiante";
            mysqli_query($conn, $query);

        }

		if(isset($_GET['idHabil']))
            {
            $idEstudiante=$_GET['idHabil'];
            $estado=1;
            $query = "UPDATE usuario set ESTADO='$estado' where ID_USUARIO=$idEstudiante";
            mysqli_query($conn, $query);
        }

	//estaria bien como un auxi tendra solo un grupo tiene q velar por ese grupo consulta mejor usando inner joins
$sql1= " SELECT  U.ESTADO, U.ID_USUARIO, U.NOMBRES, U.APELLIDOS, U.TELEFONO, U.CORREO, U.ID_ROL, R.ROL FROM usuario U, rol R  WHERE R.ID_ROL=4 and R.ID_ROL=U.ID_ROL";

$consulta = $conn->query($sql1);

?>
<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Gestion de Cuentas de los Estudiantes </h2>


<table class="table">
<thead>
	<th>CODIGO</th>
	<th>APELLIDOS</th>
	<th>NOMBRES</th>
	<th>CORREO</th>
	<th>TELEFONO</th>
	<th>TIPO DE USUARIO</th>
	<th>OPCIONES</th>
	
</thead>

<?php while ($r=$consulta->fetch_array()):?>
<tr>
	<td><?php echo $r['ID_USUARIO']; ?></td>
	<td><?php echo $r['APELLIDOS']; ?></td>
	<td><?php echo $r['NOMBRES']; ?></td>
	<td><?php echo $r['CORREO']; ?></td>
	<td><?php echo $r['TELEFONO']; ?></td>
	<td><?php echo $r['ROL']; ?></td>
	
	<td style="width:150px;"> <?php 
        if($r["ESTADO"]==1) {?>

		<a href="validarCuentaEst.php?idEstado=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('DESEAS DESABILITAR LA CUENTA DE ESTE ESTUDIANTE?');"" class="btn btn-sm btn-warning">Deshabilitar</a> 
		<?php }
        else { ?> 
		
		<a href="validarCuentaEst.php?idHabil=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('ESTA SEGURO QUE QUIERE HABILITAR A ESTE ESTUDIANTE?');"" class="btn btn-primary">Habilitar</a>

		

		<?php } ?>

		</script>
	</td>
</tr>
<?php endwhile; ?>
</table>

</body>