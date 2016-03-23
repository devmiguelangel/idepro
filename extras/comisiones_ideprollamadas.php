<?php
//header("Content-Type: text/html;charset=utf-8");

$servidor = 'localhost';
$basedatos = 'idepro';
/*$user = 'root';
$password = '';*/
$user = 'abrenetbd';
$password = 'jt@Hd@5PhzAN/xhVtq5q';

//echo mysql_errno($conexion) . ": " . mysql_error($conexion). "\n";
//CONECTAMOS A LA BASE DE DATOS
$conexion = @mysql_connect($servidor, $user, $password) or die ("Fallo en el establecimiento de la conexi&oacute;n");

//SELECCIONAMOS LA BASE DE DATOS
@mysql_select_db($basedatos, $conexion) or die("Error en la selecci&oacute;n de la base de datos:&nbsp;<br/>No existe la base de datos&nbsp;[<b>".$basedatos."</b>]&nbsp; porfavor revise el archivo config.php");
//mysql_query("SET NAMES 'utf8'");

set_time_limit(0);
$imagen_link ="boton-excel-mini.png";
/*$filename = "Comisiones Mensuales.xls"; 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Type: application/vnd.ms-excel");
header("Pragma: no-cache");
header("Expires: 0");*/
?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<?php
if (isset($_GET['tipo'])) {
	$tipo = $_GET['tipo'];
	switch ($tipo) {
		case 'diario': //========================// REPORTE DIARIO //========================//
			if (isset($_GET['fecha_ini']) && isset($_GET['fecha_fin'])) {
				$fecha_ini = $_GET['fecha_ini'];
				$fecha_fin = $_GET['fecha_fin'];
				$filename = 'Comisiones_IDEPROLLAMADAS_Diarias_'.$fecha_ini.'_'.$fecha_fin.'.xls'; 
			  	//header("Content-Disposition: attachment; filename=\"$filename\""); 
				//header("Content-Type: application/vnd.ms-excel");
				?>
				<style>
					#caja_arriba {
						background-color: #17A086;
						color: #ffffff;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						/*border-top-right-radius: 24px;
	    				border-top-left-radius: 24px;*/
						/*para Firefox*/
						-moz-border-radius: 24px 24px 0 0;
						/*para Safari y Chrome*/
						-webkit-border-radius: 24px 24px 0 0;
						/* para Opera */
						border-radius: 24px 24px 0 0;
						/* para IE */
						behavior:url(border.htc);
					}
					#caja_abajo {
						background-color: #068A72;
						color: #ffffff;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						font-size: 9pt;
						text-align: center;
						/*para Firefox*/
						-moz-border-radius: 0 0 24px 24px;
						/*para Safari y Chrome*/
						-webkit-border-radius: 0 0 24px 24px;
						/* para Opera */
						border-radius: 0 0 24px 24px;
						/* para IE */
						behavior:url(border.htc);
					}
				</style>
				<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
					<!--<a href="#"><img src="../images/<?=$imagen_link?>" class="botonExcel" /></a>-->
					<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					<input type="hidden" id="filename" name="filename" value="<?=$filename?>" />
					<div id="caja_arriba">
						<a href="#" style="vertical-align:middle;"><img src="../images/<?=$imagen_link?>" class="botonExcel" style="vertical-align:middle;"/></a>
						<b style="text-align:center;">Comisiones Ideprollamadas</b>
					</div>
					<div id="caja_abajo" > Reporte Diario</div>
				</form>
				<table style="font-family:Arial; font-size:10pt; border-collapse: collapse; border: #17A086 2px solid;" border="1" id="Exportar_a_Excel">
					<tr style="background: #17A086; color:white; text-align:center;">
						<th></th>
						<th>SUCURSAL</th>
						<th>AGENCIA</th>
						<th>NOMBRE VENDEDOR</th>
						<th>NRO CERTIFICADO</th>
						<th>NOMBRE ASEGURADO</th>
						<th>CI ASEGURADO</th>
						<th>TIPO<br><div style="font-size:8pt;">DD Deudor <br> CC Codeudor</div></th>
						<th>SEXO</th>
						<th>FORMA DE PAGO</th>
						<th>FECHA EMISION</th>
						<th>ANULADO</th>
						<th>FECHA ANULACION</th>
					</tr>
					<?php
					$query="SELECT UPPER(dep.departamento) AS departamento, UPPER(ag.agencia) AS agencia, UPPER(us.nombre) AS nombre,
					CONCAT(eca.prefijo,'-',eca.no_emision) AS certificado,
					CASE eca.tipo_plazo WHEN 'Y' THEN 'ANUAL' WHEN 'M' THEN 'MENSUAL' END AS forma_pago,
					eca.fecha_emision, eca.id_emision, CASE eca.anulado WHEN '0' THEN 'NO' WHEN '1' THEN 'SI' END as anulado, IF (eca.anulado='1', eca.fecha_anulado ,'') as fecha_anulado
					FROM s_de_em_cabecera AS eca
					INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
					INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
					INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
					INNER JOIN s_agencia AS ag ON ag.id_agencia = us.id_agencia
					WHERE eca.fecha_emision BETWEEN '".$fecha_ini."' AND '".$fecha_fin."' AND cca.vg='1' 
					AND eca.emitir='1' AND eca.aprobado='1' AND eca.rechazado='0' 
					ORDER BY eca.fecha_emision, dep.departamento, ag.agencia, us.nombre, eca.id_emision;";
		  			$res = mysql_query($query,$conexion);
		  			$i = $sw = 1;
		  			while($datos=mysql_fetch_array($res)){
						if ($sw==1) {
							$back_color="#D0F5EE";
							$sw=2;
						}else{
							$back_color="WHITE";
							$sw=1;
						}
		  				echo'
		  				<tr style="vertical-align:middle; background: '.$back_color.'">
		  					<td style="font-size:6pt;">'.$i.'</td>
		  					<td>'.utf8_decode($datos['departamento']).'</td>
		  					<td>'.utf8_decode($datos['agencia']).'</td>
		  					<td>'.utf8_decode($datos['nombre']).'</td>
		  					<td>'.$datos['certificado'].'</td>
		  					<td colspan="4">
		  						<table>';
		  					$sub_sql="SELECT CONCAT(cli.paterno,' ',cli.materno,' ',cli.nombre) AS cliente, ede.titular,
							CONCAT(cli.ci,'',cli.complemento,' ',(SELECT dep.codigo 
								FROM s_departamento as dep WHERE dep.id_depto=cli.extension)) AS ci, 
							CASE cli.genero WHEN 'M' THEN 'MASCULINO' WHEN 'F' THEN 'FEMENINO' END AS sexo
							FROM s_de_em_detalle AS ede 
							INNER JOIN s_cliente as cli ON cli.id_cliente = ede.id_cliente
							WHERE ede.id_emision='".$datos['id_emision']."';";
							//echo $sub_sql;
							$rs = mysql_query($sub_sql,$conexion);  
							while($sub_datos=mysql_fetch_array($rs)){
								echo '<tr>
								<td>'.utf8_decode($sub_datos['cliente']).'</td>
			  					<td>'.$sub_datos['ci'].'</td>
			  					<td align="center">'.$sub_datos['titular'].'</td>
			  					<td>'.$sub_datos['sexo'].'</td>
			  					</tr>';
							}
		  					echo'</table>
		  					</td>
		  					<td align="center">'.$datos['forma_pago'].'</td>
		  					<td>'.date("d/m/Y", strtotime($datos['fecha_emision'])).'</td>
							<td align="center">'.$datos['anulado'].'</td>
		  					<td>';
		  						if ($datos['anulado']=='SI') {
		  							echo ''.date("d/m/Y", strtotime($datos['fecha_anulado']));
		  						}
		  					echo'</td>
		  				</tr>';
		  				$i++;
		  			}
					?>
				</table>
				
				<script language="javascript">
				$(document).ready(function() {
					$(".botonExcel").click(function(event) {
						$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
						$("#FormularioExportacion").submit();
				});
				});
				</script>
				<?php
			}
			break;
		case 'mensual'://========================// REPORTE MENSUAL //========================//
			if (isset($_GET['mes']) && isset($_GET['anio'])) {
				$mes  = $_GET['mes'];
				$anio = $_GET['anio'];
				//Resolvemos en que mes de la campaña estamos
				$opera     =round(($mes/3),2);
				$decimales = explode(".",$opera);
				if (@$decimales[1]==33) {
					$mes1 = $mes;
					$mes2 = $mes+1;
					$mes3 = $mes+2;
				}elseif (@$decimales[1]==67) {
					$mes2 = $mes;
					$mes3 = $mes+1;
					$mes1 = $mes-1;
				}else{
					$mes3 = $mes;
					$mes2 = $mes-1;
					$mes1 = $mes-2;
				}
				$campana = ceil($mes/3);
				if ($campana==1) {
					$anio_anterior    = $anio-1;
					$campana_anterior = 4;
				}else{
					$campana_anterior = $campana-1;
					$anio_anterior    = $anio;
				}
				//Meses Limites para Campaña anterior
				$ca_fin = $campana_anterior*3;
				$ca_ini = $ca_fin-2;
				//------ Datos para Calculo de ventas y persistencias semestrales -------//
				$campana_anterior_semestre = 0;
				$anio_anterior_semestre    = $anio;
				if (($campana/2)>1) {
					$campana_anterior_semestre = $campana - 2;
				}else{
					$campana_anterior_semestre = $campana + 2;
					$anio_anterior_semestre    = $anio -1;
				}
				$mes3_ant_sem = $campana_anterior_semestre * 3;
				$mes1_ant_sem = $mes3_ant_sem - 2;
				//----------------------------------------------------------------------//
				$cabecera='<div style="color:#8e44ad;" >CAMPA&Ntilde;A: '.$campana.'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mes Actual: '.meses($mes).'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A&ntilde;o Actual: '.$anio.'<br>
				Mes 1 = '.meses($mes1).'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mes 2 = '.meses($mes2).'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mes 3 = '.meses($mes3).'</div>';

				$filename = "Comisiones_IDEPROLLAMADAS_Mensuales_".$mes."_de_".$anio.".xls"; 
			  	
				
				?>
				<style>
					#caja_arriba {
						background-color: #9b59b6;
						color: #FFF;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						/*border-top-right-radius: 24px;
	    				border-top-left-radius: 24px;*/
						/*para Firefox*/
						-moz-border-radius: 24px 24px 0 0;
						/*para Safari y Chrome*/
						-webkit-border-radius: 24px 24px 0 0;
						/* para Opera */
						border-radius: 24px 24px 0 0;
						/* para IE */
						behavior:url(border.htc);
					}
					#caja_abajo {
						background-color: #8e44ad;
						color: #ecf0f1;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						font-size: 9pt;
						text-align: center;
						/*para Firefox*/
						-moz-border-radius: 0 0 24px 24px;
						/*para Safari y Chrome*/
						-webkit-border-radius: 0 0 24px 24px;
						/* para Opera */
						border-radius: 0 0 24px 24px;
						/* para IE */
						behavior:url(border.htc);
					}
				</style>
				<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
				
				<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
				<input type="hidden" id="filename" name="filename" value="<?=$filename?>" />
					<div id="caja_arriba">
						<a href="#" style="vertical-align:middle;"><img src="../images/<?=$imagen_link?>" class="botonExcel" style="vertical-align:middle;"/></a>
						<b style="text-align:center;">Comisiones Ideprollamadas</b>
					</div>
					<div id="caja_abajo" > Reporte Mensual</div>
				</form>
				<br>
				<table style="font-family:Arial; font-size:10pt; border-collapse: collapse; border: #8e44ad 2px solid;" border="1" id="Exportar_a_Excel">
					<tr>
						<td colspan="15">
							<?=$cabecera?>
						</td>
					</tr>
					<tr style="background: #9b59b6; color:white; text-align:center;">
						<th rowspan="2"></th>
						<th rowspan="2">SUCURSAL</th>
						<th rowspan="2">AGENCIA</th>
						<th rowspan="2">NOMBRE VENDEDOR</th>
						<th rowspan="2">N&deg; SEGUROS VENDIDOS <div style="font-size:7pt">(Campa&ntilde;a Anterior)</div></th>
						<th rowspan="2">META MES</th>
						<th rowspan="2">VENTAS MES 1 <br>(<?=meses($mes1)?>)</th>
						<th rowspan="2">VENTAS MES 2 <br>(<?=meses($mes2)?>)</th>
						<th rowspan="2">VENTAS MES 3 <br>(<?=meses($mes3)?>)</th>
						<th rowspan="2">CUMPLIMIENTO MES ACTUAL (%) <br>(<?=meses($mes)?>)</th>
						<th rowspan="2">META CAMPA&Ntilde;A</th>
						<th colspan="2">TIPO DE VENTAS</th>
						<th rowspan="2">TOTAL VENTAS ACUMULADAS CAMPA&Ntilde;A</th>
						<th rowspan="2">CUMPLIMIENTO CAMPA&Ntilde;A (%)</th>
					</tr>
					<tr style="background: #9b59b6; color:white; text-align:center;">
						<td><b>MENSUALES</b></td>
						<td><b>ANUALES</b></td>
					</tr>
					<!--<tr style="display:none;">
		  					<td id="TeLMo ChIRi_meta" rowSpan="100">telmix</td>
		  				</tr>-->
					<?php
					$query="SELECT eca.id_emision, us.id_usuario, eca.id_usuario,
						us.id_depto, dep.departamento, us.id_agencia, ag.agencia,
						us.nombre, 
						-- count(ede.id_emision) as ventas,
						-- count(eca.id_emision) as ventas,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							WHERE MONTH(ec.fecha_emision)='".$mes1."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '".$mes1."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.id_usuario=us.id_usuario) as ventas1,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							WHERE MONTH(ec.fecha_emision)='".$mes2."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '".$mes2."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas2,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							WHERE MONTH(ec.fecha_emision)='".$mes3."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '".$mes3."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas3,
						IF(".$anio_anterior.">=2016,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision) BETWEEN '".$ca_ini."' AND '".$ca_fin."' AND YEAR(ec.fecha_emision)='".$anio_anterior."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) NOT BETWEEN '".$ca_ini."' AND '".$ca_fin."' AND YEAR(ec.fecha_anulado!='".$anio_anterior."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) ,
							'0') as anterior_campana,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision) BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) NOT BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario AND ec.tipo_plazo='M') as mensuales,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							WHERE MONTH(ec.fecha_emision) BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) NOT BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario AND ec.tipo_plazo='Y') as anuales
						FROM s_de_em_cabecera AS eca
						-- INNER JOIN s_de_em_detalle AS ede ON ede.id_emision = eca.id_emision
						INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
						INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
						INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
						INNER JOIN s_agencia AS ag ON ag.id_agencia = us.id_agencia
						WHERE MONTH(eca.fecha_emision) BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(eca.fecha_emision)='".$anio."' AND cca.vg='1' 
						AND (eca.anulado='0' OR (MONTH(eca.fecha_anulado) NOT BETWEEN '".$mes1."' and '".$mes3."' AND YEAR(eca.fecha_anulado!='".$anio."'))) 
						AND eca.emitir='1' AND eca.aprobado='1' AND eca.rechazado='0' 
						GROUP BY eca.id_usuario
						ORDER BY dep.departamento, ag.agencia;";
					//echo "".$query;
					$res         = mysql_query($query,$conexion);
					$i           = 1;
					$cli         = "TeLMo ChIRi";
					$cum_mes_ant = 0;
					$cum_cam_ant = 0;
					$id_m        ='';
		  			while($datos=mysql_fetch_array($res)){
						$meta=5;
		  				$cumplimiento_mes=0;
	  					switch ($mes) {
	  						case $mes1:
	  							@$cumplimiento_mes=($datos['ventas1']*100)/$meta;
	  							break;
	  						case $mes2:
	  							@$cumplimiento_mes=($datos['ventas2']*100)/$meta;
	  							break;
	  						case $mes3:
	  							@$cumplimiento_mes=($datos['ventas3']*100)/$meta;
	  							break;
	  					}
	  					@$cumplimiento_mes= round($cumplimiento_mes,2);
	  					$ventas_acumuladas= $datos['ventas1']+$datos['ventas2']+$datos['ventas3'];
	  					@$cumplimiento_campana= round(($ventas_acumuladas*100)/($meta*3),2);

	  					if ($cli != $datos['nombre']) {
							if (@$sw==1) {
								$sw=2;
							}else{
								$sw=1;
							}
						}
						if ($sw==1) {
							$back_color="#C6A0D5";
						}else{
							$back_color="WHITE";
						}
		  				echo'
		  				<tr style="vertical-align:middle; background: '.$back_color.'">
		  					<td style="font-size:6pt;">'.$i.'</td>';
		  					if ($cli != $datos['nombre']) {
			  					echo'
			  					<td id="'.$datos['nombre'].'_departamento">'.strtoupper($datos['departamento']).'</td>
			  					<td id="'.$datos['nombre'].'_agencia">'.strtoupper($datos['agencia']).'</td>';
			  				}else{
			  					echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_departamento").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_agencia").rowSpan=2; 
								</script> ';
			  				}
	  						if ($cli != $datos['nombre']) {	
	  							echo'<td id="'.$datos['nombre'].'_nombre">'.strtoupper($datos['nombre']).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_nombre").rowSpan=2;  
								</script> ';
		  					}
		  					
		  					echo'
		  					<td style="text-align:center;">'.$datos['anterior_campana'].'</td>';
		  					//-------- AGRUPACION o NO META MES -----------//
		  					if ($cli != $datos['nombre']) {
		  						$id_m=$datos['nombre'].'_meta';
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$id_m.'" >'.$meta.'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_meta").rowSpan=2; 
								</script> ';
		  					}
		  					//echo'<td style="text-align:center;">'.$meta.'</td>';
		  					echo'<td align="center" ';if($mes==$mes1) echo'style="background:#A563C1;" '; echo'>'.$datos['ventas1'].'</td>
		  					<td align="center" ';if($mes==$mes2) echo'style="background:#A563C1;" '; echo'>'.$datos['ventas2'].'</td>
		  					<td align="center" ';if($mes==$mes3) echo'style="background:#A563C1;" '; echo'>'.$datos['ventas3'].'</td>';
		  					//----- AGRUPACION O NO CUMPLIMIENTO MES ACTUAL -----//
		  					//if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_cum_mes" >'.$cumplimiento_mes.' %</td>';
		  						$cum_mes_ant = $cumplimiento_mes;
		  					/*}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_cum_mes").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_cum_mes").innerHTML ="'.($cum_mes_ant+$cumplimiento_mes).' %"; 
								</script> ';
		  					}*/
		  					//----- AGRUPACION O NO META CAMPAÑA -----//
		  					if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_met_cam" >'.($meta*3).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_met_cam").rowSpan=2; 
								</script> ';
		  					}
		  					echo'<td style="text-align:center;">'.$datos['mensuales'].'</td>
		  					<td style="text-align:center;">'.$datos['anuales'].'</td>
		  					<td style="text-align:center;" >'.$ventas_acumuladas.'</td>';
		  					//----- AGRUPACION O NO CUMPLIMIENTO CAMPAÑA -----//
		  					if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_cum_cam" >'.$cumplimiento_campana.' %</td>';
		  						$cum_cam_ant = $cumplimiento_campana;
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_cum_cam").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_cum_cam").innerHTML ="'.($cum_cam_ant+$cumplimiento_campana).' %"; 
								</script> ';
		  					}
		  					/**$comision=0;
		  					if ($ventas_acumuladas >=50 ) {
		  						$comision=1250;
		  					}elseif ($ventas_acumuladas >=30) {
		  						$comision=750;
		  					}elseif ($ventas_acumuladas >=15) {
		  						$comision=375;
		  					}
		  					echo'<td style="text-align:center; vertical-align:middle;"  >'.$comision.'</td>';**/
		  					
		  				$cli = $datos['nombre'];
		  				$i++;
		  			}
					?>
					
				</table>
		
				<br>
				
				<script language="javascript">
				$(document).ready(function() {
					$(".botonExcel").click(function(event) {
						$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
						$("#FormularioExportacion").submit();
				});
				});
				</script>
				<?php
			}
			break;
		
		case 'campana'://========================// REPORTE CAMPAÑA //========================//
			if (isset($_GET['campana']) && isset($_GET['anio'])) {
				$campana    = $_GET['campana'];
				$anio       = $_GET['anio'];
				$mes3       = $campana*3;
				$mes2       = $mes3 - 1;
				$mes1       = $mes2 - 1;
				$mes_actual = date("n");
				//echo $tipo." => ".$campana." >> ".$anio." M1: ".$mes1." M2: ".$mes2." M3: ".$mes3;
				
				if ($campana==1) {
					$anio_anterior    = $anio-1;
					$campana_anterior = 4;
				}else{
					$campana_anterior = $campana-1;
					$anio_anterior    = $anio;
				}
				//Meses Limites para Campaña anterior
				$ca_fin = $campana_anterior*3;
				$ca_ini = $ca_fin-2;
				//------ Datos para Calculo de VENTAS y PERSISTENCIAS semestrales -------//
				$campana_anterior_semestre = 0;
				$anio_anterior_semestre    = $anio;
				if (($campana/2)>1) {
					$campana_anterior_semestre = $campana - 2;
				}else{
					$campana_anterior_semestre = $campana + 2;
					$anio_anterior_semestre    = $anio -1;
				}
				$mes3_ant_sem = $campana_anterior_semestre * 3;
				$mes1_ant_sem = $mes3_ant_sem - 2;
				//Variables para el calculo de comisiones
				$comision_mensual = $comision_anual = $com_per_sem = $com_per_anu = $com_total = 0;
				//----- Adicionamos a los TOTALES ------//
				$comision_mensual_total = $comision_anual_total = $com_per_sem_total = $com_per_anu_total = $com_total_total = 0;
				$cabecera = '<div style="color:#216095;" >CAMPAÑA: '.$campana.'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Año Actual: '.$anio.' 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mes Actual: '.meses($mes_actual).' <br>
				Mes 1 = '.meses($mes1).'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mes 2 = '.meses($mes2).'
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mes 3 = '.meses($mes3).'</div>';
				$filename = "Comisiones_IDEPROLLAMADAS_Campaña_".$campana."_de_".$anio.".xls"; 
			  	//header("Content-Disposition: attachment; filename=\"$filename\""); 
				//header("Content-Type: application/vnd.ms-excel");
				?> 
				<head>
					<!--<meta http-equiv="Content-type" content="text/html; charset=utf-8" />-->
					<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
				</head>
				<style>
					#caja_arriba {
						background-color: #34495e;
						color: #ecf0f1;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						/*border-top-right-radius: 24px;
	    				border-top-left-radius: 24px;*/
						/*para Firefox*/
						-moz-border-radius: 24px 24px 0 0;
						/*para Safari y Chrome*/
						-webkit-border-radius: 24px 24px 0 0;
						/* para Opera */
						border-radius: 24px 24px 0 0;
						/* para IE */
						behavior:url(border.htc);
					}
					#caja_abajo {
						background-color: #2c3e50;
						color: #7f8c8d;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						font-size: 9pt;
						text-align: center;
						/*para Firefox*/
						-moz-border-radius: 0 0 24px 24px;
						/*para Safari y Chrome*/
						-webkit-border-radius: 0 0 24px 24px;
						/* para Opera */
						border-radius: 0 0 24px 24px;
						/* para IE */
						behavior:url(border.htc);
					}
				</style>
				<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
				
					<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					<input type="hidden" id="filename" name="filename" value="<?=$filename?>" />
					<div id="caja_arriba">
						<a href="#" style="vertical-align:middle;"><img src="../images/<?=$imagen_link?>" class="botonExcel" style="vertical-align:middle;"/></a>
						<b style="text-align:center;">Comisiones Ideprollamadas</b>
					</div>
					<div id="caja_abajo" > Reporte Campa&ntilde;a</div>
				</form>
				<table style="font-family:Arial; font-size:10pt; border-collapse: collapse; border: #34495e 2px solid;" border="1" id="Exportar_a_Excel">
					<tr>
						<td colspan="16">
							<?=$cabecera?>
						</td>
					</tr>
					<tr style="background: #34495e; color:white; text-align:center;">
						<th rowspan="2"></th>
						<th rowspan="2">SUCURSAL</th>
						<th rowspan="2">AGENCIA</th>
						<th rowspan="2">NOMBRE VENDEDOR</th>
						<th rowspan="2">Nro SEGUROS VENDIDOS <div style="font-size:7pt">(Campaña Anterior)</div></th>
						<th rowspan="2">META MES</th>
						<th rowspan="2">VENTAS MES 1 <br>(<?=meses($mes1)?>)</th>
						<th rowspan="2">VENTAS MES 2 <br>(<?=meses($mes2)?>)</th>
						<th rowspan="2">VENTAS MES 3 <br>(<?=meses($mes3)?>)</th>
						<th rowspan="2">CUMPLIMIENTO MES ACTUAL (%) <br>(<?=meses($mes_actual)?>)</th>
						<th rowspan="2">META CAMPA&Ntilde;A</th>
						<th colspan="2">TIPO DE VENTAS</th>
						<th rowspan="2">TOTAL VENTAS<br>ACUMULADAS CAMPA&Ntilde;A</th>
						<th rowspan="2">CUMPLIMIENTO CAMPA&Ntilde;A (%)</th>
						<th rowspan="2">EQUIVALENTE EN BS.</th>
					</tr>
					<tr style="background: #34495e; color:white; text-align:center;">
						<td><b>MENSUALES</b></td>
						<td><b>ANUALES</b></td>
					</tr>
					<!--<tr style="display:none;">
		  					<td id="TeLMo ChIRi_meta" rowSpan="100">telmix</td>
		  				</tr>-->
					<?php
					$query="SELECT eca.id_emision, us.id_usuario, eca.id_usuario,
						us.id_depto, dep.departamento, us.id_agencia, ag.agencia,
						us.nombre, count(eca.id_emision) as ventas,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='".$mes1."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '".$mes1."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas1,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='".$mes2."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '".$mes2."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas2,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='".$mes3."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '".$mes3."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas3,
						IF(".$anio_anterior.">=2016,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision) BETWEEN '".$ca_ini."' AND '".$ca_fin."' AND YEAR(ec.fecha_emision)='".$anio_anterior."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) NOT BETWEEN '".$ca_ini."' AND '".$ca_fin."' AND YEAR(ec.fecha_anulado!='".$anio_anterior."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario),
							'0') as anterior_campana,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision) BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) NOT BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario AND ec.tipo_plazo='M') as mensuales,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision) BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) NOT BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario AND ec.tipo_plazo='Y') as anuales
						FROM s_de_em_cabecera AS eca
						-- INNER JOIN s_de_em_detalle AS ede ON ede.id_emision = eca.id_emision
						INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
						INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
						INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
						INNER JOIN s_agencia AS ag ON ag.id_agencia = us.id_agencia
						WHERE MONTH(eca.fecha_emision) BETWEEN '".$mes1."' AND '".$mes3."' AND YEAR(eca.fecha_emision)='".$anio."' AND cca.vg='1' 
						AND (eca.anulado='0' OR (MONTH(eca.fecha_anulado) NOT BETWEEN '".$mes1."' and '".$mes3."' AND YEAR(eca.fecha_anulado!='".$anio."'))) 
						AND eca.emitir='1' AND eca.aprobado='1' AND eca.rechazado='0' 
						GROUP BY eca.id_usuario
						ORDER BY dep.departamento, ag.agencia;";
					//echo "".$query;
					$res = mysql_query($query,$conexion);
					
					$i   = 1;
					$cli = "TeLMo ChIRi";
					$cum_mes_ant = 0;
					$cum_cam_ant = 0;
					$id_m='';
					$total_anterior = $total_mes1 = $total_mes2 = $total_mes3 = $total_mensuales = $total_anuales = $total_ventas = $total_comisiones = 0;
		  			while($datos=mysql_fetch_array($res)){
						$meta=5;
		  				$cumplimiento_mes=0;
	  					switch ($mes_actual) {
	  						case $mes1:
	  							@$cumplimiento_mes=($datos['ventas1']*100)/$meta;
	  							break;
	  						case $mes2:
	  							@$cumplimiento_mes=($datos['ventas2']*100)/$meta;
	  							break;
	  						case $mes3:
	  							@$cumplimiento_mes=($datos['ventas3']*100)/$meta;
	  							break;
	  					}
	  					@$cumplimiento_mes= round($cumplimiento_mes,2);
	  					$ventas_acumuladas= $datos['ventas1']+$datos['ventas2']+$datos['ventas3'];
	  					@$cumplimiento_campana= round(($ventas_acumuladas*100)/($meta*3),2);

	  					if ($cli != $datos['nombre']) {
							if (@$sw==1) {
								$sw=2;
							}else{
								$sw=1;
							}
						}
						if ($sw==1) {
							$back_color="#E2EBFA";
						}else{
							$back_color="WHITE";
						}
		  				echo'
		  				<tr style="vertical-align:middle; background: '.$back_color.'">
		  					<td style="font-size:6pt;">'.$i.'</td>';
		  					if ($cli != $datos['nombre']) {
			  					echo'
			  					<td id="'.$datos['nombre'].'_departamento">'.strtoupper($datos['departamento']).'</td>
			  					<td id="'.$datos['nombre'].'_agencia">'.strtoupper($datos['agencia']).'</td>';
			  				}else{
			  					echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_departamento").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_agencia").rowSpan=2; 
								</script> ';
			  				}
	  						if ($cli != $datos['nombre']) {	
	  							echo'<td id="'.$datos['nombre'].'_nombre">'.strtoupper($datos['nombre']).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_nombre").rowSpan=2;  
								</script> ';
		  					}
		  					
		  					echo'
		  					<td style="text-align:center;">'.$datos['anterior_campana'].'</td>';
		  					//-------- AGRUPACION o NO META MES -----------//
		  					if ($cli != $datos['nombre']) {
		  						$id_m=$datos['nombre'].'_meta';
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$id_m.'" >'.$meta.'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_meta").rowSpan=2; 
								</script> ';
		  					}
		  					//echo'<td style="text-align:center;">'.$meta.'</td>';
		  					echo'<td align="center" ';if($mes_actual==$mes1) echo'style="background:#98AFC6;" '; echo'>'.$datos['ventas1'].'</td>
		  					<td align="center" ';if($mes_actual==$mes2) echo'style="background:#98AFC6;" '; echo'>'.$datos['ventas2'].'</td>
		  					<td align="center" ';if($mes_actual==$mes3) echo'style="background:#98AFC6;" '; echo'>'.$datos['ventas3'].'</td>';
		  					//----- AGRUPACION O NO CUMPLIMIENTO MES ACTUAL -----//
		  					//if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_cum_mes" >'.$cumplimiento_mes.' %</td>';
		  						$cum_mes_ant = $cumplimiento_mes;
		  					/*}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_cum_mes").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_cum_mes").innerHTML ="'.($cum_mes_ant+$cumplimiento_mes).' %"; 
								</script> ';
		  					}*/
		  					//----- AGRUPACION O NO META CAMPAÑA -----//
		  					if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_met_cam" >'.($meta*3).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_met_cam").rowSpan=2; 
								</script> ';
		  					}
		  					echo'<td style="text-align:center;">'.$datos['mensuales'].'</td>
		  					<td style="text-align:center;">'.$datos['anuales'].'</td>
		  					<td style="text-align:center;" >'.$ventas_acumuladas.'</td>';
		  					//----- AGRUPACION O NO CUMPLIMIENTO CAMPAÑA -----//
		  					if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_cum_cam" >'.$cumplimiento_campana.' %</td>';
		  						$cum_cam_ant = $cumplimiento_campana;
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_cum_cam").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_cum_cam").innerHTML ="'.($cum_cam_ant+$cumplimiento_campana).' %"; 
								</script> ';
		  					}
		  					$comision=0;
		  					if ($ventas_acumuladas >=50 ) {
		  						$comision=1250;
		  					}elseif ($ventas_acumuladas >=30) {
		  						$comision=750;
		  					}elseif ($ventas_acumuladas >=15) {
		  						$comision=375;
		  					}
		  					echo'<td style="text-align:center; vertical-align:middle;"  >'.$comision.'</td>';
		  					
		  				$cli = $datos['nombre'];
		  				$i++;
		  				$total_anterior += $datos['anterior_campana'];
		  				$total_mes1 += $datos['ventas1'];
		  				$total_mes2 += $datos['ventas2'];
		  				$total_mes3 += $datos['ventas3'];
		  				$total_mensuales += $datos['mensuales'];
		  				$total_anuales += $datos['anuales'];
		  				$total_ventas += $ventas_acumuladas;
		  				$total_comisiones += $comision;
		  			}
					?>
					<tr style="background: #34495e; color:white; text-align:center;">
						<td colspan="4">&nbsp;</td>
						<td><?=$total_anterior?></td> <!--total campaña anterior-->
						<td>&nbsp;</td>
						<td><?=$total_mes1?></td> <!-- ventas mes 1 -->
						<td><?=$total_mes2?></td> <!-- ventas mes 2 -->
						<td><?=$total_mes3?></td> <!-- ventas mes 3 -->
						<td colspan="2">&nbsp;</td> 
						<td><?=$total_mensuales?></td> <!-- ventas mensuales -->
						<td><?=$total_anuales?></td> <!-- ventas anuales -->
						<td><?=$total_ventas?></td> <!-- total campaña -->
						<td>&nbsp;</td>
						<td><?=$total_comisiones?></td> <!-- total comisiones -->
					</tr>
				</table>	
				<br>
				<script language="javascript">
				$(document).ready(function() {
					$(".botonExcel").click(function(event) {
						$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
						$("#FormularioExportacion").submit();
				});
				});
				</script>
				<?php
			}
			break;
		
		case 'anual'://========================// REPORTE ANUAL //========================//
			if (isset($_GET['anio'])) {
				$anio       = $_GET['anio'];
				//Variables para el calculo de comisiones
				$comision_mensual = $comision_anual = $com_per_sem = $com_per_anu = $com_total = 0;
				//----- Adicionamos a los TOTALES ------//
				$comision_mensual_total = $comision_anual_total = $com_per_sem_total = $com_per_anu_total = $com_total_total = 0;
				$cabecera = '<div style="color:#216095;" >CAMPAÑA: '.$anio.'</div>';
				$filename = "Comisiones_IDEPROLLAMADAS_Campaña_del_".$anio.".xls"; 
			  	//header("Content-Disposition: attachment; filename=\"$filename\""); 
				//header("Content-Type: application/vnd.ms-excel");
				?> 
				<head>
					<!--<meta http-equiv="Content-type" content="text/html; charset=utf-8" />-->
					<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
				</head>
				<style>
					#caja_arriba {
						background-color: #34495e;
						color: #ecf0f1;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						/*border-top-right-radius: 24px;
	    				border-top-left-radius: 24px;*/
						/*para Firefox*/
						-moz-border-radius: 24px 24px 0 0;
						/*para Safari y Chrome*/
						-webkit-border-radius: 24px 24px 0 0;
						/* para Opera */
						border-radius: 24px 24px 0 0;
						/* para IE */
						behavior:url(border.htc);
					}
					#caja_abajo {
						background-color: #2c3e50;
						color: #7f8c8d;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						font-size: 9pt;
						text-align: center;
						/*para Firefox*/
						-moz-border-radius: 0 0 24px 24px;
						/*para Safari y Chrome*/
						-webkit-border-radius: 0 0 24px 24px;
						/* para Opera */
						border-radius: 0 0 24px 24px;
						/* para IE */
						behavior:url(border.htc);
					}
				</style>
				<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
				
					<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					<input type="hidden" id="filename" name="filename" value="<?=$filename?>" />
					<div id="caja_arriba">
						<a href="#" style="vertical-align:middle;"><img src="../images/<?=$imagen_link?>" class="botonExcel" style="vertical-align:middle;"/></a>
						<b style="text-align:center;">Comisiones Ideprollamadas</b>
					</div>
					<div id="caja_abajo" > Reporte Campa&ntilde;a</div>
				</form>
				<table style="font-family:Arial; font-size:10pt; border-collapse: collapse; border: #34495e 2px solid;" border="1" id="Exportar_a_Excel">
					<tr>
						<td colspan="16">
							<?=$cabecera?>
						</td>
					</tr>
					<tr style="background: #34495e; color:white; text-align:center;">
						<th rowspan="2"></th>
						<th rowspan="2">SUCURSAL</th>
						<th rowspan="2">AGENCIA</th>
						<th rowspan="2">NOMBRE VENDEDOR</th>
						<th rowspan="2">META TRIMESTRE</th>
						<th colspan="5">1er TRIMESTRE</th>
						<th colspan="5">2do TRIMESTRE</th>
						<th colspan="5">3er TRIMESTRE</th>
						<th colspan="5">4to TRIMESTRE</th>
						<th rowspan="2">META CAMPA&Ntilde;A</th>
						<th rowspan="2">TOTAL VENTAS<br>ACUMULADAS CAMPA&Ntilde;A</th>
						<th rowspan="2">CUMPLIMIENTO CAMPA&Ntilde;A (%)</th>
						<th rowspan="2">TOTAL ANUAL BS.</th>
					</tr>
					<tr style="background: #34495e; color:white; text-align:center;">
						<td>VENTAS MES 1 <br>ENERO</td>
						<td>VENTAS MES 2 <br>FEBRERO</td>
						<td>VENTAS MES 3 <br>MARZO</td>
						<td>TOTAL VENTAS</td>
						<td>BS</td>
						<td >VENTAS MES 4 <br>ABRIL</td>
						<td >VENTAS MES 5 <br>MAYO</td>
						<td >VENTAS MES 6 <br>JUNIO</td>
						<td>TOTAL VENTAS</td>
						<td >BS</td>
						<td >VENTAS MES 7 <br>JULIO</td>
						<td >VENTAS MES 8 <br>AGOSTO</td>
						<td >VENTAS MES 9 <br>SEPTIEMBRE</td>
						<td>TOTAL VENTAS</td>
						<td >BS</td>
						<td >VENTAS MES 10 <br>OCTUBRE</td>
						<td >VENTAS MES 11 <br>NOVIEMBRE</td>
						<td >VENTAS MES 12 <br>DICIEMBRE</td>
						<td>TOTAL VENTAS</td>
						<td >BS</td>
					</tr>
					<!--<tr style="display:none;">
		  					<td id="TeLMo ChIRi_meta" rowSpan="100">telmix</td>
		  				</tr>-->
					<?php
					
					$query="SELECT eca.id_emision, us.id_usuario, eca.id_usuario,
						us.id_depto, dep.departamento, us.id_agencia, ag.agencia,
						us.nombre, count(eca.id_emision) as ventas,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='1' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '1' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas1,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='2' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '2' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas2,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='3' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '3' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas3,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='4' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '4' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas4,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='5' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '5' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas5,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='6' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '6' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas6,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='7' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '7' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas7,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='8' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '8' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas8,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='9' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '9' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas9,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='10' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '10' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas10,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='11' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '11' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas11,
						(SELECT count(ec.id_emision)
							FROM s_de_em_cabecera as ec
							-- INNER JOIN s_de_em_detalle AS ed ON ed.id_emision = ec.id_emision
							INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
							WHERE MONTH(ec.fecha_emision)='12' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND (ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '12' AND YEAR(ec.fecha_anulado!='".$anio."'))) AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND ec.and_usuario=us.id_usuario) as ventas12
						FROM s_de_em_cabecera AS eca
						-- INNER JOIN s_de_em_detalle AS ede ON ede.id_emision = eca.id_emision
						INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
						INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
						INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
						INNER JOIN s_agencia AS ag ON ag.id_agencia = us.id_agencia
						WHERE YEAR(eca.fecha_emision)='".$anio."' AND cca.vg='1' 
						AND (eca.anulado='0' OR YEAR(eca.fecha_anulado!='".$anio."')) 
						AND eca.emitir='1' AND eca.aprobado='1' AND eca.rechazado='0' 
						GROUP BY eca.id_usuario
						ORDER BY dep.departamento, ag.agencia;";
					//echo "".$query;
					$res = mysql_query($query,$conexion);
					
					$i   = 1;
					$cli = "TeLMo ChIRi";
					$cum_mes_ant = 0;
					$cum_cam_ant = 0;
					$id_m='';
					$total_anterior = $total_mes1 = $total_mes2 = $total_mes3 = $total_mes4 = $total_mes5 = $total_mes6 = $total_mes7 = $total_mes8 = $total_mes9 = $total_mes10 = $total_mes11 = $total_mes12 = $total_mensuales = $total_anuales = $total_ventas = $total_comisiones = 0;
		  			while($datos=mysql_fetch_array($res)){
						$meta=5;
		  				$cumplimiento_mes=0;
	  					
	  					$ventas_acumuladas= $datos['ventas'];
	  					@$cumplimiento_campana= round(($ventas_acumuladas*100)/($meta*12),2);
  						$comision=0;
  						$comision_trimestre1 = $comision_trimestre2 = $comision_trimestre3 = $comision_trimestre4 = 0;
	  					if (($datos['ventas1']+$datos['ventas2']+$datos['ventas3']) >=50 ) {
	  						$comision_trimestre1=1250;
	  					}elseif (($datos['ventas1']+$datos['ventas2']+$datos['ventas3']) >=30) {
	  						$comision_trimestre1=750;
	  					}elseif (($datos['ventas1']+$datos['ventas2']+$datos['ventas3']) >=15) {
	  						$comision_trimestre1=375;
	  					}
	  					if (($datos['ventas4']+$datos['ventas5']+$datos['ventas6']) >=50 ) {
	  						$comision_trimestre2=1250;
	  					}elseif (($datos['ventas4']+$datos['ventas5']+$datos['ventas6']) >=30) {
	  						$comision_trimestre2=750;
	  					}elseif (($datos['ventas4']+$datos['ventas5']+$datos['ventas6']) >=15) {
	  						$comision_trimestre2=375;
	  					}
	  					if (($datos['ventas7']+$datos['ventas8']+$datos['ventas9']) >=50 ) {
	  						$comision_trimestre3=1250;
	  					}elseif (($datos['ventas7']+$datos['ventas8']+$datos['ventas9']) >=30) {
	  						$comision_trimestre3=750;
	  					}elseif (($datos['ventas7']+$datos['ventas8']+$datos['ventas9']) >=15) {
	  						$comision_trimestre3=375;
	  					}
	  					if (($datos['ventas10']+$datos['ventas11']+$datos['ventas12']) >=50 ) {
	  						$comision_trimestre4=1250;
	  					}elseif (($datos['ventas10']+$datos['ventas11']+$datos['ventas12']) >=30) {
	  						$comision_trimestre4=750;
	  					}elseif (($datos['ventas10']+$datos['ventas11']+$datos['ventas12']) >=15) {
	  						$comision_trimestre4=375;
	  					}

	  					if ($cli != $datos['nombre']) {
							if (@$sw==1) {
								$sw=2;
							}else{
								$sw=1;
							}
						}
						if ($sw==1) {
							$back_color="#E2EBFA";
						}else{
							$back_color="WHITE";
						}
		  				echo'
		  				<tr style="vertical-align:middle; background: '.$back_color.'">
		  					<td style="font-size:6pt;">'.$i.'</td>';
		  					if ($cli != $datos['nombre']) {
			  					echo'
			  					<td id="'.$datos['nombre'].'_departamento">'.strtoupper($datos['departamento']).'</td>
			  					<td id="'.$datos['nombre'].'_agencia">'.strtoupper($datos['agencia']).'</td>';
			  				}else{
			  					echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_departamento").rowSpan=2; 
								document.getElementById("'.$datos['nombre'].'_agencia").rowSpan=2; 
								</script> ';
			  				}
	  						if ($cli != $datos['nombre']) {	
	  							echo'<td id="'.$datos['nombre'].'_nombre">'.strtoupper($datos['nombre']).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_nombre").rowSpan=2;  
								</script> ';
		  					}
		  					
		  					//-------- AGRUPACION o NO META MES -----------//
		  					if ($cli != $datos['nombre']) {
		  						$id_m=$datos['nombre'].'_meta';
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$id_m.'" >'.($meta*3).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_meta").rowSpan=2; 
								</script> ';
		  					}
		  					//if($mes_actual==$mes1) echo'style="background:#98AFC6;" ';
		  					//echo'<td style="text-align:center;">'.$meta.'</td>';
		  					echo'<td align="center">'.$datos['ventas1'].'</td>
		  					<td align="center">'.$datos['ventas2'].'</td>
		  					<td align="center">'.$datos['ventas3'].'</td>
		  					<td align="center" style="background:#98AFC6;">'.($datos['ventas1']+$datos['ventas2']+$datos['ventas3']).'</td>
		  					<td align="center" style="background:#98AFC6;">'.$comision_trimestre1.'</td>
		  					<td align="center">'.$datos['ventas4'].'</td>
		  					<td align="center">'.$datos['ventas5'].'</td>
		  					<td align="center">'.$datos['ventas6'].'</td>
		  					<td align="center" style="background:#98AFC6;">'.($datos['ventas4']+$datos['ventas5']+$datos['ventas6']).'</td>
		  					<td align="center" style="background:#98AFC6;">'.$comision_trimestre2.'</td>
		  					<td align="center">'.$datos['ventas7'].'</td>
		  					<td align="center">'.$datos['ventas8'].'</td>
		  					<td align="center">'.$datos['ventas9'].'</td>
		  					<td align="center" style="background:#98AFC6;">'.($datos['ventas7']+$datos['ventas8']+$datos['ventas9']).'</td>
		  					<td align="center" style="background:#98AFC6;">'.$comision_trimestre3.'</td>
		  					<td align="center">'.$datos['ventas10'].'</td>
		  					<td align="center">'.$datos['ventas11'].'</td>
		  					<td align="center">'.$datos['ventas12'].'</td>
		  					<td align="center" style="background:#98AFC6;">'.($datos['ventas10']+$datos['ventas11']+$datos['ventas12']).'</td>
		  					<td align="center" style="background:#98AFC6;">'.$comision_trimestre4.'</td>';
		  							  					
		  					//----- AGRUPACION O NO META CAMPAÑA -----//
		  					if ($cli != $datos['nombre']) {
		  						echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_met_cam" >'.($meta*12).'</td>';
		  					}else{
		  						echo '<script type="text/javascript"> 
								document.getElementById("'.$datos['nombre'].'_met_cam").rowSpan=2; 
								</script> ';
		  					}
		  					echo'<td style="text-align:center;" >'.$ventas_acumuladas.'</td>';
		  					echo'<td style="text-align:center; vertical-align:middle;" id="'.$datos['nombre'].'_cum_cam" >'.$cumplimiento_campana.' %</td>';
		  					
		  					$comision=$comision_trimestre1+$comision_trimestre2+$comision_trimestre3+$comision_trimestre4;
		  					echo'<td style="text-align:center; vertical-align:middle;"  >'.$comision.'</td>';
		  					
		  				$cli = $datos['nombre'];
		  				$i++;
		  				$total_mes1 += $datos['ventas1'];
		  				$total_mes2 += $datos['ventas2'];
		  				$total_mes3 += $datos['ventas3'];
		  				$total_mes4 += $datos['ventas4'];
		  				$total_mes5 += $datos['ventas5'];
		  				$total_mes6 += $datos['ventas6'];
		  				$total_mes7 += $datos['ventas7'];
		  				$total_mes8 += $datos['ventas8'];
		  				$total_mes9 += $datos['ventas9'];
		  				$total_mes10 += $datos['ventas10'];
		  				$total_mes11 += $datos['ventas11'];
		  				$total_mes12 += $datos['ventas12'];
		  				$total_ventas += $ventas_acumuladas;
		  				$total_comisiones += $comision;
		  			}
		  			
					?>
				</table>	
				<br>
				<script language="javascript">
				$(document).ready(function() {
					$(".botonExcel").click(function(event) {
						$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
						$("#FormularioExportacion").submit();
				});
				});
				</script>
				<?php
			}
			break;
		
		case 'agencias'://========================// REPORTE ANUAL //========================//
			if (isset($_GET['anio'])) {
				$anio       = $_GET['anio'];
				//Variables para el calculo de comisiones
				$comision_mensual = $comision_anual = $com_per_sem = $com_per_anu = $com_total = 0;
				//----- Adicionamos a los TOTALES ------//
				$comision_mensual_total = $comision_anual_total = $com_per_sem_total = $com_per_anu_total = $com_total_total = 0;
				$cabecera = '<div style="color:#216095;" >CAMPAÑA: '.$anio.'</div>';
				$filename = "Comisiones_IDEPROLLAMADAS_Campaña_del_".$anio.".xls"; 
			  	//header("Content-Disposition: attachment; filename=\"$filename\""); 
				//header("Content-Type: application/vnd.ms-excel");
				?> 
				<head>
					<!--<meta http-equiv="Content-type" content="text/html; charset=utf-8" />-->
					<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
				</head>
				<style>
					#caja_arriba {
						background-color: #e67e22;
						color: #ecf0f1;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						/*border-top-right-radius: 24px;
	    				border-top-left-radius: 24px;*/
						/*para Firefox*/
						-moz-border-radius: 24px 24px 0 0;
						/*para Safari y Chrome*/
						-webkit-border-radius: 24px 24px 0 0;
						/* para Opera */
						border-radius: 24px 24px 0 0;
						/* para IE */
						behavior:url(border.htc);
					}
					#caja_abajo {
						background-color: #d35400;
						color: #ffffff;
						width: 280px;
						padding: 10px;
						vertical-align: middle;
						font-family: Arial;
						font-size: 9pt;
						text-align: center;
						/*para Firefox*/
						-moz-border-radius: 0 0 24px 24px;
						/*para Safari y Chrome*/
						-webkit-border-radius: 0 0 24px 24px;
						/* para Opera */
						border-radius: 0 0 24px 24px;
						/* para IE */
						behavior:url(border.htc);
					}
				</style>
				<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
				
					<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					<input type="hidden" id="filename" name="filename" value="<?=$filename?>" />
					<div id="caja_arriba">
						<a href="#" style="vertical-align:middle;"><img src="../images/<?=$imagen_link?>" class="botonExcel" style="vertical-align:middle;"/></a>
						<b style="text-align:center;">Comisiones Ideprollamadas</b>
					</div>
					<div id="caja_abajo" > Reporte Anual por Agencias</div>
				</form>
				<table style="font-family:Arial; font-size:10pt; border-collapse: collapse; border: #d35400 2px solid;" border="1" id="Exportar_a_Excel">
					<tr>
						<td colspan="28" style="color:#d35400; text-align:center;">
							<b>Reporte de Comisiones Ideprollamadas (Agencias)</b>
						</td>
					</tr>
					<tr style="background: #e67e22; color:white; text-align:center;">
						<th rowspan="2"></th>
						<th rowspan="2">SUCURSAL</th>
						<th rowspan="2">AGENCIA</th>
						<!--<th rowspan="2">META TRIMESTRE</th>-->
						<th colspan="4">1er TRIMESTRE</th>
						<th colspan="4">2do TRIMESTRE</th>
						<th colspan="4">3er TRIMESTRE</th>
						<th colspan="4">4to TRIMESTRE</th>
						<!--<th rowspan="2">META CAMPA&Ntilde;A</th>-->
						<th rowspan="2">TOTAL VENTAS<br>ACUMULADAS CAMPA&Ntilde;A</th>
						<!--<th rowspan="2">CUMPLIMIENTO CAMPA&Ntilde;A (%)</th>
						<th rowspan="2">TOTAL ANUAL BS.</th>-->
					</tr>
					<tr style="background: #e67e22; color:white; text-align:center;">
						<td>VENTAS MES 1 <br>ENERO</td>
						<td>VENTAS MES 2 <br>FEBRERO</td>
						<td>VENTAS MES 3 <br>MARZO</td>
						<td>TOTAL VENTAS</td>
						<!--<td>BS</td>-->
						<td >VENTAS MES 4 <br>ABRIL</td>
						<td >VENTAS MES 5 <br>MAYO</td>
						<td >VENTAS MES 6 <br>JUNIO</td>
						<td>TOTAL VENTAS</td>
						<!--<td>BS</td>-->
						<td >VENTAS MES 7 <br>JULIO</td>
						<td >VENTAS MES 8 <br>AGOSTO</td>
						<td >VENTAS MES 9 <br>SEPTIEMBRE</td>
						<td>TOTAL VENTAS</td>
						<!--<td>BS</td>-->
						<td >VENTAS MES 10 <br>OCTUBRE</td>
						<td >VENTAS MES 11 <br>NOVIEMBRE</td>
						<td >VENTAS MES 12 <br>DICIEMBRE</td>
						<td>TOTAL VENTAS</td>
						<!--<td>BS</td>-->
					</tr>
					<!--<tr style="display:none;">
		  					<td id="TeLMo ChIRi_meta" rowSpan="100">telmix</td>
		  				</tr>-->
					<?php
					
					$query="SELECT dep.departamento, us.id_agencia,
						(SELECT agencia FROM s_agencia 
						WHERE id_agencia=us.id_agencia) as agencia, count(eca.id_emision) as ventas,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='1' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '1' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas1,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='2' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '2' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas2,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='3' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '3' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas3,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='4' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '4' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas4,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='5' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '5' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas5,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='6' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '6' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas6,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='7' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '7' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas7,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='8' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '8' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas8,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='9' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '9' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas9,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='10' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '10' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas10,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='11' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '11' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas11,
						(SELECT count(ec.id_emision)
						FROM s_de_em_cabecera as ec
						INNER JOIN s_de_cot_cabecera as c ON c.id_cotizacion=ec.id_cotizacion
						INNER JOIN s_usuario as u ON u.id_usuario = ec.and_usuario
						WHERE MONTH(ec.fecha_emision)='12' AND YEAR(ec.fecha_emision)='".$anio."' AND c.vg='1' AND 
						(ec.anulado='0' OR (MONTH(ec.fecha_anulado) != '12' AND YEAR(ec.fecha_anulado)!='".$anio."')) 
						AND ec.emitir='1' AND ec.aprobado='1' AND ec.rechazado='0' AND u.id_agencia=us.id_agencia) as ventas12
						FROM s_de_em_cabecera AS eca
						INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
						INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
						INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
						WHERE YEAR(eca.fecha_emision) = '".$anio."' AND cca.vg='1' 
						AND eca.anulado='0' AND eca.emitir='1' AND aprobado='1' AND rechazado='0'
						GROUP BY us.id_agencia
						ORDER BY dep.departamento;";
					//echo "".$query;
					$res = mysql_query($query,$conexion);
					
					$i   = 1;
					$cli = "TeLMo ChIRi";
					$cum_mes_ant = 0;
					$cum_cam_ant = 0;
					$id_m = '';
					$sw = 1;
					$total_anterior = $total_mes1 = $total_mes2 = $total_mes3 = $total_mes4 = $total_mes5 = $total_mes6 = $total_mes7 = $total_mes8 = $total_mes9 = $total_mes10 = $total_mes11 = $total_mes12 = $total_mensuales = $total_anuales = $total_ventas = $total_comisiones = 0;
		  			while($datos=mysql_fetch_array($res)){
						$meta=5;
		  				$cumplimiento_mes=0;
	  					
	  					$ventas_acumuladas= $datos['ventas'];
	  					@$cumplimiento_campana= round(($ventas_acumuladas*100)/($meta*12),2);
  						$comision=0;
  						$comision_trimestre1 = $comision_trimestre2 = $comision_trimestre3 = $comision_trimestre4 = 0;
	  					if (($datos['ventas1']+$datos['ventas2']+$datos['ventas3']) >=50 ) {
	  						$comision_trimestre1=1250;
	  					}elseif (($datos['ventas1']+$datos['ventas2']+$datos['ventas3']) >=30) {
	  						$comision_trimestre1=750;
	  					}elseif (($datos['ventas1']+$datos['ventas2']+$datos['ventas3']) >=15) {
	  						$comision_trimestre1=375;
	  					}
	  					if (($datos['ventas4']+$datos['ventas5']+$datos['ventas6']) >=50 ) {
	  						$comision_trimestre2=1250;
	  					}elseif (($datos['ventas4']+$datos['ventas5']+$datos['ventas6']) >=30) {
	  						$comision_trimestre2=750;
	  					}elseif (($datos['ventas4']+$datos['ventas5']+$datos['ventas6']) >=15) {
	  						$comision_trimestre2=375;
	  					}
	  					if (($datos['ventas7']+$datos['ventas8']+$datos['ventas9']) >=50 ) {
	  						$comision_trimestre3=1250;
	  					}elseif (($datos['ventas7']+$datos['ventas8']+$datos['ventas9']) >=30) {
	  						$comision_trimestre3=750;
	  					}elseif (($datos['ventas7']+$datos['ventas8']+$datos['ventas9']) >=15) {
	  						$comision_trimestre3=375;
	  					}
	  					if (($datos['ventas10']+$datos['ventas11']+$datos['ventas12']) >=50 ) {
	  						$comision_trimestre4=1250;
	  					}elseif (($datos['ventas10']+$datos['ventas11']+$datos['ventas12']) >=30) {
	  						$comision_trimestre4=750;
	  					}elseif (($datos['ventas10']+$datos['ventas11']+$datos['ventas12']) >=15) {
	  						$comision_trimestre4=375;
	  					}

	  					if ($sw==1) {
							$back_color="#FCF2C9";
							$sw = 2;
						}else{
							$back_color="WHITE";
							$sw = 1;
						}
		  				echo'
		  				<tr style="vertical-align:middle; background: '.$back_color.'">
		  					<td style="font-size:6pt;">'.$i.'</td>';
		  					echo'<td>'.strtoupper($datos['departamento']).'</td>
			  					<td>'.strtoupper($datos['agencia']).'</td>';
		  					//-------- AGRUPACION o NO META MES -----------//
		  					//--echo'<td style="text-align:center; vertical-align:middle;">'.($ventas_acumuladas).'</td>';
		  					//if($mes_actual==$mes1) echo'style="background:#98AFC6;" ';
		  					//echo'<td style="text-align:center;">'.$meta.'</td>';
		  					echo'<td align="center">'.$datos['ventas1'].'</td>
		  					<td align="center">'.$datos['ventas2'].'</td>
		  					<td align="center">'.$datos['ventas3'].'</td>
		  					<td align="center" style="background:#f39c12;">'.($datos['ventas1']+$datos['ventas2']+$datos['ventas3']).'</td>
		  					<!--<td align="center" style="background:#f39c12;">'.$comision_trimestre1.'</td>-->
		  					<td align="center">'.$datos['ventas4'].'</td>
		  					<td align="center">'.$datos['ventas5'].'</td>
		  					<td align="center">'.$datos['ventas6'].'</td>
		  					<td align="center" style="background:#f39c12;">'.($datos['ventas4']+$datos['ventas5']+$datos['ventas6']).'</td>
		  					<!--<td align="center" style="background:#f39c12;">'.$comision_trimestre2.'</td>-->
		  					<td align="center">'.$datos['ventas7'].'</td>
		  					<td align="center">'.$datos['ventas8'].'</td>
		  					<td align="center">'.$datos['ventas9'].'</td>
		  					<td align="center" style="background:#f39c12;">'.($datos['ventas7']+$datos['ventas8']+$datos['ventas9']).'</td>
		  					<!--<td align="center" style="background:#f39c12;">'.$comision_trimestre3.'</td>-->
		  					<td align="center">'.$datos['ventas10'].'</td>
		  					<td align="center">'.$datos['ventas11'].'</td>
		  					<td align="center">'.$datos['ventas12'].'</td>
		  					<td align="center" style="background:#f39c12;">'.($datos['ventas10']+$datos['ventas11']+$datos['ventas12']).'</td>
		  					<!--<td align="center" style="background:#f39c12;">'.$comision_trimestre4.'</td>-->';
		  							  					
		  					//----- AGRUPACION O NO META CAMPAÑA -----//
		  					//echo'<td style="text-align:center; vertical-align:middle;">'.($meta*12).'</td>';
		  					echo'<td style="text-align:center;" >'.$ventas_acumuladas.'</td>';
		  					//echo'<td style="text-align:center; vertical-align:middle;">'.$cumplimiento_campana.' %</td>';
		  					
		  					$comision=$comision_trimestre1+$comision_trimestre2+$comision_trimestre3+$comision_trimestre4;
		  					//echo'<td style="text-align:center; vertical-align:middle;"  >'.$comision.'</td>';
		  					
		  				$i++;
		  				$total_mes1 += $datos['ventas1'];
		  				$total_mes2 += $datos['ventas2'];
		  				$total_mes3 += $datos['ventas3'];
		  				$total_mes4 += $datos['ventas4'];
		  				$total_mes5 += $datos['ventas5'];
		  				$total_mes6 += $datos['ventas6'];
		  				$total_mes7 += $datos['ventas7'];
		  				$total_mes8 += $datos['ventas8'];
		  				$total_mes9 += $datos['ventas9'];
		  				$total_mes10 += $datos['ventas10'];
		  				$total_mes11 += $datos['ventas11'];
		  				$total_mes12 += $datos['ventas12'];
		  				$total_ventas += $ventas_acumuladas;
		  				$total_comisiones += $comision;
		  			}
					?>
					<tr style="text-align:center; background: #e67e22; color:white; font-weight:bold;">
						<td colspan="3"></td>
						<td><?=$total_mes1?></td>
						<td><?=$total_mes2?></td>
						<td><?=$total_mes3?></td>
						<td><?=($total_mes1+$total_mes2+$total_mes3)?></td>
						<td><?=$total_mes4?></td>
						<td><?=$total_mes5?></td>
						<td><?=$total_mes6?></td>
						<td><?=($total_mes4+$total_mes5+$total_mes6)?></td>
						<td><?=$total_mes7?></td>
						<td><?=$total_mes8?></td>
						<td><?=$total_mes9?></td>
						<td><?=($total_mes7+$total_mes7+$total_mes9)?></td>
						<td><?=$total_mes10?></td>
						<td><?=$total_mes11?></td>
						<td><?=$total_mes12?></td>
						<td><?=($total_mes10+$total_mes11+$total_mes12)?></td>
						<td><?=$total_ventas?></td>
					</tr>
				</table>	
				<br>
				<script language="javascript">
				$(document).ready(function() {
					$(".botonExcel").click(function(event) {
						$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
						$("#FormularioExportacion").submit();
				});
				});
				</script>
				<?php
			}
			break;
	}
}else{
	echo "Aqui";
}
	
function meses($id){
	switch ($id) {
		case 1:
			return 'ENERO';
			break;
		case 2:
			return 'FEBRERO';
			break;
		case 3:
			return 'MARZO';
			break;
		case 4:
			return 'ABRIL';
			break;
		case 5:
			return 'MAYO';
			break;
		case 6:
			return 'JUNIO';
			break;
		case 7:
			return 'JULIO';
			break;
		case 8:
			return 'AGOSTO';
			break;
		case 9:
			return 'SEPTIEMBRE';
			break;
		case 10:
			return 'OCTUBRE';
			break;
		case 11:
			return 'NOVIEMBRE';
			break;
		case 12:
			return 'DICIEMBRE';
			break;
		default:
			return $id;
			break;
	}
}
/* -- query puro --
$query="SELECT eca.id_emision, us.id_usuario, 
us.id_depto, dep.departamento, us.id_agencia, ag.agencia,
us.nombre, count(eca.id_emision) as ventas
FROM s_de_em_cabecera AS eca
INNER JOIN s_de_em_detalle AS ede ON ede.id_emision = eca.id_emision
INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
INNER JOIN s_agencia AS ag ON ag.id_agencia = us.id_agencia
WHERE eca.fecha_emision BETWEEN '2015-01-01' AND '2015-01-31' AND cca.vg='1' 
AND (eca.anulado='0' OR (eca.fecha_anulado NOT BETWEEN '2015-01-01' and '2015-01-31')) 
AND eca.emitir='1' AND aprobado='1' AND rechazado='0' AND us.activado='1'
group by eca.id_usuario;";
*/
?>