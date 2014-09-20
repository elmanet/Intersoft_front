<?php require_once('modules/inc/barra_buscar.inc.php'); ?>
<hr>
<?php if ($totalRows_producto_gen>0){ ?>            
<div class="tablaestilo"  style="height:100%;">
<div style="width:100%">
<?php  do { ?>
	<div class="productos">
		  <?php if($row_producto_gen['ruta']=="imagenes/"){ ?>
		  <a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto_gen['id']; ?>"><img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" width="170" height="150" class="foto_peq_producto" ></a>
		  <?php } else { ?>
		  <a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto_gen['id']; ?>"><img src="mgpanel/modules/productos/<?php echo $row_producto_gen['ruta']; ?>" alt="" width="170" height="150" class="foto_peq_producto" ></a>
		  <?php } ?>
		  <br>
		  <b class="p12"><?php echo strtoupper($row_producto_gen['nombre_prod']); ?></b>
		  <br>
		  <h3 class="p17"><?php $precio=(($row_producto_gen['precio']*$row_config['impuesto'])/100)+$row_producto_gen['precio']; echo $row_config['simbolo_moneda']." ".round($precio,2); ?>
			<br>
			<a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto_gen['id']; ?>"><img src="images/tienda/boton_detalles.png" alt="" /></a></h3>
	</div>
<?php } while ($row_producto_gen = mysql_fetch_assoc($producto_gen)); ?>
</div>


<?php ?> 
<?php 

if($numrows != 0){
   $nextpage= $page +1;
   $prevpage= $page -1;
?>
<ul id="pagination-digg">
<?php 
 if ($page == 1) {
    ?>
      <li class="previous-off">&laquo; Anterior</li>
      <li class="active">1</li> 
      <?php
    for($i= $page+1; $i<= $lastpage ; $i++){?>
            <li><a href="index.php?mg=productos&page=<?php echo $i;?>"><?php echo $i;?></a></li>
 <?php }
    if($lastpage >$page ){?>       
      <li class="next"><a href="index.php?mg=productos&page=<?php echo $nextpage;?>" >Siguiente &raquo;</a></li>
      <?php 
    }else{?>
      <li class="next-off">Siguiente &raquo;</li>
<?php  }
 } else {
    ?>
       <li class="previous"><a href="index.php?mg=productos&page=<?php echo $prevpage;?>"  >&laquo; Anterior</a></li>
       <?php
      for($i= 1; $i<= $lastpage ; $i++){
                      
            if($page == $i){
        ?>  <li class="active"><?php echo $i;?></li>
        <?php
            }else{
        ?>  <li><a href="index.php?mg=productos&page=<?php echo $i;?>" ><?php echo $i;?></a></li>
        <?php
            }
      } 
      if($lastpage >$page ){    ?> 
      <li class="next"><a href="index.php?mg=productos&page=<?php echo $nextpage;?>">Siguiente &raquo;</a></li>
      <?php
      }else{
    ?> <li class="next-off">Siguiente &raquo;</li>
    <?php
      }
 }   
?>
</ul>
<?php
} 
?>
                          
</div>
<div style="float:left;width:100%;">

<?php if (($totalRows_producto_gen==0)){ ?> 
<br>
<center>
<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="200">
<p style="font-size:19px; text-align:center;">"No Hay productos Disponibles!"</p>            
</center>
<?php } ?>