<?php 

$id_user=$row_usua['id_usuario'];

mysql_select_db($database_sistemai, $sistemai);
$query_producto = "SELECT a.id, a.nombre_prod, a.des_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id='$idp' AND a.status=1 AND a.id_cate=b.id";
$producto = mysql_query($query_producto, $sistemai) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);

mysql_select_db($database_sistemai, $sistemai);
$query_tpago = "SELECT * FROM sis_formapago ORDER BY id_fpago ASC;";
$tpago = mysql_query($query_tpago, $sistemai) or die(mysql_error());
$row_tpago = mysql_fetch_assoc($tpago);
$totalRows_tpago = mysql_num_rows($tpago);

mysql_select_db($database_sistemai, $sistemai);
$query_tenvio = "SELECT * FROM sis_formaenvio ORDER BY id_fenvio ASC;";
$tenvio = mysql_query($query_tenvio, $sistemai) or die(mysql_error());
$row_tenvio = mysql_fetch_assoc($tenvio);
$totalRows_tenvio = mysql_num_rows($tenvio);

mysql_select_db($database_sistemai, $sistemai);
$query_pedido = "SELECT * FROM sis_pedido a, sis_productos b WHERE a.id_user='$id_user' AND a.id_producto=b.id AND a.status=1";
$pedido = mysql_query($query_pedido, $sistemai) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);

mysql_select_db($database_sistemai, $sistemai);
$query_spedido = "SELECT SUM(b.precio) as precio, b.descuento FROM sis_pedido a, sis_productos b WHERE a.id_user='$id_user' AND a.id_producto=b.id AND a.status=1";
$spedido = mysql_query($query_spedido, $sistemai) or die(mysql_error());
$row_spedido = mysql_fetch_assoc($spedido);
$totalRows_spedido = mysql_num_rows($spedido);
?>
<?php if($totalRows_pedido>0) { ?>

<p><img src="images/tienda/carrito.png" alt="" style="vertical-align: middle;" width="40">
<span style="font-size:40px;vertical-align: middle;">Carrito de Compras</span> </p>
<form action="modules/productos/carrito_compra.php"  id="captchaform" method="GET" enctype="multipart/form-data" target="_self" class="cmxform" >
<table class="t_carrito" >
<tr style="background-color:#f3f3f3;">
	<td width="30"><b>Cant<b></td>
	<td width="340"><b>Producto<b></td>
	<td width="80"><b>Foto<b></td>
	<td width="100"><b>Precio<b></td>
	<td width="25"></td>
</tr>
 <?php  do { 
 if($row_pedido['descuento']>0) {
 	$totalp=$row_pedido['descuento']*$row_pedido['cant'];
 	$subtotal=$subtotal+$totalp;
 	} else {
   $totalp=$row_pedido['precio']*$row_pedido['cant'];
   $subtotal=$subtotal+$totalp;
 		}
 
 ?>
<tr style="background-color:#fff;">
	<td><?php echo $row_pedido['cant'];?></td>
	<td><?php echo $row_pedido['nombre_prod'];?></td>
	<td><?php if($row_pedido['ruta']=="imagenes/"){ ?>
              <img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" height="50" >
              <?php } else { ?>
              <img src="imagesmg/<?php echo $row_pedido['ruta']; ?>" alt="" height="50" >
              <?php } ?></td>
    <td style="text-align:right;font-family:arial;"><?php  echo  $row_config['simbolo_moneda']." ".round($totalp,2);?></td>
	<td><a href="modules/productos/eliminar.php?id_pedido=<?php echo $row_pedido['id_pedido'];?>" class="ask-custom"><img src="mgpanel/images/png/cancel_f2.png" alt="" width="25"></a></td>
</tr>
 <?php } while ($row_pedido = mysql_fetch_assoc($pedido)); ?>
 <tr>
	<td colspan="3" style="text-align:right;">Sub-Total</td>
	<td style="text-align:right;font-family:arial;"><?php  echo $row_config['simbolo_moneda']." ".round($subtotal,2);?></td> 
	<td></td>
 </tr>
 <tr>
	<td colspan="3" style="text-align:right;">Impuesto <?php echo $row_config['impuesto'];?>%</td>
	<td style="text-align:right;font-family:arial;"><?php $iva=(($subtotal*$row_config['impuesto'])/100); echo $row_config['simbolo_moneda']." ".round($iva,2);?></td> 
	<td></td>
 </tr>
  <tr>
	<td colspan="3" style="text-align:right;font-size:18px;">Total a Pagar</td>
	<td style="text-align:right;font-size:18px;font-family:arial;"><?php $total=$iva+$subtotal; echo $row_config['simbolo_moneda']." ".round($total,2);?></td> 
	<td></td>
 </tr>
</table>
<table width="100%" >
<tr>
	<td colspan="2"><hr></td>
</tr>
<tr>
	<td colspan="2"><h3><img src="mgpanel/images/iconfinder/1381304535_Process-Accept.png" alt="" width="60"  style="vertical-align:middle;"> 1) Seleccionar Forma de Pago</h3><hr></td>
</tr>

<?php  do { ?>
<tr>
	<td width="40%"><h4><input type="radio" name="tpago" value="<?php echo $row_tpago['id_fpago'];?>"> <?php echo $row_tpago['titulo_fpago'];?></h4></td>
	<td width="60%"><?php echo $row_tpago['informacion_fpago'];?><br><br></td>
</tr>
 <?php } while ($row_tpago = mysql_fetch_assoc($tpago )); ?>
<tr>
	<td colspan="2"><hr></td>
</tr>
<?php if($row_config['envios']==1) { ?>
<tr>
	<td colspan="2"><h3><img src="mgpanel/images/iconfinder/1381304682_palet03.png" alt="" width="60"  style="vertical-align:middle;"> 2)Seleccionar Tipo de Env&iacute;o:</h3><hr></td>
</tr>

<?php  do { ?>
<tr>
	<td width="40%"><h4><input type="radio" name="tenvio" value="<?php echo $row_tenvio['id_fenvio'];?>"> <?php echo $row_tenvio['titulo_fenvio'];?><br></h4></td>
	<td width="60%"><?php echo $row_tenvio['informacion_fenvio'];?><br><br></td>
</tr>
 <?php } while ($row_tenvio = mysql_fetch_assoc($tenvio )); ?>
 <?php } ?>
</table> 
<input type="hidden" name="09834kdki90" id="09834kdki90" value="<?php echo $row_usua['id_usuario'];?>">
<center>
<input type="submit" name="submit"  value="" onclick="verif()" style="background:#fff url('images/tienda/comprar.png'); background-size:100%;width:300px;height:90px;border:0px;" />
<!--
<a href="modules/productos/carrito_compra.php?09834kdki90=<?php echo $row_usua['id_usuario'];?>">
<img src="images/tienda/comprar.png" alt="" width="300" >
</a>
--></center>
</form>
<br><br><br>
<?php }else {?>
<cite>
<p><span style="font-size:20px;"><?php echo $row_usua['nombre_usuario']; ?>;</span></p>
<img src="mgpanel/images/png/atencion.png" alt="" width="70"  style="vertical-align:middle;float:left;" ><p>NO tienes Productos en t&uacute; Carrito de Compras! </p>
</cite>
<?php } ?>
<br><br><br>