<?php

$dbhost	= "localhost";	 
/* para el servidor
$dbuser	= "casoft";
$dbpass	= "#Iz8*eeB/6Vy:d[";
$dbname	= "casoft_db";
*/
//para localhost

$dbuser	= "root";	 // database username
$dbpass	= "";	     // database password
$dbname	= "tis"; 


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	  if (!$conn) {
        @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos! </h2>".mysqli_error($con));
      }
     
	?>
