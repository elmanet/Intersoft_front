<?php require_once('modules/inc/barra_buscar.inc.php'); ?>
<hr>    
    <?php if ($totalRows_producto>0){    ?>            
<div class="tablaestilo"  style="height:100%;">
<div style="width:100%">
<?php  do { 
$descuento=$row_producto['descuento'];
$precio=$row_producto['precio'];  

?>
	<div class="productos">
		  <?php if($row_producto['ruta']=="imagenes/"){ ?>
		  <a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto['id']; ?>&135798642=<?php echo $_GET['135798642'];?>"><img src="mgpanel/images/iconfinder/no-imagen2.png" alt="" width="170" height="150"  class="foto_peq_producto"></a>
		  <?php } else { ?>
		  <a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto['id']; ?>&135798642=<?php echo $_GET['135798642'];?>"><img src="imagesmg/<?php echo $row_producto['ruta']; ?>" alt="" width="170" height="150" class="foto_peq_producto" ></a>
		  <?php } ?>
		  <br>
		  <b class="p12"><?php echo $row_producto['nombre_prod']; ?></b>
		  <br>
		  <h3 class="p17">
		  <?php 
        if($row_producto['descuento']>0) {
        echo "<strike>".$row_config['simbolo_moneda']." ".round($precio,2)."</strike><br>".$row_config['simbolo_moneda']." ".round($descuento,2);
        }else {		  
		   echo $row_config['simbolo_moneda']." ".round($precio,2);
		  }
		  ?>
        <br>
			<a href="index.php?mg=producto-detalle&135798642Detalle=<?php echo $row_producto['id']; ?>&135798642=<?php echo $_GET['135798642'];?>"><img src="images/tienda/boton_detalles.png" alt="" /></a></h3>
			
	</div>
<?php } while ($row_producto = mysql_fetch_assoc($producto)); ?>


</div>

</div>

<div style="float:left;width:100%;">
<?php 

if($totalRows_producto != 0){
   $nextpagecate= $pagecate +1;
   $prevpagecate= $pagecate -1;
?>
<ul id="pagination-digg">
<?php 
 if ($pagecate == 1) {
    ?>
      <li class="previous-off">&laquo; Anterior</li>
      <li class="active">1</li> 
      <?php
    for($i= $pagecate+1; $i<= $lastpagecate ; $i++){?>
            <li><a href="index.php?mg=categoria-de-productos&135798642=<?php echo $_GET['135798642'];?>&pagecate=<?php echo $i;?>"><?php echo $i;?></a></li>
 <?php }
    if($lastpagecate >$pagecate ){?>       
      <li class="next"><a href="index.php?mg=categoria-de-productos&135798642=<?php echo $_GET['135798642'];?>&pagecate=<?php echo $nextpagecate;?>" >Siguiente &raquo;</a></li>
      <?php 
    }else{?>
      <li class="next-off">Siguiente &raquo;</li>
<?php  }
 } else {
    ?>
       <li class="previous"><a href="index.php?mg=categoria-de-productos&135798642=<?php echo $_GET['135798642'];?>&pagecate=<?php echo $prevpagecate;?>"  >&laquo; Anterior</a></li>
       <?php
      for($i= 1; $i<= $lastpagecate ; $i++){
                      
            if($pagecate == $i){
        ?>  <li class="active"><?php echo $i;?></li>
        <?php
            }else{
        ?>  <li><a href="index.php?mg=categoria-de-productos&135798642=<?php echo $_GET['135798642'];?>&pagecate=<?php echo $i;?>" ><?php echo $i;?></a></li>
        <?php
            }
      } 
      if($lastpagecate >$pagecate ){    ?> 
      <li class="next"><a href="index.php?mg=categoria-de-productos&135798642=<?php echo $_GET['135798642'];?>&pagecate=<?php echo $nextpagecate;?>">Siguiente &raquo;</a></li>
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
?></div>
<?php } ?>
<?php if (($totalRows_producto==0)){ ?> 
<br>
<center>
<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="200">
<p style="font-size:19px; text-align:center;">"No hay registros en esta Categor&iacute;a"</p>            
</center>
<?php } ?>