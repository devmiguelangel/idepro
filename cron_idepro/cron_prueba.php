<?php
//REPORTES INSTITUCIÓN IDEPRO
include('configuration.class.php');
require_once("envio_desgravamen.php");
require_once("envio_facultativo_ap.php");
require_once("envio_facultativo_aprobados.php");
require_once("envio_facultativo_pendientes.php");
require_once("envio_facultativo_rechazados.php");
require_once("envio_vida_grupo.php");
if(file_exists("archivos_email")){
$carpeta="archivos_email";
$date1=date("d-m-Y");
$hora=time("H:i:s");
}else{
	mkdir("archivos_email",770);
	}
$carpeta="archivos_email";
if(file_exists($carpeta."/Desgravamen_".$date1.".xls")&&
   file_exists($carpeta."/Facultativo Aprobados y Emitidos_".$date1.".xls")&&
   file_exists($carpeta."/Facultativo Aprobados y Pendiendes Emision_".$date1.".xls")&&
   file_exists($carpeta."/Facultativo Pendientes_".$date1.".xls")&&
   file_exists($carpeta."/Facultativo Rechazados_".$date1.".xls")){
	  $zip=new ZipArchive();
	  $archivo_zip1="reportes_idepro_".$date1.".zip";
	  $archivo_zip2="reporte_idepro_llamadas_".$date1.".zip";
	  if($zip->open($archivo_zip1,ZipArchive::CREATE)==true){
	$zip->addFile($carpeta."/Desgravamen_".$date1.".xls","Desgravamen_".$date1.".xls");	  
	$zip->addFile($carpeta."/Facultativo Aprobados y Emitidos_".$date1.".xls","Facultativo Aprobados y Emitidos_".$date1.".xls");
	$zip->addFile($carpeta."/Facultativo Aprobados y Pendiendes Emision_".$date1.".xls","Facultativo Aprobados y Pendiendes Emision_".$date1.".xls");
	$zip->addFile($carpeta."/Facultativo Pendientes_".$date1.".xls","Facultativo Pendientes_".$date1.".xls");
	$zip->addFile($carpeta."/Facultativo Rechazados_".$date1.".xls","Facultativo Rechazados_".$date1.".xls");
	$zip->close();
	enviaNotificacion($archivo_zip1);
		  } 
	if($zip->open($archivo_zip2,ZipArchive::CREATE)==true){
		$zip->addFile($carpeta."/Llamadas_".$date1.".xls","Llamadas_".$date1.".xls");
		$zip->close();
		enviaVidaGrupo($archivo_zip2);	
		}
	   }
function enviaNotificacion($zip_file1){
	require_once("phpmailer/class.phpmailer.php");
	require_once('phpmailer/class.smtp.php');
	$date1=date("d-m-Y");
	/*$array_email=array("caramayo@idepro.org",
						 "djauregui@sudseguros.com", 
						 "dlanza@sudseguros.com", 
						 "dloza@idepro.org", 
						 "emontano@sudseguros.com",
						 "gabrielap@idepro.org", 
						 "krivera@nacionalvida.com.bo", 
						 "mcastro@nacionalvida.com.bo", 
						 "paguilar@idepro.org", 
						 "rgonzales@idepro.org", 
						 "jvera@coboser.com");*/
	//$array_email=array("rleaplaza@coboser.com",
	  //                 "rleaplazach@gmail.com");
	//foreach($array_email as $email){
	$mail=new PHPMailer();
	$mail->IsSMTP();
    $mail->SMTPAuth=true;
$mail->Host="secure.emailsrvr.com";
$mail->Port=465;
$mail->SMTPSecure="ssl";
$mail->Username = "reportes@abrenet.com";//$regEm[1];
$mail->Password="mailr3p0rt3s";
$mail->From ="reportes@abrenet.com";//$regEm[1];
$mail->FromName = "ABRENET";
	//$mail->Username="sercobolivia@gmail.com";
	//$mail->Password = "Rlch2006";
	$mail->Subject="IDEPRO Reportes Desgravamen ".$date1;
	$mail->CharSet="UTF-8";
        $mail->IsHTML(true);
	$mail->Body="<html>
				<head>
				<meta charset=utf-8>
				<title>REPORTES DESGRAVAMEN, IDEPRO</title>
				<style>
				texto{
				font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;
				color:#377CC8;
					}
				</style>
				</head>
				<body>
				<texto>El archivo adjunto es un comprimido que contiene los archivos en formato excel, para abrirlos necesita Microsoft excel 2007 en adelante o el equivalente en su navegador.</texto><br>
				<texto>Para cualquier consulta no dude enviarla. saludos cordiales.</texto>
				<p><texto>Ing. Rodrigo Iván Lea Plaza Chávez</texto><br>
				<texto>Encargado de proyectos</texto><br>
  <a href=mailto:rleaplaza@coboser.com><texto>rleaplaza@coboser.com</a><texto> <br>
  <texto>La Paz – Bolivia</texto> <br>
  &nbsp;<texto>La Paz, Prolongación  Cordero Nº 163 - San Jorge - Telf.: (591) -2-2433500 Int (135)- Telf.: (591) -2-2971790</texto> </p>
				</body>
				</html>";
	$archivo=$zip_file1;
	/*$mail->AddAddress("caramayo@idepro.org");
	$mail->AddAddress("djauregui@sudseguros.com"); 
	$mail->AddAddress("dlanza@sudseguros.com"); 
	$mail->AddAddress("dloza@idepro.org"); 
	$mail->AddAddress("emontano@sudseguros.com");
	$mail->AddAddress("gabrielap@idepro.org"); 
	$mail->AddAddress("krivera@nacionalvida.com.bo"); 
	$mail->AddAddress("paguilar@idepro.org"); 
	//$mail->AddAddress("rgonzales@idepro.org");
	$mail->AddAddress("darriaza@coboser.com");
    $mail->AddAddress("cbonilla@coboser.com"); 
 
	$mail->AddAddress("jvera@coboser.com");*/
	$mail->AddAddress("rleaplaza@coboser.com");
	//$mail->AddAddress("rleaplazach@gmail.com");
	//$mail->AddCC("pablo_marce@hotmail.com");
	$mail->AddAttachment($archivo,$archivo);
	$mail->Send();
	//}
	}

//FUNCIÓN IDEPRO LLAMADAS
function enviaVidaGrupo($zip_file2){
	require_once("phpmailer/class.phpmailer.php");
	require_once('phpmailer/class.smtp.php');
	$date1=date("d-m-Y");
	/*$array_email=array("caramayo@idepro.org",
					   "emontano@sudseguros.com", 
					   "djauregui@sudseguros.com",
					   "gabrielap@idepro.org",
					   "krivera@nacionalvida.com.bo",
					   "mariela.alberto@uruguayasistencia.com.uy",
					   "mcastro@nacionalvida.com.bo",
					   "paguilar@idepro.org",
					   "rargandona@coboser.com",
					   "tatiana.lozano@uruguayasistencia.com",
					   "truiz@sudseguros.com",
					   "jvera@coboser.com");*/
	//$array_email=array("rleaplaza@coboser.com",
	  //                 "rleaplazach@gmail.com");
	//foreach($array_email as $email){
	$mail=new PHPMailer();
	$mail->IsSMTP();
    $mail->SMTPAuth=true;
$mail->Host="secure.emailsrvr.com";
$mail->Port=465;
$mail->SMTPSecure="ssl";
$mail->Username = "reportes@abrenet.com";//$regEm[1];
$mail->Password="mailr3p0rt3s";
$mail->From ="reportes@abrenet.com";//$regEm[1];
$mail->FromName = "ABRENET";
	//$mail->Username="sercobolivia@gmail.com";
	//$mail->Password = "Rlch2006";
	$mail->Subject="REPORTE IDEPRO Llamadas".$date1;
	$mail->CharSet="UTF-8";
        $mail->IsHTML(true);
	$mail->Body="<html>
				<head>
				<meta charset=utf-8>
				<title>REPORTES VIDA y GRUPO, IDEPRO</title>
				<style>
				texto{
				font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;
				color:#377CC8;
					}
				</style>
				</head>
				<body>
				<texto>El archivo adjunto es un comprimido que contiene los archivos en formato excel, para abrirlos necesita Microsoft excel 2007 en adelante.</texto><br>
				<texto>Para cualquier consulta no dude enviarla. saludos cordiales.</texto>
				<p><texto>Ing. Rodrigo Iván Lea Plaza Chávez</texto><br>
				<texto>Encargado de proyectos</texto><br>
  <a href=mailto:rleaplaza@coboser.com><texto>rleaplaza@coboser.com</a><texto> <br>
  <texto>La Paz – Bolivia</texto> <br>
  &nbsp;<texto>La Paz, Prolongación  Cordero Nº 163 - San Jorge - Telf.: (591) -2-2433500 Int (135)- Telf.: (591) -2-2971790</texto> </p>
				</body>
				</html>";
	$archivo=$zip_file2;
	/*$mail->AddAddress("caramayo@idepro.org");
	$mail->AddAddress("emontano@sudseguros.com"); 
	$mail->AddAddress("djauregui@sudseguros.com");
	$mail->AddAddress("dquiroz@sudseguros.com");
	$mail->AddAddress("gabrielap@idepro.org");
	$mail->AddAddress("krivera@nacionalvida.com.bo");
	$mail->AddAddress("mariela.alberto@uruguayasistencia.com.uy");
	$mail->AddAddress("mcastro@nacionalvida.com.bo");
	$mail->AddAddress("paguilar@idepro.org");
	//$mail->AddAddress("rargandona@coboser.com");
	$mail->AddAddress("tatiana.lozano@uruguayasistencia.com");
	$mail->AddAddress("jvera@coboser.com");*/
	$mail->AddAddress("rleaplaza@coboser.com");
	//$mail->AddAddress("rleaplazach@gmail.com");
	//$mail->AddCC("pablo_marce@hotmail.com");
	$mail->AddAttachment($archivo,$archivo);
	$mail->Send();
	//}
	}
?>