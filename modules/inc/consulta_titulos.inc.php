<?php
//CONSULTA PARA TITULO DE PRODUCTOS
$idp=$_GET['135798642Detalle'];

mysql_select_db($database_sistemai, $sistemai);
$query_prodetalle = "SELECT a.id, a.nombre_prod, a.des_prod, b.nombre_cate, a.precio, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id='$idp' AND a.status=1 AND a.id_cate=b.id ";
$prodetalle = mysql_query($query_prodetalle, $sistemai) or die(mysql_error());
$row_prodetalle = mysql_fetch_assoc($prodetalle);
$totalRows_prodetalle = mysql_num_rows($prodetalle);
?>