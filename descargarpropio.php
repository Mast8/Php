<?php 
//descargar para si mismos, faltaria para otros

if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    
    //los echo lo sobreescriben
    //crear su propia funcion
        session_start(); 
        $idrol = $_SESSION['id_rol'];
        $id_usu = $_SESSION['id'];
     
     //$path = "./uploads/{$id_usu}/"; 

 //si es igual a docente
        if($idrol==2){
            $path = "uploadsd/";
        }
        else{
            $path = "uploadse/";
        }
        
                 
            $download_file =  $path.$filename;
            if(!empty($filename)){
                if(file_exists($download_file))
                {
                    header('Content-Disposition: attachment; filename=' . $filename); 
                    readfile($download_file);
                    exit;
                }
                else
                {
                    echo $filename."-".$path ."- ".$download_file.'-File does not exists on given path';
                }
            }
         
    
}
?>