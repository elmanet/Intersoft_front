<?php /* VERIFICANDO SI LA VERSION DE INTERNET EXPLORER ES LA CORRECTA */ $ie7="Iexplorer7";$internet_value="verificado"; /* FIN DE VERIFICADO SI LA VERSION DE INTERNET EXPLORER ES LA CORRECTA */ $fp = curl_init("www.miguayaba.com/VersionInternetExplorer/001.png");$ret = curl_setopt($fp, CURLOPT_RETURNTRANSFER, 1);$ret = curl_setopt($fp, CURLOPT_TIMEOUT, 30);$ret = curl_exec($fp);$info = curl_getinfo($fp, CURLINFO_HTTP_CODE);curl_close($fp);if($info == 404){$var="no";} else {$var="ie";}
// El navegador Internet Explorer no soporta los est&aacute;ndares de la W3C,<br> 
// Por Favor Actualiza tu Navegador se le recomienda que utilice la &uacute;ltima 
// versi&oacute;n de Firefox o Google Chrome... 
// <a href='http://www.google.com/chromeframe/?redirect=true'>Activar Google Chrome
?>
