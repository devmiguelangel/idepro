<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<?php
$servidor = 'localhost';
$basedatos = 'idepro';
//$user = 'root';
//$password = 'fOXenq7ftJvW';
$user = 'abrenetbd';
$password = 'jt@Hd@5PhzAN/xhVtq5q';


//echo mysql_errno($conexion) . ": " . mysql_error($conexion). "\n";

//CONECTAMOS A LA BASE DE DATOS
$conexion = @mysql_connect($servidor, $user, $password) or die ("Fallo en el establecimiento de la conexi&oacute;n");


//SELECCIONAMOS LA BASE DE DATOS
@mysql_select_db($basedatos, $conexion) or die("Error en la selecci&oacute;n de la base de datos:&nbsp;<br/>No existe la base de datos&nbsp;[<b>".$basedatos."</b>]&nbsp; porfavor revise el archivo config.php");
$imagen_link ="boton-excel-mini.png";
set_time_limit(0);
if (isset($_GET['producto'])) {
	$producto = $_GET['producto'];
	switch ($producto) {
		case 'desgravamen': // REPORTE DESGRAVAMEN //
			if (isset($_GET['fecha_ini']) && isset($_GET['fecha_fin'])) {
				$fecha_ini = $_GET['fecha_ini'];
				$fecha_fin = $_GET['fecha_fin'];
				$filename = "EMISIONES IDEPRO ".strtoupper($producto)." EN FECHAS: ".$fecha_ini." al ".$fecha_fin.".xls"; 
				//echo($filename);
			  	//header("Content-Disposition: attachment; filename=\"$filename\""); 
				//header("Content-Type: application/vnd.ms-excel");
				?>
				<table style="font-family:Arial; font-size:10pt; border-collapse: collapse; border: #17A086 2px solid;" border="1" id="Exportar_a_Excel">
					<tr style="background: #17A086; color:white; text-align:center;">
						<th colspan="4">IDEPROLLAMADAS</th>
					</tr>
					<tr style="background: #17A086; color:white; text-align:center;">
						<td></td>
						<td><b>DEPARTAMENTO</b></td>
						<td><b>AGENCIA</b></td>
						<td><b>EMISIONES</b></td>
					</tr>
					<?php 
					$query="SELECT dep.departamento, us.id_agencia,
					(SELECT agencia FROM s_agencia WHERE id_agencia=us.id_agencia) as agencia, 
					-- count(ede.id_detalle) as emisiones
					 count(eca.id_emision) as emisiones
					FROM s_de_em_cabecera AS eca
					-- INNER JOIN s_de_em_detalle as ede ON ede.id_emision = eca.id_emision
					INNER JOIN s_de_cot_cabecera AS cca ON cca.id_cotizacion = eca.id_cotizacion
					INNER JOIN s_usuario AS us ON us.id_usuario = eca.id_usuario
					INNER JOIN s_departamento AS dep ON dep.id_depto = us.id_depto
					WHERE eca.fecha_emision BETWEEN '".$fecha_ini."' AND '".$fecha_fin."' AND cca.vg='1' 
					AND eca.anulado='0' AND eca.emitir='1' AND aprobado='1' AND rechazado='0'
					GROUP BY us.id_agencia
					ORDER BY dep.departamento;";
		  			$res = mysql_query($query,$conexion);
		  			$i=1;
		  			$total_emisiones=0;
		  			while($datos=mysql_fetch_array($res)){
		  				if ($datos['agencia']=='Seleccione')
		  					$datos['agencia']='';
		  				echo'
		  				<tr>
		  					<td style="font-size:6pt;">'.$i.'</td>
		  					<td>'.($datos['departamento']).'</td>
		  					<td>'.$datos['agencia'].'</td>
		  					<td style="text-align:right;">'.$datos['emisiones'].'</td>
		  				</tr>';
		  				$i++;
		  				$total_emisiones+=$datos['emisiones'];
		  			} 
		  			echo '<tr>
		  				<td style="background: #17A086; color: #ffffff; text-align:right;" colspan="4">'.$total_emisiones.'</td>
		  			</tr>'; 
					$nombre = "EMISIONES_IDEPRO_".strtoupper($producto)."_EN_FECHAS:_".$fecha_ini."_al_".$fecha_fin.".xls"; 
					?>
				</table>
				<br>
				<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
				<a href="#"><img src="../images/<?=$imagen_link?>" class="botonExcel" /></a>
				<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
				<input type="hidden" id="filename" name="filename" value="<?=$nombre?>" />
				</form>
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
}
?>