<?php
function trd_sc_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$conexion = $link;
	
	$fontSize = 'font-size: 80%;';
	$fontsizeh2 = 'font-size: 80%';
	$width_ct = 'width: 700px;';
	$width_ct2 = 'width: 695px;';
	$marginUl = 'margin: 0 0 0 20px; padding: 0;';
	$marginUl2 = 'margin: 0 0 0 0; padding: 0;';
		
	//$imagen = getimagesize($url.'images/'.$row['logo_cia']);
	$dir_cia = $url.'images/'.$row['logo_cia'];
	$dir_logo = $url.'images/'.$row['logo_ef'];   
	//$ancho = $imagen[0];            
    //$alto = $imagen[1];
	$query_t='select 
		  id_tasa,
		  id_ef_cia,
		  tasa_anio
		from
		  s_tasa_trd
		where
		  id_ef_cia="'.$row['id_ef_cia'].'";';  
	$result = $link->query($query_t,MYSQLI_STORE_RESULT);
	$row_t = $result->fetch_array(MYSQLI_ASSOC);
	 
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
              <img src="<?=$dir_logo;?>" height="75"/>
           </td>
           <td style="width:32%;"></td>
           <td style="width:34%; text-align:right;">
              <img src="<?=$dir_cia;?>" height="75"/>
           </td>
         </tr>
         <tr><td colspan="3">&nbsp;</td></tr>
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
           <td style="width:25%; text-align:center; font-weight:bold;">Apellido Paterno</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Apellido Materno</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Nombres</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Apellido de Casada</td>
         </tr>
         <tr>
           <td style="width:25%; text-align:center;"><?=$row['paterno'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['materno'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['nombre'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['ap_casada'];?></td>
         </tr>
          <tr style="font-weight:bold;">
           <td style="width:25%; text-align:center; font-weight:bold;">Calle o Avenida</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Dirección</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Numero</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Ciudad o localidad</td>
         </tr>
         <tr>
           <td style="width:25%; text-align:center;"><?=$row['avenida'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['direccion'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['no_domicilio'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['localidad'];?></td>
         </tr>
         <tr style="font-weight:bold;">
           <td style="width:25%; text-align:center; font-weight:bold;">Telefono Domicilio</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Telefono Oficina</td>
           <td style="width:50%; text-align:center; font-weight:bold;" colspan="2">Telefono Celular</td>
         </tr>
         <tr>
           <td style="width:25%; text-align:center;"><?=$row['telefono_domicilio'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['telefono_oficina'];?></td>
           <td style="width:50%; text-align:center;" colspan="2"><?=$row['telefono_celular'];?></td>
         </tr>
         <tr style="font-weight:bold;">
           <td style="width:25%; text-align:center; font-weight:bold;">Direccion laboral</td>
           <td style="width:25%; text-align:center; font-weight:bold;">Descripción ocupación</td>
           <td style="width:50%; text-align:center; font-weight:bold;" colspan="2">Ocupación</td>
         </tr>
         <tr>
           <td style="width:25%; text-align:center;"><?=$row['direccion_laboral'];?></td>
           <td style="width:25%; text-align:center;"><?=$row['desc_ocupacion'];?></td>
           <td style="width:50%; text-align:center;" colspan="2"><?=$row['ocupacion'];?></td>
         </tr>
      </table><br/>		
    
     
     <span style="font-weight:bold; font-size:80%;">Interés Asegurado - Ubicación del Riesgo</span><br>
     
        <table 
          cellpadding="0" cellspacing="0" border="0" 
          style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <?php
              while($rowDt = $rsDt->fetch_array(MYSQLI_ASSOC)){
				  $year = $link->get_year_final($row['plazo'], $row['tipo_plazo']);	  
			?>
                <tr>
                 <td style="width:20%; text-align:left; text-align:center;" colspan="3"><b>Materia Asegurada</b></td>
                 <td style="width:20%; text-align:center;"><b>Valor Asegurado (USD)</b></td>
                 <td style="width:20%; text-align:center;"><b>Prima</b></td>
                </tr>
                <tr>
                 <td style="width:20%; text-align:left;" colspan="3"><?=$rowDt['tipo_inmueble'];?></td>
                 <td style="width:20%; text-align:center;"><?=number_format($rowDt['valor_asegurado'],2,".",",");?></td>
                 <td style="width:20%; text-align:center;"><?php
                    if($row['fmp_code']=='CO'){ 
					  $raw_result = ($rowDt['valor_asegurado']*$row_t['tasa_anio'])/1000;
					  $multiplication_data=$raw_result*$year;
					  $data_discount = ($multiplication_data*10)/100;
					  $discount_result = $multiplication_data-$data_discount;
					  echo $discount_result;
			        }else{
					   echo ($rowDt['valor_asegurado']*$row_t['tasa_anio'])/1000;	 
					}
				 ?></td>
                </tr>
                <tr>
                 <td style="width:20%; text-align:center;"><b>Departamento</b></td>
                 <td style="width:20%; text-align:center;"><b>Zona</b></td>
                 <td style="width:20%; text-align:center;"><b>Ciudad o Localidad</b></td>
                 <td style="width:20%; text-align:center;"><b>Dirección</b></td>
                 <td style="width:20%; text-align:center;"></td> 
                </tr>
                <tr> 
                 <td style="width:20%; text-align:center;"><?=$rowDt['departamento'];?></td>
                 <td style="width:20%; text-align:center;"><?=$rowDt['zona'];?></td>
                 <td style="width:20%; text-align:center;"><?=$rowDt['localidad'];?></td>
                 <td style="width:20%; text-align:center;"><?=$rowDt['direccion'];?></td>
                 <td style="width:20%;">&nbsp;</td>
                </tr> 
            <?php
			  }
			?>
        </table><br/>
     
     <span style="font-weight:bold; font-size:80%;">Datos de Solicitud</span><br>
     <table 
          cellpadding="0" cellspacing="0" border="0" 
          style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr>
           <td style="width:50%; text-align:right;"><b>Compañía de Seguros:</b></td>
           <td style="width:50%;"><?=$row['compania'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Seguro a contratar:</b></td>
           <td style="width:50%;">Todo Riesgo Domiciliario</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Periodo de contratacion:</b></td>
           <td style="width:50%;"><?=$row['tip_plazo_text'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Forma de Pago:</b></td>
           <td style="width:50%;"><?=$row['forma_pago'];?></td>
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
      
      <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr> 
              <td style="width:100%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <b>MATERIA DEL SEGURO</b><br>
                <b>INMUEBLES:</b> PROPIEDADES SIN PROHIBICIÓN NI EXCLUSIÓN NI RESTRICCIÓN DE GIRO DE NEGOCIO Y/O ACTIVIDADES Y/O TIPO DE RIESGO EN LOS QUE SE DESARROLLEN LAS ACTIVIDADES DE LOS CLIENTES, EXCEPTO LAS EXCLUIDAS EXPRESAMENTE EN ÉSTA PÓLIZA.
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">EN CASO DE BIENES INMUEBLES:
                         <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                           <tr>
                             <td style="width:2%;" valign="top">-</td>
                             <td style="width:98%;">INCLUYENDO EN TODOS LOS CASOS,OBRAS CIVILES Y SUS INSTALACIONES, INCLUYENDO LUMINARIAS, ALFOMBRADO (SIEMPRE Y CUANDO ESTÉN INCLUIDAS EN EL AVALÚO TÉCNICO), REVESTIMIENTOS; VIDRIOS, ACCESORIOS SANITARIOS, MUROS PERIMETRALES, TANQUES; ESTACIONAMIENTOS, ÁREAS DE DEPÓSITO Y LA PARTE PROPORCIONAL DE ÁREAS COMUNES, CUANDO CORRESPONDA.</td>
                           </tr>
                           <tr>
                             <td style="width:2%;" valign="top">-</td>
                             <td style="width:98%;">INCLUYENDO INMUEBLES DOMICILIARIOS, COMERCIALES O INMUEBLES INDUSTRIALES. Se aclara que el valor asegurado máximo para riesgos industriales es de hasta USD 200.000 por bien declarado.</td>
                           </tr>
                         </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:100%;" colspan="2" align="left"><b>MAQUINARIA Y MAQUINARIA PESADA MÓVIL:</b> (GRÚAS, PALAS MECÁNICAS, EXCAVADORAS, CAMIONES CONCRETEROS, MOTONIVELADORAS, TRACTORES, Y OTROS SIMILARES), INCLUYENDO SUS EQUIPOS AUXILIARES QUE SE ENCUENTREN DECLARADOS DENTRO DE LA MATERIA ASEGURADA, YA SEA QUE ESTÉN CONECTADOS O NO AL EQUIPO O MAQUINARIA OBJETO DEL SEGURO O QUE SE ENCUENTREN OPERANDO O DURANTE SU TRAYECTO POR SUS PROPIOS MEDIOS O NO DENTRO O FUERA DE LOS PREDIOS.</td>
                    </tr>
                </table><br>
                <b>UBICACION DEL RIESGO:</b> A NIVEL NACIONAL<br><br>
                <b>COBERTURAS:</b><br><b>SECCION I TODO RIESGO DE DAÑOS A LA PROPIEDAD</b><br>
                TODO RIESGO DE DAÑOS A LA PROPIEDAD,  INCLUYENDO TERREMOTO, TEMBLOR Y/O MOVIMIENTOS SÍSMICOS AL IGUAL QUE EL INCENDIO RESULTANTE DE ESTOS, DESLIZAMIENTOS, ASENTAMIENTOS NO GRADUALES, HUNDIMIENTO, CORRIMIENTOS DE TIERRA, CAÍDA DE ROCAS Y OTROS RIESGOS DE LA NATURALEZA CUALQUIERA SEA SU CAUSA; TERRORISMO Y RIESGOS POLÍTICOS Y SOCIALES INCLUYENDO HUELGAS, MOTINES, CONMOCIÓN CIVIL, DAÑO MALICIOSO, VANDALISMO, SABOTAJE, ASONADA, DISTURBIOS DE ACUERDO TEXTO DE CLÁUSULA.<br><br>
                  <b>SECCIÓN  II: TODO RIESGO DE EQUIPO ELECTRONICO	</b><br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:100%;" align="left">TODO RIESGO DE EQUIPO ELECTRÓNICO, INCLUYENDO COMPONENTES ELECTROMECÁNICOS; EQUIPOS MÓVILES Y/O PORTÁTILES, SUS ACCESORIOS E INSTALACIONES, EQUIPOS PERIFERICOS, INCLUYENDO:
                        <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">ROBO CON VIOLENCIA, ATRACO .</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">DAÑOS  EMERGENTES A LA ENERGÍA ELÉCTRICA INCLUYENDO CORTES DE ELECTRICIDAD.</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">INCENDIO, RAYO, EXPLOSIÓN DE CUALQUIER TIPO, INCLUYENDO LOS DAÑOS CAUSADOS POR EXTINCIÓN DE INCENDIO Y OPERACIONES DE SALVAMENTO.</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">QUEMADURAS SUPERFICIALES Y CARBONIZACIÓN, HUMO, HOLLÍN</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">Daños DE LA NATURALEZA COMO TEMPESTAD, INUNDACIÓN, GRANIZO, CUBIERTOS POR LA SECCIÓN I DEL PRESENTE SEGURO.</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">DAÑOS POR AGUA, GRIFERIA Y TANQUES CUBIERTA POR LA SECCIÓN I DEL PRESENTE SEGURO. EXCLUYE HUMEDAD Y CORROSIÓN POR TRATARSE DE DAÑOS GRADUALES.</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">&raquo;</td>
                              <td style="width:98%;">EQUIPOS MÓVILES Y/O PORTÁTILES, HASTA $us. 10.000.</td>
                            </tr>
                        </table>
                      </td>
                    </tr>
                  </table><br>
                  <b>SECCIÓN  III: TODO RIESGO Y/O DAÑO FISICO POR ROTURA DE MAQUINARIA</b><br> 
TODO RIESGO Y/O DAÑO FÍSICO POR ROTURA DE MAQUINARIA, DAÑOS EMERGENTES A LA ENERGÍA ELÉCTRICA, DAÑOS FÍSICOS A LA MAQUINARIA, SUS INSTALACIONES Y EQUIPOS AUXILIARES DE PROTECCIÓN, CONTROL Y SUMINISTRO DE SERVICIOS (AIRE, AGUA, VAPOR, ENERGÍA ELÉCTRICA, GAS NATURAL), INCLUYENDO: 
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ROBO CON VIOLENCIA .</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">MAL MANEJO, NEGLIGENCIA,  IMPERICIA, IGNORANCIA, ACTOS MAL INTENCIONADOS, POR PARTE DE LOS  EMPLEADOS Y/O DE TERCEROS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ERRORES, DEFECTOS Y DESPERFECTOS DE CONSTRUCCIÓN Y DE USO  DE MATERIALES DEFECTUOSOS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DEFECTOS Y DESPERFECTOS Y/O ERRORES  EN DISEÑO, CALCULO Y MONTAJE Y/O MANO DE OBRA DEFECTUOSA.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ROTURA POR FUERZAS CENTRIFUGAS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">FALTA DE AGUA EN CALDEROS O RECIPIENTES BAJO PRESIÓN (CALENTAMIENTO EXCESIVO)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">INCIDENTES DURANTE EL TRABAJO, COMO MALOS AJUSTES, AFLOJAMIENTO DE PARTES Y PIEZAS </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">FALLAS Y/O DESPERFECTOS EN MEDIDAS DE PREVENCIÓN Y SEGURIDAD</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">INDUCCIÓN, CUALQUIERA SEA SU ORIGEN</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CUERPOS EXTRAÑOS QUE SE INTRODUZCAN EN LOS BIENES ASEGURADOS O LOS GOLPEEN </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DAÑOS POR LA ACCIÓN DIRECTA O INDIRECTA DE LA ENERGÍA ELÉCTRICA U ATMOSFÉRICA Y CAÍDA DIRECTA DE RAYO. </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">INCENDIO INTERNO E IMPLOSIÓN, INCLUYE EXPLOSIÓN QUÍMICA INTERNA.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">EXPLOSIÓN EN MOTORES DE COMBUSTIÓN INTERNA.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULAS DE RIADAS, LODOS Y/O ANEGACION</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">BOMBAS SUMERGIDAS Y BOMBAS PARA POZOS PROFUNDOS.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">EL SEGURO SE EXTIENDE A CUBRIR LOS COMPONENTES ELECTRÓNICOS QUE FORMEN PARTE DE LA MAQUINARIA.</td>
                    </tr>
                  </table><br>
                  <b>SECCIÓN IV:TODO RIESGO DE EQUIPO MOVIL</b><br>
TODO RIESGO DE EQUIPO MÓVIL INCLUYENDO COMPONENTES ELECTRÓNICOS, RAYO Y EXPLOSIÓN, TERRORISMO, HUELGAS, MOTINES, CONMOCIÓN CIVIL, DAÑO MALICIOSO, VANDALISMO, SABOTAJE, SAQUEO Y/O TUMULTOS POPULARES, Y:<br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ACCIDENTES QUE SURJAN DURANTE EL MONTAJE Y/O DESMONTAJE A CONSECUENCIA DE SU MANTENIMIENTO PARA FINES DE LIMPIEZA Y REACONDICIONAMIENTO Y TRASLADOS DENTRO DE LOS PREDIOS DEL ASEGURADO  Y/O MIENTRAS VIAJEN POR SUS PROPIOS MEDIOS O SEAN TRANSPORTADOS DE UN SITIO DE OPERACIÓN A OTRO, INCLUYENDO DAÑOS POR VUELCOS, CHOQUE, EMBARRANCAMIENTO Y/O INCENDIO DEL MEDIO TRANSPORTADOR L.A.P.</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">COLISIÓN CON OBJETOS EN MOVIMIENTO O ESTACIONARIOS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ROBO CON VIOLENCIA Y/O ASALTO, ASÍ COMO TAMBIÉN LOS DAÑOS CAUSADOS POR DICHO DELITO O SU INTENTO (Excluye Hurto y/o ratería)</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">RIESGOS POLÍTICOS Y SOCIALES</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ROTURA DE VIDRIOS.</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">GASTOS EXTRAORDINARIOS HASTA EL 20% DE LA SUMA ASEGURADA.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">COLISIÓN CON OBJETOS EN MOVIMIENTO O ESTACIONARIOS, VOLCAMIENTOS, HUNDIMIENTO
                       DE TERRENO, DESLIZAMIENTO DE TIERRA, DESCARRILAMIENTO.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ACCIDENTES QUE OCURRAN PESE A UN MANEJO CORRECTO, ASÍ COMO LOS QUE 
                      SOBREVENGAN POR DESCUIDO, IMPERICIA O NEGLIGENCIA DEL CONDUCTOR (SALVO ACTOS INTENCIONALES O 
                      NEGLIGENCIA MANIFIESTA DEL ASEGURADO O SUS REPRESENTANTES).</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">PÉRDIDAS O DAÑOS CAUSADOS POR INUNDACIÓN, CICLÓN, HURACÁN TEMPESTAD, VIENTOS,
                       TERREMOTO, TEMBLOR, ERUPCIÓN VOLCÁNICA.</td>
                    </tr> 
                  </table><br>
                  
                  <b>VALORES  ASEGURADOS:</b><br>
                   <b>PARA BIENES INMUEBLES:</b><br>  
VALOR  DE REPOSICIÓN A NUEVO DEL INMUEBLE (VALOR DE LA CONSTRUCCIÓN), SEGÚN EL AVALÚO TÉCNICO (EN PODER DEL CONTRATANTE / BENEFICIARIO)  (NO  SE  CONSIDERARÁ EL VALOR DEL TERRENO)<br><br>  

                   <b>PARA BIENES MUEBLES:</b><br> 
VALOR DE REPOSICIÓN A NUEVO DE ACUERDO A FACTURA COMERCIAL Y/O AVALÚO Y/O DOCUMENTO EQUIVALENTE.<br><br>

				  <b>PARA EQUIPOS ELECTRÓNICOS:</b><br> 
VALOR DE REPOSICIÓN A NUEVO (INCLUYENDO TODO EL COSTO HASTA SU PUESTA EN MARCHA), DE ACUERDO A FACTURA COMERCIAL Y/O AVALÚO Y/O DOCUMENTO EQUIVALENTE.<br><br>  

				  <b>PARA ROTURA DE MAQUINARIA Y EQUIPO MÓVIL:</b><br>
VALOR DE REPOSICIÓN A NUEVO, (INCLUYENDO TODO EL COSTO HASTA SU PUESTA EN MARCHA), DE ACUERDO A FACTURA COMERCIAL Y/O AVALÚO Y/O DOCUMENTO EQUIVALENTE.<br><br>
	
                  <b>PARA BIENES CON ANTIGÜEDAD DE MÁS DE 5 AÑOS O BIENES REACONDICIONADOS:</b><br> 
EL VALOR DE REPOSICIÓN A NUEVO O SU VALOR DE ADQUISICIÓN, SIEMPRE Y CUANDO ESTE VALOR DE ADQUISICIÓN SEA POR LO MENOS EQUIVALENTE A UN 80% DEL VALOR DE REPOSICIÓN A NUEVO.<br><br>

                  <b>CLÁUSULAS ADICIONALES:</b><br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ANEXO PARA CUBRIR COLAPSO DE TECHOS Y/O PAREDES</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE VALOR DE REEMPLAZO</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE ELEGIBILIDAD DE AJUSTADORES</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE REHABILITACIÓN AUTOMÁTICA DE LA SUMA ASEGURADA</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE FLETE AÉREO HASTA EL 5% DEL VALOR DEL RECLAMO MÁXIMO $us. 5.000.- </td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE RESCISIÓN DEL CONTRATO A PRORRATA SUJETO A NO SINIESTRALIDAD DURANTE LA VIGENCIA </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DAÑOS POR INCENDIO Y/O RAYO DIRECTO O INDIRECTO APARATOS ELÉCTRONICOS </td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE TERREMOTO, TEMBLOR Y ERUPCIONES VOLCÁNICAS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE RIESGOS POLÍTICOS Y TERRORISMO</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE ROBO CON VIOLENCIA A PRIMER RIESGO</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLAUSULA PARA CUBRIR PÉRDIDAS Y/O DAÑOS DIRECTOS OCASIONADOS POR DERRUMBE, DESLIZAMIENTO, ASENTAMIENTO Y/O CORRIMIENTO DE TIERRAS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE GASTOS DE INVESTIGACIÓN Y SALVAMENTO HASTA EL 5% DEL VALOR DEL RECLAMO CON UNA MÁXIMO A $us. 10.000.- </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE DEFINICIÓN DE EVENTO</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE ERRORES Y OMISIONES</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE HONORARIOS DE ARQUITECTOS, INGENIEROS Y TOPOGRAFOS.</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE REMOCIÓN DE ESCOMBROS</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE SUBROGACIÓN</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">ANEXO DE RENOVACIÓN AUTOMÁTICA, HASTA FINALIZAR EL CRÉDITO</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">GASTOS DE INVESTIGACIÓN Y SALVAMENTO, HASTA EL 5% DEL VALOR DEL RECLAMO  CON UN MÁXIMO DE USD 10.000.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE GASTOS EXTRAORDINARIOS, HASTA EL 20% DEL VALOR DEL RECLAMO, MÁXIMO $us 100.000.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DAÑOS OCASIONADOS POR SALVAMENTO Y LA EXTINCIÓN DE INCENDIOS, HASTA EL 5% DEL VALOR DEL RECLAMO, MÁXIMO $us. 10.000.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE AMPLIACIÓN DE AVISO DE SINIESTRO HASTA 15 DÍAS A PARTIR DE QUE EL CONTRATANTE TIENE CONOCIMIENTO DEL EVENTO. QUEDA ESTABLECIDO QUE CUALQUIER REPARACIÓN, ARREGLO O ADQUISICIÓN QUE EL ASEGURADO DEBA REALIZAR PARA LA REPOSICIÓN O REPARACIÓN DEL BIEN DAÑADO, DEBE CONTAR CON LA AUTORIZACIÓN EXPRESA DE LA COMPAÑÍA.  </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE ADELANTO DEL 50% EN CASO DE SINIESTRO UNA VEZ DECLARADO PROCEDENTE EL RECLAMO Y HABIÉNDOSE ESTABLECIDO EL MONTO APROXIMADO DE LA PÉRDIDA.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE TRASLADO TEMPORAL, INCLUYENDO USO, MANTENIMIENTO, REPARACIÓN Y DAÑOS DURANTE SU TRANSPORTE (BAJO CLÁUSULA L.A.P.)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE INCLUSIONES Y EXCLUSIONES.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE TRASLADO TEMPORAL, INCLUYENDO USO, MANTENIMIENTO, REPARACIÓN Y DAÑOS DURANTE SU TRANSPORTE (BAJO CLÁUSULA L.A.P.)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">AMPLIACIÓN DE VIGENCIA A PRORRATA, BAJO LOS MISMOS TÉRMINOS Y CONDICIONES INCLUYENDO TASAS PACTADAS, HASTA 90 DÍAS.</td>
                    </tr> 
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">CLÁUSULA DE HUNDIMIENTO, SIEMPRE Y CUANDO NO SEA GRADUAL</td>
                    </tr>     
                  </table><br>
                  <b>APLICABLES A LA SECCIÓN IV (EQUIPO MÓVIL)</b><br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">COBERTURA PARA EL TRÁNSITO POR SUS PROPIOS MEDIOS, SIEMPRE Y CUANDO EL EQUIPO MÓVIL SE TRASLADE DE UN PROYECTO A OTRO, O A SU GARAJE.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DE REHABILITACIÓN AUTOMÁTICA DE LA SUMA ASEGURADA.</td>
                    </tr>
                  </table><br>
                  
                  <b>DEDUCIBLES:</b><br>
                  
                  <b>SECCIÓN I:POR EVENTO Y/O RECLAMO</b><br> 
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">RIESGOS POLÍTICOS Y TERRORISMO: 1% DEL VALOR ASEGURADO POR  UBICACIÓN, CON UN MÍNIMO DE $us 100.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">TERREMOTO, TEMBLOR Y MOVIMIENTOS  SÍSMICOS: 1% DEL VALOR ASEGURADO POR UBICACIÓN, CON UN MÍNIMO DE $us 100.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">PARA ROBO CON VIOLENCIA AL CONTENIDO: $us100.- (APLICABLE ÚNICAMENTE A RIESGOS DOMICILIARIOS); para otros riesgos:   $us 250 por toda y cada pérdida</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">PARA LAS DEMÁS COBERTURAS   $us 50.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">PARA LAS COBERTURAS DE ASENTAMIENTO, HUNDIMIENTO, DESLIZAMIENTO, CORRIMIENTO DE TIERRAS, 5% DEL VALOR DEL RECLAMO CON UN MÍNIMO DE $us 500.- POR TODA Y CADA PÉRDIDA</td>
                    </tr>
                  </table><br>
                  <b>SECCIONES II Y III: POR EVENTO Y/O RECLAMO</b><br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">EQUIPO MEDICO: DE ACUERDO A LA SIGUIENTE TABLA DE VALORES:
                         <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                            <tr>
                             <td style="width:2%;">&rsaquo;</td>
                             <td style="width:98%;">PARA EQUIPOS CON UN VALOR ASEGURADO MAYOR A $us 50.000.- 2% DEL VALOR DEL SINIESTRO.  </td>
                            </tr>
                            <tr>
                             <td style="width:2%;">&rsaquo;</td>
                             <td style="width:98%;">DEMÁS EQUIPOS 2% DEL VALOR DEL SINIESTRO MÍNIMO $us 250.-</td>
                            </tr>
                         </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">EQUIPO DE TELECOMUNICACIONES: 2% DEL VALOR DEL SINIESTRO MÍNIMO $us. 250.-,  EQUIPOS MOVILES</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DEMÁS AMPARADOS: 1% DEL VALOR DEL RECLAMO CON UN MÍNIMO DE $us. 200.- POR EVENTO Y/O RECLAMO</td>
                    </tr>
                  </table><br>
                  <b>SECCIÓN IV: POR EVENTO Y/O RECLAMO</b><br>
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">PARA LA COBERTURA DE VIDRIOS $us. 20.- POR EVENTO Y/O RECLAMO</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">DEMÁS COBERTURAS:
                         <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                            <tr>
                              <td style="width:2%;" valign="top">-</td>
                              <td style="width:98%;">PARA EQUIPOS CON VALORES ASEGURADOS HASTA $us 50.000, 2% DEL VALOR DEL SINIESTRO.</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">-</td>
                              <td style="width:98%;">PARA EQUIPOS CON VALORES ASEGURADOS HASTA $us 250.000, 1.5% DEL VALOR DEL SINIESTRO.</td>
                            </tr>
                            <tr>
                              <td style="width:2%;" valign="top">-</td>
                              <td style="width:98%;">PARA EQUIPOS CON VALORES ASEGURADOS MAYORES A $us 250.000, 1% DEL VALOR DEL SINIESTRO</td>
                            </tr>
                         </table>    
                      </td>
                    </tr>
                  </table>
                  LOS DEDUCIBLES ESTÁN SUJETOS A LA COBERTURA CONTRATADA<br><br>
                  
                  <b>ACEPTACIONES ESPECIALES:</b><br>
                  Los siguientes riesgos, deben ser consultados a la Compañía previo a la emisión de la Póliza:
                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Riesgos textiles incluyendo riesgos azucareros y algodoneros</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Riesgos mineros</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Fábricas de plástico, plastoformo, polietileno, papel, cartón, algodón</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Discotecas, Pubs y Karaokes</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Ferias, exposición y eventos</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Industrias químicas y/o todas aquellas donde los insumos sean sustancias inflamables y/o pinturas</td>
                    </tr>
                  </table><br>
                  <b>Exclusiones</b><br>
                  De acuerdo a lo estipulado en el Condicionado General y demás secciones de la Póliza<br>
                  SECCION I:<br>
                   -Dinero, joyas y/o valores<br>
                   -Bienes inmuebles que estén ubicados en el lecho o cercanía de rios<br>
                  SECCIÓN II:
                    -SATÉLITES ESPACIALES<br>
                    -SOFTWARE Y LICENCIAS<br>
                    -DAÑOS POR VIRUS<br>
                    -DAÑOS MECÁNICOS Y ELÉCTRICOS INTERNOS<br>
                    -DEMÁS EXCLUSIONES DE ACUERDO AL CONDICIONADO GENERAL DE LA PÓLIZA.<br>
                    SECCIÓN III:<br>
                    -DE ACUERDO AL CONDICIONADO GENERAL DE LA PÓLIZA.<br>
                    SECCIÓN IV:<br>
                    -EQUIPOS QUE OPEREN BAJO TIERRA<br>
                    -EQUIPOS QUE TENGAN PLACAS DE CIRCULACIÓN<br>
                    -RIESGOS DE PERFORACIÓN; RIESGOS PETROLEROS Y RIESGOS DE   GAS<br>
                    -DEMÁS EXCLUSIONES DE ACUERDO AL CONDICIONADO GENERAL DE LA PÓLIZA.<br>
                    
                    SECCIÓN V:<br>
                    -DE ACUERDO AL CONDICIONADO GENERAL DE LA PÓLIZA.<br><br>
                    <span style="font-weight: bold;">IMPORTANTE:</span><br>
                  La responsabilidad indemnizatoria de la Compañía está limitada como máximo al Valor Total Asegurado o 
                  declarado, el cual no puede ser superior a USD. 4.000.000,00 ó sus equivalentes en Moneda Nacional 
                  (Bolivianos)<br><br> 
                  <b>REQUISITOS:</b><br>
                    Avalúo técnico firmado por el perito designado por IDEPRO IFD o documento equivalente, donde se especifique la materia del seguro.<br><br> 
                    <span style="font-weight: bold;">NOTAS ESPECIALES:</span><br>
                  El asegurado autoriza a la compañía de seguros a enviar el reporte a la central de riesgos del mercado 
                  de seguros acorde a las normativas reglamentarias de la autoridad de fiscalización y control de 
                  pensiones y seguros – APS.<br><br>
                  
                  <span style="font-weight: bold;">ACEPTACIONES ESPECIALES:</span><br>
                  
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
                  </table><br><br>
                    
                    Si un riesgo industrial supera en valor asegurado los $us 200.000.- debe ser consultado para su aceptación a la Compañía  Caso contrario, el límite máximo de indemnización asumido por la Compañía será el de $us 200.000.- 
      
              </td>
            </tr>                
      </table><br><br><br><br>   
        
      <table 
         cellpadding="0" cellspacing="0" border="0" 
         style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr>
           <td style="text-align:center; width:33%;"><?=$row['nombre'].' '.$row['paterno'].' '.$row['materno']?></td>
           <td style="text-align:center; width:34%;"><?=$row['ci']?></td>
           <td style="text-align:center; width:33%;"><?=date('d-m-Y');?></td>
         </tr> 
         <tr>
           <td style="text-align:center; width:33%;"><b>Firma del Titular Asegurado</b></td>
           <td style="text-align:center; width:34%;"><b>C.I.</b></td>
           <td style="text-align:center; width:33%;"><b>Fecha de Solicitud</b></td>
         </tr>
     </table>
        
        
       
       
       	
    </div>
</div>
<?php
	$html = ob_get_clean();
	return $html;
}
?>