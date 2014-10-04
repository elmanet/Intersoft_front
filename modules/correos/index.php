<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Formulario de contacto</title>
<link href="../../mgpanel/css/input.css" rel="stylesheet" type="text/css">
<style type="text/css">

.campo {
	border: 1px solid #999;
	background-color: #EFEFEF;
	width: 300px;
}
.spam {
	border: 1px solid #999;
	background-color: #EFEFEF;
	width: 100px;
	margin-right: 5px;
}
.boton_form {
	margin-top:10px;
	display:block;
	border:1px solid #000000;
	width:100px;
	height:20px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
	padding: 0 2px 2px 2px;
	line-height:14px;
	background-color:#EFEFEF;
}
#error {
	border:1px solid #990000;
	background-color:#D70000;
	color:#FFFFFF;
	padding:4px;
	padding-left:6px;
	width:295px;
	font-weight: bold;
}
</style>
<!-- INICIO DE VALIDACION DE CAMPOS -->
<script language="JavaScript">
<!--//
	function revisando_correo(str){
		var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (filter.test(str)){	return true;	}else{		return false;	}
	}
	function formulariodecontacto(){
		if (document.contacto.correo.value==""){ 
			alert("Por favor ingrese su correo."); 
			document.contacto.correo.select();
			return false;
		}
			if (document.contacto.asunto.value==""){ 
			alert("Por favor ingrese un asunto."); 
			document.contacto.asunto.select();
			return false;
		}
		if (document.contacto.antispam.value==""){ 
			alert("Por favor ingrese el c&oacute;digo antispam."); 
			document.contacto.antispam.select();
			return false;
		}
		if (document.contacto.mensaje.value==""){ 
			alert("Por favor ingrese su mensaje."); 
			document.contacto.mensaje.select();
			return false;
		}
		if (revisando_correo(document.contacto.correo.value)==false){	
			alert("Por favor aseg&oucute;rese de que su direcci&oacute;n de correo sea la correcta."); 
			document.contacto.correo.select();
			return false; 
		}
		return true;
	}
// -->
</script>
<!-- FIN DE VALIDACION DE CAMPOS -->
</head>

<body>
<div style="width:100%;">
<div style="float:left;width: 700px;margin-right:27px;">
<br>
<?php do { ?>		
<div>		
<?php echo $row_position22['contenido']; ?>	
</div>		
<?php } while ($row_position22 = mysql_fetch_assoc($position22)); ?> 
</div>
<div style="float:left; width: 310px;margin-bottom: 20px;">
<br />
<form action="modules/correos/proceso.php" method="post" name="contacto" onSubmit="return formulariodecontacto()">
Nombre y Apellido:<br />
<input name="nombre" type="text" class="text_input" id="nombre" value="<?php echo $_GET['nombre'];?>" style="width:250px;height:30px;border-radius:5px;border:2px solid #d8d1d1;margin-bottom:5px;" /><br />
Tel&eacute;fono:<br />
<input name="telefono" type="text" class="text_input" id="telefono" value="<?php echo $_GET['telefono'];?>" style="width:250px;height:30px;border-radius:5px;border:2px solid #d8d1d1;margin-bottom:5px;" /><br />
E-mail:<br />
<input name="correo" type="text" class="text_input" id="correo" value="<?php echo $_GET['correo'];?>" style="width:250px;height:30px;border-radius:5px;border:2px solid #d8d1d1;margin-bottom:5px;" /><br />

D&eacute;janos tu Mensaje:<br />
<textarea name="mensaje" cols="6" rows="5" class="text_input" id="mensaje" style="width:250px;height:80px;border-radius:5px;border:2px solid #d8d1d1;margin-bottom:5px;"><?php echo $_GET['mensaje'];?></textarea><br />

C&oacute;digo antispam:<br />
<input name="antispam" type="text" class="text_input" id="antispam" style="width:90px;height:30px;border-radius:5px;border:2px solid #d8d1d1;"/>
<img src="modules/correos/imagen.php?<?php echo rand(0,9999);?>" alt="C&oacute;digo antispam" width="50" height="24" align="absbottom" /><br />
	<?php if(isset($_GET['codigo_incorrecto'])){?>
        <div id="error">C&oacute;digo antispam incorrecto</div><br />
    <?php ;}?>
<input type="hidden" name="correosis" id="correosis" value="<?php echo $row_config['email'];?>"/>
<input name="Submit" type="submit" class="boton_form" value=" Env&iacute;ar Mensaje " style="width:120px;height:30px;border-radius:5px;"/>

</form>
</div>

</div>
</body>
</html>