<?php

// Cargando las variables desde el formulario

$nombre = $_POST['nombre']; 
$telefono = $_POST['telefono']; 
$asunto = "Contacto por Formulario";
$mensaje = $_POST["mensaje"];
$correo = $_POST["correo"];
$correosis = $_POST["correosis"];
$antispam = $_POST["antispam"];
$dia=date("m.d.Y");
$hora=date("H:i:s");

// Removiendo los backslash
$mensaje = stripslashes($mensaje); 
$asunto = stripslashes($asunto); 
$correo = stripslashes($correo); 

$message = "
<html>
<head>
<title>Formulario de Contacto</title>
</head>
<body>
 <h2>Tienes un nuevo Mensaje!</h2> <br />

<b>Nombre y Apellido:</b> $nombre<br />
<b>Tel&eacute;fono:</b> $telefono<br />
<b>Email:</b> $correo<br />
<b>Mensaje:</b> $mensaje<br />

----------------------------------------------------------------------------<br /><br /><br />
 Este mensaje fu&eacute; realizado el $dia a las $hora<br /><br />
</body>
</html>
";
// Revisando que el codigo antispam sea correcto
if(md5($antispam).'nospam' == $_COOKIE['seguridad']){
	// Si el c&oacute;digo de verificacion es correcto, el formulario se env&iacute;a
	// Always set content-type when sending HTML email
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: Web <'.$correo.'>' . "\r\n";
	mail($correosis, $asunto, $message, $headers);
	
	// Eliminamos la cookie para evitar el reenv&iacute;o del formulario al recargar la p&aacute;gina
	setcookie('seguridad','');
} else if(isset($mensaje) and $mensaje!=""){
	// Si el c&oacute;digo antispam es incorrecto, no permite el env&iacute;o del formulario
	header("Location: ../../index.php?asunto=$asunto&correo=$correo&mensaje=".urlencode($mensaje)."&codigo_incorrecto=true");
	exit;
} else {
	echo "No hay ninguna variable recibida, esta p&aacute;gina no se puede mostrar directamente";
	exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Refresh" content="2;url=../../index.php">
<title>Correo Enviado</title>
<link href="../../mgpanel/css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../mgpanel/css/modules.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
font-size: 14px;
}
-->
</style></head>
<body>
<center><br><div class='tablaestilo'><table width='90%'><caption>Correo enviado con &eacute;xito.</caption></table></center>
</body>
</html>