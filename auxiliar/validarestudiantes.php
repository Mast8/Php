<?php

include "../conn.php";
include 'dashboard.php';
include 'funcionesauxi.php';


/* Docente inscribe al auxi(formulario)

boton para pasar de inscrito a (atributo habilitado)
Validar que un auxiliar sea de solo un docente o grupo

 		obtener id del grupo con el idauxiliar 
		listar los estudiantes de ese grupo


 atributo habilitado de los estudiantes(estudiatnegrupo?)
 atributo en estudiante y si no esta 1 no puede inscribirse, por defercto 1

 si no esta inscrito se elimina del grupo?

 si esta deshabilitado no deberia subir cosas o ni siquiera ver algo del grupo(seguirira inscrito) *****

*/
 
$idAuxi = $_SESSION['idA']; 
$grupo = obtenerIdGrupo($idAuxi);
$idgrupo= $grupo['COD_GRUPO'];
$_SESSION['grupo']= $idgrupo; 
	
		if(isset($_GET['idEstado'])){
            $idEstudiante=$_GET['idEstado'];
            $estado=0;
            //cambiado

            $query = "UPDATE estudiante_grupo set HABILITADO='$estado' where ID_USUARIO=$idEstudiante and COD_GRUPO='$idgrupo'";
            mysqli_query($conn, $query);

        }

		if(isset($_GET['idHabil']))
            {
            	//cambiado and codgrupo
            $idEstudiante=$_GET['idHabil'];
            $estado=1;
            
             $query = "UPDATE estudiante_grupo set HABILITADO='$estado' where ID_USUARIO=$idEstudiante and COD_GRUPO='$idgrupo'";
            mysqli_query($conn, $query);
        }

        if(isset($_GET['idEliminar'])){
            
            $idEstudiante=$_GET['idEliminar'];

            
            $grupo = obtenerIdGrupo($idAuxi);
			$idgrupo= $grupo['COD_GRUPO'];
            //expulsarEstudiante($id,$idgrupo); 
            $sql = "DELETE FROM estudiante_grupo where COD_GRUPO='$idgrupo' and ID_USUARIO=$idEstudiante";
			$query = $conn->query($sql);

			if($query!=null){
				//actualizar el numero de estudiantes 
				$numeroroinscritos ="SELECT count( COD_GRUPO ) as inscritos from estudiante_grupo where COD_GRUPO='$idgrupo' group by COD_GRUPO";
				$query1 = $conn->query($numeroroinscritos);
				$nroalumnos = mysqli_fetch_assoc($query1);
				$nroinscritos= $nroalumnos['inscritos'];

				$inscritos = $nroinscritos + 0;
				$up = "UPDATE grupo SET CAPACIDADG= $inscritos where COD_GRUPO='$idgrupo'";
			      		mysqli_query($conn, $up);

				print "<script>alert(\"Se retiro al alumno del grupo exitosamente.\");window.location='validarestudiantes.php';</script>";
			}else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				print "<script>alert(\"No se pudo retirar al estudiante del grupo.\")";
			}
        }



	//estaria bien como un auxi tendra solo un grupo tiene q velar por ese grupo
$sql1= "SELECT eg.HABILITADO, u.NOMBRES,u.APELLIDOS, u.ID_USUARIO,g.NOMBRE_GRUPO FROM usuario u, estudiante e, estudiante_grupo eg, grupo g WHERE u.ID_USUARIO=e.ID_USUARIO and e.ID_USUARIO= eg.ID_USUARIO and eg.COD_GRUPO=g.COD_GRUPO and g.COD_GRUPO='$idgrupo'";

$query = $conn->query($sql1);
?>


<body>
<div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>Gestion de estudiantes </h3>
            </div>


<table class="table table-bordered table-hover">
<thead>
	
	<th>APELLIDOS</th>
	<th>NOMBRES</th>
	<th>ID ESTUDIANTE</th>
	<th>GRUPO</th>
	<th>OPCIONES</th>
	
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["APELLIDOS"]; ?></td>
	<td><?php echo $r["NOMBRES"]; ?></td>
	<td><?php echo $r["ID_USUARIO"]; ?></td>
	<td><?php echo $r["NOMBRE_GRUPO"]; ?></td>
	
	<td style="width:150px;"> 

		<a style="margin-bottom: 10px;" href="versesion.php?est=<?php echo $r["ID_USUARIO"];?>"  class="btn btn-sm btn-primary">Sesiones</a> 
		<?php 

        if($r["HABILITADO"]==1) {?>

		<a href="validarestudiantes.php?idEstado=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('Esta seguro que quiere DESHABILITAR al estudiante <?php echo $r["APELLIDOS"]." ".$r["NOMBRES"]?> ?');"" class="btn btn-sm btn-warning">Deshabilitar</a> 

		

		<?php }
        else { ?> 
		
		<a style="margin-bottom: 10px;" href="validarestudiantes.php?idHabil=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('Esta seguro que quiere HABILITAR al estudiante <?php echo $r["APELLIDOS"]." ".$r["NOMBRES"]?> ?');"" class="btn btn-sm btn-primary">Habilitar</a>

		<a href="validarestudiantes.php?idEliminar=<?php echo $r["ID_USUARIO"];?>" onclick="return confirm('Esta seguro que quiere ELIMINAR al estudiante <?php echo $r["APELLIDOS"]." ".$r["NOMBRES"]?> ?');"" class="btn btn-sm btn-danger">Eliminar</a>

		<?php } ?>

		</script>
	</td>
</tr>
<?php endwhile;?>
</table>

</body>