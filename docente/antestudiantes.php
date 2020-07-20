<?php 

include '../conn.php';
include 'dashboard.php';
 
if(isset($_GET['codGrupo'])) {
    $idgrupo = $_GET['codGrupo'];
    //$_SESSION['grupo'] = $idgrupo;


    //revisar solo para elementos tiene que haber promedio de asistencia y nota
    //para casi todos los grupos lista al mismo estudiante ARREGLAR
    
    $sql1 = "SELECT e.COD_SYS, e.NOMBRES, e.APELLIDOS, AVG(p.NOTA_PRACTICA) AS PROMEDIO, COUNT(p.ASISTENCIA) AS TOTAL, SUM(CASE WHEN p.ASISTENCIA = 0 THEN 1 ELSE 0 END) AS FALTAS from grupo_i g, practica_tarea_i prt, practica_i p, estudiante_i e where g.COD_GRUPO= prt.COD_GRUPO and prt.ID_PRACTICA_TAREA= p.ID_PRACTICA_TAREA and p.COD_SYS= e.COD_SYS and prt.COD_GRUPO='$idgrupo' group by g.COD_GRUPO, p.COD_SYS";

    //$sql1 = "SELECT eg.COD_SYS, e.NOMBRES, e.APELLIDOS, AVG(NOTA_PRACTICA) AS PROMEDIO, COUNT(p.ASISTENCIA) AS TOTAL, SUM(CASE WHEN ASISTENCIA = 0 THEN 1 ELSE 0 END) AS FALTAS from grupo_i g, estudiante_grupo_i eg, estudiante_i e, practica_i p where  g.COD_GRUPO=eg.COD_GRUPO and eg.COD_SYS=e.COD_SYS and e.COD_SYS= p.COD_SYS and g.COD_GRUPO='$idgrupo' group by g.COD_GRUPO, e.COD_SYS";

    $query = $conn->query($sql1);


?>


<body>
    <div class="content">
        <div id="pad-wrapper" class="form-page">
                <h2>Historial de estudiantes</h2>

        <table class="table">
        <thead>
            <th>COD SYS</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>PROMEDIO</th>
            <th>ASISTENCIA(%)</th>
        </thead>
        <?php while ($r=$query->fetch_array()):?>
        <tr>
            <td><?php echo $r["COD_SYS"]; ?></td>
            <td><?php echo $r["NOMBRES"]; ?></td>
            <td><?php echo $r["APELLIDOS"]; ?></td>
            <td><?php echo $r["PROMEDIO"]; ?></td>

            <td>
            <?php 
            if ($r['TOTAL']==0) {
                echo '';
            } else {
                $div=(($r['TOTAL']-$r['FALTAS'])/$r['TOTAL'])*100;
                echo $div.' %';
            }
            ?></td>
        </tr>
        <?php  endwhile; } ?>
        </table>
</body>

