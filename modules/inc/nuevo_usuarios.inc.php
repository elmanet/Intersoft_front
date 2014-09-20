<!-- FORMULARIO REGISTRO NUEVO CLIENTE -->

 <form action="<?php echo $editFormAction; ?>"  id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" >



<table>
<tr>
			<td >
			<h1>Llena Tus Datos</h1></td>
			
		</tr>
     
						
		<tr>

			<td>

			<input class="text_input" type="text" id="username" name="username" value="" placeholder="Login" required="" />
			<span id="status" ></span>			
			</td>

							
		</tr>	
		<tr>

			<td>

			<input class="text_input" type="password" id="password" name="password" value="" placeholder="Password" required="" /></td>

							
		</tr>
		
		<tr>

			<td>
					
			<input class="text_input" type="text" id="nombre_usuario" name="nombre_usuario" value="" placeholder="Nombre" required="" style="width:300px;" /></td>
			
		</tr>
		<tr>

			<td>
				
			<input class="text_input" type="text" id="apellido_usuario" name="apellido_usuario"  placeholder="Apellido" required=""value="" style="width:300px;"/></td>
							
		</tr>

		

		<tr>

			<td>

			<input class="text_input" type="email" id="email_usuario" name="email_usuario" placeholder="E-mail" required="" value="" style="width:300px;"/></td>

							
		</tr>	

	
		

		<tr><td>&nbsp;</td></tr>
		<tr>
	
		<td  colspan="2"><center><input type="submit" name="submit"  value="Registrarme" class="texto_grande_gris"  /></center></td>
		</tr>
 		</table>

    
      <input type="hidden" name="id_usuario" id="id_usuario" value="">
      <input type="hidden" name="id_user" id="id_user" value="">
      <input type="hidden" name="id_user_tipo" id="status" value="1">
      <input type="hidden" name="ruta" id="status" value="imagenes/">
      <input type="hidden" name="status" id="status" value="1">	
     <input type="hidden" name="MM_update" value="form2">
</form>  

<!-- FIN DE CLIENTE NUEVO INGRESO -->	