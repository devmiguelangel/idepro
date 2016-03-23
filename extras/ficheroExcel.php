<?php
header("Content-Type: text/html; charset=ISO-8859-1");
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=".trim($_POST['filename'])."");
header("Pragma: no-cache");
header("Expires: 0");
/*header("Content-Disposition: attachment; filename=".trim($_POST['filename']).""); 
header("Content-Type: application/vnd.ms-excel");*/

echo $_POST['datos_a_enviar'];
?>