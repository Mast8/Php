<?php
	require_once '../conn.php';
	require_once '../geters.php';
    session_start();
    
    //$id=$_SESSION['id_usuario'];

	if(isset($_POST['reiniciar'])) {

        $saux="SELECT a.COD_AUXILIAR, u.NOMBRES, u.APELLIDOS
        FROM auxiliar a, usuario u
        WHERE a.ID_USUARIO=u.ID_USUARIO";
        $query = $conn->query($saux);
        while($row=$query->fetch_array()){
            $coaux= $row['COD_AUXILIAR'];
            $nom=$row['NOMBRES'];
            $apell=$row['APELLIDOS'];
            $ins="INSERT INTO auxiliar_i(COD_AUXILIAR, NOMBRES, APELLIDOS) VALUES ('$coaux','$nom','$apell')";
            mysqli_query($conn, $ins);
        }
        
        $sestudiante="SELECT e.COD_SYS, u.NOMBRES, u.APELLIDOS
        FROM estudiante e, usuario u
        WHERE e.ID_USUARIO=u.ID_USUARIO";
        $query1 = $conn->query($sestudiante);
        while($row1=$query1->fetch_array()){
            $codest= $row1['COD_SYS'];
            $nom=$row1['NOMBRES'];
            $apell=$row1['APELLIDOS'];
            $ins1="INSERT INTO estudiante_i(COD_SYS, NOMBRES, APELLIDOS) VALUES ('$codest','$nom','$apell')";
            mysqli_query($conn, $ins1);
        }

        $sgrupo="SELECT g.COD_GRUPO, g.NOMBRE_GRUPO, m.NOMBRE_MATERIA, au.COD_AUXILIAR, g.DOC_ID_USUARIO, g.FECHA_INI, g.FECHA_FIN 
                FROM grupo g, auxiliar au, materia m 
                WHERE g.COD_AUXILIAR=au.COD_AUXILIAR AND g.ID_MATERIA=m.ID_MATERIA";
        $query2 = $conn->query($sgrupo);
        while($row2=$query2->fetch_array()){
            $codgrupo= $row2['COD_GRUPO'];
            $nom=$row2['NOMBRE_GRUPO'];
            $materia=$row2['NOMBRE_MATERIA'];
            $coaux=$row2['COD_AUXILIAR'];
            $id_doc=$row2['DOC_ID_USUARIO'];
            $fechi=$row2['FECHA_INI'];
            $fechf=$row2['FECHA_INI'];
            $ins2="INSERT INTO grupo_i(COD_GRUPO, COD_AUXILIAR, NOMBRE_GRUPO, MATERIA, COD_DOCENTE, FECHA_INI, FECHA_FIN) 
            VALUES ('$codgrupo','$coaux','$nom','$materia','$id_doc','$fechi','$fechf')";
            mysqli_query($conn, $ins2);
        }
        
        $sestgru="SELECT COD_SYS, COD_GRUPO 
        FROM estudiante_grupo ";
        $query3 = $conn->query($sestgru);
        while($row3=$query3->fetch_array()){
            $codsys=$row3['COD_SYS'];
            $codgrupo=$row3['COD_GRUPO'];
            $ins3="INSERT INTO estudiante_grupo_i(COD_SYS, COD_GRUPO) VALUES ('$codsys','$codgrupo')";
            mysqli_query($conn, $ins3);
        }

        $spracta="SELECT COD_GRUPO, ID_PRACTICA_TAREA,NOMBRE_PRACTI
        FROM practica_tarea";
        $query4 = $conn->query($spracta);
        while($row4=$query4->fetch_array()){
            $codgrupo=$row4['COD_GRUPO'];
            $idprata=$row4['ID_PRACTICA_TAREA'];
            $nompracti=$row4['NOMBRE_PRACTI'];
            $ins4="INSERT INTO practica_tarea_i(COD_GRUPO, ID_PRACTICA_TAREA, NOMBRE_PRACTI) VALUES ('$codgrupo','$idprata','$nompracti')";
            mysqli_query($conn, $ins4);
        }

        $spractica="SELECT COD_SYS, ID_PRACTICA_TAREA, ID_PRACTICA, NOMBRE_PRACTICA, NOMBRE_FICHERO,NOTA_PRACTICA ,ASISTENCIA 
        FROM practica";
        $query5 = $conn->query($spractica);
        while($row5=$query5->fetch_array()){
            $codsys=$row5['COD_SYS'];
            $idprata=$row5['ID_PRACTICA_TAREA'];
            $idpra=$row5['ID_PRACTICA'];
            $nompra=$row5['NOMBRE_PRACTICA'];
            $nomfich=$row5['NOMBRE_FICHERO'];
            $nota=$row5['NOTA_PRACTICA'];
            $asis=$row5['ASISTENCIA'];
            $ins5="INSERT INTO practica_i(COD_SYS, ID_PRACTICA_TAREA, ID_PRACTICA, NOMBRE_PRACTICA, NOMBRE_FICHERO, NOTA_PRACTICA, ASISTENCIA) 
            VALUES ('$codsys','$idprata','$idpra','$nompra','$nomfich','$nota','$asis')";
            mysqli_query($conn, $ins5);

        }
        

        $sql = "DELETE FROM practica";
        mysqli_query($conn, $sql);
        $sql1 = "DELETE FROM practica_tarea";
        mysqli_query($conn, $sql1);
        $sql2 = "DELETE FROM  estudiante_grupo";
        mysqli_query($conn, $sql2);
        $sql3 = "DELETE FROM  horario";
        mysqli_query($conn, $sql3);
        $sql4 = "DELETE FROM  grupo";
        mysqli_query($conn, $sql4);
        $sql5 = "DELETE FROM  docente_materia";
        mysqli_query($conn, $sql5);
        $sql6 = "DELETE FROM  docente_auxiliar";
        mysqli_query($conn, $sql6);
        $sql7 = "DELETE FROM  estudiante";
        mysqli_query($conn, $sql7);
        $sql8 = "DELETE FROM  auxiliar";
        mysqli_query($conn, $sql8);
        $sql9 = "DELETE FROM  usuario WHERE ID_ROL BETWEEN 3 and 4";

        if(mysqli_query($conn, $sql9)){
            print "<script>alert(\"Se reinico el sistema.\");window.location='dashboard.php';</script>";
            }else{
                echo "Error: " . $sql . $sql9 ."<br>" . mysqli_error($conn);
                print "<script>alert(\"No se pudo reiniciar el sistema.\")window.location='dashboard.php';</script>";
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }