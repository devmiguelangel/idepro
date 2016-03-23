<?php
function au_sc_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$conexion = $link;
			
	ob_start();
?>
<div id="container-c" style="width: 785px; height: auto; 
    border: 0px solid #0081C2; padding: 5px;">
	<div id="main-c" style="width: 775px; font-weight: normal; font-size: 12px; 
        font-family: Arial, Helvetica, sans-serif; color: #000000;">
   
     <table 
         cellpadding="0" cellspacing="0" border="0" 
         style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr>
           <td style="width:34%;">
              <img src="<?=$url;?>images/<?=$row['logo_ef'];?>" height="60"/>
           </td>
           <td style="width:32%;"></td>
           <td style="width:34%; text-align:right;">
              <img src="<?=$url;?>images/<?=$row['logo_cia'];?>" height="60"/>
           </td>
         </tr>
         <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
         <tr>
           <td style="width:34%;">SLIP DE COTIZACIÓN<br/>Cotizacion No <?=$row['no_cotizacion'];?></td>
           <td style="width:32%;"></td> 
           <td style="width:34%; text-align:right;">
<?php
		      $fecha_registro = $row['fecha_creacion'];
			  $num_limit = $row['limite_cotizacion'];
		      $fecha_valido = date("d-m-Y", strtotime("$fecha_registro +$num_limit day"));
              echo'Cotización válida hasta el: '.$fecha_valido;
?>	
           </td>
         </tr>
     </table><br/>
     <span style="font-weight:bold; font-size:80%;">Datos del Titular:</span><br>

    <table 
        cellpadding="0" cellspacing="0" border="0" 
        style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr style="font-weight:bold;">
           <td style="width:33%; text-align:center; font-weight:bold;">Apellido Paterno</td>
           <td style="width:33%; text-align:center; font-weight:bold;">Apellido Materno</td>
           <td style="width:34%; text-align:center; font-weight:bold;">Nombres</td>
         </tr>
         <tr>
           <td style="width:33%; text-align:center;"><?=$row['paterno'];?></td>
           <td style="width:33%; text-align:center;"><?=$row['materno'];?></td>
           <td style="width:34%; text-align:center;"><?=$row['nombre'];?></td>
         </tr>
          <tr style="font-weight:bold;">
           <td style="width:33%; text-align:center; font-weight:bold;">Documento de Identidad</td>
           <td style="width:33%; text-align:center; font-weight:bold;">Genero</td>
           <td style="width:34%; text-align:center; font-weight:bold;">Fecha de Nacimiento</td>
         </tr>
         <tr>
           <td style="width:33%; text-align:center;"><?=$row['ci'];?></td>
           <td style="width:33%; text-align:center;"><?=$row['genero'];?></td>
           <td style="width:34%; text-align:center;"><?=$row['fecha_nacimiento'];?></td>
         </tr>
         <tr style="font-weight:bold;">
           <td style="width:33%; text-align:center; font-weight:bold;">Telefono Domicilio</td>
           <td style="width:33%; text-align:center; font-weight:bold;">Telefono Celular</td>
           <td style="width:34%; text-align:center; font-weight:bold;">&nbsp;</td>
         </tr>
         <tr>
           <td style="width:33%; text-align:center;"><?=$row['telefono_domicilio'];?></td>
           <td style="width:33%; text-align:center;"><?=$row['telefono_celular'];?></td>
           <td style="width:34%; text-align:center;">&nbsp;</td>
         </tr>
      </table><br/>		
     
     <span style="font-weight:bold; font-size:80%;">Datos de Solicitud:</span><br>
<?php
       $year_plazo = $conexion->get_year_final($row['plz_anio'], $row['tip_plz_code']);
       if($row['prima_total']!=0){
		  $prima_total=$row['prima_total']; 
	   }else{
		  if($rsDt->data_seek(0)){ 
			  $prima_total = 0; 
			  while($regi = $rsDt->fetch_array(MYSQLI_ASSOC)){
					  $year = $conexion->get_year_final($row['plz_anio'], $row['tip_plz_code']);
					  $tasaf = $conexion->get_tasa_year_au(base64_encode($row['id_compania']), base64_encode($row['idef']), $regi['category'], $year, $row['frm_pago_code']);
					  
					  //$tf_prima = $conexion->get_prima_au($row['plz_anio'],$row['tip_plz_code'],$regi['valor_asegurado'],$tasaf['t_tasa_final'],$year);
					  //var_dump($tf_prima);
					  //$prima_vehiculo = ($tasanual['t_tasa_final']*$regi['valor_asegurado'])/100;
					  if($year > 5){
						  $t_anual = $tasaf['t_tasa_final'] / 5;
						  $t_total = $t_anual * $year;
						  $p_total = ($t_total * $regi['valor_asegurado']) / 100;
						  if($row['frm_pago_code'] == 'CO'){
							  $dif_p = ($p_total*10)/100;
							  $p_total = $p_total - $dif_p;
						  }
					  }else{
						  $p_total = ($tasaf['t_tasa_final'] * $regi['valor_asegurado']) / 100;
					  }
					  
					  $prima_total = $prima_total + $p_total;
					  
			  }  
		  }
	   }
	  
?>
     <table 
        cellpadding="0" cellspacing="0" border="0" 
        style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr>
           <td style="width:50%; text-align:right;"><b>Compañía de Seguros:</b></td>
           <td style="width:50%;"><?=$row['compania'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Seguro a contratar:</b></td>
           <td style="width:50%;">Automotores</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Periodo de contratacion:</b></td>
           <td style="width:50%;"><?=$row['tipo_plazo'];?></td>
         </tr>
<?php
       if($row['frm_pago_code'] == 'AN'){
?>         
         <tr>
           <td style="width:50%; text-align:right;"><b>Prima Anual:</b></td>
           <td style="width:50%;"><?=number_format($prima_total/$year_plazo,2,".",",");?> USD</td>
         </tr>
<?php
	   }
?>         
         <tr>
           <td style="width:50%; text-align:right;"><b>Prima total:</b></td>
           <td style="width:50%;"><?=number_format((($prima_total/$year_plazo)*$row['cant_plazo']),2,".",",");?> USD</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Inicio de vigencia:</b></td>
           <td style="width:50%;"><?=$row['ini_vigencia'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Fin de vigencia:</b></td>
           <td style="width:50%;"><?=$row['fin_vigencia'];?></td>
         </tr>
      </table><br/>
      
      <span style="font-weight:bold; font-size:80%;">Datos de Vehiculo:</span><br>
        <table 
           cellpadding="0" cellspacing="0" border="0" 
           style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr>
            <td style="width:10%; text-align:center;"><b>Tipo de vehiculo</b></td>
            <td style="width:10%; text-align:center;"><b>Marca</b></td>
            <td style="width:10%; text-align:center;"><b>Modelo</b></td>
            <td style="width:10%; text-align:center;"><b>Cero km.</b></td>
            <td style="width:10%; text-align:center;"><b>Año</b></td>
            <td style="width:10%; text-align:center;"><b>Placa</b></td>
            <td style="width:10%; text-align:center;"><b>Categoria</b></td>
            <td style="width:10%; text-align:center;"><b>Valor Asegurado</b></td>
            <td style="width:10%; text-align:center;"><b>Tasa Total</b></td>
<?php
         if($row['frm_pago_code'] == 'AN'){
?>            
            <td style="width:10%; text-align:center;"><b>Prima Anual</b></td>
<?php
		 }
?>            
            </tr>
<?php
			  if($rsDt->data_seek(0)){
				  $sum_facu=0;
				  while($rowDt = $rsDt->fetch_array(MYSQLI_ASSOC)){
					  $year = $conexion->get_year_final($row['plz_anio'], $row['tip_plz_code']);
					  $tasaf = $conexion->get_tasa_year_au(base64_encode($row['id_compania']), base64_encode($row['idef']), $rowDt['category'], $year, $row['frm_pago_code']);
					  //var_dump($tasaf); 
					  //$tf_prima = $conexion->get_prima_au($row['plz_anio'],$row['tip_plz_code'],$rowDt['valor_asegurado'],$tasaf['t_tasa_final'],$year);
					  //var_dump($tf_prima);
					  if($year > 5){
						  $t_anual = $tasaf['t_tasa_final'] / 5;
						  $t_total = $t_anual * $year;
						  $p_total = ($t_total * $rowDt['valor_asegurado']) / 100;
						  if($row['frm_pago_code'] == 'CO'){
							  $dif_pr = ($p_total * 10) / 100;
							  $p_total = $p_total - $dif_pr;
						  }
					  }else{
						  $t_total = $tasaf['t_tasa_final'];
						  $p_total = ($tasaf['t_tasa_final'] * $rowDt['valor_asegurado']) / 100;
					  }
					  //$prima_vehiculo=($tasa_anual['t_tasa_final']*$rowDt['valor_asegurado'])/100;
					  if($rowDt['facultativo']==1){$sum_facu++;}
?>
                      <tr>
                      <td style="width:10%; text-align:center;"><?=$rowDt['vehiculo'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['marca'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['modelo'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['km'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['anio'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['placa'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['categoria'];?></td>
                      <td style="width:10%; text-align:center;"><?=number_format($rowDt['valor_asegurado'],2,".",",");?></td>
                      <td style="width:10%; text-align:center;"><?=$t_total;?></td>
<?php
         if($row['frm_pago_code'] == 'AN'){
?>                       
                      <td style="width:10%; text-align:center;"><?=number_format($p_total/$year,2,".",",");?></td>
<?php
		 }
?>                      
                      </tr> 
<?php
			      }
			  }
?>
        </table>
        <span style="font-weight: normal; font-size:80%;">
          <i>&bull; Todos los montos se encuentran expresados en d&oacute;lares americanos</i>
        </span><br/>
<?php
        if($sum_facu>0){
?>	
           <div style="font-size:8pt; text-align:justify; margin-top:5px; margin-bottom:0px; border:1px solid #C68A8A; background:#FFEBEA; padding:8px;">
                  La presente cotizaci&oacute;n referencial contiene uno o mas veh&iacute;culos cuya antig&uuml;edad supera los <?=$row['anio_max'];?> a&ntilde;os o cuyo monto supera el maximo valor permitido <?=number_format($row['monto_facultativo'],2,".",",");?> USD, por lo tanto la aseguradora se reserva el derecho de solicitar inspecci&oacute;n, adicion de medidas de seguridad, solicitud de reaseguro y otros.
           </div><br/>
<?php
		}
?>
        <span style="font-weight: bold; font-size:80%;">Forma de Pago</span><br>
        <?php
           $sqlCia = 'select 
						sac.id_cotizacion as idc,
						sef.id_ef as idef,
						scia.id_compania as idcia,
						scia.nombre as cia_nombre,
						scia.logo as cia_logo,
						sfp.id_forma_pago,
						sac.plazo as c_plazo,
						sac.tipo_plazo as c_tipo_plazo,
						sac.certificado_provisional as cp
					from
						s_au_cot_cabecera as sac
							inner join
						s_entidad_financiera as sef ON (sef.id_ef = sac.id_ef)
							inner join
						s_ef_compania as sec ON (sec.id_ef = sef.id_ef)
							inner join
						s_compania as scia ON (scia.id_compania = sec.id_compania)
							inner join
						s_forma_pago as sfp ON (sfp.id_forma_pago = sac.id_forma_pago)
					where
						sac.id_cotizacion = "'.$row['id_cotizacion'].'"
							and sef.id_ef = "'.$row['idef'].'"
							and sef.activado = true
							and scia.id_compania = "'.$row['id_compania'].'"
							and sec.producto = "AU"
							and scia.activado = true
					order by scia.id_compania asc;';
		   $rsfp = $conexion->query($sqlCia, MYSQLI_STORE_RESULT);
		   $rowfp = $rsfp->fetch_array(MYSQLI_ASSOC);
		   $rsfp->free();
		   
		   $arr_share = array();
		   if($row['frm_pago_code']=='CO'){
		       $year = 1;
			   $cuota = $prima_total;
		   }else{
			   $year = $conexion->get_year_final($rowfp['c_plazo'], $rowfp['c_tipo_plazo']);
			   $cuota = $prima_total;
		   }
		   $primaT = 0;
		   $tasaT = 0;
			
		   $date_begin = date('d-m-Y', strtotime(date('15-m-Y'). '+ 1 month'));
		   $percent = number_format((100 / $year), 4, '.', ',');
		   $date_payment = '';
			
		   for($i = 0; $i < $year; $i++){
				$date_payment = date('d/m/Y', strtotime($date_begin. '+ '.$i.' year'));
				$arr_share[] = ($i + 1).'|'.$date_payment.'|'.$percent;
		   }			
		   	  
		   echo'<table 
                 cellpadding="0" cellspacing="0" border="0" 
                 style="width: 90%; height: auto; font-size: 80%; font-family: Arial;" align="center">
		         <tr>
				  <td style="width:30%; text-align:center;"><b>Año</b></td>
				  <td style="width:30%; text-align:center;"><b>Fecha de Pago</b></td>
				  <td style="width:30%; text-align:center;"><b>Cuota</b></td>
				 </tr>';
		   foreach ($arr_share as $valor) {
			   $vec=explode('|',$valor);
			   echo'<tr>
					  <td style="width:30%; text-align:center;">'.$vec[0].'</td>
					  <td style="width:30%; text-align:center;">'.$vec[1].'</td>
					  <td style="width:30%; text-align:center;">'.number_format(($cuota/$year),2,".",",").'</td>
					</tr>';
		   }
		   echo'</table><br/>';
		?>
      
       <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr> 
              <td style="width:100%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <b>MATERIA ASEGURADA</b>
                Vehículos de propiedad de clientes de IDEPRO IFD. y que fueran objeto de garantía a favor del contratante, se deberán asegurar vehículos con una antigüedad máxima de 25 años.
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                   <tr>
                     <td style="2%;">A.</td>
                     <td style="92%;"> Vehículos Livianos: Particulares y Públicos, automóviles, vagonetas, minibuses, motocicleta, cuadratracks, y similares</td>
                   </tr>
                   <tr>
                     <td style="2%;">B.</td>
                     <td style="92%;">Vehículos Pesados y Semi Pesados: Particulares y Públicos, Microbuses, Flotas y Buses, Camiones, Tractocamiones, Volquetas, Chatas, vehículos de carga y/o Acoplados, y/o similares, que realizan viajes interdepartamentales e interprovinciales o de circulación en radio Urbano.</td>
                   </tr>
                   <tr><td colspan="2" style="width:100%; text-align:left;">
                   Accesorios hasta $us. 500,00 solamente para la categoría A, para vehículos particulares
                   </td></tr>
                </table><br>
                <b>VALOR ASEGURADO:</b><br>
                  Valor comercial según avalúo del vehículo y/o precio de mercado.
                  Para vehículos 0 kilómetros la factura de compra, proforma, o documento equivalente.<br><br>
                
                <b>COBERTURAS</b>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Responsabilidad Civil Hasta $us 10.000.00</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Responsabilidad Consecuencial hasta $us 3.000,00</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Pérdida Total por Accidente al 100%</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Pérdida Total por robo al 100%</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Robo Parcial para vehículos livianos solo para la alternativa A al 80%, se excluye vehiculos pesados (Alternativa B) </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;"> Daños propios, Huelgas, Riesgos Políticos, Conmoción Civil y Daño Malicioso incluyendo terrorismo, con Franquicia $us 50, y para vehículos de la alternativa B $us. 100.-</td>
                    </tr>
                </table><br>
                <b>COBERTURA ADICIONAL</b><br> 
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:100%;">Extraterritorialidad gratuita por toda la vigencia de la póliza, sin comunicación previa a la compañía y aplicable a todas las coberturas,  solamente para vehículos alternativa A</td>
                    </tr>
                </table><br>
                
                <b>TASAS ANUALES</b><br>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                  <tr>
                    <td style="width:100%; text-align:center;">VEHICULOS LIVIANOS: PARTICULARES Y PUBLICOS</td>
                  </tr>
                </table><br>
                <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                <tr>
                  <td rowspan="2" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-left: 1px solid #000; 
                   background:#D8D8D8;">VALOR</td>
                  <td colspan="5" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; background:#D8D8D8;">TASAS</td>
                </tr>
                <tr>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 1</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 2</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 3</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 4</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 5</td>
                </tr>
                <tr>
                  <td style="width:50%; text-align:left; padding:3px; border-right: 1px solid #000; border-bottom: 1px 
                  solid #000; border-left: 1px solid #000;">Menor o igual a $us. 100.000,00</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  1.75%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  3.40%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  4.99%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  6.51%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  7.88%</td>
                </tr>
              </table><br><br>
              
              <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                <tr>
                  <td style="width:100%; text-align:center;">VEHICULOS PESADOS: PARTICULARES Y PUBLICOS</td>
                </tr>
              </table><br>
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                <tr>
                  <td rowspan="2" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-left: 1px solid #000; 
                   background:#D8D8D8;">VALOR</td>
                  <td colspan="5" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; background:#D8D8D8;">TASAS</td>
                </tr>
                <tr>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 1</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 2</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 3</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 4</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 5</td>
                </tr>
                <tr>
                  <td style="width:50%; text-align:left; padding:3px; border-right: 1px solid #000; border-bottom: 1px 
                  solid #000; border-left: 1px solid #000;">Menor o igual a $us. 100.000,00</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  2.50%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  4.85%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  7.13%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  9.30%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  11.25%</td>
                </tr>
              </table><br>
                
                
                <b>CLAUSULAS ADICIONALES</b><br>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Adelanto del 50% en Caso de Siniestro </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Ampliación de Aviso de Siniestro hasta 15 días</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Ausencia de Control solo para empresas</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Daños a Causa de Riesgo de la Naturaleza</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Elegibilidad de Talleres de Reparación</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Elegibilidad de Ajustadores</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Rehabilitación Automática de la Suma Asegurada</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Rescisión del Contrato a Prorrata</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Tránsito en Vías no Autorizadas</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Altas y Bajas (Inclusiones y Exclusiones) a prorrata</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Eliminación de la copia legalizada de Tránsito, para siniestros menores a $us 1.000,00.- excepto para casos de Responsabilidad Civil y Pérdida Total.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Flete Aéreo</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Depreciación anual del 10% (En pólizas con vigencia mayor a un año)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Subrogación, hasta finalizar el crédito</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Errores y Omisiones (en la descripción de los datos de la materia asegurada y el llenado del formulario)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De cobertura para eventos cuando el conductor del vehículo asegurado cuente con licencia de conducir, pero al momento de la ocurrencia del evento no la porte (un evento al año).</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De piezas y partes genuinas. Para vehículos importados</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De siniestros a consecuencia de Pérdida Total por accidente y/o robo a vehículos cuya antigüedad no exceda el primer año o los 10.000KM de recorrido, se deberá considerar como valor de indemnización, el valor de compra de un vehículo cero kilómetros, descontando la parte impositiva.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De ampliación de vigencia a prorrata hasta 90 días sin modificación de términos, condiciones, tasas y primas pactadas en el contrato inicial.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Cobertura para bolsas de aire por daños a consecuencia de accidente de tránsito, robo y/o intento de robo sin ninguna limitación</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Asistencia en audiencias de transito</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Preparación y presentación de memoriales</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Asistencia a audiencias de Conciliación</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Gastos y costas judiciales (por acción civil)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Presentación de fianzas judiciales (por acción civil)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Se deja sin efecto la presentación del Test de Alcoholemia para accidentes ocurridos en el área rural o pueblos alejados de las ciudades principales. En su reemplazo la Aseguradora aceptara la presentación del informe de la autoridad competente de la localidad en la que haya ocurrido el siniestro o localidad más cercana.</td>
                    </tr>
                </table><br>
                <b>CONDICIONES ESPECIALES</b><br>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">El valor asegurado corresponderá al valor comercial.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Para todo certificado emitido para vehículos cero kilómetros deberá adjuntarse únicamente la nota de entrega o factura de compra de la casa de venta.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">La cobertura de robo total contratada, se extenderá a cubrir los daños y/o perdidas parciales ocurridas como consecuencia del robo total perpetrado, en la eventualidad de haberse logrado el recupero del vehículo dentro de los 45 días. </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">El presente seguro se extiende a cubrir todos los daños y/o pérdidas que sufran los vehículos asegurados como consecuencia de cualquier servicio adicional que preste la compañía de seguros (instalaciones, auxilio mecánico, grúa, rastreo). </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Aceptación del riesgo al que están expuestos los bienes, en función a las actividades que desarrolla el Contratante. </td>
                    </tr>
                </table><br>
                <b>NOTAS ESPECIALES</b><br>
                EL ASEGURADO AUTORIZA A LA COMPAÑÍA DE SEGUROS A ENVIAR EL REPORTE A LA CENTRAL DE RIESGOS DEL MERCADO DE SEGUROS ACORDE A LAS NORMATIVAS REGLAMENTARIAS DE LA AUTORIDAD DE FISCALIZACIÓN Y CONTROL DE PENSIONES Y SEGUROS – APS.                 
              </td> 
       	    </tr>
       </table>     
    </div>
</div>
<?php
	$html = ob_get_clean();
	return $html;
}
?>