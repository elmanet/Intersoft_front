<?php
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');
require_once('../../mgpanel/modules/inc/usuario.inc.php');

$id_compra="";
$id_user=$_GET['09834kdki90'];
$fpago=$_GET['tpago'];
$fenvio=$_GET['tenvio'];
$status="1";

if($id_user>0) {
	echo "<center><br><div class='tablaestilo'><table width='90%'><caption>Procesando Pedido!</caption></table></center>";
$insertSQL = sprintf("INSERT INTO sis_pedido_compra(id_compra, id_user, status, fpago, fenvio ) VALUES ( %s, %s, %s, %s, %s)", 
							  GetSQLValueString($id_compra, "int"),
								GetSQLValueString($id_user, "text"),
								GetSQLValueString($status, "int"),
								GetSQLValueString($fpago, "int"),
								GetSQLValueString($fenvio, "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());
  
mysql_select_db($database_sistemai, $sistemai);
$query_compra = "SELECT * FROM sis_pedido_compra WHERE id_user='$id_user' ORDER BY id_compra DESC;";
$compra = mysql_query($query_compra, $sistemai) or die(mysql_error());
$row_compra = mysql_fetch_assoc($compra);
$totalRows_compra = mysql_num_rows($compra);
$id_pedido_compra=$row_compra['id_compra'];
$new_status=2;

$updateSQL = sprintf("UPDATE sis_pedido SET  status=%s, id_compra=%s WHERE id_user='$id_user' AND status=1",  

                       GetSQLValueString($new_status, "int"),
                       GetSQLValueString($id_pedido_compra, "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result2 = mysql_query($updateSQL, $sistemai) or die(mysql_error());
  

  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; utf-8" />
<meta http-equiv="Refresh" content="2;url=../../index.php?mg=compra-exitosa">
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
