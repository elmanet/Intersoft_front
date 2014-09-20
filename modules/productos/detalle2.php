<?php 

$idp=$_POST['idp'];
$cate=$_GET['135798642'];
$id_user=$row_usua['id_usuario'];
$cant=$_POST['cant'];
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

if(($totalRows_pedido==0) AND ($id_user>0)) {
$insertSQL = sprintf("INSERT INTO sis_pedido(id_pedido, id_user, id_producto, cant, status ) VALUES ( %s, %s, %s, %s, %s)", 
							  GetSQLValueString($id_pedido, "int"),
								GetSQLValueString($id_user, "text"),
						  	  GetSQLValueString($idp, "int"),
						  	  GetSQLValueString($cant, "int"),
                       GetSQLValueString($status, "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());
  

  
}
?>
<?php if($totalRows_usua>0) { if($totalRows_pedido==0) { ?>

<p><img src="images/tienda/carrito.png" alt="" style="float:left;" width="120">
<span style="font-size:20px;"><?php echo $row_usua['nombre_usuario']." ".$row_usua['apellido_usuario'];?></span> 
<br>el producto fu&eacute; agregado de manera correcta!</p>
<br><br><br><br><br><br>
<center>
<p style="font-size:16px;text-align:center"><a href="index.php?mg=productos"> Deseas seguir agregando productos a t&uacute; carrito</a><br>&oacute;<br>
<a href="index.php?mg=carrito"> Quieres Finalizar la Compra?</a>
</p>
</center>
<br><br><br>

<?php }else {?>
<cite>
<p><span style="font-size:20px;"><?php echo $row_usua['nombre_usuario']; ?>;</span></p>
<img src="mgpanel/images/png/atencion.png" alt="" width="70"  style="vertical-align:middle;float:left;" ><p>Ya tienes un producto con esas caracter&iacute;sticas que a&uacute;n NO ha sido procesado en t&uacute; Carrito de Compras! </p>
<p>Dicha producto lo agregastes el: <b><?php echo $row_pedido['creado']; ?></b>  </p>
<p><b>Si deseas adquirir dicho producto puedes ingresar a t&uacute; carrito de compras <a href="index.php?mg=carrito">AQUI</a></b></p>
</cite>
<?php } }else {?>
<img src="mgpanel/images/png/atencion.png" alt="" width="70"  style="vertical-align:middle;float:left;" >
<cite> Debes iniciar sesi&oacute;n para poder realizar t&uacute; compra, si a&uacute;n no te has registrado puedes hacerlo ahora <b> ES GRATIS!</b></cite>
<br>
<br><br>
<center>
<img src="mgpanel/images/iconspng/1371153440_hire-me.png" width="18" height="18" alt="" style="vertical-align:middle;" /> 
<a href="#" class="big-link" data-reveal-id="myModal2"> Iniciar Sesi&oacute;n</a><br><br>
<img src="mgpanel/images/iconspng/1371153548_sign-up.png" width="18" height="18" alt="" style="vertical-align:middle;"/> 
<a href="#" class="big-link" data-reveal-id="crear-cuenta" > Reg&iacute;strate Aqu&iacute;!</a>
</center>
<?php } ?>
<br><br><br>