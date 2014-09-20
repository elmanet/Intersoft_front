<?php 
require_once('../inc/conexion_modules.inc.php'); 
require_once('../inc/config.inc.php');
require_once('../../mgpanel/modules/inc/usuario.inc.php');
$idp=$_GET['135798642Detalle'];
$cate=$_GET['135798642'];
$id_user=$row_usua['id_usuario'];
$cant=1;
$status=1;
$id_pedido="";

mysql_select_db($database_sistemai, $sistemai);
$query_producto = "SELECT a.id, a.nombre_prod, a.des_prod, b.nombre_cate, a.precio, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id='$idp' AND a.status=1 AND a.id_cate=b.id";
$producto = mysql_query($query_producto, $sistemai) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);

mysql_select_db($database_sistemai, $sistemai);
$query_tpago = "SELECT * FROM sis_formapago ORDER BY id_fpago ASC;";
$tpago = mysql_query($query_tpago, $sistemai) or die(mysql_error());
$row_tpago = mysql_fetch_assoc($tpago);
$totalRows_tpago = mysql_num_rows($tpago);

mysql_select_db($database_sistemai, $sistemai);
$query_pedido = "SELECT * FROM sis_pedido WHERE id_user='$id_user' AND id_producto='$idp' AND status='$status'";
$pedido = mysql_query($query_pedido, $sistemai) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);

if($totalRows_pedido==0) {
$insertSQL = sprintf("INSERT INTO sis_pedido(id_pedido, id_user, id_producto, cant, status ) VALUES ( %s, %s, %s, %s, %s)", 
							  GetSQLValueString($id_pedido, "int"),
								GetSQLValueString($id_user, "text"),
						  	  GetSQLValueString($idp, "int"),
						  	  GetSQLValueString($cant, "int"),
                       GetSQLValueString($status, "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());
  
  //ENVIO DE EMAIL

 $dia=date("m.d.Y");
 $hora=date("H:i:s");
 $nombre = $row_usua['nombre_usuario']." ".$row_usua['apellido_usuario']; 
 $telefono = $row_usua['tel_usuario']; 
 $email = $row_usua['email_usuario'];   
 $asunto = 'Compra Exitosa';
 $producto = $row_producto['nombre_prod'];
 $monto = $row_config['simbolo_moneda']." ".$row_producto['precio'];
 $fpago = $row_tpago['informacion_fpago'];
 $subject= $asunto;
$message = "
<html>
<head>
<title>MiGuayaba.com</title>
</head>
<body>
<img src='http://miguayaba.adminsimple.com/images_resellers/logo/12435_a9af474caeab7ddc075b1e76d9006701.png' alt='' />
  <h2>Compra Exitosa!</h2> <br />
 El mensaje se a enviado el dia: $dia a las: $hora<br /><br />
----------------------------------------------------------------------------<br />
 <b>Nombre y Apellido:</b> $nombre<br />
 <b>Tel&eacute;fono:</b> $telefono<br />
 <b>Email:</b> $email<br />
 <b>Producto: <span style='font-size:18px;'>$producto</span></b><br>
 <b>Monto:</b> <span style='font-size:18px;'>$monto</span><br />
 
----------------------------------------------------------------------------<br /><br /><br />
$fpago
----------------------------------------------------------------------------<br /><br /><br />

  
  Atentamente;<br /><br />
  Alejandra Ceballos<br />
  <em>Gerencia de Mercadeo y Atenci&oacute;n al Cliente</em><br />
  <b>MiGuayaba.com</b>
  
</body>
</html>
";
 
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: MiGuayaba<miguayabaweb@gmail.com>' . "\r\n";
$headers .= 'Cc: invernet2010@gmail.com' . "\r\n";
 mail($email, $subject, $message, $headers);
  
}
?>
<?php if($totalRows_pedido==0) { ?>
<p>GRACIAS POR CONFIAR EN NOSOTROS <BR> <span style="color:red;font-size:20px;"><?php echo $row_usua['nombre_usuario']." ".$row_usua['apellido_usuario'];?></span></p>
<p style="font-size:18px;">Aqu&iacute; te dejamos detalle de t&uacute; compra!</p>
<br><br><br>

<table >
<tr style="height:30px;">
<td colspan="2"><h2>DETALLE PEDIDO</h2></td>
</tr>
<tr style="height:30px;font-size:20px;">
<td><b>PRODUCTO</b></td>
<td ><b>PRECIO</b></td>
</tr>
<tr style="font-size:18px;">
<td><?php echo utf8_encode($row_producto['nombre_prod']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php echo $row_config['simbolo_moneda']." ".$row_producto['precio']; ?></td>
</tr>
</table>
<br><br>
<cite>
<h4>"Te hemos enviado un E-mail con esta Informaci&oacute;n!" </h4>
</cite>
<?php }else {?>
<cite>
<p><?php echo $row_usua['nombre_usuario']; ?>;</p>
<p>Ya tienes una orden con este producto que a&uacute;n NO ha sido procesada en t&uacute; Carrito de Compras! </p>
<p>Dicha orden la Realizastes el: <b><?php echo $row_pedido['creado']; ?></b> y tiene como No. de Orden el <b>#<?php echo $row_pedido['id_pedido']; ?></b> </p>
<p>Para pagar y procesar la orden puedes usar los datos que siguen abajo:</p>
</cite>
<?php } ?>
<br><br><br>
<table style="width:80%">
<tr style="height:30px;">
<td><h2>FORMAS DE PAGO</h2></td>
</tr>
<?php do { ?>
<tr>
<td>
<?php echo $row_tpago['informacion_fpago']; ?>
<hr></td>
</tr>
<?php } while ($row_tpago = mysql_fetch_assoc($tpago)); ?>

</table>
