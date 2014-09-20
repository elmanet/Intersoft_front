<?php 

$id_user=$row_usua['id_usuario'];

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
$query_pedido = "SELECT * FROM sis_pedido_compra WHERE id_user='$id_user' ORDER BY id_compra DESC";
$pedido = mysql_query($query_pedido, $sistemai) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);

?>
<?php if($totalRows_pedido>0) { ?>

<p><img src="images/tienda/carrito.png" alt="" style="vertical-align: middle;" width="40">
<span style="font-size:40px;vertical-align: middle;">Mi Cuenta Corriente</span> </p>

<table class="t_carrito" >
<tr style="background-color:#f3f3f3;">
	<td width="30"><b>Pedido #</b></td>
	<td width="340"><b>Fecha Pedido</b></td>
	<td width="80"><b>Status</b></td>
	<td width="25"><b>Ver Pedido</b></td>
<td width="80"><b>Informar Pago</b></td>
</tr>
 <?php  do { ?>
<tr style="background-color:#fff;">
	<td><?php echo $row_pedido['id_compra'];?></td>
	<td style="font-family:arial;"><?php echo $row_pedido['creado'];?></td>
    <td  height="26" align="center" ><?php if($row_pedido['status']==1) {?><img src="mgpanel/images/iconfinder/1381304434_system-software-update.png" alt="" width="35" title="Pedido sin Procesar" ><?php } ?><?php if($row_pedido['status']==2) {?><img src="mgpanel/images/iconfinder/1375822113_shopping-cart-accept.png" alt="" width="35" title="Pedido Procesado" ><?php } ?><?php if($row_pedido['status']==3) {?><img src="mgpanel/images/iconfinder/1381304398_no_entry.png" alt="" width="35" title="Pedido Cancelado"><?php } ?></td>
	<td><a href="javascript:cargarContenidos('modules/productos/micuenta_detalle.php?id_user=<?php echo $row_usua['id_usuario'];?>&id_compra=<?php echo $row_pedido['id_compra'];?>')" class="ask-custom"><img src="mgpanel/images/iconspng/1371153448_search.png" alt="" width="25" title="Ver detalle del Pedido"></a></td>
	<td  height="26" align="center" ><?php if($row_pedido['status']==1) {?><a href="javascript:cargarContenidos('modules/productos/informar_pago.php?id_user=<?php echo $row_usua['id_usuario'];?>&id_compra=<?php echo $row_pedido['id_compra'];?>')" class="ask-custom">Informar Pago</a><?php } ?><?php if($row_pedido['status']==2) {?><img src="mgpanel/images/iconfinder/1381304383_checkmark.png" alt="" width="35" title="Pedido Pagado" ><?php } ?><?php if($row_pedido['status']==3) {?><img src="mgpanel/images/iconfinder/1381304532_Process-Warning.png" alt="" width="35" title="Problemas con el Pedido" ><?php } ?></td>
</tr>
 <?php } while ($row_pedido = mysql_fetch_assoc($pedido)); ?>
 
</table>

<br><br><br>
<?php }else {?>
<cite>
<p><span style="font-size:20px;"><?php echo $row_usua['nombre_usuario']; ?>;</span></p>
<img src="mgpanel/images/png/atencion.png" alt="" width="70"  style="vertical-align:middle;float:left;" ><p>NO has realizado ning&uacute;n Pedido! </p>
</cite>
<?php } ?>
<br><br><br>