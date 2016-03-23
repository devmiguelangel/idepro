<?php
function trd_em_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$state = $link->stateProperty;
	$tc = $link->get_rate_exchange(true);
	$nState = count($state);
	
    $respState = array();
	
	if ((boolean)$row['cl_tipo'] === true) {
		$row['cl_paterno'] = $row['cl_razon_social'];
	}

	ob_start();
?>
<div id="container-c" style="width: 785px; height: auto; 
    border: 0px solid #0081C2; padding: 5px;">
		<div id="main-c" style="width: 775px; font-weight: normal; font-size: 12px; 
        font-family: Arial, Helvetica, sans-serif; color: #000000;">
<?php
$ct=1;
while($ct<=2){
	if ($rsDt->data_seek(0) === true) {
		$num_reg = $rsDt->num_rows;
		while ($rowDt = $rsDt->fetch_array(MYSQLI_ASSOC)) {
            
            for ($k = 0; $k < $nState; $k++) {
				$_state = explode('|', $state[$k]);
				if ($_state[0] === $rowDt['pr_estado']) {
					$respState[$k] = 'X';
				} else {
					$respState[$k] = '&nbsp;';
				}
			}
			
			if($row['moneda']=='Bs'){
				$moneda = 'Bolivianos';
				$valor_asegurado = number_format($rowDt['pr_valor_asegurado']*$tc, 2, '.', ',');
			}elseif($row['moneda']=='Usd'){
				$moneda = 'Dólares Americanos';
				$valor_asegurado = number_format($rowDt['pr_valor_asegurado'], 2, '.', ',');
			}
?>
		<table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-family: Arial;">
        	<tr>
            	<td style="width:100%;" align="left" valign="top" colspan="3">&nbsp;
                	
                </td>
            </tr>
            <tr>
            	<td style="width:26%;" align="left" valign="top">&nbsp;
                	
                </td>
                <td style="width:48%; font-weight:bold; text-align:center; font-size: 70%;">
                    
                	 Oficina Principal Calacoto Calle Julio Patiño No. 550 esq. Calle 12<br>
                     Central Piloto (2)2775550 Fax (591-02)2203917<br>
                     e-mail: credinform@credinformsa.com<br><br>
                     CERTIFICADO DE COBERTURA - POLIZA DE SEGUROS COLECTIVO MULTIRIESGO                  
                </td>
                <td style="width:26%;" align="right" valign="top">&nbsp;
                	
				</td>
            </tr>
            <tr>
            	<td colspan="3" style="width:100%;">
                	<table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 70%;">
                      <tr>
                        <td style="width:20%; font-weight:bold; text-align:right;">P&Oacute;LIZA No.</td>
                        <td style="width:20%;">
                           <div style="border: 1px solid #999; width:125px;"><?=$row['no_poliza'];?></div>
                        </td>
                        <td style="width:20%;">&nbsp;</td>
                        <td style="width:14%; font-weight:bold; text-align:right;">CERTIFICADO No.</td>
                        <td style="width:26%;">
                           <div style="border: 1px solid #999; width:125px;"><?=$row['no_emision'];?></div>
                        </td>
                      </tr>
                    </table>
                </td>
            </tr>
        </table>
		<br>
        
        <span style="font-weight:bold; font-size:90%;">1. Datos del Titular:</span><br>
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:10%;">Nombres: </td>
                <td style="width:25%; text-align:center;"><?=$row['cl_paterno'];?></td>
                <td style="width:22%; text-align:center;"><?=$row['cl_materno'];?></td>
                <td style="width:22%; text-align:center;"><?=$row['cl_nombre'];?></td>
                <td style="width:21%; text-align:center;"><?=$row['cl_ap_casada'];?></td>
            </tr>
            <tr>
            	<td style="width:10%;"></td>
                <td style="width:25%; border-top:1px solid #999; text-align:center;">Apellido Paterno</td>
                <td style="width:22%; border-top:1px solid #999; text-align:center;">Apellido Materno</td>
                <td style="width:22%; border-top:1px solid #999; text-align:center;">Nombres</td>
                <td style="width:21%; border-top:1px solid #999; text-align:center;">Apellido de Casada</td>
            </tr>
		</table>
		<br />
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:10%;">Direcci&oacute;n Legal: </td>
                <td style="width:32%; text-align:center;"><?=$row['cl_avc'].' - '.$row['cl_direccion'];?></td>
                <td style="width:12%; text-align:center;"><?=$row['cl_no_domicilio'];?></td>
                <td style="width:22%; text-align:center;"><?=$row['cl_zona'];?></td>
                <td style="width:24%; text-align:center;"><?=$row['cl_localidad'];?></td>
            </tr>
            <tr>
            	<td style="width:10%;">&nbsp;</td>
                <td style="width:32%; border-top:1px solid #999; text-align:center;">Av. o Calle</td>
                <td style="width:12%; border-top:1px solid #999; text-align:center;">N&uacute;mero</td>
                <td style="width:22%; border-top:1px solid #999; text-align:center;">Zona</td>
                <td style="width:24%; border-top:1px solid #999; text-align:center;">Ciudad o Localidad</td>
            </tr>
		</table>
		<br />
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:10%;">Tel&eacute;fono: </td>
                <td style="width:20%; text-align:center;"><?=$row['cl_tel_domicilio'];?></td>
                <td style="width:20%; text-align:center;"><?=$row['cl_tel_oficina'];?></td>
                <td style="width:20%; text-align:center;"><?=$row['cl_tel_celular'];?></td>
                <td style="width:30%; text-align:center;"></td>
            </tr>
            <tr>
            	<td style="width:10%;"></td>
                <td style="width:20%; border-top:1px solid #999; text-align:center;">Domicilio</td>
                <td style="width:20%; border-top:1px solid #999; text-align:center;">Oficina</td>
                <td style="width:20%; border-top:1px solid #999; text-align:center;">Celular</td>
                <td style="width:30%; text-align:center;"></td>
            </tr>
		</table>
		<br/>

		<span style="font-weight:bold; font-size:90%;">2. Inter&eacute;s Asegurado:</span><br>
		<div style="font-size:80%;">
        <b>INMUEBLES:</b> PROPIEDADES SIN PROHIBICIÓN NI EXCLUSIÓN NI RESTRICCIÓN DE GIRO DE NEGOCIO Y/O ACTIVIDADES Y/O TIPO DE RIESGO  EN         LOS QUE SE DESARROLLEN LAS ACTIVIDADES DE LOS CLIENTES, EXCEPTO LAS EXCLUIDAS EXPRESAMENTE EN ÉSTA PÓLIZA.<br>
        EN CASO DE BIENES INMUEBLES:
        </div>
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr>
              <td style="width:2%;" valign="top">&bull;</td>
              <td style="width:98%;">
                INCLUYENDO EN TODOS LOS CASOS, OBRAS CIVILES Y SUS INSTALACIONES, INCLUYENDO LUMINARIAS, ALFOMBRADO                (SIEMPRE Y CUANDO ESTÉN INCLUIDAS EN EL AVALÚO TÉCNICO), REVESTIMIENTOS; VIDRIOS, ACCESORIOS SANITARIOS,                MUROS PERIMETRALES, TANQUES; ESTACIONAMIENTOS, ÁREAS DE DEPÓSITO Y LA PARTE PROPORCIONAL DE ÁREAS COMUNES,                CUANDO CORRESPONDA.
              </td>
            </tr>
            <tr>
              <td style="width:2%;" valign="top">&bull;</td>
              <td style="width:98%;">
                INCLUYENDO INMUEBLES DOMICILIARIOS, COMERCIALES.  
              </td>
            </tr>
        </table>
        <br/>
             
        <div style="font-size:80%; text-align:justify;">
           <b>MAQUINARIA Y EQUIPO PESADO MOVIL:</b> (GRÚAS, PALAS MECÁNICAS, EXCAVADORAS, CAMIONES CONCRETEROS, MOTONIVELADORAS, 
           TRACTORES, Y OTROS SIMILARES), INCLUYENDO SUS EQUIPOS AUXILIARES QUE SE ENCUENTRES DECLARADOS DENTRO DE LA 
           MATERIA ASEGURADA, YA SEA QUE ESTÉN CONECTADOS O NO AL EQUIPO O MAQUINARIA OBJETO DEL SEGURO O QUE SE 
           ENCUENTREN OPERANDO O DURANTE SU TRAYECTO POR SUS PROPIOS MEDIOS O NO DENTRO O FUERA DE LOS PREDIOS.
        </div>
        <br/>
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:2%;"></td>
                <td style="width:15%; text-align:left;">Materia Asegurada:</td>
                <td style="width:60%; text-align:justify; border-bottom: 1px solid #000;
                    padding: 5px 3px;">
                	<?= $rowDt['pr_tipo'] ;?>
                </td>
                <td style="width:23%; text-align:left;"></td>
            </tr>
         </table>
         <br>
         <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:100%; font-weight:bold; text-align:left;" colspan="2">
                  Datos del Intermediario:</td>
            </tr>
            <tr>    
                <td style="width:15%; text-align:left;">Razón Social:</td>
                <td style="width:85%; text-align:left;">Sudamericana SRL</td>
            </tr>
            <tr>    
                <td style="width:15%; text-align:left;">Dirección:</td>
                <td style="width:85%; text-align:left;">Prolongación Cordero N&deg; 163 - San Jorge</td>
            </tr>
            <tr>    
                <td style="width:15%; text-align:left;">Teléfono:</td>
                <td style="width:85%; text-align:left;">(591)-2-2433500&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax: (591)-2-2128329</td>
            </tr>
         </table>
         <br>   
         
        
         <span style="font-weight:bold; font-size:90%;">3. Ubicación del Riesgo:</span><br>    
           
		<table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px;">
			<tr>
            	<td style="width:10%;">Departamento: </td>
                <td style="width:25%; border-bottom:1px solid #999;"><?=$rowDt['pr_departamento'];?></td>
                <td style="width:10%;">&nbsp;</td>
                <td style="width:13%;">Ciudad o localidad: </td>
                <td style="width:35%; border-bottom:1px solid #999;"><?=$rowDt['pr_departamento'];?></td>
                <td style="width:7%;">&nbsp;</td>
			</tr>
           	<tr>
               <td style="width:100%; padding-top:5px;" colspan="6">
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                    <tr>
                      <td style="width:5%;">Zona: </td>
                      <td style="width:88%; border-bottom:1px solid #999;" colspan="5"><?=$rowDt['pr_zona'];?></td>
                      <td style="width:7%;">&nbsp;</td>
                    </tr>
                  </table>
               </td>
			</tr>
		</table>
        <br>
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 90%; font-family: Arial;">
            <tr>
              <td style="width:20%; font-weight:bold;">4. Valor Total Asegurado:</td>
              <td style="width:20%; border-bottom:1px solid #999; text-align:center;">
			   <?=$valor_asegurado;?></td>
              <td style="width:20%; text-align:left; font-weight:bold;">(<?=$moneda;?>)</td>
              <td style="width:40%;">&nbsp;</td>
            </tr>
            
        </table>
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr> 
              <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <b>PARA BIENES INMUEBLES:</b><br>  
                Valor  de reposición a nuevo del inmueble, según el avalúo técnico (en poder del contratante / beneficiario)
                (no  se  considerará el valor del terreno)<br>  
                <b>PARA BIENES MUEBLES:</b><br> 
                Valor de reposición a nuevo de acuerdo a factura comercial y/o avalúo y/o documento equivalente.<br>
                <b>PARA EQUIPOS ELECTRÓNICOS:</b><br> 
                Valor de reposición a nuevo (incluyendo todo el costo hasta su puesta en marcha), de acuerdo a factura 
                comercial y/o avalúo y/o documento equivalente.
              </td>
              <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <b>PARA ROTURA DE MAQUINARIA Y EQUIPO MÓVIL:</b><br>
                Valor de reposición a nuevo, (incluyendo todo el costo hasta su puesta en marcha), de acuerdo a factura 
                comercial y/o avalúo y/o documento equivalente.	
                <br> 
                <b>PARA BIENES CON ANTIGÜEDAD DE MÁS DE 5 AÑOS O BIENES REACONDICIONADOS:</b><br> 
                El valor de reposición a nuevo o su valor de adquisición, siempre y cuando este valor de adquisición sea por
                lo menos equivalente a un 80% del valor de reposición a nuevo.
              </td>
            </tr>  
        </table>     
<?php
   $fecha=date('d/m/Y', strtotime($row['ini_vigencia']));
   $array=explode('/',$fecha);
   $day=$array[0];
   $month=$array[1];
   $year=$array[2];
?>                           
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 90%; font-family: Arial;">
            <tr>
              <td style="width:20%; font-weight:bold;">5. Fecha inicio de vigencia:</td>
              <td style="width:25%;">
                <table 
                    cellpadding="0" cellspacing="0" border="0" 
                    style="width: 100%; height: auto; font-size: 100%; font-family: Arial;">
                    <tr>
                      <td style="width:32%; border-bottom:1px solid #999; text-align:center;"><?=$day;?></td>
                      <td style="width:2%;">/</td>
                      <td style="width:32%; border-bottom:1px solid #999; text-align:center;"><?=$month;?></td>
                      <td style="width:2%;">/</td>
                      <td style="width:32%; border-bottom:1px solid #999; text-align:center;"><?=$year;?></td>
                    </tr>
                </table>    
              </td>
              <td style="width:55%;">&nbsp;</td>
            </tr>
        </table>
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 90%; font-family: Arial; margin-top:4px;">
            <tr>
              <td style="width:25%; font-weight:bold;">6. Plazo del contrato de seguros:</td>
              <td style="width:20%; border-bottom:1px solid #999; text-align:center;">
                <?=$row['tipo_plazo_text'];?>
              </td>
              <td style="width:55%; text-align:left;">El plazo de la póliza debe ser igual al plazo del crédito del  
              asegurado</td>
            </tr>
        </table>
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 90%; font-family: Arial; margin-top:4px;">
            <tr>
              <td style="width:15%; font-weight:bold;">7. Tasa Anual:</td>
              <td style="width:5%;">
                <?=number_format($row['tasa'], 2, '.', ',');?>
              </td>
              <td style="width:80%; text-align:left;">%o (por mil)</td>
            </tr>
        </table>
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 90%; font-family: Arial; margin-top:4px;">
            <tr>
              <td style="width:15%; font-weight:bold;">8. Forma de Pago:</td>
              <td style="width:20%; border-bottom:1px solid #999; text-align:center;">
                <?=$row['forma_pago'];?>
              </td>
              <td style="width:65%; text-align:left;">
               Pago de la prima de acuerdo a la periodicidad de pago del crédito</td>
            </tr>
        </table>
        <br><br><br><br>
        
        <table 
          cellpadding="0" cellspacing="0" border="0" 
          style="width: 100%; height: auto; font-size: 100%;">
          <tr>
             <td style="width:25%;"></td>
             <td style="width:35%;"></td>
             <td style="width:40%;">
               <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                  <tr>
                    <td valign="top" align="center" style="width:50%;">
                      <img src="<?=$url;?>img/firma1.jpg" width="110" height="50"/><br>
                      MIGUEL ANGEL BARRAGAN
                    </td>
                    <td valign="top" align="center" style="width:50%;">
                      <img src="<?=$url;?>img/firma2.jpg" width="94" height="50"/><br>
                      MARIANA JAUREGUI Q
                    </td>
                  </tr>  
               </table>   
             </td> 
          </tr>
          <tr>
             <td style="width:25%; border-top:1px solid #999; text-align:center;">Firma del Titular Solicitante</td>
             <td style="width:35%;">&nbsp;</td>
             <td style="width:40%; border-top:1px solid #999; text-align:center;">Firmas Autorizadas de la Compañia</td>
          </tr>
        </table>
       	<table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px;">
        	<?php
              if((boolean)$row['emitir']===true){
			?>
                <tr>
                  <td style="width:5%; text-align:left;">C.I.</td>
                  <td style="width:15%; border-bottom:1px solid #999; text-align:center;"><?=$row['cl_ci'];?></td>
                  <td style="width:2%;">&nbsp;</td>
                  <td style="width:12%; text-align:right;">Expedido en:</td>
                  <td style="width:12%; border-bottom:1px solid #333; text-align:center;"><?=$row['expedido']?></td>
                  <td style="width:54%;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="width:46%; padding-top:5px;" colspan="5">
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                      <tr>
                        <td style="width:20%; text-align:left;">Lugar y fecha:</td>
                        <td style="width:50%; border-bottom:1px solid #999; text-align:center;">
                          <?=$row['u_depto'].', '.date('d/m/Y', strtotime($row['fecha_emision']));?>
                        </td>
                        <td style="width:30%;">&nbsp;</td>
                      </tr>
                    </table>    
                  </td>
                  <td style="width:54%;">&nbsp;</td>
                </tr>
				<tr>
                  <td colspan="6" style="font-size:6pt;" align="right">
                    “Impreso el <?=date("d/m/Y")?>. El presente certificado reemplaza cualquier otro certificado impreso en fechas anteriores a la indicada.”
                  </td>
                </tr>
            <?php
			  }else{
			?>
               <tr>
                  <td style="width:5%;">C.I.</td>
                  <td style="width:15%; border-bottom:1px solid #999; text-align:center;"><?=$row['cl_ci'];?></td>
                  <td style="width:2%;">&nbsp;</td>
                  <td style="width:12%; text-align:right;">Expedido en:</td>
                  <td style="width:12%; border-bottom:1px solid #333; text-align:center;"><?=$row['expedido']?></td>
                  <td style="width:54%;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="width:46%;" colspan="5">
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                      <tr>
                        <td style="width:12%; text-align:right;">Lugar y fecha:</td>
                        <td style="width:15%; border-bottom:1px solid #333; text-align:center;">&nbsp;
                          
                        </td>
                        <td style="width:73%;">&nbsp;</td>
                      </tr>
                    </table>    
                  </td>
                  <td style="width:54%;">&nbsp;</td>
                </tr>
				<tr>
                  <td colspan="6" style="font-size:6pt;" align="right">
                    “Impreso el <?=date("d/m/Y")?>. El presente certificado reemplaza cualquier otro certificado impreso en fechas anteriores a la indicada.”
                  </td>
                </tr>
            <?php
			  }
			?>
		</table>
        <!---->
        <page><div style="page-break-before: always;">&nbsp;</div></page>
        
        <div style="width: 775px; border: 0px solid #FFFF00;">
          <table 
              cellpadding="0" cellspacing="0" border="0" 
              style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
              <tr>
                <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                  border:0px solid #333;" valign="top">
                  
                  <span style="font-weight: bold;">CONDICION DE ADHESION AL SEGURO:</span><br>
                  El Asegurado se adhiere voluntariamente a los términos establecidos en la presente Póliza de Seguro Colectivo
                  Multiriesgo y declara conocer y estar de acuerdo con las condiciones del contrato de 
                  seguro. Asimismo, acepta la obligación de pago de prima para mantener vigente la cobertura de la póliza.
                  La falta de pago de primas dará lugar a la suspensión inmediata de la cobertura.<br>
                  <span style="font-weight: bold;">COBERTURAS:</span><br>
                  <span style="font-weight: bold;">SECCION I: TODO RIESGO DE DAÑOS A LA PROPIEDAD</span><br/>
                  Todo riesgo de daños a la propiedad,  incluyendo terremoto, temblor,erupción volcánica y/o movimientos sísmicos al igual 
                  que el incendio resultante de estos, deslizamientos, asentamientos, hundimiento siempre y cuando no sean graduales,  
                  corrimientos de tierra, caída de rocas y otros riesgos de la naturaleza cualquiera sea su causa; 
                  terrorismo y riesgos políticos y sociales incluyendo huelgas, motines, conmoción civil, daño malicioso, 
                  vandalismo, sabotaje, asonada, disturbios de acuerdo texto de cláusula.<br>
                  
                  <span style="font-weight: bold;">SECCIÓN II: TODO RIESGO DE EQUIPO ELECTRONICO</span><br>	
                  Todo riesgo de equipo electrónico, incluyendo componentes electromecánicos; equipos móviles y/o 
                  portátiles, sus accesorios e instalaciones, equipos periféricos,  incluyendo:
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Robo con violencia, atraco</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Daños  emergentes a la energía eléctrica incluyendo cortes de electricidad.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Incendio, rayo, explosión de cualquier tipo, incluyendo los daños causados 
                      por extinción de incendio y operaciones de salvamento. </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Quemaduras superficiales y carbonización, humo, hollín</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Daños de la naturaleza como tempestad, inundación, granizo, cubiertos por la 
                      sección I del presente seguro.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Daños por agua, grifería y tanques cubierta por la sección I del presente 
                      seguro. Excluye humedad y corrosión por tratarse de daños graduales.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Equipos móviles y/o portátiles, hasta $us. 10.000.</td>
                    </tr>         
                  </table>
                  <span style="font-weight: bold;">SECCIÓN  III: TODO RIESGO Y/O DAÑO FISICO POR ROTURA DE MAQUINARIA 
                  </span><br>
                  Todo riesgo y/o daño físico por rotura de maquinaria, daños emergentes a la energía eléctrica, daños 
                  físicos a la maquinaria, sus instalaciones y equipos auxiliares de protección, control y suministro de 
                  servicios (aire, agua, vapor, energía eléctrica, gas natural), incluyendo:
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Robo con violencia</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Mal manejo, negligencia,  impericia, ignorancia, actos mal intencionados, por
                       parte de los  empleados y/o de terceros</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Errores, defectos y desperfectos de construcción y de uso  de materiales 
                      defectuosos</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Defectos y desperfectos y/o errores  en diseño, calculo y montaje y/o mano de
                       obra defectuosa</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Rotura por fuerzas centrifugas</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Falta de agua en calderos o recipientes bajo presión (calentamiento excesivo)
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Incidentes durante el trabajo, como malos ajustes, aflojamiento de partes y 
                      piezas 
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Fallas y/o desperfectos en medidas de prevención y seguridad
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Inducción, cualquiera sea su origen</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Cuerpos extraños que se introduzcan en los bienes asegurados o los golpeen</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Daños por la acción directa o indirecta de la energía eléctrica u atmosférica
                       y caída directa de rayo.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Incendio interno e implosión, incluye explosión química interna.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Explosión en motores de combustión interna.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Cláusula de riadas, lodos y/o anegación</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Bombas sumergidas y bombas para pozos profundos.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">El seguro se extiende a cubrir los componentes electrónicos que formen parte 
                      de la maquinaria.</td>
                    </tr>
                  </table> 	
                  <span style="font-weight: bold;">SECCIÓN IV:TODO RIESGO DE EQUIPO MOVIL 
                  </span><br>
                  Todo riesgo de equipo móvil incluyendo componentes electrónicos, rayo y explosión, terrorismo, huelgas, 
                  motines, conmoción civil, daño malicioso, vandalismo, sabotaje, saqueo y/o tumultos populares, y:
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Accidentes que surjan durante el montaje y/o desmontaje a consecuencia de su mantenimiento para fines de limpieza y reacondicionamiento y traslados dentro de los predios del asegurado  y/o mientras viajen por sus propios medios o sean transportados de un sitio de operación a otro, incluyendo daños por vuelcos, choque, embarrancamiento y/o incendio del medio transportador L.A.P.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Colisión con objetos en movimiento o estacionarios</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Robo con violencia y/o asalto, así como también los daños causados por dicho 
                      delito o su intento (excluye hurto y/o ratería)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Riesgos políticos y sociales</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Rotura de vidrios.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Gastos extraordinarios hasta el 20% de la suma asegurada.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Colisión con objetos en movimiento o estacionarios, volcamientos, hundimiento
                       de terreno, deslizamiento de tierra, descarrilamiento.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Accidentes que ocurran pese a un manejo correcto, así como los que 
                      sobrevengan por descuido, impericia o negligencia del conductor (salvo actos intencionales o 
                      negligencia manifiesta del asegurado o sus representantes).</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Pérdidas o daños causados por inundación, ciclón, huracán tempestad, vientos,
                       terremoto, temblor, erupción volcánica </td>
                    </tr>
                  </table>   

                </td>
                
                <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                  border:0px solid #333;" valign="top">
                                    
                  <span style="font-weight: bold;">DEDUCIBLE POR TODO Y CADA EVENTO</span><br>
                  <span style="font-weight: bold;">SECCIÓN I:</span> Por evento y/o reclamo<br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Riesgos políticos y terrorismo: 1% del valor asegurado por  ubicación, con un
                       mínimo de $us. 100.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Terremoto, temblor y movimientos  sísmicos: 1% del valor asegurado por 
                      ubicación, con un mínimo de $us. 100.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para robo con violencia al contenido: $us. 100.- (aplicable únicamente a 
                      riesgos domiciliarios); para otros riesgos:   $us. 250.- por toda y cada pérdida</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para las demás coberturas   $us. 50.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para las coberturas de asentamiento, hundimiento, deslizamiento, corrimiento de tierras, 5% del valor del reclamo con un mínimo de $us. 500.- por toda y cada pérdida</td>
                    </tr>
                  </table>
                  <span style="font-weight: bold;">SECCIONES II Y III:</span>Por evento y/o reclamo<br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Equipo médico: de acuerdo a la siguiente tabla de valores:</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Para equipos con un valor asegurado mayor a $us. 50.000.- 2% del valor del 
                      siniestro.  </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Demás equipos 2% del valor del siniestro mínimo $us. 250.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Equipo de telecomunicaciones: 2% del valor del siniestro mínimo $us. 250.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Equipos móviles y/o portátiles: 2% del valor del reclamo con un mínimo de 
                      $us. 250 por evento y/o reclamo.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Demás amparados: 1% del valor del reclamo con un mínimo de $us. 200.- por 
                      evento y/o reclamo</td>
                    </tr>
                  </table>
                  <span style="font-weight: bold;">SECCIÓN IV:</span>Por evento y/o reclamo<br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para la cobertura de vidrios $us. 20.- por evento y/o reclamodemás 
                      coberturas:</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para equipos con valores asegurados hasta $us. 50.000.- 2% del valor del 
                      siniestro.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para equipos con valores asegurados hasta $us. 250.000.- 1.5% del valor del 
                      siniestro.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Para equipos con valores asegurados mayores a $us. 250.000.- 1% del valor del 
                      siniestro</td>
                    </tr>
                  </table><br>
	              <span style="font-weight: bold;">EXCLUSIONES:</span><br>
                  De acuerdo a lo estipulado en el condicionado general y demás secciones de la póliza<br>
                  <span style="font-weight: bold;">SECCION I:</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">-</td> 
                      <td style="width:98%;">Dinero, joyas y/o valores</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Bienes inmuebles que estén ubicados en el lecho o cercanía de rios</td>
                    </tr>
                  </table>    
                  <span style="font-weight: bold;">SECCIÓN II:</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Satélites espaciales</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Software y licencias</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Daños por virus</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Daños mecánicos y eléctricos internos</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Demás exclusiones de acuerdo al condicionado general de la póliza.</td>
                     </tr>
                  </table>
                  <span style="font-weight: bold;">SECCIÓN III:</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">De acuerdo al condicionado general de la póliza.</td>
                     </tr>
                  </table>
                  <span style="font-weight: bold;">SECCIÓN IV:</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Equipos que operen bajo tierra</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Equipos que tengan placas de circulación</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Riesgos de perforación; riesgos petroleros y riesgos de   gas</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Demás exclusiones de acuerdo al condicionado general de la póliza.</td>
                     </tr>
                  </table>
                  <br>
                  <span style="font-weight: bold;">CLÁUSULAS ADICIONALES:</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Anexo para cubrir colapso de techos y/o paredes</td>
                    </tr>                    
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Valor de Reemplazo</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Elegibilidad de Ajustadores</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Rehabilitación Automática de la Suma Asegurada</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Flete Aéreo hasta el 5% del valor del reclamo máximo $us. 5.000.- </td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Rescisión del Contrato a Prorrata sujeto a no siniestralidad durante la vigencia </td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Daños por Incendio y/o Rayo directo o indirecto Aparatos Eléctricos</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Terremoto, temblor y erupciones volcánicas</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Riesgos Políticos y Terrorismo</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Robo con violencia a primer riesgo</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula para cubrir pérdidas y/o daños directos ocasionados por derrube, deslizamiento, asentamiento y/o corrimiento de tierras</td>
                    </tr>
                    
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Gastos de Investigación y Salvamento hasta el 5% del valor del reclamo con una máximo a $us. 10.000.- </td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Definición de Evento</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Errores y Omisiones</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de honorarios de Arquitectos, Ingenieros y Topografos.</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de remoción de escombros</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de Subrogación</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Anexo de Renovación Automática, hasta finalizar el crédito</td>
                    </tr>
                                        
                  </table>  

                </td>
              </tr>
          </table>        
        </div>
        
        <page><div style="page-break-before: always;">&nbsp;</div></page>
        
        <div style="width: 775px; border: 0px solid #FFFF00;">
          <table 
              cellpadding="0" cellspacing="0" border="0" 
              style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
              <tr>
                <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                  border:0px solid #333;" valign="top">
                  
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">De gastos extraordinarios, hasta el 20% del valor del reclamo, máximo $us 100.000.-</td>
                    </tr>
                    
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">De ampliación de aviso de siniestro hasta 15 días a partir de que el contratante tiene conocimiento del evento. queda establecido que cualquier reparación, arreglo o adquisición que el asegurado deba realizar para la reposición o reparación del bien dañado, debe contar con la autorización expresa de la compañía.  </td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">De adelanto del 50% en caso de siniestro una vez declarado procedente el reclamo y habiéndose establecido el monto aproximado de la pérdida.</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">De inclusiones y exclusiones.</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">De traslado temporal, incluyendo uso, mantenimiento, reparación y daños durante su transporte (bajo cláusula L.A.P.)</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Ampliación de vigencia a prorrata, bajo los mismos términos y condiciones incluyendo tasas pactadas, hasta 90 días.</td>
                    </tr>
                    <tr>
                      <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                      <td style="width:98%;">Cláusula de hundimiento, siempre y cuando no sea gradual</td>
                    </tr>
                  </table><br>
                  <span style="font-weight: bold;">APLICABLES A LA SECCIÓN IV (EQUIPO MÓVIL)</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">Cobertura para el tránsito por sus propios medios, siempre y cuando el 
                       equipo móvil se traslade de un proyecto a otro, o a su garaje.</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">-</td>
                       <td style="width:98%;">De rehabilitación automática de la suma asegurada.</td>
                     </tr>
                  </table><br>
                  <span style="font-weight: bold;">CONDICIONES GENERALES Y EXCLUSIONES:</span>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:2%;" valign="top">&bull;</td>
                       <td style="width:98%;">De acuerdo al Condicionado General de Seguros y Reaseguros Credinform 
                       International S.A., para Póliza de Seguro Multiriesgo con Registro No. 102-910951-2007 10 100</td>
                     </tr>
                  </table><br>
                  <span style="font-weight: bold;">PROCEDIMIENTO EN CASO DE SINIESTRO:</span><br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:100%;" valign="top">
                         Al ocurrir un siniestro que pueda dar lugar a indemnización conforme a esta Póliza, el 
                         Asegurado deberá: a) Notificar el siniestro por escrito a la Compañía, via e-mail o fax, indicando la naturaleza y extensión de los daños, a más tardar dentro de los tres días de tener conocimiento del mismo, salvo fuerza mayor o impedimento justificado; b) Tomar todas las acciones dentro de sus medios para minimizar la pérdida o daño; c) Preparar una declaración firmada acerca del siniestro que contenga un detalle, dentro de lo razonablemente posible, acerca de sus causas, los ítems o partes afectadas y su valorización; d) El Asegurado no está facultado para  abandonar ningún bien siniestrado a la Compañía, sea que este haya tomado posesión de él o no.
                         <br>La Compañía debe pronunciarse sobre el derecho del asegurado dentro de los treinta días de recibidas la información y evidencia. Se dejará constancia escrita de la fecha de recepción de la información y evidencias a afecto del cómputo del plazo.
                       </td>
                     </tr>
                  </table>  
                </td>
                
                <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                  border:0px solid #333;" valign="top">
                  
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:100%;" valign="top">
                          En caso de demora u omisión del asegurado en proporcionar la información y evidencias sobre el siniestro, el término señalado no corre hasta el cumplimiento de estas obligaciones.<br>
                          Establecido el derecho del asegurado y el monto de la indemnización, la Compañía debe pagar su obligación según el contrato, dentro de los sesenta días siguientes.<br>
                          Las partes intervinientes, acuerdan que toda discrepancia, cuestión o reclamación resultante de la ejecución o interpretación de la Póliza o relacionado con ella, directa o indirectamente, se resolverá definitivamente mediante Conciliación o Arbitraje en el marco del Centro de Conciliación y Arbitraje de la Cámara Nacional de Comercio y de acuerdo por la ley No. 1770 de fecha 10 de Marzo de 1997.    
                       </td>
                     </tr>
                  </table>
                  <br>
                  <span style="font-weight: bold;">IMPORTANTE:</span><br>
                  La responsabilidad indemnizatoria de la Compañía está limitada como máximo al Valor Total Asegurado o 
                  declarado, el cual no puede ser superior a USD. 4.000.000,00 ó sus equivalentes en Moneda Nacional 
                  (Bolivianos)<br><br>

                  <span style="font-weight: bold;">REQUISITOS:</span><br>
                  Avalúo técnico firmado por el perito designado por Idepro ifd o documento equivalente, donde se 
                  especifique la materia del seguro.<br><br>
                  
                  <span style="font-weight: bold;">NOTAS ESPECIALES:</span><br>
                  El asegurado autoriza a la compañía de seguros a enviar el reporte a la central de riesgos del mercado 
                  de seguros acorde a las normativas reglamentarias de la autoridad de fiscalización y control de 
                  pensiones y seguros – APS.<br><br>
                  
                  <span style="font-weight: bold;">ACEPTACIONES ESPECIALES:</span><br><br>
                  
                  Los siguientes riesgos, deben ser consultados a la Compañía previo a la emisión de la Póliza:
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                     <tr>
                       <td style="width:2%;" valign="top">1.</td>
                       <td style="width:98%;">Bienes inmuebles que estén ubicados en el lecho o cercanía de ríos</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">2.</td>
                       <td style="width:98%;">Riesgos textiles incluyendo riesgos azucareros y algodoneros</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">3.</td>
                       <td style="width:98%;">Riesgos mineros</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">4.</td>
                       <td style="width:98%;">Fábricas de plástico, plastoformo, polietileno, papel, cartón, algodón</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">5.</td>
                       <td style="width:98%;">Discotecas, Pubs y Karaokes</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">6.</td>
                       <td style="width:98%;">Ferias, exposición y eventos</td>
                     </tr>
                     <tr>
                       <td style="width:2%;" valign="top">7.</td>
                       <td style="width:98%;">Industrias químicas y/o todas aquellas donde los insumos sean sustancias 
                       inflamables y/o pinturas</td>
                     </tr>
                  </table>
                  Nota: Estos riesgos deben ser previamente aprobados por la compañía, en caso de no ser así el 
                  certificado de cobertura entregado al cliente no tendrá cobertura. 
                  
                </td>  
              </tr>
              <tr>
                <td colspan="2" style="width:100%; font-style:italic; font-weight:bold; text-align:justify;">
                  “Se comunica a los clientes que para la emisión de las facturas por los Contratos de Seguros de Garantías (Automotores y Multiriesgo) emitidos por Credinform International S.A., se adopta la modalidad de Facturación Electrónica, de conformidad a la Resolución RND N°. 10-0016-07 del Servicio de Impuestos Nacionales, en virtud de la cual las Notas fiscales serán emitidas a partir de los sistemas informáticos de Idepro, previa interacción con los sistemas informáticos del SIN y de Credinform International S.A., debiendo el cliente proceder al recojo de dichas Notas Fiscales en las oficinas de Idepro. Por tanto es única y total responsabilidad de los clientes recabar sus Notas Fiscales de mencionada instalación”.  
                </td>
              </tr>
              <tr>
                <td colspan="2" style="width:100%;">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" style="width:100%;">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" style="width:100%;">
                  <table 
                    cellpadding="0" cellspacing="0" border="0" 
                    style="width: 100%; height: auto; font-size: 100%;">
                    <tr>
                       <td style="width:25%;"></td>
                       <td style="width:35%;"></td>
                       <td style="width:40%;">
                         <table 
                            cellpadding="0" cellspacing="0" border="0" 
                            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                            <tr>
                              <td valign="top" align="center" style="width:50%;">
                                <img src="<?=$url;?>img/firma1.jpg" width="110" height="50"/><br>
                                MIGUEL ANGEL BARRAGAN
                              </td>
                              <td valign="top" align="center" style="width:50%;">
                                <img src="<?=$url;?>img/firma2.jpg" width="94" height="50"/><br>
                                MARIANA JAUREGUI Q
                              </td>
                            </tr>  
                         </table>   
                       </td> 
                    </tr>
                    <tr>
                       <td style="width:25%; border-top:1px solid #999; text-align:center;">Firma del Titular Solicitante</td>
                       <td style="width:35%;">&nbsp;</td>
                       <td style="width:40%; border-top:1px solid #999; text-align:center;">Firmas Autorizadas de la Compañia</td>
                    </tr>
                  </table>
                  <table 
                    cellpadding="0" cellspacing="0" border="0" 
                    style="width: 100%; height: auto; font-size: 100%; font-family: Arial; margin-top:4px;">
                        <tr>
                          <td style="width:5%; text-align:left;">C.I.</td>
                          <td style="width:15%; border-bottom:1px solid #999; text-align:center;"><?=$row['cl_ci'];?></td>
                          <td style="width:2%;">&nbsp;</td>
                          <td style="width:12%; text-align:right;">Expedido en:</td>
                          <td style="width:12%; border-bottom:1px solid #333; text-align:center;"><?=$row['expedido']?></td>
                          <td style="width:54%;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td style="width:46%; padding-top:5px;" colspan="5">
                            <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                              <tr>
                                <td style="width:20%; text-align:left;">Lugar y fecha:</td>
                                <td style="width:50%; border-bottom:1px solid #999; text-align:center;">
                                  <?=$row['u_depto'].', '.date('d/m/Y', strtotime($row['fecha_emision']));?>
                                </td>
                                <td style="width:30%;">&nbsp;</td>
                              </tr>
                            </table>    
                          </td>
                          <td style="width:54%;">&nbsp;</td>
                        </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="2" style="width:100%;">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" style="width:100%;">
                   <table 
                        cellpadding="0" cellspacing="0" border="0" 
                        style="width: 100%; height: auto; font-size: 70%; font-family: Arial;">
                        <tr>
                          <td style="width:100%; text-align:left; font-weight:bold;">
<?php
                           $queryVar = 'set @anulado = "Polizas Anuladas: ";';
                           if($link->query($queryVar,MYSQLI_STORE_RESULT)){
                               $canceled="select 
                                              max(@anulado:=concat(@anulado, prefijo, '-', no_emision, ', ')) as cert_canceled
                                          from
                                              s_trd_em_cabecera
                                          where
                                              anulado = 1
                                                  and id_cotizacion = '".$row['idc']."';";
                               if($resp = $link->query($canceled,MYSQLI_STORE_RESULT)){
                                   $regis = $resp->fetch_array(MYSQLI_ASSOC);
                                   echo trim($regis['cert_canceled'],', ');
                               }else{
                                   echo "Error en la consulta "."\n ".$link->errno. ": " . $link->error;
                               }
                           }else{
                             echo "Error en la consulta "."\n ".$link->errno. ": " . $link->error;   
                           }                
?>              
                          </td>
                        </tr>
                   </table>  
                </td>
              </tr>
          </table>     
        </div>
        <!--
        <page><div style="page-break-before: always;">&nbsp;</div></page>
        
        <div style="width: 775px; border: 0px solid #FFFF00;">
          <table 
              cellpadding="0" cellspacing="0" border="0" 
              style="width: 100%; height: auto; font-size: 90%; font-family: Arial;">
              <tr> 
                <td style="width:50%; font-size:100%; text-align: center; padding:5px; 
                   font-weight:bold; padding-top:30px;" valign="top">
                   <u>RESUMEN DE COBERTURAS</u>
                </td>
              </tr>
              <tr><td style="width:100%; height:25px;">&nbsp;</td></tr>
              <tr>
                <td style="width:100%; text-align:justify; padding-bottom:10px;">
                  Estimado Cliente, deseamos recordarle que la Póliza de Multiriesgo contratada cuenta con las siguientes coberturas principalmente:
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:left; font-weight:bold;">
                   SECCION I: TODO RIESGO DE DAÑOS A LA PROPIEDAD
                </td>
              </tr>
              <tr>
                <td style="width:100%; padding-top:10px; padding-bottom:10px;">
                   <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                      <tr>
                        <td style="width:2%; font-size:100%;" valign="top">-</td>
                        <td style="width:98%;">
                          Todo riesgo de daños a la propiedad, incluyendo terremoto, temblor y/o movimientos sísmicos 
                          al igual que el incendio resultante de estos, deslizamientos, asentamientos no graduales, 
                          hundimiento, corrimientos de tierra, caída de rocas y otros riesgos de la naturaleza 
                          cualquiera sea su causa; terrorismo y riesgos políticos y sociales incluyendo huelgas, 
                          motines, conmoción civil, daño malicioso, vandalismo, sabotaje, asonada, disturbios de 
                          acuerdo texto de cláusula.
                        </td>
                      </tr>
                   </table>
                </td> 
              </tr>
              <tr>
                <td style="width:100%; text-align:justify;">
                   <b>SECCION II: TODO RIESGO DE EQUIPO ELECTRONICO</b><br><br>
                   Todo Riesgo de equipo electrónico, incluyendo componentes electromecánicos, equipos móviles y/o portátiles, sus accesorios e instalaciones, equipos periféricos, incluyendo:
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:left; padding-top:10px; padding-bottom:10px;">
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Robo con violencia, atraco</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Daños emergentes a la energía eléctrica incluyendo cortes de electricidad</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Incendio, rayo, explosión de cualquier tipo, incluyendo los daños causados por extinción de incendio y operaciones de salvamenteo</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Quemaduras superficiales y carbonización, humo, hollín</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Daños de la naturaleza como tempestad, inundación, granizo, cubiertos por la sección I del presente seguro
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Daños por agua, grifería y tanques cubierta por la sección I del presente seguro. excluye humedad y corrosión por tratarse de daños graduales
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Equipos móviles y/o portátiles, hasta $us. 10.000
                          </td>
                        </tr>
                     </table>
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:justify;">
                 <b>SECCION III: TODO RIESGO Y/O DAÑO FISICO POR ROTURA DE MAQUINARIA</b><br><br>
                 Todo riesgo y/o daño físico por rotura de maquinaria, daños emergentes a la energía eléctrica, daños físicos a la maquinaria, sus instalaciones y equipos auxiliares de protección, control y suministro de servicios (aire, agua, vapor, energía eléctrica, gas natural) incluyendo:
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:left; padding-top:10px; padding-bottom:10px;">
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Robo con violencia</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Mal manejo, negligencia,  impericia, ignorancia, actos mal intencionados, por parte de los  empleados y/o de terceros</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Errores, defectos y desperfectos de construcción y de uso  de materiales defectuosos</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Defectos y desperfectos y/o errores  en diseño, cálculo y montaje y/o mano de obra defectuosa</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Rotura por fuerzas centrifugas
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Falta de agua en calderos o recipientes bajo presión (calentamiento excesivo)
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Incidentes durante el trabajo, como malos ajustes, aflojamiento de partes y piezas
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Fallas y/o desperfectos en medidas de prevención y seguridad
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Inducción, cualquiera sea su origen
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Cuerpos extraños que se introduzcan en los bienes asegurados o los golpeen
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Daños por la acción directa o indirecta de la energía eléctrica u atmosférica y caída directa de rayo
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Incendio interno e implosión, incluye explosión química interna
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Cláusula de riadas, lodos y/o anegación
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Bombas sumergidas y bombas para pozos profundos
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">El seguro se extiende a cubrir los componentes electrónicos que formen parte de la maquinaria
                          </td>
                        </tr>
                     </table>
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:justify;">
                 <b>SECCION IV: TODO RIESGO DE EQUIPO MOVIL</b><br><br>
                 Todo riesgo de equipo móvil incluyendo componentes electrónicos, rayo y explosión, terrorismo, huelgas, motines, conmoción civil, daño malicioso, vandalismo, sabotaje, saqueo y/o tumultos populares, y:
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:left; padding-top:10px; padding-bottom:10px;">
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                        <tr>
                          <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">-</td>
                          <td style="width:98%;">Accidentes que surjan durante el montaje y/o desmontaje a consecuencia de su mantenimiento para fines de limpieza y reacondicionamiento y traslados dentro de los predios del asegurado  y/o mientras viajen por sus propios medios o sean transportados de un sitio de operación a otro, incluyendo daños por vuelcos, choque, embarrancamiento y/o incendio del medio transportador L.A.P.</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Colisión con objetos en movimiento o estacionarios</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Robo con violencia y/o asalto, así como también los daños causados por dicho delito o su intento (excluye hurto y/o ratería)</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Riesgos políticos y sociales</td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Rotura de vidrios
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Gastos extraordinarios hasta el 20% de la suma asegurada
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Colisión con objetos en movimiento o estacionarios, volcamientos, hundimiento de terreno, deslizamiento de tierra, descarrilamiento
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Accidentes que ocurran pese a un manejo correcto, así como los que sobrevengan por descuido, impericia o negligencia del conductor (salvo actos intencionales o negligencia manifiesta del asegurado o sus representantes)
                          </td>
                        </tr>
                        <tr>
                          <td style="width:2%; font-size:100%;" valign="top">-</td>
                          <td style="width:98%;">Pérdidas o daños causados por inundación, ciclón, huracán tempestad, vientos, terremoto, temblor, erupción volcánica
                          </td>
                        </tr>
                     </table>
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:justify; padding-bottom:10px;">
                 Asimismo, aprovechamos para mencionarle que ante cualquier eventualidad, debe contactarse con la línea gratuita 800103070 de Sudamericana, quienes le brindaran la asistencia y asesoramiento correspondiente.
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:justify;">
                 <b>NOTA IMPORTANTE:</b><br><br>
Deseamos recordarle que debe recabar sus facturas por el concepto de pago de prima de dicha póliza a través de cualquiera de las oficinas de Idepro, las cuales serán emitidas según la periodicidad de pago de su Crédito.

                </td>
              </tr>
          </table>
        </div>
        -->
<?php     
		}
	}
	
	if($ct<2){
?>
		   <page><div style="page-break-before: always;">&nbsp;</div></page>
<?php	
	}   
	$ct++;
}
?>
		
        
	    </div>
</div>
<?php
	if ($implant === TRUE) {
		$url .= 'index.php?ms='.md5('MS_TRD').'&page='.md5('P_app_imp').'&ide='.base64_encode($row['id_emision']).'';
?>
<br>
<div style="width:500px; height:auto; padding:10px 15px; border:1px solid #00FFFF; background:#9FE0FF; color:#303030; font-size:10px; font-weight:bold; text-align:justify;">
	Solicitud de Aprobaci&oacute;n: P&oacute;liza: <?=$row['prefijo'].'-'.$row['no_emision'];?><br><br>
</div>
<div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
	Para procesar la solicitud ingrese al siguiente link con sus credenciales de usuario:<br>
	<a href="<?=$url;?>" target="_blank">Procesar Solicitud de Aprobaci&oacute;n</a>
</div>
<?php
	}
	$html = ob_get_clean();
	return $html;
}
?>