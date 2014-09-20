<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once('../inc/conexion_sinsesion_modules.inc.php'); 
require_once('../inc/config.inc.php');;
$id_user=$_GET['id_user'];
$id_compra=$_GET['id_compra'];

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
$query_pedido = "SELECT * FROM sis_pedido a, sis_productos b WHERE a.id_user='$id_user' AND a.id_producto=b.id AND a.id_compra='$id_compra' AND a.status=2";
$pedido = mysql_query($query_pedido, $sistemai) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);

mysql_select_db($database_sistemai, $sistemai);
$query_spedido = "SELECT SUM(b.precio) as precio, SUM(b.precio*a.cant) as subtotal FROM sis_pedido a, sis_productos b WHERE a.id_user='$id_user' AND a.id_producto=b.id AND a.id_compra='$id_compra' AND a.status=2";
$spedido = mysql_query($query_spedido, $sistemai) or die(mysql_error());
$row_spedido = mysql_fetch_assoc($spedido);
$totalRows_spedido = mysql_num_rows($spedido);
?>
<?php if($totalRows_pedido>0) { ?>

<p><img src="images/tienda/carrito.png" alt="" style="vertical-align: middle;" width="40">
<span style="color:red;font-size:40px;vertical-align: middle;">Informar Pago - Pedido #<?php echo $_GET['id_compra'];?></span> </p>
<h3>Detalle del Pedido</h3>
<table class="t_carrito" >
<tr style="background-color:#f3f3f3;">
	<td width="30"><b>Cant<b></td>
	<td width="340"><b>Producto<b></td>
	<td width="80"><b>Foto<b></td>
	<td width="100"><b>Precio<b></td>

</tr>
 <?php  do { ?>
<tr>
	<td><?php echo $row_pedido['cant'];?></td>
	<td><?php echo $row_pedido['nombre_prod'];?></td>
	<td><?php if($row_pedido['ruta']=="imagenes/"){ ?>
              <img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" height="50" >
              <?php } else { ?>
              <img src="imagesmg/<?php echo $row_pedido['ruta']; ?>" alt="" height="50" >
              <?php } ?></td>
    <td style="text-align:right;font-family:arial;"><?php $totalp=$row_pedido['precio']*$row_pedido['cant']; echo $totalp." ".$row_config['simbolo_moneda'];?></td>
	
</tr>
 <?php } while ($row_pedido = mysql_fetch_assoc($pedido)); ?>
 <tr>
	<td colspan="3" style="text-align:right;">Sub-Total</td>
	<td style="text-align:right;font-family:arial;"><?php  echo $row_spedido['subtotal']." ".$row_config['simbolo_moneda'];?></td> 
	
 </tr>
 <tr>
	<td colspan="3" style="text-align:right;">Impuesto <?php echo $row_config['impuesto'];?>%</td>
	<td style="text-align:right;font-family:arial;"><?php $iva=(($row_spedido['subtotal']*$row_config['impuesto'])/100); echo $iva." ".$row_config['simbolo_moneda'];?></td> 
	
 </tr>
  <tr>
	<td colspan="3" style="text-align:right;font-size:18px;">Total a Pagar</td>
	<td style="text-align:right;font-size:18px;font-family:arial;"><?php $total=$iva+$row_spedido['subtotal']; echo $total." ".$row_config['simbolo_moneda'];?></td> 

 </tr>
</table>
<a href="micuenta.php" style="float:right;margin-top:20px;margin-right:20px;">
Volver a la Cuenta Corriente
</a>
<br><br><br>
<?php }else {?>
<cite>
<p><span style="color:red;font-size:20px;"><?php echo $row_usua['nombre_usuario']; ?>;</span></p>
<img src="mgpanel/images/png/atencion.png" alt="" width="70"  style="vertical-align:middle;float:left;" ><p>NO tienes Productos en t&uacute; Pedido! </p>
</cite>
<?php } ?>
<br><br><br>