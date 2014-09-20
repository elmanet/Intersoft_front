<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');
require_once('../../mgpanel/modules/inc/usuario.inc.php');
$id_pedido=$_GET['id_pedido'];

if($id_pedido>0) {
		echo "<center><br><div class='tablaestilo'><table width='90%'><caption>Eliminando Producto del Carrito!</caption></table></center>";

		$sql = "DELETE FROM sis_pedido WHERE id_pedido=$id_pedido LIMIT 1"; 
	       $res=mysql_query($sql,$sistemai);          
  }else {
  	echo "Error al Eliminar";
  	} // finalizamos el borrado	
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<meta http-equiv="Refresh" content="2;url=../../index.php?mg=carrito">
<title><?php echo $row_config['title_site'];?></title>
<link href="../../mgpanel/css/main_central.css" rel="stylesheet" type="text/css" />
<link href="../../mgpanel/css/modules.css" rel="stylesheet" type="text/css" />
<link href="../../mgpanel/css/input.css" rel="stylesheet" type="text/css">
<link href="../../mgpanel/css/marca.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/favicon.ico">
</head>

<body style="background-color:#fff;">
<br>
<br><br>
<center>
<img src="../../mgpanel/images/gif/procesando.gif" alt="" ><br>

</center>
</body>

</html>