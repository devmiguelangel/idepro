<?php
function de_em_pec_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '', $type) {
	$conexion = $link;
	$h2 = 'width: auto; height: auto; text-align: left; margin: 0; padding: 2px 0px; font-weight: bold;';
	$input_question = 'display: inline-block; width: 12px; height: 10px; margin: 0 0 0 2px; text-align: center; 		vertical-align: baseline; border: 1px solid #0F0F0F;';
	if($type=='PDF'){
	  $width='width: 1020px;';
	  $font_size = 'font-size:9px;';
	  $marginUl = 'margin: 0 0 0 -20px; padding: 0;';
	}else{
	  $width='width: 950px;';
	  $font_size = 'font-size:8px;';
	  $marginUl = 'margin: 0 0 0 20px; padding: 0;';
	}
	
	
	ob_start();
	$num_titulares = $rsDt->num_rows;
	while($regi = $rsDt->fetch_array(MYSQLI_ASSOC)){
		$jsonData = $regi['respuesta'];
        $phpArray = json_decode($jsonData, true);
?>
        <div id="content_cert">
            <div id="c_main" style="<?=$width;?> height: auto; border: 0px solid #000; margin:5px;">
            
                <div style="<?=$width;?> border: 0px solid #FFFF00; ">
                    <table 
                          cellpadding="3" cellspacing="10" border="0" 
                          style="width: 100%; height: auto; <?=$font_size;?> font-family: Arial;">
                        <tr>
                            <td style="width: 48%; text-align:justify;" valign="top">
                                <span style="font-weight: bold;">2.3 ASISTENCIA DE EDUCACION TELEFÓNICA</span><br/><br/>
                                UYAS se propone contribuir a la difusión y mejor compresión de las temáticas economías y
                                financieras, en el convencimiento de que estas deben incorporarse como un ingrediente natural en
                                la vida cotidiana de todos. Mediante este servicio, UYAS ofrece asesoramiento financiero básico 
                                en forma telefónica. El cliente podrá realizar consultas a un profesional en la materia, sobre:
                                <br/><br/>
                                <ol style="<?=$marginUl;?> list-style-type:none; width:80%;">
                                    <li>Asusntos financieros</li>
                                    <li>Noticias financieras</li>
                                    <li>Leyes financieras</li> 
                                    <li>Reglamentos financieras</li>
                                    <li>Herramientas y parámetros básicos para administrar su dinero y realizar seguimiento de
                                     sus finanzas.</li>
                                    <li>Mantenerse informado sobre asuntos financieros relacionados.</li> 
                                    <li>Como administrar su dinero.</li>
                                    <li>Como planificar su presupuesto</li>
                                    <li>Como planificar su ahorro</li>
                                    <li>Como planificar sus gastos.</li>
                                    <li>Claves en el proceso de toma de decisiones económicas.</li>
                                </ol><br/>
                                <span style="font-weight: bold;">TERCERA: EXCLUSIONES</span><br/><br/>
                                No son objeto de la cobertura de asistencias, los siguientes servicios y hechos:<br/><br/>
                                <ol style="<?=$marginUl;?> list-style-type:none; width:80%;">
                                    <li>Los servicios que el ASEGURADO haya concertado por su cuenta sin previo consentimiento 
                                    de la empresa terciarizada, salvo caso de  fuerza mayor que le impida comunicarse con 
                                    ésta.</li>
                                    <li>Los gastos de asistencia médica, hospitalaria o sanitaria.</li>
                                </ol><br/>
                                <span style="font-weight: bold;">CUARTA: REQUISITOS PARA UTILIZAR EL SERVICIO</span><br/><br/>
                                <ol style="<?=$marginUl;?> list-style-type:none; width:80%;">
                                    <li>Ser ASEGURADO de la Póliza</li>
                                    <li>Tener las primas pagadas en los plazos establecidos en el Condicionado General y
                                     Particular de la Póliza.</li>
                                </ol><br/>
                                La empresa que brindará la asistencia podrá solicitar información para validar la identidad del
                                usuario/ASEGURADO antes de otorgar el servicio de asistencia.<br/><br/>
                                <span style="font-weight: bold;">QUINTA: RECLAMOS</span><br/><br/> 
                                Nacional Vida Seguros de Personas S.A.  canalizará, todos los reclamos que se originen en el 
                                servicio brindado por la Empresa de Servicio de Asistencias o por las empresas que éste contrate
                                para brindar el servicio objeto de las Asistencias Adicionales cubiertas por ésta Póliza, 
                                limitándose  su responsabilidad solamente a la canalización del reclamo, el asegurado tendrá la
                                facultad de iniciar o continuar acciones contra la empresa de asistencias por mal servicio.<br/><br/>
                                Todos los demás términos y condiciones de la Póliza no se modifican y permanecen en pleno vigor.    
                            </td>
                            <td style="width:4%;">&nbsp;</td>  
                            <td style="width: 48%; text-align:justify;" valign="top">
                                <div style="text-align: left;">
                                    <img src="<?=$url;?>images/<?=$row['logo_cia'];?>" height="43"/>
                                </div>
                                <div style="text-align: right; font-weight: bold;">
                                    DECLARACION JURADA DE SALUD<br/>SOLICITUD DE SEGURO DE VIDA EN GRUPO
                                </div><br/>
                                Estimado Cliente, agradeceremos completar la información que se requiere a continuación: 
                                (utilice letra clara)<br/><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">1. DATOS PERSONALES: (TITULAR)</h2>
                                <div style="border: 0px solid #FFFF00; width:100%;">
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                         <td style="width: 100%; text-align:left; <?=$font_size;?>">Nombres y Apellidos: </td>
                                       </tr>
                                       <tr> 
                                         <td style="width: 42%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['nombre'].' '.$regi['apellidos'];?></td>
                                       </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                          <tr>
                                              <td style="width: 70%; height: 12px;">
                                                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                      <tr>
                                                          <td style="width: 40%; text-align:left; <?=$font_size;?>">Lugar y Fecha de Nacimiento: </td>
                                                          <td style="width: 60%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['lugar_nacimiento'].' '.$regi['fecha_nacimiento'];?></td>
                                                      </tr>
                                                  </table>
                                              </td>
                                              <td style="width: 30%; height: 12px;">
                                                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                      <tr>
                                                          <td style="width: 20%; text-align:left; <?=$font_size;?>">Sexo: </td>
                                                          <td style="width: 80%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['sexo'];?></td>
                                                      </tr>
                                                  </table>
                                              </td>
                                          </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                          <tr>
                                              <td style="width: 60%; height: 12px;">
                                                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                      <tr>
                                                          <td style="width: 35%; text-align:left; <?=$font_size;?>">Carné de Identidad: </td>
                                                          <td style="width: 35%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['ci_document'];?></td>
                                                          <td style="width: 10%; text-align:left; <?=$font_size;?>">Edad</td>
                                                          <td style="width: 20%; border-bottom: 1px solid #000; <?=$font_size;?> text-align:center;"><?=$regi['edad'];?></td>
                                                      </tr>
                                                  </table>
                                              </td>
                                              <td style="width: 40%; height: 12px;">
                                                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                      <tr>
                                                          <td style="width: 10%; text-align:left; <?=$font_size;?>">Peso: </td>
                                                          <td style="width: 35%; border-bottom: 1px solid #000; <?=$font_size;?> text-align:center;"><?=$regi['peso'];?> kg.</td>
                                                          <td style="width: 20%; text-align:left; <?=$font_size;?>">Estatura:</td>
                                                          <td style="width: 35%; border-bottom: 1px solid #000; <?=$font_size;?> text-align:center;"><?=$regi['estatura'];?> cm.</td>
                                                      </tr>
                                                  </table>
                                              </td>
                                          </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                          <td style="width: 50%; height: 12px;">
                                              <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                  <tr>
                                                      <td style="width: 17%; text-align:left; <?=$font_size;?>">Dirección: </td>
                                                      <td style="width: 83%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['direccion_domicilio'];?></td>
                                                  </tr>
                                              </table>
                                          </td>
                                          <td style="width: 50%; height: 12px;">
                                              <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                                  <tr>
                                                      <td style="width: 20%; text-align:left; <?=$font_size;?>">Tel. Dom.:</td>
                                                      <td style="width: 32%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['telefono_domicilio'];?></td>
                                                      <td style="width: 16%; text-align:left; <?=$font_size;?>">Tel. Of.:</td>
                                                      <td style="width: 32%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['telefono_oficina'];?></td>
                                                  </tr>
                                              </table>
                                          </td>
                                       </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                         <td style="width: 10%; text-align:left; <?=$font_size;?>">Ocupación: </td>
                                         <td style="width: 90%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regi['ocupacion'];?></td>
                                       </tr>
                                    </table>
                                </div><br/>
                                <?php
								  $selectBnfi="select
											  concat(nombre,' ',paterno,' ',materno) as beneficario,
											  ci,
											  parentesco
											from
											  s_de_beneficiario
											where
											  id_detalle='".$regi['id_detalle']."' and cobertura='VG';";
								  $resbnfi = $conexion->query($selectBnfi,MYSQLI_STORE_RESULT);
								  $regibnfi = $resbnfi->fetch_array(MYSQLI_ASSOC);			  
								?>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">2. BENEFICIARIO</h2>
                                <div style="border: 0px solid #FFFF00; width:100%;">
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                         <td style="width: 20%; text-align:left; <?=$font_size;?>">Nombre y Apellido: </td>
                                         <td style="width: 45%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regibnfi['beneficario'];?></td>
                                         <td style="width: 13%; text-align:left; <?=$font_size;?>">Parentesco: </td>
                                         <td style="width: 22%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regibnfi['parentesco'];?></td>
                                       </tr>
                                    </table>
                                </div><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">3. CUESTIONARIO</h2>
                                <div style="border: 0px solid #FFFF00; width:100%;">
                                	<?php 
									  echo'<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; height: auto; font-family: Arial;">';
											$ti=1; $order=0;
											foreach ($phpArray as $key => $value) {
												$vec=explode('|',$value);
												$id_pregunta=$vec[0];
												$respuesta=$vec[1];
												$selectPrg="select
															pregunta,
															respuesta,
															orden
														  from
															s_pregunta
														  where
															id_pregunta=".$id_pregunta.";";
												$resprg = $conexion->query($selectPrg,MYSQLI_STORE_RESULT);
												$regiprg = $resprg->fetch_array(MYSQLI_ASSOC);	
												if($regiprg['orden']==1 || $regiprg['orden']==2 || $regiprg['orden']==6){		 	                                                $order++; 
										   
													echo'<tr>
															<td valign="top" align="center" style="width: 5%; '.$font_size.'">'.$order.'</td>
															<td style="width: 75%; '.$font_size.'">'.$regiprg['pregunta'].'</td>
															<td style="width: 20%; text-align:center;">
																<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; height: auto; font-family: Arial;">
																	<tr>';
																	if($respuesta==1){
																		echo'<td style="width: 50%; '.$font_size.'" align="center">Si <div style="'.$input_question.'">X</div></td>';
																		echo'<td style="width: 50%; '.$font_size.'" align="center">No <div style="'.$input_question.'">&nbsp;</div></td>';
																	}elseif($respuesta==0){
																		echo'<td style="width: 50%; '.$font_size.'" align="center">Si <div style="'.$input_question.'">&nbsp;</div></td>';
																		echo'<td style="width: 50%; '.$font_size.'" align="center">No <div style="'.$input_question.'">X</div></td>';
																	}
																		
															   echo'</tr>
																</table>
															</td>
														</tr>';
														
												}
												
												$ti++;	
											}     
									  echo'</table>';
									?>  
                                </div><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">4. SI ALGUNA DE SUS RESPUESTAS ES AFIRMATIVA, FAVOR BRINDAR DETALLES:</h2>
                                <div style="border: 0px solid #FFFF00; width:100%;">
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                         <td style="width: 100%; border-bottom: 1px solid #000; <?=$font_size;?>">
										 <?php
                                            if(!empty($regi['observacion']))
											   echo $regi['observacion'];
											else
											   echo '&nbsp;';   
										 ?>
                                         </td>
                                       </tr>
                                       <!--<tr><td style="width:100%;">&nbsp;</td></tr>-->
                                       <tr>  
                                         <td style="width: 100%; border-bottom: 1px solid #000;">&nbsp;</td>
                                       </tr>
                                    </table>
                                </div><br/>
                                Declaro haber contestado con total veracidad, máxima buena fe a todas las preguntas del presente 
                                cuestionario y no haber omitido u ocupado hechos y/o circunstancias que hubiera podido influir en
                                la celebración del contrato de seguro. Las declaraciones de salud  que hacen anulable el Contrato
                                de Seguros y en la que el asegurado pierde su derecho a indemnización,  se enmarcan en los 
                                artículos 992, 993, 999 y 1038 del Código de Comercio.<br/><br/>
                                Relevo expresamente del secreto profesional y legal, a cualquier médico que me hubiese asistido 
                                y/o tratado de dolencias y le autorizo a revelar a Nacional Vida Seguros de Personas S.A. todos
                                los datos y antecedentes patológicos que pudiera tener o de los que hubiera  adquirido 
                                conocimiento al prestarme sus servicios. Entiendo que de presentarse alguna eventualidad 
                                contemplada bajo la póliza de seguro como consecuencia de alguna enfermedad existente a la fecha
                                de la firma de este documento o cuando haya alcanzado la edad límite estipulada en la póliza, la
                                compañía aseguradora quedará liberada de toda la responsabilidad en lo que respecta a mí seguro.<br/><br/><br/><br/><br/>
                                
                                <table cellpadding="0" cellspacing="0" border="0" 
                                      style="width: 100%; height: auto; font-family: Arial;">
                                   <tr>
                                     <td style="width: 15%; text-align:left; font-weight:bold; <?=$font_size;?>">Lugar y Fecha:</td>
                                     <td style="width: 45%; border-bottom: 1px solid #000; <?=$font_size;?> text-align:center;"><?=$row['user_departamento'].' '.$row['fecha_emision'];?></td>
                                     <td style="width: 10%; text-align:left; font-weight:bold; <?=$font_size;?>">Firma:</td>
                                     <td style="width: 30%; border-bottom: 1px solid #000;">&nbsp;</td>
                                   </tr>
                                   <tr>
                                     <td style="width: 15%;">&nbsp;</td>
                                     <td style="width: 45%;">&nbsp;</td>
                                     <td style="width: 10%;">&nbsp;</td>
                                     <td style="width: 30%; text-align:center; font-weight:bold; <?=$font_size;?>" valign="top">ASEGURADO</td>
                                   </tr>
                                </table><br/><br/><br/>
                                NACIONAL VIDA SEGURO DE PERSONAS S.A., Santa Cruz Tel. Piloto: (591-3) 371-6262. Fax: (591-3) 
                                3337969 – La Paz Tel. Piloto (591-2) 244-2942. Fax: (591-2) 244-2905 - Cochabamba Tel. Piloto:
                                (591-4) 448-7050. Fax:(591-4) 448-7054 – Sucre Tel. Piloto (591-4) 642-5197. Fax: (591-4)
                                642-5196-Beni Tel/fax (591-3• 462 2500<br/><br/><br/><br/> 
                                <table cellpadding="0" cellspacing="0" border="0" 
                                      style="width: 100%; height: auto; font-family: Arial;">
                                   <tr>
                                     <td style="width: 35%; text-align:left; font-weight:bold; <?=$font_size;?>">Form./NV.COM.VTS-03.F2 Versión 2.0</td>
                                     <td style="width: 35%;">&nbsp;</td>
                                     <td style="width: 30%; text-align:left; font-weight:bold; <?=$font_size;?>">206-934601-2000 03 005-3021</td>
                                     
                                   </tr>
                                </table>
                            </td>
                        </tr>    
                    </table>                      
                </div>
                
                <page><div style="page-break-before: always;">&nbsp;</div></page>
                
                <div style="<?=$width;?> border: 0px solid #FFFF00; ">
                    <table 
                          cellpadding="3" cellspacing="10" border="0" 
                          style="width: 100%; height: auto; <?=$font_size;?> font-family: Arial;">
                        <tr>
                            <td style="width: 48%; text-align:justify;" valign="top">
                                <div style="text-align: center; font-weight: bold;">
                                    CERTIFICADO INDIVIDUAL DE SEGURO Nº   <?=$row['no_emision'];?><br/>
                                    PÓLIZA DE SEGURO DE VIDA EN GRUPO <br/>
                                    POL-VG-LP-00000181-2014-00<br/>
                                    (Formato aprobado de la S.P.V.S. mediante Resolución Administrativa N° 081 del 10/03/00)<br/> 
                                    206-934601-2000 03 005-3004 
                                </div><br/>
                                NACIONAL   VIDA   Seguros   de   Personas   S.A., (denominada   en   adelante “La   Compañía"),
                                por   el   presente   CERTIFICADO   INDIVIDUAL   DE SEGURO hace  constar que 
                                <?=$regi['nombre'].' '.$regi['apellidos'];?> (denominado  en  adelante  el “Asegurado”),  está
                                protegido  por  la  Póliza  de Seguro de Vida en Grupo arriba mencionada y de acuerdo con la 
                                misma está asegurado bajo las siguientes condiciones:<br/><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">1. COBERTURAS VALORES ASEGURADOS</h2>
                                <div style="border: 0px solid #FFFF00; width:100%;">
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                         <td style="width: 10%;">&nbsp;</td>
                                         <td style="width: 20%; text-align:left; <?=$font_size;?>">VIDA</td>
                                         <td style="width: 40%;">&nbsp;</td>
                                         <td style="width: 30%; text-align:left; <?=$font_size;?>">$us. 3,000.00</td>
                                       </tr>
                                    </table>
                                </div><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">2. PAGO DE LAS INDEMNIZACIONES</h2><br/>
                                La  Compañía  después  de  recibir  prueba  fehaciente  sobre  el  fallecimiento  del  Asegurado,
                                ocurrido  mientras  gozaba  de  protección  bajo  el  presente seguro, pagará al Beneficiario la 
                                suma asegurada.<br/> 
                                Los  pagos  serán  hechos por la Compañía por conducto del Contratante.<br/><br/>
                                <?php
								  $selectBf="select
											  concat(nombre,' ',paterno,' ',materno) as beneficiario,
											  ci,
											  parentesco
											from
											  s_de_beneficiario
											where
											  id_detalle='".$regi['id_detalle']."' and cobertura='VG';";
								  $resbf = $conexion->query($selectBf,MYSQLI_STORE_RESULT);
								  $regibf = $resbf->fetch_array(MYSQLI_ASSOC);			  
								?>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">3. BENEFICIARIO</h2>
                                <div style="border: 0px solid #FFFF00; width:100%;"><br/>
                                    <table cellpadding="0" cellspacing="0" border="0" 
                                          style="width: 100%; height: auto; font-family: Arial;">
                                       <tr>
                                         <td style="width: 10%; text-align:left; <?=$font_size;?>">Nombre</td>
                                         <td style="width: 45%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regibf['beneficiario'];?></td>
                                         <td style="width: 12%; text-align:left; <?=$font_size;?>">Parentesco</td>
                                         <td style="width: 23%; border-bottom: 1px solid #000; <?=$font_size;?>"><?=$regibf['parentesco'];?></td>
                                         <td style="width: 10%; text-align:left; <?=$font_size;?>">(&nbsp;&nbsp;&nbsp;&nbsp;%)</td>
                                       </tr>
                                    </table><br/>
                                    El Asegurado tendrá derecho de cambiar el Beneficiario de este seguro.<br/> 
     
                                    Todo  cambio  de  Beneficiario  se  hará  mediante  solicitud  escrita  a  la  Compañía.  El
                                    cambio  de  Beneficiario  se  hará  constar  en  el  presente  Certificado Individual 
                                    debidamente autorizado por funcionarios de la Compañía.<br/> 
                                    La  Compañía  no  será  responsable  ante  el  Asegurado,  el  Contratante  o  terceros,  por
                                    haber  indemnizado  al  o  a  los  Beneficiarios  que  no  aparezcan registrados con derecho
                                    a ello. 
    
                                </div><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">4. VIGENCIA</h2>
                                La  cobertura  del  seguro  inicia  su  vigencia  el <?=$row['dia'].' de '.num_to_string_date_pex($row['mes']).' de '.$row['anio'];?> a  hrs. 12:00:00   meridiano 
                                y  concluirá  de  acuerdo  a  la  vigencia  original  de  la  Póliza  de  Seguro de  Vida  en  
                                Grupo,  en virtud  de  la  cual  se  emite  el  presente  Certificado  Individual;  de  manera
                                que  al  caducar  aquella  caducará  automáticamente  el presente Certificado.<br/><br/>
                                 
                                <h2 style="<?=$h2;?> <?=$font_size;?>">5. CONTRATO PRINCIPAL (Póliza Maestra)</h2>
                                Todos  los  beneficios  a  los  cuales  el  Asegurado  tiene  derecho,  dependen  de  lo  
                                estipulado  en  la  Póliza  de  Seguros  de  Vida  en  Grupo  suscrita  por  el Contratante,  la
                                cual  constituye  el    Contrato  principal  en  virtud  del  cual  se  regula  el  seguro  y  se
                                efectúan  los  pagos.  El hecho  de  la  posesión  o  el  mero  uso  que  el  Asegurado  o  sus 
                                beneficiarios  hagan  de  este  Certificado,  implica  aceptación  por  ellos  de  todas  las  
                                condiciones de la Póliza Maestra, tanto en lo que les beneficie como en lo que les afecte.<br/><br/> 
     
                                En fe  de  lo  cual  se  emite    el  presente  Certificado  y  se  da  por  aceptado  tanto  por
                                el  Asegurado  como  por    el  Contratante:<br/>  
                                Fin de Vigencia:<br/><br/> 
                                NACIONAL VIDA SEGUROS DE PERSONAS S.A.<br/>
                                La Paz, <?=$row['dia'].' de '.num_to_string_date_pex($row['mes']);?> de 2014<br/><br/><br/>
                                <table cellpadding="0" cellspacing="0" border="0" 
                                      style="width: 100%; height: auto; font-family: Arial;">
                                   <tr>
                                     <td style="width: 35%; border-bottom: 0px solid #000; text-align:center;"><img src="<?=$url;?>img/firma-1.jpg"/></td>
                                     <td style="width: 30%; text-align:center; <?=$font_size;?>" valign="bottom">FIRMAS AUTORIZADAS</td>
                                     <td style="width: 35%; border-bottom: 0px solid #000; text-align:center;"><img src="<?=$url;?>img/firma-2.jpg"/></td>
                                   </tr>
                                </table><br/><br/><br/>
                                <table cellpadding="0" cellspacing="0" border="0" 
                                      style="width: 100%; height: auto; font-family: Arial;">
                                   <tr>
                                     <td style="width: 30%; ">&nbsp;</td>
                                     <td style="width: 40%; border-bottom: 1px solid #000;">&nbsp;</td>
                                     <td style="width: 30%; ">&nbsp;</td>
                                   </tr>
                                   <tr>
                                     <td style="width: 30%; ">&nbsp;</td>
                                     <td style="width: 40%; text-align:center; <?=$font_size;?>">Asegurado</td>
                                     <td style="width: 30%; ">&nbsp;</td>
                                   </tr>
                                </table>
                            </td>
                            <td style="width:4%;">&nbsp;</td>
                            <td style="width: 48%; text-align:justify;" valign="top">
                                <div style="text-align: center; font-weight: bold;">
                                    
                                    ASISTENCIAS ADICIONALES<br/>
                                    “SEGURO POL-VG-LP-00000181-2014-00”<br/>
                                    Registrada en Autoridad de Fiscalización y Control de Pensiones y Seguros (APS) mediante<br/> 
                                    Resolución Administrativa APS/DS/N°_______ con Código de Registro N° __________________<br/>                    
                                     
                                    Forma parte integrante de la Póliza registrada en la APS bajo el Registro N° 
                                    __________________ 
     
                                </div><br/>
                                Se acuerda y establece, no obstante lo estipulado en las Condiciones Generales de la Cobertura
                                Principal de la Póliza, que las Asistencias Adicionales se rigen por lo establecido en el
                                presente texto, de acuerdo a lo siguiente:<br/><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">PRIMERA: DEFINICIONES</h2>
                                <span style="font-weight:bold;">Empresa de Servicio de Asistencias: Nacional Vida Seguros de 
                                Personas S.A.</span> podrá terciarizar el servicio de asistencias mediante una empresa que brinde
                                o intermedie este servicio.<br/> 
                                <span style="font-weight:bold;">Servicio:</span> Conjunto de actividades que buscan responder a
                                las necesidades de la gente.<br/>
                                <span style="font-weight:bold;">Usuario:</span> El usuario de este servicio de asistencias además
                                del ASEGURADO es su cónyuge, sus descendientes en primer grado y su BENEFICIARIO.<br/><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">SEGUNDA: DESCRIPCIÓN Y ALCANCE</h2>
                                El ASEGURADO, su cónyuge y los descendientes en primer grado, podrán ser beneficiados con las
                                asistencias que se detallan en el presente documento, comunicándose al número de teléfono 901-11-2255 a
                                costo del usuario/ASEGURADO.<br/><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">2.1 ASISTENCIA LEGAL TELEFONICA</h2>
                                <span style="font-weight:bold;">Asistencia legal telefónica en todas las áreas:</span> Se 
                                brindará a los usuarios/ASEGURADOS de la presente Póliza un servicio de asistencia legal 
                                telefónica en relación a cualquier cuestión legal, civil, penal, fiscal, administrativa, 
                                mercantil, laboral u otras que se le pudiera presentar.<br/>
                                La consulta será atendida por uno de los abogados designados por la empresa terciarizada que
                                brindará la asistencia y se limitará a la orientación verbal respecto a la consulta planteada,
                                sin emitir dictamen por escrito sobre la misma.<br/><br/>
                                <span style="text-decoration:underline">Rubros de consultas comprendidos en el servicio</span>
                                <ol style="<?=$marginUl;?> list-style-type:none; width:80%;">
                                    <li>Consultas sobre derechos relativos a la vivienda.
                                        <ol style="<?=$marginUl;?> list-style-type:none; width:80%;">
                                           <li>En calidad de propietario</li>
                                           <li>En calidad de inquilino</li>
                                           <li>En calidad de usufructuario</li>
                                        </ol>
                                    </li>
                                    <li>Consultas sobre contratos de servicios.</li>
                                    <li>Consultas sobre contratos sobre cosas muebles</li> 
                                    <li>Consultas sobre cualquier cuestión penal.</li>
                                    <li>Consultas sobre cuelquier cuestión civil.</li>
                                    <li>Consultas sobre cualquier cuestión fiscal o impositiva.</li> 
                                    <li>Consultas sobre cualquier cuestion laboral.</li>
                                    <li>Consultas en caso de accidentes de tránsitos y otras urgencias, adicionalmente en otras situaciones de emergencia relacionadas con el vehículo</li>
                                </ol>
                                Estas asistencias se prestarán únicamente de forma telefónica y no presencial.<br/><br/>
                                <span style="text-decoration:underline">Límite de eventos a cubrir:</span> Por el servicio de 
                                asistencia legal telefónica se cubrirán hasta 2 eventos por año calendario para accidentes
                                de transito. Para consultas de otros temas el servicio es ilimitado<br/><br/>
                                <h2 style="<?=$h2;?> <?=$font_size;?>">2.2 ASISTENCIA MEDIPHONE</h2>
                                <span style="font-weight:bold;">Información Sanitaria:</span> Se pondrá a disposición del
                                usuario/ASEGURADO la información precisa, mediante los distintos tipos de servicios que se 
                                detallan.<br/><br/>
                                Los servicios se prestarán de acuerdo con las condiciones que se establecen a continuación:<br/><br/>
                                <span style="font-weight:bold;">Consejo Médico Telefónico</span><br/><br/>
                                En caso de necesidad, el ASEGURADO podrá efectuar una consulta médica telefónica relacionada con 
                                cuadros patológicos durante las 24 horas del día los 365 días del año. Esta información médica 
                                podrá versar sobre los siguientes aspectos:
                                <ol style="<?=$marginUl;?> list-style-type:none; width:80%;">
                                    <li>Procedimientos a seguir en determinadas patologías.</li>
                                    <li>Centros médicos donde acudir para un tratamiento ambulatorio.</li>
                                    <li>Consejos ante emergencias médicas.</li> 
                                    <li>Información sobre medicamentos y prescripciones.</li>
                                    <li>Medicina preventiva</li>
                                    <li>Consejos de salud.</li> 
                                </ol>
                            </td> 
                        </tr>
                    </table>    
                </div>
                            
            </div>
        </div>    
 
<?php		 
	    if($num_titulares>1){
?>
			<div style="page-break-after: always;">&nbsp;</div>           
<?php			
		}
	}
	
	$html = ob_get_clean();
	return $html;
}

function num_to_string_date_pex($mes_num){
   switch($mes_num){
	  case 1 : 
	     return 'Enero';
	     break;
	  case 2 :
	     return 'Febrero';
	     break;
	  case 3 :
	     return 'Marzo';
	     break;
	  case 4 :
	     return 'Abril';
	     break;
	  case 5 :
	     return 'Mayo';
	     break;
	  case 6 :
	     return 'Junio';
	     break;
	  case 7 :
	     return 'Julio';
	     break;
	  case 8 :
	     return 'Agosto';
	     break;
	  case 9 :
	     return 'Septiembre';
	     break;
	  case 10 :
	     return 'Octubre';
	     break;
	  case 11 :
	     return 'Noviembre';
	     break;
	  case 12 :
	     return 'Diciembre';
	     break;	 	 	 	 	 	 	  	 	 
   }	 
}

function formatCheckPEX($data){
	return explode('-', $data);
}
?>