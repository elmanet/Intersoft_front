<?php 

$idp=$_GET['135798642Detalle'];

mysql_select_db($database_sistemai, $sistemai);
$query_producto = "SELECT a.id, a.nombre_prod, a.des_prod, b.nombre_cate, a.precio, a.descuento, a.status, a.ruta, a.id_cate, a.cod_prod, a.status  FROM sis_productos a, sis_productos_categoria b WHERE a.id='$idp' AND a.status=1 AND a.id_cate=b.id ORDER BY a.id ASC";
$producto = mysql_query($query_producto, $sistemai) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);

mysql_select_db($database_sistemai, $sistemai);
$query_productofoto = "SELECT b.ruta FROM sis_productos a, sis_productos_foto b WHERE a.id='$idp' AND a.id=b.id_prod";
$productofoto = mysql_query($query_productofoto, $sistemai) or die(mysql_error());
$row_productofoto = mysql_fetch_assoc($productofoto);
$totalRows_productofoto = mysql_num_rows($productofoto);

?>
<?php require_once('modules/inc/barra_buscar.inc.php'); ?>
<hr>
<div style="width:90%;margin:auto;">
<h1><?php echo $row_producto['nombre_prod']; ?>  <span style="font-size:15px;"> - <a href="javascript:history.back()">Regresar</a></span><br>
<span>
<div class="fb-share-button" data-href="http://<?php echo $row_config['website'];?>/index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto['id']; ?>" data-type="button_count"></div>
</span>
</h1>
<div style="width:100%;float:left;">
<div class="fotoendetalle">
  <?php if($row_producto['ruta']=="imagenes/"){ ?>
  <img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" height="150" >
  <?php } else { ?>

<div class="clearfix" id="content"  >
    <div class="clearfix">
     <a href="imagesmg/<?php echo $row_producto['ruta']; ?>" class="jqzoom" rel='gal1'  title="<?php echo utf8_encode($row_producto['nombre_prod']); ?>" >
	  <img src="imagesmg/<?php echo $row_producto['ruta']; ?>" width="100%" title="triumph" alt="" style="border:0px solid #000;" id="img_02" />
	</a>
    </div>
    <?php if($totalRows_productofoto>0) { //COMPROBAMOS SI HAY MAS FOTOS ?>
   <div class="clearfix" >
	<ul id="thumblist" class="clearfix" >
	       <li><a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './imagesmg/<?php echo $row_producto['ruta']; ?>',largeimage: './imagesmg/<?php echo $row_producto['ruta']; ?>'}"><img src="imagesmg/<?php echo $row_producto['ruta']; ?>" width="80" height="80"></a></li>
			 <?php do { ?>		
				     <li><a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './imagesmg/<?php echo $row_productofoto['ruta']; ?>',largeimage: './imagesmg/<?php echo $row_productofoto['ruta']; ?>'}"><img src="imagesmg/<?php echo $row_productofoto['ruta']; ?>" width="80" height="80"></a></li>
			  <?php } while ($row_productofoto = mysql_fetch_assoc($productofoto)); ?> 
   </ul>
	</div>
	<?php } //FIN DE LA COMPROBACION ?>
	<br/>
</div>
	<?php } ?>
</div>
<div class="precioendetalle">
<br>
<span class="p60" >Precio</span><br><br>
<span class="p40">
<?php 
$descuento=$row_producto['descuento'];
$precio=$row_producto['precio'];
if($row_producto['descuento']>0) {
        echo "<strike style='font-size:20px;line-height: 2;'>".$row_config['simbolo_moneda']." ".round($precio,2)."</strike><br>".$row_config['simbolo_moneda']." ".round($descuento,2);
        }else {		  
		   echo $row_config['simbolo_moneda']." ".round($precio,2);
		  }
 ?></span><br>
<?php if($row_producto['descuento']>0) { ?>
<img src="images/tienda/oferta.png" alt="" width="200">
<?php  } ?> 
 <br>
<?php if($row_config['catalogo']==0) { ?>
 <form action="index.php?mg=agregando-producto"  id="carrito" method="POST">
 Cantidad <input type="text" id="cant" name="cant" value="1" style="width:25px;"/>
 <input type="hidden" id="idp" name="idp" value="<?php echo $_GET['135798642Detalle'];?>"/>
 <input class="boton_carrito" onclick="this.disabled=true;this.value='Enviando.. .';this.form.submit();" name="commit" value="Enviar al Carrito" type="submit"> 

 </form>
 <?php } ?>


</div>
</div>
<div style="width:100%;float:left;">
<p><?php echo $row_producto['des_prod']; ?></p>
</div>

<h1>Comentarios</h1>
<div class="fb-comments" data-href="http://<?php echo $row_config['website'];?>/index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto['id']; ?>" data-width="600" data-numposts="5" data-colorscheme="light"></div>
</div>
