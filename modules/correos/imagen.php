<?php
header('Content-type: image/jpeg');
	$ancho = 50;
	$alto = 24;
	$imagen = imagecreatetruecolor($ancho, $alto);
imagefill($imagen, 0, 0, 0xFFFFFF);
for ($c = 0; $c < 40; $c++){
	$x = rand(0,$ancho-1);
	$y = rand(0,$alto-1);
	imagesetpixel($imagen, $x, $y, 0xFFFFFF);
	}
	$x = rand(1,10);
	$y = rand(1,10);
	$imagen_aleatoria = rand(1000,9999);
imagestring($imagen, 5, $x, $y, $imagen_aleatoria, 0x000000);
setcookie('seguridad',(md5($imagen_aleatoria).'nospam'));
imagejpeg($imagen);
imagedestroy($imagen);
?>