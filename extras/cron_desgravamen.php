<html><meta charset="utf-8">
<?php
$servidor = 'localhost';
$basedatos = 'idepro';
//$user = 'root';
//$password = '';
$user = 'abrenetbd';
$password = 'jt@Hd@5PhzAN/xhVtq5q';

//echo mysql_errno($conexion) . ": " . mysql_error($conexion). "\n";
//CONECTAMOS A LA BASE DE DATOS
$conexion = @mysql_connect($servidor, $user, $password) or die ("Fallo en el establecimiento de la conexi&oacute;n");

//SELECCIONAMOS LA BASE DE DATOS
@mysql_select_db($basedatos, $conexion) or die("Error en la selecci&oacute;n de la base de datos:&nbsp;<br/>No existe la base de datos&nbsp;[<b>".$basedatos."</b>]&nbsp; porfavor revise el archivo config.php");
//mysql_query("SET NAMES 'utf8'");
set_time_limit(0);
$date = date("d-m-Y");
$date ="2015-01-01";
$mes_anterior = date('n', strtotime($date.'-1 month')) ; // Mes Anterior
$anio_anterior = date('Y', strtotime($date.'-1 month')) ; // Anio Anterior
//echo "Fecha  Hoy: ".$date." Mes Anterior: ".$mes_anterior." Anio anterior: ".$anio_anterior;
/*$sql="SELECT CONCAT(cli.nombre,' ',cli.paterno,' ',cli.materno, IF(cli.ap_casada!='', CONCAT(' DE ',cli.ap_casada),'')) AS cliente,
CONCAT(cli.ci,'',cli.complemento,' ',dep.codigo) AS ci,
cli.telefono_domicilio, cli.telefono_oficina, cli.telefono_celular,
'DESGRAVAMEN' as producto, concat(eca.prefijo,'-',eca.no_emision) as poliza,
eca.fecha_emision as ini_vigencia, DATE_ADD(eca.fecha_emision, INTERVAL 1 YEAR) as fin_vigencia,
cli.localidad, eca.plazo, eca.tipo_plazo
FROM s_de_em_cabecera AS eca
INNER JOIN s_de_em_detalle AS ede ON ede.id_emision = eca.id_emision
INNER JOIN s_cliente AS cli ON cli.id_cliente = ede.id_cliente
INNER JOIN s_departamento as dep ON dep.id_depto = cli.extension
WHERE eca.emitir='1' AND eca.fecha_emision <= '2016-02-29'";*/
$sql = "SELECT CONCAT(cli.nombre,' ',cli.paterno,' ',cli.materno, IF(cli.ap_casada!='', CONCAT(' DE ',cli.ap_casada),'')) AS cliente,
	CONCAT(cli.ci,'',cli.complemento,' ',dep.codigo) AS ci,
	cli.telefono_domicilio, cli.telefono_oficina, cli.telefono_celular,
	'DESGRAVAMEN' as producto, concat(eca.prefijo,'-',eca.no_emision) as poliza,
	eca.fecha_emision as ini_vigencia, DATE_ADD(eca.fecha_emision, INTERVAL 1 YEAR) as fin_vigencia,
	cli.localidad as ciudad, eca.plazo, 
	CASE eca.tipo_plazo
		WHEN 'D' THEN 'day'
		WHEN 'W' THEN 'week'
		WHEN 'M' THEN 'month'
		WHEN 'Y' THEN 'year' END as tipo_plazo
	FROM s_de_em_cabecera AS eca
	INNER JOIN s_de_em_detalle AS ede ON ede.id_emision = eca.id_emision
	INNER JOIN s_cliente AS cli ON cli.id_cliente = ede.id_cliente
	INNER JOIN s_departamento as dep ON dep.id_depto = cli.extension
	WHERE eca.emitir='1' AND eca.fecha_emision <= '2016-02-29'  AND eca.anulado='0'
	ORDER BY eca.fecha_emision";
$query=mysql_query($sql,$conexion);
if(mysql_num_rows($query)>0){
	$shtml="<table border='1' cellspacing='1' cellpadding='0' style='font-family:Arial; color: ##3E3E3E; font-size:10pt; border-collapse: collapse; border: #17A086 2px solid;' id='Exportar_a_Excel'>";
	$shtml.='<tr><td colspan="11" align="center"><b>REPORTE DE EMISIONES - IDEPRO &nbsp;'.date("d-m-Y").'</b></td></tr>';
	$shtml.='<tr style="background:#17A086; color:#FFFFFF;">
		<td rowspan="2"></td>
		<td rowspan="2">NOMBRE Y APELLIDO</td>
		<td rowspan="2" style="text-align:center;">DOCUMENTO DE<br>IDENTIDAD</td>
		<td colspan="3" style="text-align:center;">TELEFONOS</td>
		<td rowspan="2">PRODUCTO</td>
		<td rowspan="2">Nro POLIZA</td>
		<td colspan="2">FECHA DE VIGENCIA</td>
		<td rowspan="2" style="text-align:center;">CIUDAD</td>
	</tr>
	<tr style="text-align:center; background:#17A086; color:#FFFFFF;">
		<td>DOMICILIO</td>
		<td>OFICINA</td>
		<td>CELULAR</td>
		<td>INICIO</td>
		<td>FIN</td>
	</tr>';
	$i = 0; $sw = 1;
	while($row=mysql_fetch_array($query)){
		$i++;
		if ($sw==1) {
			$back_color="#D0F5EE";
			$sw=2;
		}else{
			$back_color="WHITE";
			$sw=1;
		}
		$fin_vigencia = date('d/m/Y', strtotime($row['ini_vigencia'].' +'.$row['plazo'].' '.$row['tipo_plazo'].'')) ; // Mes Anterior
		$shtml.="<tr style='background: ".$back_color.";'>
			<td style='text-align:center; font-size:6pt;'>".$i."</td>
			<td>".$row['cliente']."</td>
			<td>".$row['ci']."</td>
			<td>".$row['telefono_domicilio']."</td>
			<td>".$row['telefono_oficina']."</td>
			<td>".$row['telefono_celular']."</td>
			<td>".$row['producto']."</td>
			<td>".$row['poliza']."</td>
			<td style='text-align:center;'>".date("d/m/Y", strtotime($row['ini_vigencia']))."</td>
			<td style='text-align:center;'>".$fin_vigencia."</td>
			<td>".$row['ciudad']."</td>
		</tr>";
	}
	$shtml.="<tr><td colspan='11' style='background:#17A086; color:#FFFFFF;'><br></td></tr>
	</table>";
	$scarpeta="files";
	$sfile=$scarpeta."/Desgravamen_".$date.".xls";

	echo $shtml;
	$fp=fopen($sfile,"w");
	fwrite($fp,$shtml);
	fclose($fp);
	
	}
?>
</html>