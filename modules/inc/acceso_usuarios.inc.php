<!-- ACCESO DE USUARIOS -->
<?php if($_SESSION['MM_Username']==NULL) {?>
<form ACTION="<?php echo $loginFormAction; ?>" id="captchaform" method="POST" enctype="multipart/form-data" target="_self" class="cmxform" id="captchaform" >

			<div style="margin-top:70px;">

				<input type="text" placeholder="Login" required="" id="username"  name="username" style="background: url('images/site/login.png');border: 0px;height: 49px;width: 221px;padding-left: 51px;padding-right: 20px;margin-left: 43px;" />
			</div>
				
			<div>

				<input type="password" placeholder="Password" required="" id="password" name="password" style="background: url('images/site/clave.png');border: 0px;height: 49px;width: 221px;padding-left: 51px;padding-right: 20px;margin-left: 43px;" />
			</div>
					
			<div >
			  <input type="hidden" name="MM_update" value="form1" >
				<input type="submit" value="" style="background: url('images/site/btn_acceso.png');border: 0px;height: 50px;width: 125px;margin-left: 42px;"/><br>
				<a href="#" style="margin-left:42px;">Olvidaste tu Password?</a>

			</div>
		</form>
		<?php }else {?>
<div style="margin-top: 70px;margin-left:15px;margin-right:15px;text-shadow: 0 1px 8px;">
Bienvenido(a):  <?php echo $row_usua['nombre_usuario'];?><br>
<?php if($row_usua['cod']>=4) { ?>
<img src="mgpanel/images/iconspng/1371153504_settings.png" width="18" height="18" alt="" style="vertical-align:middle"/>  
				<a href="mgpanel" target="_blank">Acceder a MGPanel </a><br>
<?php } ?>
<img src="mgpanel/images/iconspng/1371153448_search.png" width="18" height="18" alt="" style="vertical-align:middle"/> 	<a href="index.php?mg=mi-cuenta" > Mi Cuenta </a>
<br><br>
<img src="mgpanel/images/iconspng/1371153491_sign-out.png" width="18" height="18" alt="" style="vertical-align:middle"/>  <a href="<?php echo $logoutAction ?>"> Cerrar Sesi&oacute;n</a>
<br>


</div>
<?php }?>