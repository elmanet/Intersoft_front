<?php
    //declare two session variables and assign them
   if (isset($_SESSION['PrevUrl']) && false) {
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
$login = $_POST['username'];
// SQL PARA REGISTRO DE DATOS
$pass=md5($_POST['password']);
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  header(sprintf("Location: %s", $insertGoTo));

//ENVIO DE EMAIL
</body>
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= 'From: Registro Exitoso<contactos@accesoriosescar.com>' . "\r\n";
// GRABADO EN LA TABLA DE CUENTA
if (isset($_SERVER['QUERY_STRING'])) {
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
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