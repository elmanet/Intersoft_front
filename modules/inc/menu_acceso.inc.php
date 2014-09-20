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
<div >
				<img src="mgpanel/images/iconspng/1371153504_settings.png" width="18" height="18" alt="" style="vertical-align:middle"/>  
				<a href="mgpanel" target="_blank"> MGPanel </a>
			</div>