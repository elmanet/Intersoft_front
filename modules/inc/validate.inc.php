<link rel="stylesheet" type="text/css" media="screen" href="../../mgpanel/js/css/screen.css" />
<script src="../../mgpanel/js/lib/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../../mgpanel/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$().ready(function() {
	// validate signup form on keyup and submit
	$("#captchaform").validate({
		rules: {
			nombre_usuario: "required",
			apellido_usuario: "required",
         username: "required",
			password: "required",
			ci_usuario: {
				required: true,
				number: true
			},
			dir_usuario: "required",
			tel_usuario: "required",
			
			email_usuario: {
				required: true,
				email: true
			},
         cod_prod: "required",
			nombre_prod: "required",
			existencia: {
				required: true,
				number: true
			},
			precio: {
				required: true,
				number: true
			},
         tpago:{
           required:true;         	
         	},
			
			
			
			
		},
		messages: {
			nombre_usuario: "<br />Debes Ingresar el Nombre del Usuario",
			apellido_usuario: "<br />Debes Ingresar el Apellido del Usuario",
			ci_usuario: "<br />No. de Cedula Invalido o Vacio",
			dir_usuario: "<br />Debes Ingresar la Direccion",
			tel_usuario: "<br />Debes Ingresar el No. de Telefono",
			email_usuario: "<br />Por favor ingresa un Email Valido",
			username: "<br />Ingresa un nombre de Usuario",
			password: "<br />Ingresa tu clave personal",
			cod_prod: "<br />Ingresa C&oacute;digo",
			nombre_prod: "<br />Ingresa el Nombre del Producto",
			existencia: "<br />Cantidad en Existencia?",
			precio: "<br />Cu&aacute;l es en Precio del Producto?",
			tpago: "<br />Debes seleccionar t&uacute; m&eacute;todo de Pago",
			
		}
	});
});
</script>
<style type="text/css">

#captchaform label.error {
	margin-left: 10px;
	width: auto;
	display: inline;
	color:blue;
	text-shadow:0 0 4px #fff;
}
</style>
