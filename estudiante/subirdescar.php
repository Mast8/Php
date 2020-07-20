<?php

    include '../conn.php';
    include '../funsest.php';
    //include 'controlestudiante.php';


// Uploads files
if (isset($_POST['save'])) { 
    session_start(); 
    $id_usu = $_SESSION['idE']; 
    $csis = $_SESSION['codsysE']; 

    $idPractica= $_POST['practica']; 
    $nombre= $_POST['nombre'];
    $idEstu= $_POST['idEst'];

    

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    
    //$destination = "uploads/{$id_usu}/" . $filename;
    $destination = "../uploadse/" . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    $maxsize = 5 * 1024 * 1024;

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'txt', 'rar', 'png','jpg','jpeg'])) {
        print "<script>alert(\"La extencion debe ser .zip, .pdf, .docx, .rar o .txt.\");window.location='listgrupos.php';</script>";
    } 

    elseif ($_FILES['myfile']['size'] > $maxsize) { // file shouldn't be larger than 1Megabyte
            echo "El archivo sobrepasa los 5.24MB";
    }
    else {
        if(file_exists("../uploadse/" . $filename)){
            echo $filename . " archivo ya existe.";
        } 
        else{
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {

                $sql = "INSERT INTO practica (ID_PRACTICA_TAREA, ID_USUARIO,COD_SYS, NOMBRE_PRACTICA, HORA_SUBIDA,NOMBRE_FICHERO) VALUES ('$idPractica',$idEstu,$csis ,'$nombre',NOW(), '$filename')";
                
                if (mysqli_query($conn, $sql) ){
                    print "<script>alert(\"Se subio el archivo exitosamente.\");window.location='verport.php';</script>";    
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    print "<script>alert(\"No se pudo subir el archivo.\")";
                }
            
            }
        }
    }
}

?>