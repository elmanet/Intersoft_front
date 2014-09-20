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
<?php if(($totalRows_articuloportadades>0) and ($pageportada==1)) { ?>
<div class="tablaestilo"  >
<div style="width:100%">
    <h2 style="margin-bottom:1px;"><a href="index.php?mod=<?php echo $row_articuloportadades['alias'];?>"><?php echo $row_articuloportadades['titulo_articulo']; ?></a></h2>
	<div style="width:742px;">
	    <?php if($row_articuloportadades['ruta']=="imagenes/"){ }else { ?>
	         <div style="width:742px;height:280px;overflow: hidden;border: #F1F1F1 4px solid;">
	    	    <a href="index.php?mod=<?php echo $row_articuloportadades['alias'];?>"><img src="imagesmg/<?php echo $row_articuloportadades['ruta']; ?>" alt="" class="efectoimagedes"></a>
	         </div>   
	    <?php } ?>
		        <span class="articulosportadas"><?php echo cortarTexto($row_articuloportadades['contenido'], 600); ?></span>
       <br>
       <hr>
      
	</div>
</div>
</div>
<?php } ?>

<?php if ($totalRows_articulosportada>0){    ?>   
         
<div class="tablaestilo"  >
<div style="width:100%">
<?php  do { ?>
	<div class="container_articulos">
	    <?php if($row_articulosportada['ruta']=="imagenes/"){ }else { ?>
	         <div style="width:360px;height:180px;overflow: hidden;border: #F1F1F1 4px solid;">
	    	    <a href="index.php?mod=<?php echo $row_articulosportada['alias'];?>"><img src="imagesmg/<?php echo $row_articulosportada['ruta']; ?>" alt="" class="efectoimage"></a>
	         </div>   
	    <?php } ?>
		  <h2 style="margin-bottom:1px;"><a href="index.php?mod=<?php echo $row_articulosportada['alias'];?>"><?php echo cortarTexto($row_articulosportada['titulo_articulo'], 30); ?></a></h2>
       <span class="articulosportadas"><?php echo cortarTexto($row_articulosportada['contenido'], 315); ?></span>
	  
        
	</div>
<?php } while ($row_articulosportada = mysql_fetch_assoc($articulosportada)); ?>


</div>
</div>


<div class="pag">
<?php 

if($totalRows_articulosportada != 0){
   $nextpageportada= $pageportada +1;
   $prevpageportada= $pageportada -1;
?>
<ul id="pagination-digg">
<?php 
 if ($pageportada == 1) {
    ?>
      <li class="previous-off">&laquo; Anterior</li>
      <li class="active">1</li> 
      <?php
    for($i= $pageportada+1; $i<= $lastpageportada ; $i++){?>
            <li><a href="index.php?pageportada=<?php echo $i;?>"><?php echo $i;?></a></li>
 <?php }
    if($lastpageportada >$pageportada ){?>       
      <li class="next"><a href="index.php?pageportada=<?php echo $nextpageportada;?>" >Siguiente &raquo;</a></li>
      <?php 
    }else{?>
      <li class="next-off">Siguiente &raquo;</li>
<?php  }
 } else {
    ?>
       <li class="previous"><a href="index.php?pageportada=<?php echo $prevpageportada;?>"  >&laquo; Anterior</a></li>
       <?php
      for($i= 1; $i<= $lastpageportada ; $i++){
                      
            if($pageportada == $i){
        ?>  <li class="active"><?php echo $i;?></li>
        <?php
            }else{
        ?>  <li><a href="index.php?pageportada=<?php echo $i;?>" ><?php echo $i;?></a></li>
        <?php
            }
      } 
      if($lastpageportada >$pageportada ){    ?> 
      <li class="next"><a href="index.php?pageportada=<?php echo $nextpageportada;?>">Siguiente &raquo;</a></li>
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
<?php if (($totalRows_articulosportada==0)){ ?> 
<br>
<center>
<img src="mgpanel/images/iconfinder/vacio.png" alt="" width="200">
<p style="font-size:19px; text-align:center;">"No hay Art&iacute;culos en esta Secci&oacute;n"</p>            
</center>
<?php } ?>