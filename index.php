<?php 
/* 
SITIO DESARROLLADO POR: MIGUAYABA.COM
CONEXION Y BASE DE DATOS 
*/
error_reporting(0);
require_once('modules/inc/conexion_sinsesion.inc.php');
require_once('modules/inc/config.inc.php');
require_once('modules/inc/consultasbd.inc.php');
require_once('mgpanel/modules/inc/usuario.inc.php');
require_once('modules/inc/procesos_form.inc.php');
require_once('modules/inc/sinsesion.inc.php');
require_once('modules/inc/consulta_titulos.inc.php');
$tipoletra=$row_config['tipof_google'];
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
        <title><?php if($totalRows_prodetalle>0) { echo $row_prodetalle['nombre_prod']." - ";} ?><?php if($_GET['mod']==""){echo $row_config['title_site'];}else { echo $row_titleart['titulo_articulo']." - ".$row_config['title_site'];}?></title>
		
        <!-- DESCRIPCION DEL SITIO -->	
		<meta name="description" content="<?php echo $row_config['meta_des'];?>">
		<meta name="keywords" content="<?php echo $row_config['meta_clave'];?>">
		<meta name="classification" content="<?php echo $row_config['meta_clave'];?>">
		
        <!--  CONFIGURACION -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />	
		<link rel="shortcut icon" href="favicon.ico">   
        <link href='<?php echo $row_config['fuente_google'];?>' rel='stylesheet' type='text/css'>
        
        
		<!-- CSS --> 
        <link rel="stylesheet" href="css/template.css" media="all">	
        
        <!-- JS -->		 
		<script type="text/javascript" src="js/jquery.reveal.js"></script>		
		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
		<script src="js/jquery.touchwipe.1.1.1.js" type="text/javascript"></script>
		<script src="js/jquery.carouFredSel-5.5.0-packed.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/responsivemobilemenu.js"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
		<![endif]-->
        
        <!-- OTRAS PROPIEDADES -->	
		    <!-- ESPECIALES -->
            <?php require_once('modules/inc/propiedades-especiales.inc.php'); ?>
            <!-- ZOOM FOTOS -->
            <?php require_once('modules/inc/zoomfotos.inc.php'); ?>
            <!-- BANNERS -->
            <?php require_once('modules/inc/slidejs.inc.php'); ?>
            <!-- FORMATEAR TEXTOS ALIAS -->
            <?php require_once('modules/inc/crear_alias.inc.php'); ?>
            <!-- IMAGEN MODAL -->
            <?php require_once('modules/inc/imagen_modal.inc.php'); ?>
        
        <!-- DEFINIENDO TIPO DE LETRA -->
            <style type="text/css">
                body{
                    <?php echo $tipoletra; ?>				
                    }
            </style>
        <!-- FIN DE TIPO DE LETRA -->
    </head>
    <body>
        <!-- SCRIPT -->	
		<script type="text/javascript" >
		function cargarContenidos(urlDatos){$.get(urlDatos, function(data) {  $('#idDiv').html(data);});}</script>

        <!-- FACEBOOK -->		
        <div id="fb-root"></div>
        <script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
        
<!-- MAQUETA DEL SITE -->
<!-- ERROR DE INTERNET EXPLORER -->
    <div id="alerta" style="width:100%; background-color:#F8F80B;color:red;position:fixed;bottom:0px; z-index: 20000 !important;"></div>
    <?php 
       if($var=="ie"){ 
       $expresion='MSIE';
       $numero=ereg($expresion,$_SERVER['HTTP_USER_AGENT']);
       if ($numero==1){
    ?>
	<script language="javascript" type="text/javascript">
	   document.getElementById("alerta").innerHTML = "<center><br>Este navegador <b>Internet Explorer</b> YA NO ES COMPATIBLE!, te recomendamos usar Google Chrome o Firefox en su &uacute;ltima versi&oacute;n<br><br></center>";
    </script>
    <?php } /* Fin verificacion */  ?>   
        

    <div id="primaryContainer" class="primaryContainer clearfix">
        <?php if($totalRows_position1>0){ ?>
        <div id="conter_header" class="clearfix">
            <div id="logo" class="clearfix">
                <?php do { ?>		
                <div>		
                    <?php echo $row_position1['contenido']; ?>	
                </div>		
                <?php } while ($row_position1 = mysql_fetch_assoc($position1)); ?> 
            </div>
            
            <div id="mod-header" class="clearfix">
                <?php do { ?>		
                <div>		
                    <?php echo $row_position2['contenido']; ?>	
                </div>		
                <?php } while ($row_position2 = mysql_fetch_assoc($position2)); ?>
            </div>
        </div>
        <?php } /* FIN HEADER */ ?>
        
        
        <?php if($totalRows_menu1>0){ ?>
        <div id="menu" class="clearfix">
            <!-- MENU 1-->
            <div id="contenedor_menu">
                <?php if($totalRows_menu1>0){ ?>
                    <div id="contenedor_menu1">
                        <div id="menu1">
                            <?php require_once('modules/inc/menu1.inc.php'); ?>	
                        </div>
                    </div>
                <?php } ?>
            </div> <!-- FIN MENU 1-->
        </div>
        <?php } /* FIN MENU */ ?>
        
        <?php if($totalRows_banner1>0){ ?>
        <div id="banner" class="clearfix">
            
            <!-- BANNER PRINCIPAL 1 -->
            <?php if(($_GET['mg']=="")and($_GET['mod']=="")){ ?>
                <?php if($totalRows_banner1>0){ ?>
                    <div id="conten_banner">
                        <div id="banner1">
                            <div id="slides">
                                <div class="callbacks_container">
                                    <ul class="rslides" id="slider1">		 
                                        <?php do { ?>
                                            <?php if($row_banner1['titulo_foto']=="") {?>
                                                <li>
                                                    <img src="imagesmg/<?php echo $row_banner1['ruta']; ?>" alt="" />
                                                    <?php if($row_banner1['info']=="") { }else {?><p class="caption"><?php echo $row_banner1['info'];} ?></p>           
                                                </li>
                                            <?php }else {?>       
                                                <li>
                                                    <a href="<?php echo $row_banner1['titulo_foto']; ?>"><img src="imagesmg/<?php echo $row_banner1['ruta']; ?>" alt="" /></a>
                                                    <?php if($row_banner1['info']=="") { }else {?><p class="caption"><a href="<?php echo $row_banner1['titulo_foto']; ?>"><?php echo $row_banner1['info'];} ?></a>          
                                                </li>
                                            <?php } ?>   
                                        <?php } while ($row_banner1 = mysql_fetch_assoc($banner1)); ?>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } } ?>  <!-- FIN BANNER PRINCIPAL 1 -->
            
        </div>
        <?php } /* FIN BANNER VERIFICACION */ ?>
        
        <div id="contenedor-central" class="clearfix">
            <?php if($totalRows_position3>0){ ?>
            <div id="conten-top" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position3['contenido']; ?>	
                    </div>		
                <?php } while ($row_position3 = mysql_fetch_assoc($position3)); ?> 
            </div>
             <?php } /* FIN CONTEN-TOP */ ?>
            
            <?php if($totalRows_position4>0){ ?>
            <div id="mod1" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position4['contenido']; ?>	
                    </div>		
                <?php } while ($row_position4 = mysql_fetch_assoc($position4)); ?> 
            </div>
            
            <div id="mod2" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position5['contenido']; ?>	
                    </div>		
                <?php } while ($row_position5 = mysql_fetch_assoc($position5)); ?> 
            </div>
            <div id="mod3" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position6['contenido']; ?>	
                    </div>		
                <?php } while ($row_position6 = mysql_fetch_assoc($position6)); ?> 
            </div>
             <?php } /* FIN MODULES 1-2-3 */ ?>
            
            <div id="contenido-central" class="clearfix">
                <div id="contenido" class="clearfix">
                    <?php if($totalRows_position7>0){ ?>
                    <div id="c-top" class="clearfix">
                        <?php do { ?>		
                            <div>		
                                <?php echo $row_position7['contenido']; ?>	
                            </div>		
                        <?php } while ($row_position7 = mysql_fetch_assoc($position7)); ?> 
                    </div>
                    <?php } /* FIN C-TOP */ ?>
                    
                    
                    <div id="c-central" class="clearfix">
                        
                        <?php // ************* MODULOS DEL SISTEMA *************
                        require_once('modules/inc/contenido_modulos.inc.php'); 
                        // ********** FIN MODULOS **************  ?>
                        
                        <?php do { ?>		
                            <div>		
                                <?php echo $row_position8['contenido']; ?>	
                            </div>		
                        <?php } while ($row_position8 = mysql_fetch_assoc($position8)); ?> 
                    </div>
                
                    
                    <?php if($totalRows_position9>0){ ?>
                    <div id="c-bottom" class="clearfix">
                        <?php do { ?>		
                            <div>		
                                <?php echo $row_position9['contenido']; ?>	
                            </div>		
                        <?php } while ($row_position9 = mysql_fetch_assoc($position9)); ?> 
                    </div>
                    <?php } /* FIN C-BOTTOM */ ?>
                    
                </div>
                
                <?php if($totalRows_position10>0){ ?>
                <div id="derecha" class="clearfix">
                    <?php do { ?>		
                    <div>		
                        <?php echo $row_position10['contenido']; ?>	
                    </div>		
                    <?php } while ($row_position10 = mysql_fetch_assoc($position10)); ?> 
                </div>
                <?php } /* FIN DERECHA */ ?>
            </div>
            
            <?php if($totalRows_position11>0){ ?>
            <div id="mod4" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position11['contenido']; ?>	
                    </div>		
                <?php } while ($row_position11 = mysql_fetch_assoc($position11)); ?> 
            </div>
            <?php } /* FIN MOD4 */ ?>
            
            <?php if($totalRows_position12>0){ ?>
            <div id="mod5" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position12['contenido']; ?>	
                    </div>		
                <?php } while ($row_position12 = mysql_fetch_assoc($position12)); ?>
            </div>
            <?php } /* FIN MOD5 */ ?>
            
            <?php if($totalRows_position13>0){ ?>
            <div id="mod6" class="clearfix">
                <?php do { ?>		
                    <div>		
                        <?php echo $row_position13['contenido']; ?>	
                    </div>		
                <?php } while ($row_position13 = mysql_fetch_assoc($position13)); ?>
            </div>
            <?php } /* FIN MOD6 */ ?>
        </div>
        
        <?php if($totalRows_position14>0){ ?>
        <div id="contenido-abajo" class="clearfix">
            <?php do { ?>		
                <div>		
                     <?php echo $row_position14['contenido']; ?>	
                </div>		
             <?php } while ($row_position14 = mysql_fetch_assoc($position14)); ?>
        </div>
        <?php } /* FIN CONTENIDO ABAJO */ ?>
        
        <div id="contenedor-footer" class="clearfix">
            
            <?php if($totalRows_position15>0){ ?>
            <div id="mod7" class="clearfix">
            </div>
                <?php do { ?>		
                    <div>		
                         <?php echo $row_position15['contenido']; ?>	
                    </div>		
                 <?php } while ($row_position15 = mysql_fetch_assoc($position15)); ?>
            
            <div id="mod8" class="clearfix">
                <?php do { ?>		
                    <div>		
                         <?php echo $row_position16['contenido']; ?>	
                    </div>		
                 <?php } while ($row_position16 = mysql_fetch_assoc($position16)); ?>
            </div>
            
            <div id="mod9" class="clearfix">
                <?php do { ?>		
                    <div>		
                         <?php echo $row_position17['contenido']; ?>	
                    </div>		
                 <?php } while ($row_position17 = mysql_fetch_assoc($position17)); ?>
            </div>
            <?php } /* FIN MODULOS 7-8-9 */ ?>
            
            <?php if($totalRows_position18>0){ ?>
            <div id="mod10" class="clearfix">
                <?php do { ?>		
                    <div>		
                         <?php echo $row_position18['contenido']; ?>	
                    </div>		
                 <?php } while ($row_position18 = mysql_fetch_assoc($position18)); ?>
            </div>
            
            <div id="mod11" class="clearfix">
                <?php do { ?>		
                    <div>		
                         <?php echo $row_position19['contenido']; ?>	
                    </div>		
                 <?php } while ($row_position19 = mysql_fetch_assoc($position19)); ?>
            </div>
            <?php } /* FIN MODULOS 10-11 */ ?>
            
        </div>
        <?php if($totalRows_position20>0){ ?>
        <div id="contenedor-credito" class="clearfix">
            <div id="creditos" class="clearfix">
                <?php do { ?>		
                    <div>		
                         <?php echo $row_position20['contenido']; ?>	
                    </div>		
                 <?php } while ($row_position20 = mysql_fetch_assoc($position20)); ?>
            </div>
        </div>
        <?php } /* FIN CREDITOS */ ?>
    </div>  <!-- FIN CONTAINER PRINCIPAL -->

    <!-- SCRIPT -->
          
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script> 
    <script src="js/plugins.js"></script>       
    <script src="js/main.js"></script>
     
    <!-- GOOGLE ANALYTICS -->   
    <?php if($row_config['id_google']=="") {?>
    <?php }else {?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?php echo $row_config['id_google'];?>', '<?php echo $row_config['website'];?>');
      ga('send', 'pageview');

    </script>
    <?php } ?>

    <?php } else {require_once('js/jq.js');} ?>
    </body>
</html>