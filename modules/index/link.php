<?php require_once('Connections/sistemai.php'); // VALIDACION DE VERSION DE PHPif (!function_exists("GetSQLValueString")) {function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {  if (PHP_VERSION < 6) {    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;  }  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);  switch ($theType) {    case "text":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      break;        case "long":    case "int":      $theValue = ($theValue != "") ? intval($theValue) : "NULL";      break;    case "double":      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";      break;    case "date":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      break;    case "defined":      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;      break;  }  return $theValue;}}mysql_select_db($database_sistemai, $sistemai);$query_config = "SELECT * FROM sis_config";$config = mysql_query($query_config, $sistemai) or die(mysql_error());$row_config = mysql_fetch_assoc($config);$totalRows_config = mysql_num_rows($config);$alias=$_GET['mod'];mysql_select_db($database_sistemai, $sistemai);$query_menu1 = "SELECT *  FROM sis_plantilla_articulos WHERE alias='$alias' AND status=1";$menu1 = mysql_query($query_menu1, $sistemai) or die(mysql_error());$row_menu1 = mysql_fetch_assoc($menu1);$totalRows_menu1 = mysql_num_rows($menu1);$url=$row_config['website']."/index.php?mod=". $row_menu1['alias'];$art=$row_menu1['titulo_articulo'];mysql_select_db($database_sistemai, $sistemai);$query_artfotos = "SELECT *  FROM sis_plantilla_articulos a, sis_plantilla_articulos_foto b WHERE a.id_articulo=b.id_articulos AND a.alias='$alias'";$artfotos = mysql_query($query_artfotos, $sistemai) or die(mysql_error());$row_artfotos = mysql_fetch_assoc($artfotos);$totalRows_artfotos = mysql_num_rows($artfotos);?><?php if($_GET['mg']=="contacto") {}else {?><div style="width:620px;margin-bottom:20px;"><span style="float:right;"><div class="fb-like" data-href="http://<?php echo $row_config['website'];?>/index.php?mod=<?php echo $row_menu1['alias'];?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></span><br><br><h1 class="compartir" style="margin-bottom:0px;"><?php echo $row_menu1['titulo_articulo']; ?></h1><?php if($row_menu1['ruta']=="imagenes/"){ }else { ?>	         <div style="width:100%;height:300px;overflow: hidden;border: #F1F1F1 4px solid;">	    	   <a href="imagesmg/<?php echo $row_menu1['ruta']; ?>" id="modal"> <img src="imagesmg/<?php echo $row_menu1['ruta']; ?>" alt="" class="efectoimagedeslink" title="<?php echo $row_menu1['titulo_articulo']; ?>"></a>	         </div>   	    <?php } ?>	    <br><br><?php echo $row_menu1['contenido']; ?><?php if($totalRows_artfotos>0) { ?><?php if($totalRows_artfotos==1) { ?>				<div style="width:100%;float:left;">					<ul >                  <?php do { ?>						<li style="float: left;list-style: none;width:90%;height:350px;overflow: hidden;border: #F1F1F1 4px solid;margin-bottom: 15px;">							<a class="fancybox-buttons" data-fancybox-group="button" href="imagesmg/<?php echo $row_artfotos['ruta']; ?>" title="<?php echo $row_config['title_site'];?>">								<img src="imagesmg/<?php echo $row_artfotos['ruta']; ?>" alt="<?php echo $row_config['title_site'];?>" width="100%" />							</a>						</li>						 <?php } while ($row_artfotos = mysql_fetch_assoc($artfotos)); ?>																	</ul>				</div><?php }else {?>				<div style="width:100%;float:left;">					<ul >                  <?php do { ?>						<li style="float: left;list-style: none;width:180px;height:100px;overflow: hidden;border: #F1F1F1 4px solid;margin: 0 5px 15px 5px;">							<a class="fancybox-buttons" data-fancybox-group="button" href="imagesmg/<?php echo $row_artfotos['ruta']; ?>" title="<?php echo $row_config['title_site'];?>">								<img src="imagesmg/<?php echo $row_artfotos['ruta']; ?>" alt="<?php echo $row_config['title_site'];?>" width="320" />							</a>						</li>						 <?php } while ($row_artfotos = mysql_fetch_assoc($artfotos)); ?>																	</ul>				</div><?php } }?>				</div><?php } ?>