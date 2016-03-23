<?php
function de_em_certificate_mo($link, $row, $rsDt, $url, $implant, $fac, $reason = '', $type) {
	$conexion = $link;
	
	$prefix = json_decode($row['prefix'], true);
	$arrModality = array (
		'CCB' => 'CAPITAL CONSTANTE BOLIVIANOS',
		'CCD' => 'CAPITAL CONSTANTE DOLARES',
		'CDB' => 'CAPITAL DECRECIENTE BOLIVIANOS',
		'CDD' => 'CAPITAL DECRECIENTE DOLARES'
		);
	
	$main_c_des = 'width: 790px; height: auto; margin: 0; padding: 0;';
	$header = 'widows: auto; height: 74px;';
	$header_h1 = 'text-align: right; margin: 0; font-weight: bold; font-size: 15px; font-family: Arial;';
	$header_h4 = 'text-align: right; margin: -12px 0 0 0; float: right; font-weight: bold; font-size: 11px; 		font-family: Arial;';
	$container_1 = 'width: 100%; height: auto; margin: 0 0 5px 0;';
	$h2 = 'width: auto; height: auto; text-align: left; margin: 0; padding: 2px 0px; font-weight: bold; font-size: 9px; font-family: Arial;';
	$h2_s = 'margin: 0 0 10px 40px; font-weight: bold; font-size: 13px; font-family: Arial;';
	$content = 'width: 100%; height: auto; margin: 0 0 5px 0; padding: 0px 0px; font-weight: bold; font-size: 10px; 		font-family: Arial; text-align: left;';
	$table = 'width: 100%; font-weight: normal; font-size: 9px; font-family: Arial; margin: 2px 0 0 0; padding: 0; 		border-collapse: collapse; vertical-align: bottom;';
	$table_borde2 = 'border-bottom: 1px solid #080808;';
	$input_check = 'display: inline-block; width: 15px; height: 15px; margin: 2px 0 0 0; text-align: center; 		vertical-align: baseline; border: 1px solid #0F0F0F;';
	$input_question = 'display: inline-block; width: 12px; height: 10px; margin: 0 0 0 2px; text-align: center; 		vertical-align: baseline; border: 1px solid #0F0F0F;';
	
	ob_start();

  $num_titulares = $rsDt->num_rows;
  $ct=1;
  while($ct<=2){
	if($ct==1){$text='Original';} else{$text='Copia';}  
	if($rsDt->data_seek(0)){   
		while($regi = $rsDt->fetch_array(MYSQLI_ASSOC)){
		   $jsonData = $regi['respuesta'];
		   $phpArray = json_decode($jsonData, true);   
	  ?>
		  <div style="<?=$main_c_des;?>">
		  
			  <div style="<?=$header;?>">
				  <!--<img src="images/logo.jpg" width="100" height="74" id="logo-alianza" />-->
				  <h1 style="<?=$header_h1;?>">
					  DECLARACIÓN JURADA DE SALUD<br />
					  SOLICITUD DE SEGURO DE DESGRAVAMEN
				  </h1><br />
				  <h4 style="font-size:9px; text-align: right; margin: -12px 0 0 0; font-weight: bold;  font-family: Arial;">
					  Formato aprobada por la Autoridad de Fiscalización y Control de Pensiones y Seguros -APS mediante R.A No.081 del 10/03/00<br />
							  Código 206-934901-2000 03 006 3013<br />
							  No de Certificado:<?=$row['no_emision'];?><br/><?=$text;?>
				  </h4>
			  </div>
			  <div style="<?=$container_1;?>">
			  <div style="font-size:9px; padding-top:5px; font-family: Arial;"><b>Estimado Cliente, agradeceremos completar la informaci&oacute;n que se requiere a continuaci&oacute;n: (utilice letra clara)</b></div>
				  <h2 style="<?=$h2;?>">DATOS PERSONALES DEL SOLICITANTE:</h2>
				  <div style="<?=$content;?>">
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						 <tr>
						  <td style="width: 8%;">Nombres: </td>
						  <td style="width: 42%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['nombre'];?></td>
							  </tr></table>
						  </td>
						  <td style="width: 8%;">Apellidos: </td>
						  <td style="width: 42%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;;?>"><?=$regi['apellidos'];?></td>
							  </tr></table>
						  </td>
						 </tr>
					  </table>
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						 <tr>
						  <td style="width: 15%;">Lugar de Nacimiento: </td>
						  <td style="width: 35%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['lugar_nacimiento'];?></td>
								  </tr></table>
						  </td>
						  <td style="width: 15%;">Fecha de Nacimiento: </td>
						  <td style="width: 35%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['fecha_nacimiento'];?></td>
								  </tr></table>
						  </td>
						 </tr>
					  </table>
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						  <tr>
							  <td style="width: 16%;">Nº Documento de Identidad:</td>
							  <td style="width: 17%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['ci_document'];?></td>
								  </tr></table>
							  </td>
							  <td style="width: 10%;">Expedido en:</td>
							  <td style="width: 15%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$regi['expedido'];?></td>
								  </tr></table>
							  </td>
							  <td style="width: 4%;">Edad:</td>
							  <td style="width: 10%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$regi['edad'];?>&nbsp;años</td>
								  </tr></table>
							  </td>
							  <td style="width: 4%;">Peso:</td>
							  <td style="width: 10%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$regi['peso'];?>&nbsp;kg</td>
								  </tr></table>
							  </td>
							  <td style="width: 4%;">Estatura:</td>
							  <td style="width: 10%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$regi['estatura'];?>&nbsp;cm</td>
								  </tr></table>
							  </td>
						  </tr>
					  </table>			
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						  <tr>
							  <td style="width: 15%;">Dirección Comercial:</td>
							  <td style="width: 35%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['direccion_laboral'];?></td>
								  </tr></table>
							  </td>
							  <td style="width: 15%;">Dirección Domicilio:</td>
							  <td style="width: 35%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['direccion_domicilio'];?></td>
								  </tr></table>
							  </td>
						  </tr>
					  </table>	
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						  <tr>
							  <td style="width: 15%;">Teléfono Domicilio:</td>
							  <td style="width: 18%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['telefono_domicilio'];?></td>
								  </tr></table>
							  </td>
							  <td style="width: 15%;">Teléfono Oficina:</td>
							  <td style="width: 18%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['telefono_oficina'];?></td>
								  </tr></table>
							  </td>
							  <td style="width: 15%;">Teléfono Celular:</td>
							  <td style="width: 19%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['telefono_celular'];?></td>
								  </tr></table>
							  </td>
						  </tr>
					  </table>			
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						 <tr>
						  <td style="width: 15%;">Lugar de Trabajo: </td>
						  <td style="width: 35%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['direccion_laboral'];?></td>
								  </tr></table>
						  </td>
						  <td style="width: 15%;">Ocupación: </td>
						  <td style="width: 35%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['ocupacion'];?></td>
								  </tr></table>
						  </td>
						 </tr>
					  </table>
				  </div>
			  </div> 
			  <div style="<?=$container_1;?>">
				  <h2 style="<?=$h2;?>">CUESTIONARIO:</h2>
				  <div style="<?=$content;?>">
				  <?php 
					echo'<table border="0" cellpadding="0" cellspacing="0" style="'.$table.'">';
						  $ti=1;
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
						 
							  echo'<tr>
									  <td valign="top" align="center" style="width: 5%;">'.$regiprg['orden'].'</td>
									  <td style="width: 80%;">'.$regiprg['pregunta'].'</td>
									  <td style="width: 15%; text-align:center;">
										  <table border="0" cellpadding="0" cellspacing="0" style="'.$table.'">
											  <tr>';
											  if($respuesta==1){
												  echo'<td style="width: 50%;" align="center">Si <div style="'.$input_question.'">X</div></td>';
												  echo'<td style="width: 50%;" align="center">No <div style="'.$input_question.'">&nbsp;</div></td>';
											  }elseif($respuesta==0){
												  echo'<td style="width: 50%;" align="center">Si <div style="'.$input_question.'">&nbsp;</div></td>';
												  echo'<td style="width: 50%;" align="center">No <div style="'.$input_question.'">X</div></td>';
											  }
												  
										 echo'</tr>
										  </table>
									  </td>
								  </tr>';
							  if($ti==4){
								  echo'<tr><td colspan="3" style="text-align:left; padding-top:5px;"><b>DURANTE LOS ULTIMOS CINCO A&Ntilde;OS:</b></td></tr>';
							  }
							  $ti++;	
						  }     
					echo'</table>';
				  ?>
				  </div>
			  </div>
			  <div style="<?=$container_1;?>">
				  <h2 style="font-size:8px; width: auto; height: auto; text-align: left; margin: 0; padding: 2px 0px; font-weight: bold; font-family: Arial;">SI ALGUNA DE SUS RESPUESTAS ES AFIRMATIVA (A EXCEPCIÓN DE LA RESPUESTA PARA LA PRIMERA PREGUNTA), POR FAVOR BRINDE LOS DETALLES PARA QUE SU SOLICITUD SEA SOMETIDA A CONSIDERACIÓN Y, SI CORRESPONDE, ACEPTACIÓN DE LA COMPAÑÍA ASEGURADORA</h2>
				  <div style="<?=$content;?>">
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
						  <td style="width: 8%;">DETALLES: </td>
						  <td style="width: 92%;">
							  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; <?=$table_borde2;?>"><?=$regi['observacion']?></td>
								  </tr></table>
						  </td></tr>
						  <tr>
							<td style="width: 8%;">&nbsp;</td>
							<td style="width: 92%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
										<td style="width: 100%; <?=$table_borde2;?>">&nbsp; </td>
								   </tr></table>
							</td>
						  </tr>
					  </table>
				  </div>
			  </div>
			  <?php
				$selectBf="select
							concat(nombre,' ',paterno,' ',materno) as beneficario,
							ci,
							parentesco
						  from
							s_de_beneficiario
						  where
							id_detalle='".$regi['id_detalle']."' and cobertura='SP';";
				$resbf = $conexion->query($selectBf,MYSQLI_STORE_RESULT);
				$regibf = $resbf->fetch_array(MYSQLI_ASSOC);			  
			  ?>
			  <div style="<?=$container_1;?>">
				  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
					   <tr>
						<td style="width: 15%;">BENEFICIARIO </td>
						<td style="width: 35%;">
							<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; <?=$table_borde2;?>"><?=$regibf['beneficario'];?></td>
							</tr></table>
						</td>
						<td style="width: 15%;">PARENTESCO</td>
						<td style="width: 35%;">
							<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; <?=$table_borde2;?>"><?=$regibf['parentesco'];?></td>
							</tr></table>
						</td>
					   </tr>
					</table>
			  </div>
			  <div style="<?=$container_1;?>">
				  <div style="font-weight: normal; font-size: 9px; font-family: Arial; text-align:justify;">
					  Declaro haber contestado con total veracidad  y máxima buena fe a todas las preguntas del presente cuestionario y no haber omitido u ocultado hechos y/o circunstancias que hubieran podido influir en la celebración del contrato de seguro. Las declaraciones de salud que hacen anulable el Contrato de Seguros y por las que el asegurado pierde su derecho a indemnizaci&oacute;n, se enmarcan en los art&iacute;culos <span style="font-size:8px;">992: OBLIGACION DE DECLARAR;  993: RETICENCIA O INEXACTTUD; 994: AUSENCIA DE DOLO; 999: DOLO O MALA FE; 1038: PERDIDA AL DERECHO DE LA INDEMNIZACION; 1138: IMPUGNACION DEL CONTRATO; 1140: ERROR EN LA EDAD DEL ASEGURADO</span>, del C&oacute;digo de Comercio.<br />
		  Relevo expresamente del secreto profesional y legal a cualquier m&eacute;dico que me hubiese asistido y/o tratado de dolencias y enfermedades y le autorizo a revelar a Nacional Vida Seguros de Personas S.A. todos los datos y antecedentes patol&oacute;gicos que pudiera tener o de los que hubiera adquirido conocimiento al prestarme sus servicios. Entiendo que de presentarse alguna eventualidad contemplada bajo la p&oacute;liza de seguro como consecuencia de alguna enfermedad existente conocida a la fecha de la firma de este documento; y/o cuando haya alcanzado la edad l&iacute;mite estipulada en la p&oacute;liza, la compa&ntilde;&iacute;a aseguradora quedar&aacute; liberada de toda la responsabilidad en lo que respecta a mi seguro. Declaro haber le&iacute;do el presente documento y estar en conocimiento de las condiciones descritas.<br /><br />
				  <h2 style="font-size:8px; <?=$h2;?>">NOTA IMPORTANTE:</h2>
				   <table border="0" cellpadding="0" cellspacing="0" style="<?=$table?>">
						 <tr>
						  <td style="width: 3%;">&nbsp; </td>
						  <td style="width: 97%; font-size:8px; text-align:justify;">
							  EL SOLICITANTE ACEPTA QUE LA PRESENTE  DECLARACI&Oacute;N JURADA DE SALUD ES VALIDA PARA LAS CONDICIONES FINALES DEL CR&Eacute;DITO APROBADO POR EL BANCO. LA POLIZA MATRIZ SURTIRA SUS EFECTOS PARA EL SOLICITANTE QUIEN SE CONVERTIRA EN ASEGURADO A PARTIR DEL MOMENTO EN QUE EL CREDITO SE CONCRETE, SALVO EN LOS SIGUIENTES CASOS:  A) QUE EL SOLICITANTE DEBA CUMPLIR CON OTROS REQUISITOS DE ASEGURABILIDAD ESTABLECIDOS EN LAS CONDICIONES DE LA POLIZA Y A REQUERIMIENTO DE LA COMPA&Ntilde;IA ASEGURADORA.  B) QUE EL SOLICITANTE HAYA RESPONDIDO POSITIVAMENTE ALGUNA DE LAS PREGUNTAS DE LA DECLARACION JURADA DE SALUD (CON EXCEPCION DE LA PREGUNTA 1). PARA AMBOS CASOS SE INICIAR&Aacute; LA COBERTURA DE SEGURO A PARTIR DE LA ACEPTACI&Oacute;N DE LA COMPA&Ntilde;IA
						  </td>
						  
						 </tr>
						 <tr><td colspan="2">&nbsp;</td></tr>
						 <tr>
						  <td colspan="2" style="width:100%; font-size:8px;">
						  LA FIRMA DEL SOLICITANTE  EN ESTE DOCUMENTO, ES TAMBI&Eacute;N VALIDA JUR&Iacute;DICAMENTE PARA EL CERTIFICADO INDIVIDUAL DEL SEGURO DE DESGRAVAMEN QUE CONSTA EN EL REVERSO DE ESTA SOLICITUD.
						  </td>
						 </tr>
					  </table>
				  </div>
			  </div>        
			  <br/>
			  <div style="<?=$container_1;?>">
				  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
					   <tr>
						<td style="width: 8%;">Fecha:</td>
						<td style="width: 20%;">
							<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								<td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$row['fecha_emision'];?></td>
							</tr></table>
						</td>
						<td style="width: 8%;">Firma</td>
						<td style="width: 25%;">
							<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; <?=$table_borde2;?>">&nbsp; </td>
							</tr></table>
						</td>
						<td style="width:15%;">
						   <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; <?=$table_borde2;?>">&nbsp; </td>
							</tr></table>
						</td>
						<td style="width:24%;">&nbsp;</td>
					   </tr>
					   <tr>
						<td colspan="4" style="width:61%;">&nbsp;</td>
						<td style="width:15%; font-size:8px;">SOLICITANTE</td>
						<td style="width:24%;">&nbsp;</td>
					   </tr>
					</table>
			  </div>
			  <?php
				  $moneda = formatCheckMO($row['moneda']);
			  ?>
			  <div style="<?=$container_1;?>">
				  <h2 style="<?=$h2;?>"><span style="font-size:8px;">CRÉDITO SOLICITADO:</span> (a ser completado por la entidad Financiera)</h2>
				  <div style="<?=$content;?>">
					  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
						  <tr>
							  <td style="width: 20%; text-align:center; font-weight:bold; font-size:8px;">MONTO SOLICITADO</td>
							  <td style="width: 10%;">&nbsp;</td>
							  <td style="width: 20%;">&nbsp;</td>
							  <td style="width: 20%; text-align:center; font-weight:bold; font-size:8px;">MONTO TOTAL ACUMULADO</td>
							  <td style="width: 30%;">&nbsp;</td>
						  </tr>
						  <tr>
							  <td style="width: 20%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; text-align:center; <?=$table_borde2;?>">
										  <?=number_format($row['monto_solicitado'], 2, '.', ',');?>
									  </td>
								  </tr></table>
							  </td>
							  <td style="width: 10%; vertical-align:top;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
								  <tr>
									<td style="width: 50%;">&nbsp;&nbsp;<div style="<?=$input_check;?>"><?=$moneda[1];?></div></td>
									<td style="width: 50%; font-weight:bold; font-size:8px;">USD</td>
								  </tr>
								</table>
							  </td>
							  <td style="width: 20%;">&nbsp;</td>
							  <td style="width: 20%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									  <td style="width: 100%; text-align:center; <?=$table_borde2;?>">
									   <?php
										 if($regi['titular_txt']==='DD'){
											 echo number_format($row['cumulo_deudor'],2,'.',',');
										 }elseif($regi['titular_txt']==='CC'){
											 echo number_format($row['cumulo_codeudor'],2,'.',',');
										 }
									   ?>
									  </td>
								  </tr></table>
							  </td>
							  <td style="width: 30%;">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="width: 20%;">&nbsp;</td>
							<td style="width: 10%; vertical-align:middle;">
							   <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
								  <tr>
									<td style="width: 50%;">&nbsp;&nbsp;<div style="<?=$input_check;?>"><?=$moneda[0];?></div></td>
									<td style="width: 50%; font-weight:bold; font-size:8px;">Bs.</td>
								  </tr>
								</table>
							</td>
							<td style="width: 20%;">&nbsp;</td>
							<td style="width: 20%; text-align:center;">(<?=$row['expresado_moneda'];?>)</td>
							<td style="width: 30%;">&nbsp;</td>
						  </tr>
					  </table>
				  </div>
			  </div>
			  <div style="<?=$container_1;?>">
				  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
					  <tr> 
						<td style="width: 15%; font-size:8px;">TIPO DE CRÉDITO:</td>
						<td style="width: 20%;">
							<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$row['tipo_credito'];?></td>
							</tr></table>
						</td>
						<td style="width: 65%;">&nbsp;</td>
					  </tr>  
				  </table>
				  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
					<tr> 
					  <td style="width: 35%;"><span style="font-size:8px;">PLAZO DEL CRÉDITO SOLICITADO:</span></td>
					  <td style="width: 30%;">
							<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; text-align:center; <?=$table_borde2;?>"><?=$row['tipo_plazo'];?></td>
							</tr></table>
					  </td>
					  <td style="width: 35%;">&nbsp;</td>
					</tr>   
				  </table>
				  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
					<tr>
					 <td style="width: 20%;">&nbsp;</td>
					 <td style="width: 15%;">&nbsp;</td>
					 <td style="width: 30%;">&nbsp;</td>
					 <td style="width: 35%;">&nbsp;</td>
					</tr>
					<tr>
					   <td style="width: 20%;">&nbsp;</td>
					   <td style="width: 15%;">&nbsp;</td>
					   <td style="width: 30%;">
						  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
							  <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
						  </tr></table>
					   </td>
					   <td style="width: 35%;">&nbsp;</td>
					</tr>
					<tr>
					 <td style="width: 20%;">&nbsp;</td>
					 <td style="width: 15%;">&nbsp;</td>
					 <td style="width: 30%; text-align:center; padding-top:3px; font-size:8px;">FIRMA Y SELLO DEL BANCO</td>
					 <td style="width: 35%;">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="4" align="right">
							<br>
							“Impreso el <?=date("d/m/Y")?>. El presente certificado reemplaza cualquier otro certificado impreso en fechas anteriores a la indicada.”
						</td>    
					</tr>
				  </table>
			  </div>
			  <div style="<?=$container_1;?>">
			   <?php
				 if((boolean)$row['facultativo']===true){
					 if((boolean)$row['aprobado']===true){
			   ?>
					<table border="0" cellpadding="1" cellspacing="0" style="width: 100%; font-size: 8px; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
						  <tr>
							  <td colspan="7" style="width:100%; text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">Caso Facultativo</td>
						  </tr>
						  <tr>
							  
							  <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Aprobado</td>
							  <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa de Recargo</td>
							  <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Porcentaje de Recargo</td>
							  <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa Actual</td>
							  <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa Final</td>
							  <td style="width:69%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Observaciones</td>
						  </tr>
						  <tr>
							  
							  <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=strtoupper($row['aprobado']);?></td>
							  <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=strtoupper($row['tasa_recargo']);?></td>
							  <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['porcentaje_recargo'];?> %</td>
							  <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['tasa_actual'];?> %</td>
							  <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['tasa_final'];?> %</td>
							  <td style="width:69%; text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['motivo_facultativo'];?> |<br /><?=$row['observacion'];?></td>
						  </tr>
					 </table>
			   <?php
					 }else{
						 
			   ?> 
					<table border="0" cellpadding="1" cellspacing="0" style="width: 80%; font-size: 9px; border-collapse: collapse; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">         
						 <tr>
						  <td  style="text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">
							Caso Facultativo
						  </td>
						 </tr>
						 <tr>
						  <td style="text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">
							Observaciones
						  </td>
						 </tr>
						 <tr>
						  <td style="text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['motivo_facultativo'];?></td>
						 </tr>
					</table>
			   <?php
					 }
				 }
			   ?>    
			  </div>
			  <div style="<?=$container_1;?>">
			  <?php
				 $queryVar = 'set @anulado = "Polizas Anuladas: ";';
				 if($conexion->query($queryVar,MYSQLI_STORE_RESULT)){
					 $canceled="select 
									max(@anulado:=concat(@anulado, prefijo, '-', no_emision, ', ')) as cert_canceled
								from
									s_de_em_cabecera
								where
									anulado = 1
										and id_cotizacion = '".$row['id_cotizacion']."';";
					 if($resp = $conexion->query($canceled,MYSQLI_STORE_RESULT)){
						 $regis = $resp->fetch_array(MYSQLI_ASSOC);
						 echo '<span style="font-size:8px;">'.trim($regis['cert_canceled'],', ').'</span>';
					 }else{
						 echo "Error en la consulta "."\n ".$conexion->errno. ": " . $conexion->error;
					 }
				 }else{
				   echo "Error en la consulta "."\n ".$conexion->errno. ": " . $conexion->error;   
				 }
			  ?>
			  </div>
			  
			  <div style="page-break-before: always;"> &nbsp;</div>
			  
			  <div style="<?=$container_1;?>">
				 <?php 
				  if($type!=='MAIL' && (boolean)$row['emitir']===true && (boolean)$row['anulado']===false){
				 ?>
				   <div style="<?=$content?>"><br />
				   <?php
					if($row['tipo_credito']=='OTROS'){
				   ?>
					  <h2 style="text-align: center; <?=$h2_s;?>">
						  CERTIFICADO INDIVIDUAL DE SEGURO DE DESGRAVAMEN Nº <?=$row['no_emision'];?>
					  </h2>
					  <h4 style="font-size:9px; text-align:center; margin: -12px 0 0 0; font-weight: bold; font-size: 11px; font-family: Arial;">
					  Formato aprobado por la Autoridad de Fiscalización y Control de Pensiones y Seguros –APS  mediante R.ANo.081 del 10/03/00<br/>
		  .POLIZA DE  SEGURO DE DESGRAVAMEN HIPORTECARIO N°
		   
					   <?php
						 if($row['modalidad']=='CC'){
					   ?>
							POL-DH-LP-00110-2014-00
					   <?php     
						 }elseif($row['modalidad']=='CD'){
					   ?>
							POL-DH-LP-00111-2014-00
					   <?php	   
						 }
					   ?><br/>
		  Codigo 206-934901-2000 03 006 4008
					  </h4>
					   <?php
						if($row['modalidad']=='CC'){//CAPITAL CONSTANTE
					   ?>
						  <table border="0" cellpadding="0" cellspacing="0" style="font-size: 8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
							  <tr>
								<td style="width: 100%; padding: 5px; text-align: justify;" valign="top">
								NACIONAL VIDA Seguros de Personas S.A., (denominada en adelante la “Compañía “), por el presente CERTIFICADO INDIVIDUAL DE SEGURO hace constar que la persona nominada en la declaración jurada de salud / solicitud de seguro de desgravamen hipotecario, que consta en el anverso, (denominado en adelante el “Asegurado”), está protegido por la Póliza de Seguro de Vida de Desgravamen arriba mencionada, de acuerdo a las  siguientes Condiciones Particulares:
								  <ul style="list-style: decimal; font-size: 8px; margin: 10px 0 5px 10px; width: 95%;">
									  <li><b>CONTRATANTE Y BENEFICIARIO A TÍTULO ONEROSO</b><br/>
										 IDEPRO IFD  -  CAPITAL CONSTANTE BOLIVIANOS Y DOLARES
									  </li>
									  <li><b>COBERTURAS Y CAPITALES ASEGURADOS:</b>
										 <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
											<tr>
												<td style="width: 3%; font-size:8px;" align="center" valign="top">a.</td>
												<td style="width: 97%;">
													<u>Muerte por cualquier causa:</u><br/>
													Capital Asegurado: El tomador a título oneroso por los saldos deudores de las operaciones que dieron  origen a esta cobertura. El beneficiario designado o herederos legales por el capital excedente resultante de la siguiente diferencia: capital total asegurado menos el saldo insoluto a la fecha de siniestro incluyendo intereses corrientes
													<table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
													  <tr>
														 <td style="width: 15%;">Límites de edad:</td>
														 <td style="width: 15%;">De Ingreso:<br/>De Permanencia</td>
														 <td style="width: 70%;">Desde los 18 años hasta los 70 años<br/>Hasta los 75 años</td>
													  </tr>
													</table>
												</td>
											</tr>
											<tr>
											  <td style="width: 3%; font-size:8px;" align="center" valign="top">b.</td>
											  <td style="width: 97%;">
												<u>Incapacidad Total Permanente (Periodo de espera de 2 meses para dictamen  de la Incapacidad Total Permanente)</u><br/>
												Capital Asegurado: Saldo insoluto de la deuda a la fecha de la Incapacidad Total y Permanente
												  <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
													<tr>
													   <td style="width: 15%;">Límites de edad:</td>
													   <td style="width: 15%;">De Ingreso:<br/>De Permanencia</td>
													   <td style="width: 70%;">Desde los 18 años hasta los 65 años<br/>Hasta los 65 años</td>
													</tr>
												  </table>  
											  </td>
											</tr>
											<tr>
												<td style="width: 3%" align="center" valign="top">c.</td>
												<td style="width: 97%">
													<u>Sepelio:</u> US$ 300 o Bs. 2.100
												</td>
											</tr>
										 </table>
									  </li>
									  <li><b>EXCLUSIONES:</b> Este seguro no será aplicable en ninguna de las siguientes circunstancias:
										 <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										   <tr> 
											<td style="width: 5%" align="center" valign="top">a)</td>
											<td style="width: 95%">
											  Si el asegurado participa como conductor o acompañante en competencias de automóviles, motocicletas, lanchas de motor o avioneta, prácticas de paracaídas; 
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">b)</td>
											<td style="width: 95%">
											  Si el asegurado realiza operaciones o viajes  submarinos o en transportes aéreos   no autorizados para transporte de pasajeros;
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">c)</td>
											<td style="width: 95%">
											  Si el asegurado participa como elemento activo en guerra internacional o civil, rebelión, sublevación, guerrilla, motín, huelga, revolución y toda emergencia como consecuencia de alteración del orden público, a no ser que se pruebe que la muerte ocurrió independientemente de la existencia de tales condiciones anormales.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">d)</td>
											<td style="width: 95%">
											  Enfermedad grave pre-existente al inicio del seguro, o enfermedad congénita.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">e)</td>
											<td style="width: 95%">
											  Suicidio o invalidez total y permanente como consecuencia del intento de suicidio practicados por el asegurado dentro de los  primeros 6 meses  de vigencia de su cobertura; en consecuencia, este riesgo quedará cubierto a partir del primer día del séptimo mes  de la cobertura para cada operación asegurada.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">f)</td>
											<td style="width: 95%">
											  VIH y/o SIDA
											</td>
										   </tr>
										 </table>
									  </li>
									  <li><b>TASA MENSUAL:</b><br/>
									   Tasa Total Mensual:  <?=$row['tasa_final'];?>  por mil mensual, tasa aplicable al titular del crédito más conyugue, deudores,  ésta tasa puede variar de acuerdo al tipo decrédito, al riesgo particular que represente el aseguradoy/o a las renovaciones futuras de la póliza.
									  </li>
									  <li><b>PROCEDIMIENTO A SEGUIR EN CASO DE SINIESTRO:</b><br/>
										Para reclamar el pago de cualquier indemnización con cargo a esta póliza, el Contratantedeberá remitir a la Compañía su solicitud junto con los	documentos a presentar en caso de fallecimiento o invalidez. La Compañía podrá, a sus expensas, recabar informes o pruebas complementarias.<br/>
	  Una vez recibidos los documentos a presentar en caso de fallecimiento o invalidez,la Compañía notificará dentro de los diez (10) días siguientes, su conformidad o denegación del pago de la indemnización, sobre la base de lo estipulado en las condiciones de la póliza matriz.<br/>
	  En caso de conformidad, la Compañía satisfará la indemnización al Contratante y Beneficiarioa título oneroso, dentro de los diez (10) días siguientes al término del plazo anterior y contra la firma del finiquito correspondiente.
	  
									  </li>
									  <li><b>DOCUMENTOS  A PRESENTAR  EN CASO DE  FALLECIMIENTO E INVALIDEZ</b><br/>
										 <b>PARA MUERTE POR CUALQUIER CAUSA:</b>
										 <ul style="list-style: disc; font-size: 8px; margin: 0 0 5px 10px; width: 95%;">
											  <li>Certificado de Defunción computarizada emitido por la Corte Nacional 
											  Electoral- Original ó fotocopia legalizada ó Certificado de la persona de 
											  jerarquía en la comunidad del asegurado, excepcionalmente.</li>
											  <li>Cédula  de Identidad,  Certificado de Nacimiento, libreta de servicio 
											  militar ó RUN del asegurado- fotocopia simple</li> 
											  <li>Liquidación de pagos</li>
											  <li>Papeleta de Desembolso</li>
											  <li>Detalle del saldo insoluto</li>
											  <li>Contrato de préstamo –fotocopia simple</li>
											  <li>Certificado Médico Único de Defunción o Informe médico con antecedentes y 
											  causas de fallecimiento Fotocopia simple. Para Créditos Mayores a Bs.126.000 o 
											  $.18.000</li>
											  <li>Historial Clínica si corresponde (Para casos de muerte natural)- original o
											  fotocopia simple. Para Créditos Mayores a Bs.126.000 o $.18.000</li>
											  <li>Certificado del médico forense o Informe de la autoridad competente (Para casos
											  de muerte accidental)- original o fotocopia simple. Para Créditos Mayores a
											  Bs.126.000 o $.18.000</li>
											  <li>Declaración Jurada de Salud – Fotocopia Simple. Para Créditos Mayores a 
											  Bs.126.000 o $.18.000</li>
										 </ul>
										 <b>PARA GASTOS DE SEPELIO:</b>
										 <ul style="list-style: disc; font-size: 8px; margin: 0 0 5px 10px; width: 95%;">
											<li>Certificado de Defunción Original</li>
											<li>Certificado de Nacimiento o Carnet de Identidad o RUN del Beneficiario (s) - 
											 Fotocopia Simple</li>
											<li>Declaración Jurada de salud. o carta de solicitud del beneficiario que reclama
											 el pago siempre y cuando el beneficiario sea de primer grado.</li>
										 </ul>
										 <b>PARA INVALIDEZ TOTAL PERMANENTE:</b>
										 <ul style="list-style: disc; font-size: 8px; margin: 0 0 5px 10px; width: 95%;">
											<li>Certificado Médico emitido por un perito calificado del ente Regulador, (APS) 
											en caso de Invalidez Total y  Permanente, determinando el grado de Invalidez.</li>
											<li>Cédula  de Identidad,  Certificado de Nacimiento, libreta de servicio militar 
											ó RUN del asegurado- fotocopia simple</li> 
											<li>Contrato de préstamo- fotocopia simple</li>
											<li>Liquidación de pagos</li>
											<li>Papeleta de Desembolso</li>
											<li>Detalle del saldo insoluto</li>
											<li>Informe médico indicando la causa primaria, secundaria y la causa agravante 
											de la invalidez permanente del asegurado.</li>
											<li>Historial Clínica si corresponde - original o fotocopia simple. Para Créditos
											 Mayores a Bs.126.000 o $.18.000</li>
											<li>Declaración Jurada de Salud – Fotocopia Simple.Para Créditos Mayores a 
											Bs.126.000 o $.18.000</li>
										 </ul>   
									  </li>
									  
									  <li><b>ADHESIÓN VOLUNTARIA DEL ASEGURADO</b><br/>
									  El asegurado al momento de concretar el crédito con el Contratante, declara su consentimiento voluntario para ser asegurado bajo la póliza arriba indicada.La indemnización en caso de siniestro será a favor del Contratante hasta el monto del saldo insoluto del crédito a la fecha del fallecimiento o a la fecha de dictamen de invalidezdel asegurado.
									  </li>
									  <li><b>CONTRATO PRINCIPAL (PÓLIZA MATRIZ)</b><br/>
									  Todos los beneficios a los cuales tiene derecho el Asegurado, están sujetos a lo estipulado en las Condiciones Generales, Especiales y Particulares de la póliza matriz en virtud de la cual se regula el seguro de vida desgravamen,. La firma del asegurado en el documento de la Declaración Jurada de Salud, implica la expresa aceptación por su parte de todas las condiciones de la póliza matriz, tanto en lo que le beneficia como en lo que lo obliga, siempre y cuando se concrete el crédito y/o al momento de la aceptación por parte de la compañía aseguradora en los casos en los que corresponda.
									  </li>
									  <li><b>COMPAÑÍA ASEGURADORA</b>
									  <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Razón Social:</td>
											  <td style="width: 40%">
												  Nacional Vida Seguros de Personas S.A.
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
										  </tr>
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Dirección:</td>
											  <td style="width: 40%">
												 Calle Capitán Ravelo N° 2334 Edificio Metrobol
											  </td>
											  <td style="width: 15%;">
												Teléfono: 2442942
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">
												Fax : 2442905
											  </td>
										  </tr>
									  </table>
									  </li>
									  <li><b>CORREDOR DE SEGUROS</b>
										<table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Razón Social:</td>
											  <td style="width: 40%">
												  Sudamericana S.R.L.
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
										  </tr>
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Dirección:</td>
											  <td style="width: 40%">
												Prolongación Cordero Nº 163 - San Jorge
											  </td>
											  <td style="width: 15%;">
												Teléfono: (591) -2-2433500
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">
												Fax: (591)-2-2128329
											  </td>
										  </tr>
									  </table>
									  </li>
								  </ul>
								</td>
							  </tr>
						  </table> 
					   <?php
						}elseif($row['modalidad']=='CD'){//CAPITAL DECRECIENTE
					   ?>   
						  <table border="0" cellpadding="0" cellspacing="0" style="font-size: 8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
							  <tr>
								<td style="width: 100%; padding: 5px; text-align: justify;" valign="top">
								NACIONAL VIDA Seguros de Personas S.A., (denominada en adelante la “Compañía “), por el presente CERTIFICADO INDIVIDUAL DE SEGURO hace constar que la persona nominada en la declaración jurada de salud / solicitud de seguro de desgravamen hipotecario, que consta en el anverso, (denominado en adelante el “Asegurado”), está protegido por la Póliza de Seguro de Vida de Desgravamen arriba mencionada, de acuerdo a las  siguientes Condiciones Particulares:
								  <ul style="list-style: decimal; font-size: 8px; margin: 10px 0 5px 10px; width: 95%;">
									  <li><b>CONTRATANTE Y BENEFICIARIO A TÍTULO ONEROSO</b><br/>
										 IDEPRO IFD  -  CAPITAL DECRECIENTE BOLIVIANOS Y DOLARES
									  </li>
									  <li><b>COBERTURAS Y CAPITALES ASEGURADOS:</b>
										 <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
											<tr>
												<td style="width: 3%; font-size:8px;" align="center" valign="top">a.</td>
												<td style="width: 97%;">
													<u>Muerte por cualquier causa:</u><br/>
													Capital Asegurado: Saldo insoluto de la deuda a la fecha del fallecimiento 
													<table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
													  <tr>
														 <td style="width: 15%;">Límites de edad:</td>
														 <td style="width: 15%;">De Ingreso:<br/>De Permanencia</td>
														 <td style="width: 70%;">Desde los 18 años hasta los 70 años<br/>Hasta los 75 años</td>
													  </tr>
													</table>
												</td>
											</tr>
											<tr>
											  <td style="width: 3%; font-size:8px;" align="center" valign="top">b.</td>
											  <td style="width: 97%;">
												<u>Incapacidad Total Permanente (Periodo de espera de 2 meses para dictamen  de la Incapacidad Total Permanente)</u><br/>
												Capital Asegurado: Saldo insoluto de la deuda a la fecha de la Incapacidad Total y Permanente
												  <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
													<tr>
													   <td style="width: 15%;">Límites de edad:</td>
													   <td style="width: 15%;">De Ingreso:<br/>De Permanencia</td>
													   <td style="width: 70%;">Desde los 18 años hasta los 65 años<br/>Hasta los 65 años</td>
													</tr>
												  </table>  
											  </td>
											</tr>
											<tr>
												<td style="width: 3%" align="center" valign="top">c.</td>
												<td style="width: 97%">
													<u>Sepelio</u> US$ 300 o Bs. 2.100
												</td>
											</tr>
										 </table>
									  </li>
									  <li><b>EXCLUSIONES:</b> Este seguro no será aplicable en ninguna de las siguientes circunstancias:
										 <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										   <tr> 
											<td style="width: 5%" align="center" valign="top">a)</td>
											<td style="width: 95%">
											  Si el asegurado participa como conductor o acompañante en competencias de automóviles, motocicletas, lanchas de motor o avioneta, prácticas de paracaídas;
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">b)</td>
											<td style="width: 95%">
											  Si el asegurado realiza operaciones o viajes  submarinos o en transportes aéreos   no autorizados para transporte de pasajeros;
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">c.</td>
											<td style="width: 95%">
											  Si el asegurado participa como elemento activo en guerra internacional o civil, rebelión, sublevación, guerrilla, motín, huelga, revolución y toda emergencia como consecuencia de alteración del orden público, a no ser que se pruebe que la muerte ocurrió independientemente de la existencia de tales condiciones anormales.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">d)</td>
											<td style="width: 95%">
											  Enfermedad grave pre-existente al inicio del seguro, o enfermedad congénita.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">e)</td>
											<td style="width: 95%">
											  Suicidio o invalidez total y permanente como consecuencia del intento de suicidio practicados por el asegurado dentro de los  primeros 6 meses  de vigencia de su cobertura; en consecuencia, este riesgo quedará cubierto a partir del primer día del séptimo mes  de la cobertura para cada operación asegurada.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">f)</td>
											<td style="width: 95%">
											  HIV y/o SIDA
											</td>
										   </tr>
										 </table>
									  </li>
									  <li><b>TASA MENSUAL:</b><br/>
									   Tasa Total Mensual:  <?=$row['tasa_final'];?>  por mil mensual, tasa aplicable al titular del crédito más conyugue, deudores,  ésta tasa puede variar de acuerdo al tipo decrédito, al riesgo particular que represente el aseguradoy/o a las renovaciones futuras de la póliza.
									  </li>
									  <li><b>PROCEDIMIENTO A SEGUIR EN CASO DE SINIESTRO:</b><br/>
										Para reclamar el pago de cualquier indemnización con cargo a esta póliza, el Contratantedeberá remitir a la Compañía su solicitud junto con los	documentos a presentar en caso de fallecimiento o invalidez. La Compañía podrá, a sus expensas, recabar informes o pruebas complementarias.<br/>
	  Una vez recibidos los documentos a presentar en caso de fallecimiento o invalidez,la Compañía notificará dentro de los diez (10) días siguientes, su conformidad o denegación del pago de la indemnización, sobre la base de lo estipulado en las condiciones de la póliza matriz.<br/>
	  En caso de conformidad, la Compañía satisfará la indemnización al Contratante y Beneficiarioa título oneroso, dentro de los diez (10) días siguientes al término del plazo anterior y contra la firma del finiquito correspondiente.
									  </li>
									  <li><b>DOCUMENTOS A PRESENTAR EN CASO DE FALLECIMIENTO E INVALIDEZ</b><br/>
										  <b>PARA MUERTE POR CUALQUIER CAUSA:</b> 
										  <ul style="list-style: disc; font-size: 8px; margin: 0 0 5px 10px; width: 95%;">
											 <li>Certificado de Defunción computarizada emitido por la Corte Nacional Electoral-
											 Original ó fotocopia legalizada ó Certificado de la persona de jerarquía en la 
											 comunidad del asegurado, excepcionalmente.</li>
											 <li>Cédula  de Identidad,  Certificado de Nacimiento, libreta de servicio militar 
											 ó RUN del asegurado- fotocopia simple</li> 
											 <li>Liquidación de pagos</li>
											 <li>Papeleta de Desembolso</li>
											 <li>Detalle del saldo insoluto</li>
											 <li>Contrato de préstamo –fotocopia simple</li>
											 <li>Certificado Médico Único de Defunción o Informe médico con antecedentes y 
											 causas de fallecimiento Fotocopia simple. Para Créditos Mayores a Bs.126.000 o 
											 $.18.000</li>
											 <li>Historial Clínica si corresponde (Para casos de muerte natural)- original o
											  fotocopia simple. Para Créditos Mayores a Bs.126.000 o $.18.000</li>
											 <li>Certificado del médico forense o Informe de la autoridad competente (Para 
											 casos de muerte accidental)- original o fotocopia simple. Para Créditos Mayores a
											 Bs.126.000 o $.18.000</li>
											 <li>Declaración Jurada de Salud – Fotocopia Simple. Para Créditos Mayores a 
											 Bs.126.000 o $.18.000</li>
										  </ul>
										  <b>PARA GASTOS DE SEPELIO:</b>
										  <ul style="list-style: disc; font-size: 8px; margin: 0 0 5px 10px; width: 95%;">
											 <li>Certificado de Defunción Original</li>
											 <li>Certificado de Nacimiento o Carnet de Identidad o RUN del Beneficiario (s) -
											  Fotocopia Simple</li>
											 <li>Declaración Jurada de salud. o carta de solicitud del beneficiario que reclama
											  el pago siempre y cuando el beneficiario sea de primer grado.</li>
										  </ul>
										  <b>PARA INVALIDEZ TOTAL PERMANENTE:</b>
										  <ul style="list-style: disc; font-size: 8px; margin: 0 0 5px 10px; width: 95%;">
											  <li>Certificado Médico emitido por un perito calificado del ente Regulador, 
											  (APS) en caso de Invalidez Total y  Permanente, determinando el grado de 
											  Invalidez.</li>
											  <li>Cédula  de Identidad,  Certificado de Nacimiento, libreta de servicio militar
											  ó RUN del asegurado- fotocopia simple</li> 
											  <li>Contrato de préstamo- fotocopia simple</li>
											  <li>Liquidación de pagos</li>
											  <li>Papeleta de Desembolso</li>
											  <li>Detalle del saldo insoluto</li>
											  <li>Informe médico indicando la causa primaria, secundaria y la causa agravante 
											  de la invalidez permanente del asegurado.</li>
											  <li>Historial Clínica si corresponde - original o fotocopia simple. Para Créditos
											  Mayores a Bs.126.000 o $.18.000</li>
											  <li>Declaración Jurada de Salud – Fotocopia Simple.Para Créditos Mayores a
											  Bs.126.000 o $.18.000</li>
										  </ul>
									  </li>
									  <li><b>ADHESIÓN VOLUNTARIA DEL ASEGURADO</b><br/>
									  El asegurado al momento de concretar el crédito con el Contratante, declara su consentimiento voluntario para ser asegurado bajo la póliza arriba indicada.La indemnización en caso de siniestro será a favor del Contratante hasta el monto del saldo insoluto del crédito a la fecha del fallecimiento o a la fecha de dictamen de invalidezdel asegurado.
									  </li>
									  <li><b>CONTRATO PRINCIPAL (PÓLIZA MATRIZ)</b><br/>
									  Todos los beneficios a los cuales tiene derecho el Asegurado, están sujetos a lo estipulado en las Condiciones Generales, Especiales y Particulares de la póliza matriz en virtud de la cual se regula el seguro de vida desgravamen,. La firma del asegurado en el documento de la Declaración Jurada de Salud, implica la expresa aceptación por su parte de todas las condiciones de la póliza matriz, tanto en lo que le beneficia como en lo que lo obliga, siempre y cuando se concrete el crédito y/o al momento de la aceptación por parte de la compañía aseguradora en los casos en los que corresponda.
									  </li>
									  <li><b>COMPAÑÍA ASEGURADORA</b>
									  <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Razón Social:</td>
											  <td style="width: 40%">
												  Nacional Vida Seguros de Personas S.A.
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
										  </tr>
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Dirección:</td>
											  <td style="width: 40%">
												 Calle Capitán Ravelo No. 2334 Edificio Metrobol
											  </td>
											  <td style="width: 15%;">
												Teléfono 2442942
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">
												Fax : 2442905
											  </td>
										  </tr>
									  </table>
									  </li>
									  <li><b>CORREDOR DE SEGUROS</b>
										<table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Razón Social:</td>
											  <td style="width: 40%">
												  Sudamericana S.R.L.
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
										  </tr>
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Dirección:</td>
											  <td style="width: 40%">
												Prolongación Cordero Nº 163 - San Jorge
											  </td>
											  <td style="width: 15%;">
												Teléfono: (591) -2-2433500
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">
												Fax: (591)-2-2128329
											  </td>
										  </tr>
									  </table>
									  </li>
								  </ul>
								</td>
							  </tr>
						  </table>
					   <?php
						}
					   ?>   
				   <?php
					}elseif($row['tipo_credito']=='VIVIENDA'){
				   ?>	  
					  <h2 style="text-align: center; <?=$h2_s;?>">
						  CERTIFICADO INDIVIDUAL DE SEGURO DE DESGRAVAMEN Nº <?=$row['no_emision'];?>
					  </h2>
					  <h4 style="font-size:9px; text-align:center; margin: -12px 0 0 0; font-weight: bold; font-size: 11px; font-family: Arial;">
						Formato aprobado por la Autoridad de Fiscalización y Control de Pensiones y Seguros –APS  mediante
						R.ANo.081 del 10/03/00<br/>
					   .POLIZA DE  SEGURO DE DESGRAVAMEN HIPORTECARIO N° POL-DH-LP-00093-2008-06<br/>
						Codigo 206-934901-2000 03 006 4008
					  </h4>
						<table border="0" cellpadding="0" cellspacing="0" style="font-size: 8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
							  <tr>
								<td style="width: 100%; padding: 5px; text-align: justify;" valign="top">
								NACIONAL VIDA Seguros de Personas S.A., (denominada en adelante la “Compañía“), por el presente CERTIFICADO INDIVIDUAL DE SEGURO hace constar que la persona nominada en la declaración jurada de salud / solicitud de seguro de desgravamen hipotecario, que consta en el anverso, (denominado en adelante el “Asegurado”), está protegido por la Póliza de Seguro de Vida de Desgravamen arriba mencionada, de acuerdo a las  siguientes Condiciones Particulares:
								  <ul style="list-style: decimal; font-size: 8px; margin: 10px 0 5px 10px; width: 95%;">
									  <li><b>CONTRATANTE Y BENEFICIARIO A TÍTULO ONEROSO</b><br/>
										 IDEPRO - PROYECTO DE VIVIENDA SOCIAL
									  </li>
									  <li><b>COBERTURAS Y CAPITALES ASEGURADOS:</b>
										 <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
											<tr>
												<td style="width: 3%; font-size:8px;" align="center" valign="top">a.</td>
												<td style="width: 97%;">
													<u>Muerte por cualquier causa:</u>
													Capital Asegurado: Saldo insoluto de la deuda a la fecha del fallecimiento 
													<table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
													  <tr>
														 <td style="width: 15%;">Límites de edad:</td>
														 <td style="width: 15%;">De Ingreso:<br/>De Permanencia</td>
														 <td style="width: 70%;">Desde los 18 años hasta los 70 años<br/>Hasta los 75 años</td>
													  </tr>
													</table>
												</td>
											</tr>
											<tr>
											  <td style="width: 3%; font-size:8px;" align="center" valign="top">b.</td>
											  <td style="width: 97%;">
												   <u>Incapacidad Total Permanente (Periodo de espera de 2 meses para dictamen
													 de la Incapacidad Total Permanente)</u><br/>
												   Capital Asegurado: Saldo insoluto de la deuda a la fecha de la Incapacidad 
												   Total y Permanente
												  <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
													<tr>
													   <td style="width: 15%;">Límites de edad:</td>
													   <td style="width: 15%;">De Ingreso:<br/>De Permanencia</td>
													   <td style="width: 70%;">Desde los 18 años hasta los 65 años<br/>Hasta los 65 años</td>
													</tr>
												  </table>  
											  </td>
											</tr>
											<tr>
												<td style="width: 3%" align="center" valign="top">c.</td>
												<td style="width: 97%">
													<u>Sepelio</u> US$ 300 o Bs. 2.100
												</td>
											</tr>
										 </table>
									  </li>
									  <li><b>EXCLUSIONES:</b> Este seguro no será aplicable en ninguna de las siguientes circunstancias:
										 <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										   <tr> 
											<td style="width: 5%" align="center" valign="top">a)</td>
											<td style="width: 95%">
											  Si el asegurado participa como conductor o acompañante en competencias de automóviles, motocicletas, lanchas de motor o avioneta, prácticas de paracaídas; 
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">b)</td>
											<td style="width: 95%">
											 Si el asegurado realiza operaciones o viajes  submarinos o en transportes aéreos   no autorizados para transporte de pasajeros;
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">c)</td>
											<td style="width: 95%">
											 Si el asegurado participa como elemento activo en guerra internacional o civil, rebelión, sublevación, guerrilla, motín, huelga, revolución y toda emergencia como consecuencia de alteración del orden público, a no ser que se pruebe que la muerte ocurrió independientemente de la existencia de tales condiciones anormales.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">d)</td>
											<td style="width: 95%">
											  Enfermedad grave pre-existente al inicio del seguro, o enfermedad congénita.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">e)</td>
											<td style="width: 95%">
											  Suicidio o invalidez total y permanente como consecuencia del intento de suicidio practicados por el asegurado dentro de los  primeros 6 meses  de vigencia de su cobertura; en consecuencia, este riesgo quedará cubierto a partir del primer día del séptimo mes  de la cobertura para cada operación asegurada.
											</td>
										   </tr>
										   <tr> 
											<td style="width: 5%" align="center" valign="top">f)</td>
											<td style="width: 95%">
											  HIV y/o SIDA
											</td>
										   </tr>
										 </table>
									  </li>
									  <li><b>TASA MENSUAL:</b><br/>
									   Tasa Total Mensual:  <?=$row['tasa_final'];?>  por mil mensual, tasa aplicable al titular del crédito más conyugue, deudores,  ésta tasa puede variar de acuerdo al tipo decrédito, al riesgo particular que represente el aseguradoy/o a las renovaciones futuras de la póliza.
									  </li>
									  <li><b>PROCEDIMIENTO A SEGUIR EN CASO DE SINIESTRO:</b><br/>
										Para reclamar el pago de cualquier indemnización con cargo a esta póliza, el Contratantedeberá remitir a la Compañía su solicitud junto con los	documentos a presentar en caso de fallecimiento o invalidez. La Compañía podrá, a sus expensas, recabar informes o pruebas complementarias.<br/>
	  Una vez recibidos los documentos a presentar en caso de fallecimiento o invalidez,la Compañía notificará dentro de los diez (10) días siguientes, su conformidad o denegación del pago de la indemnización, sobre la base de lo estipulado en las condiciones de la póliza matriz.<br/>
	  En caso de conformidad, la Compañía satisfará la indemnización al Contratante y Beneficiarioa título oneroso, dentro de los diez (10) días siguientes al término del plazo anterior y contra la firma del finiquito correspondiente.
									  </li>
									  <li><b>DOCUMENTOS A PRESENTAR EN CASO DE FALLECIMIENTO E INVALIDEZ</b><br/> 
										  <b>PARA MUERTE POR CUALQUIER CAUSA:</b>
										 <ul style="list-style: decimal; font-size: 8px; margin: 10px 0 5px 10px; width: 95%;">
											<li>Certificado de Defunción computarizada emitido por la Corte Nacional Electoral-
											 Original ó fotocopia legalizada ó Certificado de la persona de jerarquía en la 
											 comunidad del asegurado, excepcionalmente.</li>
											<li>Cédula  de Identidad,  Certificado de Nacimiento, libreta de servicio militar ó
											 RUN del asegurado- fotocopia simple</li> 
											<li>Liquidación de pagos</li>
											<li>Papeleta de Desembolso</li>
											<li>Detalle del saldo insoluto</li>
											<li>Contrato de préstamo –fotocopia simple</li>
											<li>Certificado Médico Único de Defunción o Informe médico con antecedentes y causas
											de fallecimiento Fotocopia simple. Para Créditos Mayores a Bs.126.000 o $.18.000</li>
											<li>Historial Clínica si corresponde (Para casos de muerte natural)- original o 
											fotocopia simple. Para Créditos Mayores a Bs.126.000 o $.18.000</li>
											<li>Certificado del médico forense o Informe de la autoridad competente (Para casos 
											de muerte accidental)- original o fotocopia simple. Para Créditos Mayores a Bs.126.000
											 o $.18.000</li>
											<li>Declaración Jurada de Salud – Fotocopia Simple. Para Créditos Mayores a 
											Bs.126.000 o $.18.000</li>
										 </ul> 
										 <b>PARA GASTOS DE SEPELIO:</b>
										 <ul style="list-style: decimal; font-size: 8px; margin: 10px 0 5px 10px; width: 95%;">
											<li>Certificado de Defunción Original</li>
											<li>Certificado de Nacimiento o Carnet de Identidad o RUN del Beneficiario (s) - 
											 Fotocopia Simple</li>
											<li>Declaración Jurada de salud. o carta de solicitud del beneficiario que reclama 
											el pago siempre y cuando el beneficiario sea de primer grado.</li>
										 </ul>
										 <b>PARA INVALIDEZ TOTAL PERMANENTE:</b>
										 <ul style="list-style: decimal; font-size: 8px; margin: 10px 0 5px 10px; width: 95%;">
										   <li>Certificado Médico emitido por un perito calificado del ente Regulador, (APS) 
										   en caso de Invalidez Total y  Permanente, determinando el grado de Invalidez.</li>
										   <li>Cédula  de Identidad,  Certificado de Nacimiento, libreta de servicio militar ó
											RUN del asegurado- fotocopia simple</li> 
										   <li>Contrato de préstamo- fotocopia simple</li>
										   <li>Liquidación de pagos</li>
										   <li>Papeleta de Desembolso</li>
										   <li>Detalle del saldo insoluto</li>
										   <li>Informe médico indicando la causa primaria, secundaria y la causa agravante de la
											invalidez permanente del asegurado.</li>
										   <li>Historial Clínica si corresponde - original o fotocopia simple. Para Créditos 
										   Mayores a Bs.126.000 o $.18.000</li>
										   <li>Declaración Jurada de Salud – Fotocopia Simple.Para Créditos Mayores a Bs.126.000 
										   o $.18.000</li>
										 </ul> 
									  </li>
									  <li><b>ADHESIÓN VOLUNTARIA DEL ASEGURADO</b><br/>
									  El asegurado al momento de concretar el crédito con el Contratante, declara su consentimiento voluntario para ser asegurado bajo la póliza arriba indicada.La indemnización en caso de siniestro será a favor del Contratante hasta el monto del saldo insoluto del crédito a la fecha del fallecimiento o a la fecha de dictamen de invalidezdel asegurado.
									  </li>
									  <li><b>CONTRATO PRINCIPAL (PÓLIZA MATRIZ)</b><br/>
									  Todos los beneficios a los cuales tiene derecho el Asegurado, están sujetos a lo estipulado en las Condiciones Generales, Especiales y Particulares de la póliza matriz en virtud de la cual se regula el seguro de vida desgravamen,. La firma del asegurado en el documento de la Declaración Jurada de Salud, implica la expresa aceptación por su parte de todas las condiciones de la póliza matriz, tanto en lo que le beneficia como en lo que lo obliga, siempre y cuando se concrete el crédito y/o al momento de la aceptación por parte de la compañía aseguradora en los casos en los que corresponda.
									  </li>
									  <li><b>COMPAÑÍA ASEGURADORA</b>
									  <table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Razón Social:</td>
											  <td style="width: 40%">
												  Nacional Vida Seguros de Personas S.A.
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
										  </tr>
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Dirección:</td>
											  <td style="width: 40%">
												 Calle Capitán Ravelo No. 2334 Edificio Metrobol
											  </td>
											  <td style="width: 15%;">
												Teléfono: 2442942
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">
												Fax : 2442905
											  </td>
										  </tr>
									  </table>
									  </li>
									  <li><b>CORREDOR DE SEGUROS</b>
										<table border="0" cellpadding="0" cellspacing="0" style="font-size:8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Razón Social:</td>
											  <td style="width: 40%">
												  Sudamericana S.R.L.
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
										  </tr>
										  <tr>
											  <td style="width: 15%" align="center" valign="top">Dirección:</td>
											  <td style="width: 40%">
												Prolongación Cordero Nº 163 - San Jorge
											  </td>
											  <td style="width: 15%;">
												Teléfono: (591) -2-2433500
											  </td>
											  <td style="width: 15%;">&nbsp;
												
											  </td>
											  <td style="width: 15%;">
												Fax: (591)-2-2128329
											  </td>
										  </tr>
									  </table>
									  </li>
								  </ul>
								</td>
							  </tr>
						  </table>
				   <?php
					}
				   ?>     
				   </div>
				 <?php
				  }
				 ?>  
			  </div>       
			  <div style="<?=$container_1;?>">
				<?php 
				  if($type!=='MAIL' && (boolean)$row['emitir']===true && (boolean)$row['anulado']===false){
				?>
				  <table border="0" cellpadding="0" cellspacing="0" style="font-size: 8px; width: 100%; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
					<tr>
					  <td style="width: 100%; padding: 5px; text-align: justify;" valign="top">
					  <b>NOTA IMPORTANTE</b><br/>
				LA POLIZA MATRIZ SURTIRA SUS EFECTOS PARA EL SOLICITANTE QUIEN SE CONVERTIRA EN ASEGURADO A PARTIR DEL MOMENTO EN QUE EL CREDITO SE CONCRETE, SALVO EN LOS SIGUIENTES CASOS: A) QUE EL SOLICITANTE DEBA CUMPLIR CON OTROS REQUISITOS DE ASEGURABILIDAD ESTABLECIDOS EN LAS CONDICIONES DE LA POLIZA Y A REQUERIMIENTO DE LA COMPANIA ASEGURADORA.B ) QUE EL SOLICITANTE HAYA RESPONDIDO POSITIVAMENTE ALGUNA DE LAS PREGUNTAS DE LA DECLARACION JURADA DE SALUD (CON EXCEPCION DE LA PREGUNTA 1). PARA AMBOS CASOS SE INICIARÁ LA COBERTURA DE SEGURO A PARTIR DE LA ACEPTACION DE LA COMPANIA.
					</td>
				   </tr>
				</table>
				<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>">
				   <tr>
					 <td style="width: 25%; text-align:center;" class="container-logo">
					   <img src="<?=$url;?>img/firma-1.jpg"/>
					 </td>
					 <td style="width: 50%;">
					   <?php
						 if((boolean)$row['emitir']===true){
							 $date = strtotime($row['fecha_emision']);
							 $anio = date("Y", $date); 
							 $mes = num_to_string_date(date("m", $date)); 
							 $dia = date("d", $date); 
					   ?>
							<table border="0" cellspacing="0" cellpadding="0" style="<?=$table;?>">
							  <tr>
							   <td style="width: 25%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								  <td style="width: 100%; <?=$table_borde2;?> text-align:center;"><?=$row['user_departamento'];?></td>
								 </tr></table>
							   </td>
							   <td style="width: 4%;">,</td>
							   <td style="width: 13%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; <?=$table_borde2;?> text-align:center;"><?=$dia;?></td>
								  </tr></table>
							   </td>
							   <td style="width: 10%; text-align:center;">de</td>
							   <td style="width: 25%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								  <td style="width: 100%; <?=$table_borde2;?> text-align:center;"><?=$mes;?></td>
								 </tr></table>
							   </td>
							   <td style="width: 10%; text-align:center;">de</td>
							   <td style="width: 13%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								  <td style="width: 100%; <?=$table_borde2;?> text-align:center;"><?=$anio;?></td>
								 </tr></table>
							   </td>
							  </tr>
							</table>
					   <?php
						 }else{
					   ?>
							<table border="0" cellspacing="0" cellpadding="0" style="<?=$table;?>">
							  <tr>
							   <td style="width: 25%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								  <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
								 </tr></table>
							   </td>
							   <td style="width: 4%;">,</td>
							   <td style="width: 13%;">
								  <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
									<td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
								  </tr></table>
							   </td>
							   <td style="width: 10%; text-align:center;">de</td>
							   <td style="width: 25%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								  <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
								 </tr></table>
							   </td>
							   <td style="width: 10%; text-align:center;">de</td>
							   <td style="width: 13%;">
								 <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
								  <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
								 </tr></table>
							   </td>
							  </tr>
							</table>
					   <?php
						 }
					   ?>      
					 </td>
					 <td style="width: 25%; text-align:center;" class="container-logo">
						  <img src="<?=$url;?>img/firma-2.jpg"/> 
					 </td>
				   </tr>
				</table> 
				<?php
				  }
				?>  
			  </div>
		  
		  </div>
	  
		  <?php
		   if($num_titulares>1){
		  ?>
			  <div style="page-break-after: always;">&nbsp;</div> 
	  <?php		 
		   }
	  
		}
	}
	$ct++;
  }
  
  if ($fac === TRUE) {
		$url .= 'index.php?ms='.md5('MS_DE').'&page='.md5('P_fac').'&ide='.base64_encode($row['id_emision']).'';
?>
        <br/>
        <div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
            No. de Slip de Cotizaci&oacute;n: <?=$row['no_cotizacion'];?>
        </div><br>
        <div style="width:500px; height:auto; padding:10px 15px; border:1px solid #FF2D2D; background:#FF5E5E; color:#FFF; font-size:10px; font-weight:bold; text-align:justify;">
            Observaciones en la solicitud del seguro:<br><br><?=$reason;?>
        </div>
        <div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
            Para procesar la solicitud ingrese al siguiente link con sus credenciales de usuario:<br>
            <a href="<?=$url;?>" target="_blank">Procesar caso facultativo</a>
        </div>

<?php
  }

  if ($implant === TRUE) {
		$url .= 'index.php?ms='.md5('MS_DE').'&page='.md5('P_app_imp').'&ide='.base64_encode($row['id_emision']).'';
?>
        <br/>
        <div style="width:500px; height:auto; padding:10px 15px; border:1px solid #00FFFF; background:#9FE0FF; color:#303030; font-size:10px; font-weight:bold; text-align:justify;">
            Solicitud de Aprobaci&oacute;n: P&oacute;liza: <?=$prefix['prefix'] . '-' . $row['no_emision'];?><br><br>
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

function num_to_string_date($mes_num){
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

function formatCheckMO($data){
	return explode('-', $data);
}
?>