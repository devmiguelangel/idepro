<?php
function de_pes_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$conexion = $link;
	
	ob_start();
?>
<div id="content_cert">
	<div id="c_main" style="width: 750px; height: auto; font-size: 13px; font-family: Arial;">
		<div style="text-align: center; font-size: 150%; font-weight: bold; margin-top:100px;">
			SLIP DE COTIZACIÓN<br/>VIDA GRUPO
		</div>
		
		<br>
        
		<div style="width: 790px; border: 0px solid #FFFF00; ">
			<table 
				cellpadding="0" cellspacing="0" border="0" 
				style="width: 100%; height: auto; font-family: Arial;">
				<tr>
					<td style="width: 100%; background:#E4E4E4;"><b>LUGAR Y FECHA DE LA REALIZACIÓN DE LA PROPUESTA:</b> La Paz, septiembre 12 de 2014</td>	
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
				<tr style="background:#E4E4E4;">
					<td style="width: 100%;"><b>RESPONSABLE DE LA ELABORACIÓN DE LA PROPUESTA:</b> Manuela Oquendo López</td>
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
					<td style="width: 100%;"><b>RESPONSABLE DE LA SOLICITUD DE LA PROPUESTA:</b> Jonny Almanza - SUDAMERICANA</td>
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
					<td style="width: 100%;"><b>COMPAÑÍA:</b> <?=$row['compania'];?></td>
				</tr>
			</table>
		</div><br>
        <div style="width: 790px; border: 0px solid #FFFF00; ">
            <table 
				cellpadding="0" cellspacing="0" border="0" 
				style="width: 100%; height: auto; font-size: 90%; font-family: Arial;">
				<tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>I.</b></td>
                         <td style="width:90%;"><b>DATOS DEL CONTRATANTE:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
				<tr>
					<td style="width: 100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
							<tr>
								<td style="width:15%;">&nbsp;</td>
                                <td style="width:20%; font-weight:bold;" valign="middle">Contratante</td>
								<td style="width:65%;"><?=$row['ef_nombre'];?></td>
							</tr>
                            <tr>
								<td style="width:15%;">&nbsp;</td>
                                <td style="width:20%; font-weight:bold;" valign="middle">Asegurados</td>
								<td style="width:65%;">Prestatarios del Contratante</td>
							</tr>
                            <tr>
								<td style="width:15%;">&nbsp;</td>
                                <td style="width:20%; font-weight:bold;" valign="middle">Dirección Legal</td>
								<td style="width:65%;">Calle Campos Nº 132 esquina Av. Arce</td>
							</tr>
                            <tr>
								<td style="width:15%;">&nbsp;</td>
                                <td style="width:20%; font-weight:bold;" valign="middle">Actividad/Ocupación</td>
								<td style="width:65%;">Servicios Financieros</td>
							</tr>
						</table>
                    </td>
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>II.</b></td>
                         <td style="width:90%;"><b>COBERTURAS Y CAPITALES ASEGURADOS:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
				  <td style="width: 100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width:10%;">&nbsp;</td>
                              <td style="width:30%;" valign="middle">a. Muerte Natural y/o Accidental</td>
                              <td style="width:60%;">$us. 3.000</td>
                          </tr>
                      </table>
                  </td>
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>III.</b></td>
                         <td style="width:90%;"><b>EDAD PROMEDIO:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
				  <td style="width: 100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width:15%;">&nbsp;</td>
                              <td style="width:30%;" valign="middle">39 años</td>
                              <td style="width:55%;">&nbsp;</td>
                          </tr>
                      </table>
                  </td>
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>IV.</b></td>
                         <td style="width:90%;"><b>PRIMAS:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
				  <td style="width: 100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width:10%;">&nbsp;</td>
                              <td style="width:30%;" valign="middle">a. Prima mensual por persona</td>
                              <td style="width:60%;">$us. <?=$row['pr_prima'];?></td>
                          </tr>
                      </table>
                  </td>
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>V.</b></td>
                         <td style="width:90%;"><b>LIMITES DE EDAD:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
				  <td style="width: 100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                             <td colspan="3" style="width:100%;">
                                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                                    <tr>
                                        <td style="width: 5%;">&nbsp;</td>
                                        <td style="width: 40%; font-weight: bold;">Para Muerte Natural y/o Accidental</td>
                                        <td style="width: 55%; ">&nbsp;</td>
                                    </tr>
                                </table>
                             </td>
                          </tr>
                          <tr>
                              <td style="width:10%;">&nbsp;</td>
                              <td style="width:80%;" valign="middle">
                              Edad mínima de ingreso 18 años<br/>
                              Edad máxima de ingreso 70 años<br/>
                              Edad de permanencia hasta los 80 años</td>
                              <td style="width:10%;">&nbsp;</td>
                          </tr>
                          <tr><td style="width:100%;" colspan="3">&nbsp;</td></tr>
                      </table>
                  </td>
				</tr>
			</table>
        </div>
        
        <page><div style="page-break-after: always;"></div></page>
        
        <div style="width: 790px; border: 0px solid #FFFF00; margin-top:50px;">
            <table 
				cellpadding="0" cellspacing="0" border="0" 
				style="width: 100%; height: auto; font-size: 90%; font-family: Arial;">
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>VI.</b></td>
                         <td style="width:90%;"><b>EXCLUSIONES:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
                   <td style="width: 100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width: 10%;">&nbsp;</td>
                              <td style="width: 85%;">
                                  La prestación asegurada no será pagada en aquellos casos en que el fallecimiento del 
                                  Asegurado sobrevenga directa o indirectamente como consecuencia de:<br/><br/>
                                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%; ">
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">1.</td>
                                          <td style="width: 90%;">Participación del Asegurado en actos de guerra,
                                           declarada o no, sedición, rebelión, asonada, conspiración, motín, tumulto, o
                                           cualquier acto que tenga relación con ellos, salvo comprobación de que el 
                                           Asegurado no haya participado, o formado parte activa de dichos actos.</td>
                                      </tr>
                                      <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">2.</td>
                                          <td style="width: 90%;">Participación del Asegurado en carreras de velocidad o resistencia, concursos o desafíos.</td>
                                      </tr>
                                      <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">3.</td>
                                          <td style="width: 90%;">Suicidio durante los dos primeros años de haber estado asegurado ininterrumpidamente.</td>
                                      </tr>
                                      <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">4.</td>
                                          <td style="width: 90%;">HIV – SIDA.</td>
                                      </tr>
                                      <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">5.</td>
                                          <td style="width: 90%;">Enfermedades Pre - existentes Conocidas.</td>
                                      </tr>
                                  </table> 
                              </td>
                              <td style="width: 5%; ">&nbsp;</td>
                          </tr>
                      </table>
                   </td>
                </tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>VII.</b></td>
                         <td style="width:90%;"><b>BENEFICIARIOS EN CASO DE MUERTE:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
                   <td style="width:100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width: 10%;">&nbsp;</td>
                              <td style="width: 80%;">Herederos legales y/o según declaración en el formulario de solicitud.</td>
                              <td style="width: 10%; ">&nbsp;</td>
                          </tr>
                      </table>
                   </td>
                </tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>VIII.</b></td>
                         <td style="width:90%;"><b>VIGENCIA:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
                   <td style="width:100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width: 10%;">&nbsp;</td>
                              <td style="width: 80%;">Vigencia de la Póliza: 1 año, con declaraciones mensuales.</td>
                              <td style="width: 10%; ">&nbsp;</td>
                          </tr>
                      </table>
                   </td>
                </tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr style="background:#E4E4E4;">
                  <td style="width:100%;">
                     <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                       <tr>
                         <td style="width:10%;"><b>VIII.</b></td>
                         <td style="width:90%;"><b>REQUISITOS DE ASEGURABILIDAD:</b></td>	
                       </tr>  
                     </table>
                  </td>  
				</tr>
                <tr><td style="width:100%;">&nbsp;</td></tr>
                <tr>
                   <td style="width:100%;">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
                          <tr>
                              <td style="width: 10%;">&nbsp;</td>
                              <td style="width: 85%;">
                                  <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%; ">
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;" valign="top">1.</td>
                                          <td style="width: 90%;">Base de datos de los propuestos asegurados, que contenga mínimamente: Nombres y Apellidos, Nº de la CI. Fecha de Nacimiento, breve descripción de la Actividad de cada Propuesto Asegurado, en formato digital (Excel).</td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">2.</td>
                                          <td style="width: 90%;">Llenado del formulario de solicitud de Vida Grupo reducido (3 preguntas)</td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;" valign="top">3.</td>
                                          <td style="width: 90%;">Fotocopia de la Cédula de Identidad de los propuestos asegurados, debidamente firmada.</td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">4.</td>
                                          <td style="width: 90%;">
                                             <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                                               <tr>
                                                <td style="width:70%;">Fotocopia de NIT de la empresa.</td>
                                                <td style="width:30%; font-weight:bold;">(Requisito de la UIF)</td>
                                               </tr>
                                             </table>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">5.</td>
                                          <td style="width: 90%;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                                               <tr>
                                                <td style="width:70%;">Fotocopia de inscripción a FUNDEMPRESA.</td>
                                                <td style="width:30%; font-weight:bold;">(Requisito de la UIF)</td>
                                               </tr>
                                             </table>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">6.</td>
                                          <td style="width: 90%;">
                                             <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                                               <tr>
                                                <td style="width:70%;">Fotocopia de C.I. Representante Legal.</td>
                                                <td style="width:30%; font-weight:bold;">(Requisito de la UIF)</td>
                                               </tr>
                                             </table>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">7.</td>
                                          <td style="width: 90%;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                                               <tr>
                                                <td style="width:70%;">Fotocopia del Poder del Representante Legal.</td>
                                                <td style="width:30%; font-weight:bold;">(Requisito de la UIF)</td>
                                               </tr>
                                            </table>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">8.</td>
                                          <td style="width: 90%;">Cotización firmada por el Representante Legal.</td>
                                      </tr>
                                      <tr>
                                          <td style="width: 5%;">&nbsp;</td>
                                          <td style="width: 5%;">9.</td>
                                          <td style="width: 90%;">Exámenes médicos si corresponde de acuerdo a la tabla de asegurabilidad.</td>
                                      </tr>
                                  </table> 
                              </td>
                              <td style="width: 5%; ">&nbsp;</td>
                          </tr>
                          <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
                          <tr>
                            <td style="width:10%;"></td>
                            <td style="width:85%;"><b>Validez de la oferta:</b> 15 días a partir de la fecha de cotización.</td>
                            <td style="width:5%;"></td>
                          </tr>
                      </table>
                   </td>
                </tr>       
            </table>    
        </div>
        
		
	</div>
</div>

<?php
	$html = ob_get_clean();
	return $html;
}
?>