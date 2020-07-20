
<?php
require 'PHPMailerAutoload.php';
require 'class.phpmailer';
require 'class.smtp';
/*
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

*/
function enviarcorr ($name, $ape, $email,$dir, $telef, $pass){

	$nombre = $name;
	$apell = $ape;
	$ema =$email;
	$direc = $dir;
	$tel = $telef;

	$cont = $pass;

	$mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'gestion.laboratorios@gmail.com';                 // SMTP correo
	$mail->Password = '123456@so';                           // SMTP contrase correo
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to


	$mail->setFrom('gestion.laboratorios@gmail.com', 'Remitente'); // el mismo que el correo de username
	$mail->addAddress($ema, 'Mast User');
	//$mail->addAddress('mastelon10@gmail.com', 'Mast User');     // a quien le llegara
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Verificacion de datos de la cuenta';
	$mail->Body    = "	Nombre: 			{$nombre} 	<br>
					  	Apellidos:			{$apell}  	<br>
					  	Correo:	 			{$ema}		<br>
					  	Direccion:			{$dir}		<br>
					  	Telefono:	 		{$telef}	<br>
					  	Contraseña:			{$pass}		<br>

						<b>Gracias, {$nombre} por registrarse en el portal de los laboratios</b>"; 

	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo 'No se pudo enviar el mensaje';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    //echo 'Se le envio un correo con sus datos registrados';

	}
	}

?>