<?php 
$colname_pedido = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_pedido = $_SESSION['MM_Username'];
}
mysql_select_db($database_sistemai, $sistemai);
$query_pedido = sprintf("SELECT * FROM sis_pedido a, sis_users_cuenta b WHERE a.id_user=b.id_usuario AND a.status=1 AND b.username = %s", GetSQLValueString($colname_pedido, "text"));
$pedido = mysql_query($query_pedido, $sistemai) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);
?>
<?php if($totalRows_usua>0) { ?>

    <center>
        <div>
				Tienes <a href="index.php?mg=carrito"> <b><?php echo $totalRows_pedido; ?></b> Producto(s) </a> <br>
				en tu carrito<br>
				<img src="images/tienda/carrito.png" alt="" width="80" >
			</div>
    </center>

<?php 

/*
<div style="float: right;margin-left: 10px;">
   
	<div style="float: right;margin-right: 10px;">
				<img src="mgpanel/images/iconspng/carbuy.png" width="18" height="18" alt="" style="vertical-align:middle" />  
				<a href="comprar.php"> <b><?php echo $totalRows_pedido; ?></b> Producto(s) </a>
			</div>
	<div style="float: right;margin-right: 10px;">
				<img src="mgpanel/images/iconspng/1371153448_search.png" width="18" height="18" alt="" style="vertical-align:middle"/>  
				<a href="micuenta.php" > Mi Cuenta </a>
			</div>
			
<?php if($row_usua['cod']>=4) { ?>
			<div style="float: right;margin-right: 10px;">
				<img src="mgpanel/images/iconspng/1371153504_settings.png" width="18" height="18" alt="" style="vertical-align:middle"/>  
				<a href="mgpanel" target="_blank"> MGPanel </a>
			</div>
	<?php } ?>
	<div style="float: right;margin-right: 10px;">
		<img src="mgpanel/images/iconspng/1371153440_hire-me.png" width="18" height="18" alt="" style="vertical-align:middle" />   
		 <?php echo $row_usua['nombre_usuario'];?>
	</div><br><br>
		<div style="float: right;margin-right: 10px;">
		<a href="<?php echo $logoutAction ?>"> Cerrar Sesi&oacute;n</a>
	</div>
</div>
*/ ?>

<?php } else { ?>

   <center>
        <div>
				Tienes <a href="#"> <b><?php echo $totalRows_pedido; ?></b> Producto(s) </a> <br>
				en tu carrito<br>
				<img src="images/tienda/carrito.png" alt="" width="80" >
			</div>
    </center>

<?php /*


<div style="float: right;margin-left: 10px;">
	<div style="float: right;margin-right: 10px;">
		<img src="mgpanel/images/iconspng/1371153440_hire-me.png" width="18" height="18" alt="" align="middle" />   
		<a href="#" class="big-link" data-reveal-id="myModal2"> Iniciar Sesi&oacute;n</a>
	</div><br><br>
	<div style="float: right;margin-right: 10px;">
		<a href="#" class="big-link" data-reveal-id="crear-cuenta" > Reg&iacute;strate es GRATIS!</a>
	</div>
</div>	

*/ ?>
<?php } ?>