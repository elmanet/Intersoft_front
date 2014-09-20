<?php 
$categ=$_GET['135798642'];
mysql_select_db($database_sistemai, $sistemai);
$query_prosiguiente = "SELECT a.id, a.nombre_prod, a.des_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id>'$idp' AND b.id='$categ' AND a.status=1 AND a.id_cate=b.id ORDER BY a.id ASC LIMIT 3";
$prosiguiente = mysql_query($query_prosiguiente, $sistemai) or die(mysql_error());
$row_prosiguiente = mysql_fetch_assoc($prosiguiente);
$totalRows_prosiguiente = mysql_num_rows($prosiguiente);

if ($totalRows_prosiguiente>0){    ?>            
<div class="tablaestilo"  style="height:100%;margin-top:20px;">
<div style="width:100%">
<center>
<h3>Siguientes Productos</h3>
</center>
<?php  do { 
$descuento=(($row_prosiguiente['descuento']*$row_config['impuesto'])/100)+$row_prosiguiente['descuento'];
$precio=(($row_prosiguiente['precio']*$row_config['impuesto'])/100)+$row_prosiguiente['precio'];  

?>
	<div class="productos" style="text-align:center;">
	
		  <?php if($row_prosiguiente['ruta']=="imagenes/"){ ?>
		  <a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_prosiguiente['id']; ?>&135798642=<?php echo $_GET['135798642'];?>"><img src="mgpanel/images/iconfinder/no-imagen2.png" alt=""  class="foto_peq_producto" style="height: 175px;"></a>
		  <?php } else { ?>
		  <a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_prosiguiente['id']; ?>&135798642=<?php echo $_GET['135798642'];?>"><img src="mgpanel/modules/productos/<?php echo $row_prosiguiente['ruta']; ?>" alt=""  class="foto_peq_producto" style="height: 190px;" ></a>
		  <?php } ?>
		  <br>
		  <b class="p12"><?php echo strtoupper($row_prosiguiente['nombre_prod']); ?></b>
		  <br>
		  <h3 class="p17">
		  <?php 
        if($row_prosiguiente['descuento']>0) {
        echo "<strike>".$row_config['simbolo_moneda']." ".round($precio,2)."</strike><br>".$row_config['simbolo_moneda']." ".round($descuento,2);
        }else {		  
		   echo $row_config['simbolo_moneda']." ".round($precio,2);
		  }
		  ?>
        
	</div>
<?php } while ($row_prosiguiente = mysql_fetch_assoc($prosiguiente)); ?>


</div>

</div>
<?php } ?>