<?php 
if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    //$filename = $_GET['file']; 
    //los echo lo sobreescriben, bajo ningun motivo poner ECHO!!!

     $path = "../uploadsd/";
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