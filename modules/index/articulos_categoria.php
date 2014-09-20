<?php
function cortarTexto($texto, $numMaxCaract){
	if (strlen($texto) <  $numMaxCaract){
		$textoCortado = $texto;
	}else{
		$textoCortado = substr($texto, 0, $numMaxCaract);
		$ultimoEspacio = strripos($textoCortado, " ");
 
		if ($ultimoEspacio !== false){
			$textoCortadoTmp = substr($textoCortado, 0, $ultimoEspacio);
			if (substr($textoCortado, $ultimoEspacio)){
				$textoCortadoTmp .= '...';
			}
			$textoCortado = $textoCortadoTmp;
		}elseif (substr($texto, $numMaxCaract)){
			$textoCortado .= '...';
		}
	}
 
	return $textoCortado;
} 
?>
<?php if(($totalRows_articuloscatedes>0)and($pagecateart == 1)) { ?>
<div class="tablaestilo"  >
<div style="width:100%">
    <h2 style="margin-bottom:1px;"><a href="index.php?mod=<?php echo $row_articuloscatedes['alias'];?>"><?php echo $row_articuloscatedes['titulo_articulo']; ?></a></h2>
	<div style="width:742px;">
	    <?php if($row_articuloscatedes['ruta']=="imagenes/"){ }else { ?>
	         <div style="width:742px;height:280px;overflow: hidden;border: #F1F1F1 4px solid;">
	    	    <a href="index.php?mod=<?php echo $row_articuloscatedes['alias'];?>"><img src="imagesmg/<?php echo $row_articuloscatedes['ruta']; ?>" alt="" class="efectoimagedes"></a>
	         </div>   
	    <?php } ?>
		        <span class="articuloscates"><?php echo cortarTexto($row_articuloscatedes['contenido'], 600); ?></span>
       <br>
		  <hr>
        
	</div>
</div>
</div>
<?php } ?>

<?php if ($totalRows_articuloscate>0){    ?>   
         
<div class="tablaestilo"  >
<div style="width:100%">
<?php  do { ?>
	<div class="container_articulos">
	    <?php if($row_articuloscate['ruta']=="imagenes/"){ }else { ?>
	         <div style="width:280px;height:180px;overflow: hidden;border: #F1F1F1 4px solid;">
	    	    <a href="index.php?mod=<?php echo $row_articuloscate['alias'];?>"><img src="imagesmg/<?php echo $row_articuloscate['ruta']; ?>" alt="" class="efectoimage"></a>
	         </div>   
	    <?php } ?>
		  <h2 style="margin-bottom:1px;"><a href="index.php?mod=<?php echo $row_articuloscate['alias'];?>"><?php echo cortarTexto($row_articuloscate['titulo_articulo'], 30); ?></a></h2>
       <span class="articuloscates"><?php echo cortarTexto($row_articuloscate['contenido'], 310); ?></span>
      
       <br>
       <?php /*
       <span style="float:right;">
       <a href="index.php?mod=<?php echo $row_articuloscate['alias'];?>" class="large button red" style="color:#fff;">Leer M&aacute;s</a>
      </span> */?>
		 
		  
        
	</div>
<?php } while ($row_articuloscate = mysql_fetch_assoc($articuloscate)); ?>


</div>

</div>

<div class="pag">
<?php 

if($totalRows_articuloscate != 0){
   $nextpagecateart= $pagecateart +1;
   $prevpagecateart= $pagecateart -1;
?>
<ul id="pagination-digg">
<?php 
 if ($pagecateart == 1) {
    ?>
      <li class="previous-off">&laquo; Anterior</li>
      <li class="active">1</li> 
      <?php
    for($i= $pagecateart+1; $i<= $lastpagecateart ; $i++){?>
            <li><a href="index.php?mg=categoria-de-articulos&226635538465=<?php echo $_GET['226635538465'];?>&pagecateart=<?php echo $i;?>"><?php echo $i;?></a></li>
 <?php }
    if($lastpagecateart >$pagecateart ){?>       
      <li class="next"><a href="index.php?mg=categoria-de-articulos&226635538465=<?php echo $_GET['226635538465'];?>&pagecateart=<?php echo $nextpagecateart;?>" >Siguiente &raquo;</a></li>
      <?php 
    }else{?>
      <li class="next-off">Siguiente &raquo;</li>
<?php  }
 } else {
    ?>
       <li class="previous"><a href="index.php?mg=categoria-de-articulos&226635538465=<?php echo $_GET['226635538465'];?>&pagecateart=<?php echo $prevpagecateart;?>"  >&laquo; Anterior</a></li>
       <?php
      for($i= 1; $i<= $lastpagecateart ; $i++){
                      
            if($pagecateart == $i){
        ?>  <li class="active"><?php echo $i;?></li>
        <?php
            }else{
        ?>  <li><a href="index.php?mg=categoria-de-articulos&226635538465=<?php echo $_GET['226635538465'];?>&pagecateart=<?php echo $i;?>" ><?php echo $i;?></a></li>
        <?php
            }
      } 
      if($lastpagecateart >$pagecateart ){    ?> 
      <li class="next"><a href="index.php?mg=categoria-de-articulos&226635538465=<?php echo $_GET['226635538465'];?>&pagecateart=<?php echo $nextpagecateart;?>">Siguiente &raquo;</a></li>
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
<?php if (($totalRows_articuloscate==0)){ ?> 
<br>
<center>
<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="200">
<p style="font-size:19px; text-align:center;">"No hay Contenido en esta Secci&oacute;n"</p>            
</center>
<?php } ?>