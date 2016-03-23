<?php  
//include('configuration.class.php');
$con= new ConfigurationSibas();
$host = $con->host;
$user = $con->user;
$password = $con->password;
$db = $con->db;

$conexion = mysql_connect($host, $user, $password) or die ("Fallo en el establecimiento de la conexi&oacute;n");
mysql_select_db($db,$conexion);
//echo $conexion;
    $date=date("Y-m-d");
	//echo $date; 
	
$selectdes="SELECT t2.nombre, 
  t2.paterno,
  t2.materno,
  t2.ci, 
  case t2.genero when 'F' then 'Femenino' when 'M' then 'Masculino' 
   end as genero, 
  t2.lugar_residencia,
  t2.localidad,
  t2.telefono_celular,
  t2.telefono_domicilio,
  t2.email,  
  t2.estatura,
  t2.peso,
  t0.fecha_emision
FROM s_de_em_cabecera t0 
inner join  s_de_em_detalle t1 on t0.id_emision = t1.id_emision 
inner join s_cliente t2 on t1.id_cliente = t2.id_cliente 
inner join s_usuario t3 on t0.id_usuario = t3.id_usuario 
left outer join s_departamento t4 on t4.id_depto = t3.id_depto 
left outer join s_agencia t5 on t5.id_agencia = t3.id_agencia
WHERE t0.emitir =1 and t0.anulado = 0 and t0.facultativo = 0
and t0.fecha_emision between '2016-01-01' and '2016-01-31'
						ORDER BY
							t0.no_emision ASC"; 				
//echo $selectdes;
			$consultades=mysql_query($selectdes,$conexion);
			//echo $consultades;
					 $date1=date("d-m-Y");
  //Creación de la tabla con formato HTML
$shtml="<table border='0' cellspacing='1' cellpadding='0' style='width:150%; font-size:9pt;'>";
			$shtml.='<tr><td colspan="23" align="center"> REPORTE DE CLIENTES IDEPRO-DESGRAVAMEN-ENERO FECHA &nbsp;'.$date1.'</td></tr>';
			
			$shtml.='<tr style="background:#D3DCE3;">
					  <td align="center"><b>NOMBRES</b></td>
					  <td align="center"><b>APELLIDO PATERNO</b></td>
					  <td align="center"><b>APELLIDO MATERNO</b></td>
					  <td align="center"><b>C.I.</b></td>
					  <td align="center"><b>SEXO</b></td>
					  <td align="center"><b>CIUDAD</b></td>
					  <td align="center"><b>LOCALIDAD</b></td>
					  <td align="center"><b>CELULAR</b></td>
					  <td align="center"><b>TELEFONO</b></td>
					  <td align="center"><b>EMAIL</b></td>
					  <td align="center"><b>ESTATURA (cm)</b></td>
					  <td align="center"><b>PESO (kg)</b></td>
					  <td align="center"><b>FECHA DE EMISION</b></td>
					 </tr>';
				while($resutadodes=mysql_fetch_array($consultades)){
			
						 $shtml.='<td align="center">'.$resutadodes['nombre'].'</td>
							  <td align="center">'.$resutadodes['paterno'].'</td>
							  <td align="center">'.$resutadodes['materno'].'</td>
							  <td align="center">'.$resutadodes['ci'].'</td>
							  <td align="center">'.$resutadodes['genero'].'</td>
							  <td align="center">'.$resutadodes['lugar_residencia'].'</td>
							  <td align="center">'.$resutadodes['localidad'].'</td>
							  <td align="center">'.$resutadodes['telefono_celular'].'</td>
							  <td align="center">'.$resutadodes['telefono_domicilio'].'</td>
							  <td align="center">'.$resutadodes['email'].'</td>
							  <td align="center">'.$resutadodes['estatura'].'</td>
							  <td align="center">'.$resutadodes['peso'].'</td>
							  <td align="center">'.$resutadodes['fecha_emision'].'</td>
						</tr>';
				}		
			$shtml.="</table>";
			
$scarpeta="archivos_email"; //carpeta donde guardar el archivo.
//debe tener permisos 775 por lo menos
$sfile=$scarpeta."/Desgravamen_".$date1.".xls"; //ruta del archivo a generar
$fp=fopen($sfile,"w");
fwrite($fp,$shtml);//procedemos a escribir el archivo con los datos de $shtml
fclose($fp);
//echo "<a href='".$sfile."' target='_blank'>Haz click aqui</a>";
//Se muestra un hipervínculo para poder descargar la tabla en formato excel
?>