<?phprequire_once('modules/inc/config.inc.php');// *** Validate request to login to this site.if (!isset($_SESSION)) {  session_start();   $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");}$loginFormAction = $_SERVER['PHP_SELF'];if (isset($_GET['accesscheck'])) {  $_SESSION['PrevUrl'] = $_GET['accesscheck'];}if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {if (isset($_POST['username'])) {     $loginUsername=$_POST['username'];  $password=md5($_POST['password']);  $MM_fldUserAuthorization = "";  $MM_redirectLoginSuccess = "index.php";  $MM_redirectLoginFailed = "index.php";  $MM_redirecttoReferrer = false;  mysql_select_db($database_sistemai, $sistemai);    $LoginRS__query=sprintf("SELECT username, password FROM sis_users_cuenta WHERE username=%s AND password=%s",    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));      $LoginRS = mysql_query($LoginRS__query, $sistemai) or die(mysql_error());  $loginFoundUser = mysql_num_rows($LoginRS);  if ($loginFoundUser) {     $loginStrGroup = "";   
    //declare two session variables and assign them    $_SESSION['MM_Username'] = $loginUsername;    $_SESSION['MM_UserGroup'] = $loginStrGroup;          
   if (isset($_SESSION['PrevUrl']) && false) {      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];        }    header("Location: " . $MM_redirectLoginSuccess );  }  else {    header("Location: ". $MM_redirectLoginFailed );  }}} // FIN DE LA CONDICION
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {// SQL PARA REGISTRO DE DATOS
$login = $_POST['username'];mysql_select_db($database_sistemai, $sistemai);$query_verifica = "SELECT username FROM sis_users_cuenta WHERE username='$login'";$verifica = mysql_query($query_verifica, $sistemai) or die(mysql_error());$row_verifica = mysql_fetch_assoc($verifica);$totalRows_verifica = mysql_num_rows($verifica);if($totalRows_verifica>0) {	echo "<div class='errorbd' style='position: fixed;left: 40%;top: 0px;border-bottom: 1px solid #D7DF01;border-left: 1px solid #D7DF01;padding: 5px;background: #F5F6CE;height: 30px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border-right: 1px solid #D7DF01;'><center><p class='t24'>Error usuario YA Existe!</p></center></div>";	}else {
// SQL PARA REGISTRO DE DATOS$editFormAction = $_SERVER['PHP_SELF'];if (isset($_SERVER['QUERY_STRING'])) {  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}
$pass=md5($_POST['password']);
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) { $insertSQL = sprintf("INSERT INTO sis_users (id_usuario, nombre_usuario, apellido_usuario, email_usuario, id_user_tipo, ruta, status) VALUES ( %s, %s, %s, %s, %s, %s, %s)", 							  GetSQLValueString($_POST['id_usuario'], "int"),						  	  GetSQLValueString($_POST['nombre_usuario'], "text"),                       GetSQLValueString($_POST['apellido_usuario'], "text"),							  GetSQLValueString($_POST['email_usuario'], "text"),                       GetSQLValueString($_POST['id_user_tipo'], "text"),                       GetSQLValueString($_POST['ruta'], "text"),                       GetSQLValueString($_POST['status'], "int"));                         mysql_select_db($database_sistemai, $sistemai);  $Result1 = mysql_query($insertSQL, $sistemai) or die(mysql_error());
  header(sprintf("Location: %s", $insertGoTo));

//ENVIO DE EMAILif($_POST['email_usuario']==!NULL){ $dia=date("m.d.Y"); $hora=date("H:i:s"); $titulo_site=$row_config['title_site'];  $nombre = $_POST['nombre_usuario']; $apellido = $_POST['apellido_usuario']; $login=$_POST['username']; $clave=$_POST['password'];  $email = $_POST['email_usuario'];    $asunto = 'Bienvenido(a)'; $subject= $asunto;$message = "<html><head><title>Bienvenido(a)</title></head><body>  <p>Hola <b>$nombre</b> Gracias por registrarte en nuestra pagina</p><p>Aqui te dejamos detalle de tu cuenta:<br /> <b>Nombre y Apellido:</b> $nombre $apellido<br /> <b>Login:</b> $login<br /> <b>Clave:</b> $clave<br /> <b>Email:</b> $email<br /><br /><br />      Atentamente;<br /><br />  <em>Atenci&oacute;n al Cliente</em><br />  <b>$titulo_site</b>
</body></html>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
$headers .= 'From: Registro Exitoso<contactos@accesoriosescar.com>' . "\r\n"; mail($email, $subject, $message, $headers);}  //FIN DEL ENVIO DEL CORREO  }
// GRABADO EN LA TABLA DE CUENTAmysql_select_db($database_sistemai, $sistemai);$query_usuario = "SELECT * FROM sis_users ORDER BY id_usuario DESC";$usuario = mysql_query($query_usuario, $sistemai) or die(mysql_error());$row_usuario = mysql_fetch_assoc($usuario);$totalRows_usuario = mysql_num_rows($usuario);$value= $row_usuario['id_usuario'];$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) { $insertSQL = sprintf("INSERT INTO sis_users_cuenta (id_user, username, password, id_usuario) VALUES ( %s, %s, %s, %s)", 							  GetSQLValueString($_POST['id_user'], "int"),
							  GetSQLValueString($_POST['username'], "text"),
							  GetSQLValueString($pass, "text"),
						  	  GetSQLValueString($value, "int"));
                       
  mysql_select_db($database_sistemai, $sistemai);
  $Result2 = mysql_query($insertSQL, $sistemai) or die(mysql_error());

  $insertGoTo = "registro.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

}


} // FIN DE LA CONDICION
?>