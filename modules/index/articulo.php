<?php require_once('../../Connections/sistemai.php'); 

// VALIDACION DE VERSION DE PHP
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

require_once('../inc/conexion_sinsesion_modules.inc.php');
mysql_select_db($database_sistemai, $sistemai);
$query_config = "SELECT * FROM sis_config";
$config = mysql_query($query_config, $sistemai) or die(mysql_error());
$row_config = mysql_fetch_assoc($config);
$totalRows_config = mysql_num_rows($config);
$id_articulo=$_GET['id_articulo'];
mysql_select_db($database_sistemai, $sistemai);
$query_menu1 = "SELECT *  FROM sis_plantilla_articulos WHERE id_articulo=$id_articulo AND status=1";
$menu1 = mysql_query($query_menu1, $sistemai) or die(mysql_error());
$row_menu1 = mysql_fetch_assoc($menu1);
$totalRows_menu1 = mysql_num_rows($menu1);
	
echo $row_menu1['contenido'];
?>
