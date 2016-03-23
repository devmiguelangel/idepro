<?php
function de_em_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$conexion = $link;
	
	$fuenteTXT = 'font-size: 8px;';		$widthMAIN = 'width: 795px;';	$marginCONTAINER = 'margin: 0 auto;';
	$fuenteDet = 'font-size: 8px;';
	
	//STYLE
	//	#container-c
	$cssContainer = 'width: 795px; height: auto; '.$marginCONTAINER.' padding: 0;';
	
	//	#main-c{
	$cssMain = $widthMAIN.' height: auto; margin: 0 auto; padding: 0; font-weight: normal; '.$fuenteTXT.' font-family: Arial;';
	
	//	.header-left
	//$header_left = 'width: 245px; float: left;';
	
	//	.header-right
	//$header_right = 'width: 250px; float: left; text-align: right;';
	
	//	.h1-c
	$cssH1 = 'font-weight: normal; '.$fuenteTXT.' font-family: Arial; text-align: center; margin: 0; padding: 0;';
	
	//	.header-left
	//$header_left_2 = 'width: 100px; float: left;';
	
	//	.header-right
	//$header_right_2 = 'width: 100px; float: left; text-align: right;';
	
	$cssH1_2 = 'font-weight: bold; font-size: 12px; font-family: Arial; text-align: center; margin: 0; padding: 0;';
	
	// .h1-span 
	$cssH1span= 'font-size: 20px; font-weight: bold; font-family: Arial; text-align: center; margin: 0; padding: 0;';
	
	// .h1-span 
	$cssH1span_2= 'font-size: 20px; font-weight: bold; font-family: "Times New Roman"; text-align: center; margin: 0; padding: 0;';
	//	.h2-c
	$cssH2 = $cssH1.' font-weight: bold; text-align: left; margin: 0; padding: 0;';
	
	//	.content-c1
	$cssContent1 = 'width: 100%; font-weight: normal; '.$fuenteTXT.' font-family: Arial; margin: 0; padding: 0;';
	//	.content-c2
	$cssContent2 = $cssContent1.' margin: 0; padding: 2px 0;';
	
	//	.table-c
	$cssTable1 = 'font-weight: normal; '.$fuenteTXT.' font-family: Arial; width: 100%; margin:0; border: 1px solid #000; border-radius:8px; padding: 5px 5px 5px 5px;';
		$cssTable1TrTd = 'vertical-align: bottom; padding: 1px 0;';
	
	$cssTable2 = 'font-weight: normal; '.$fuenteTXT.' font-family: Arial; width: 100%; margin:0; padding: 0; border-collapse: collapse;';
	
	//	.border-fc
	$cssBorderF = 'border: 1px solid #000000; ';
	//	.align-tc tr td{
	$cssAlignTop = 'vertical-align: top;';
	$cssBA = $cssBorderF.$cssAlignTop;
	
	//	.border-tc
	$cssBorderT = $cssBorderF.' border-top: 0 none;';
	$cssBA2 = $cssBorderF.$cssAlignTop.$cssBorderT;
	
	//	.border-bc tr td{
	$cssBorderB = 'border-bottom: 1px solid #000000;';
	
	//	.tittle-c
	$cssTittle = 'font-weight: bold; text-align: left; margin: 0; padding: 0;';
	
	//	.check-c
	$cssCheckDisplay = 'display: inline-block; #display: inline; _display: inline; zoom: 1; ';
	$cssCheck1 = 'border: 1px solid #000000; margin-left:5px; width: 8px; height: 8px; text-align: center; ';
	/*
	if($email == false){
		$cssCheck1 .= $cssCheckDisplay;
	}*/
	//	.check-c2{
	$cssCheck2 = 'margin-left: -3px; '.$cssCheck1;
	
	//	.datos-c{
	$cssDatos = 'display:block; margin: 0; padding: 1px 0 1px 5px; height: 10px; text-align:center;';
	
	//	.text-page-c{
	$cssTextPage = 'width: 50%; padding: 0 3px; text-align: justify; '.$fuenteTXT.' vertical-align: top;';
	
	//	.margin-top-cp{
	$cssMarginTop = 'margin-top: 3px;';
	
	//	.text-exclusion-c tr td{
	$cssTextExclusion = 'vertical-align: top; '.$fuenteTXT.'';
	
	//	.tab-c{
	$cssTab = 'margin-left: 30px; display: inline-block; #display: inline; _display: inline; zoom: 1;';  
	
	$table = 'width: 100%; font-weight: normal; font-size: 9px; font-family: Arial; margin: 2px 0 0 0; padding: 0; 		border-collapse: collapse; vertical-align: bottom;';
	$table_borde2 = 'border-bottom: 1px solid #080808;';
	ob_start();
?>
<div id="container-c" style="<?=$cssContainer;?>">
  <div id="main-c" style="<?=$cssMain;?>">
        
        <h1 style="<?=$cssH1;?> margin-top: 45px;">
        	<table style="<?=$cssTable2;?> margin-top: 5px; <?=$fuenteDet;?>" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="width:245px; text-align:center;"><img src="<?=$url;?>images/<?=@$row['logo_cia'];?>" style="width:100%;"/></td>
            		<td style="width:300px; text-align:center;"><span style="<?=$cssH1span;?>">Declaración de Salud y/o Solicitud de Seguro de Desgravamen Hipotecario - A2</span><br/>Cod. A.P.S.: 204-934904-2007 07 049-3003</td>
                    <td style="width:250px; text-align:center;">
                    	<img src="<?=$url;?>images/<?=@$row['logo_ef'];?>"/><br>
           				Póliza Nº <?=@$row['no_poliza'];?>
                    </td>
                </tr>
            </table>        
        </h1> 
        
    
    <!--<div style="<?=$cssContent1;?>">
		<table style="<?=$cssTable1;?>" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 30%; <?=$cssTable1TrTd;?> text-align:left;">
					No de Certificado DE-<?=$row['no_emision'];?>
				</td>
				<td style="width: 40%; <?=$cssTable1TrTd;?>"></td>
				<td style="width: 30%; <?=$cssTable1TrTd;?> text-align:right;">
					<strong><?=$row['text_copia'].$row['num_copia'];?></strong>
				</td>	
			</tr>
		</table>
	</div>-->
    <div style="<?=$cssContent2;?>">
    	
        <?php
			$cobertura = formatCheck($row['tipo_seguro']);
		?>
        <table style="<?=$cssTable1;?>" border="0" cellpadding="0" cellspacing="0">
        	<tr>
                <td colspan="5">Estimado  cliente, le solicitamos la información que se requiere a continuación (utilice letra clara)</td>
                <td>&nbsp;</td>
                <td colspan="3"><font style="font-weight:bold;">En caso de que - El Cúmulo desembolsado sea mayor a $us 15.000.-</font><br /></td>
            </tr>
            <tr>
                <td colspan="9">
                    
                    
                    <font style="font-weight:bold;">Ud(s). solicita(n) el seguro alcance de cobertura de tipo:</font><br />
                </td>
            </tr>
            <tr>
                <td style="width: 4.5%; padding: 0; <?=$cssTable1TrTd;?>"><span style="<?=$cssTittle;?>">Individual</span></td>
                <td style="width: 2%; padding: 0; <?=$cssTable1TrTd;?>"><div style="<?=$cssCheck1;?>"><?=@$cobertura[0];?></div></td>
                <td style="width: 26.5%; padding: 0; <?=$cssTable1TrTd;?>">Si marca esta opción, solo debe completar la información requerida al TITULAR 1</td>
                <td style="width: 6.5%; padding: 0; <?=$cssTable1TrTd;?>"><span style="<?=$cssTittle;?>">Mancomunada</span></td>
                <td style="width: 2%; padding: 0; <?=$cssTable1TrTd;?>"><div style="<?=$cssCheck1;?>"><?=@$cobertura[1];?></div></td>
                <td style="width: 24.5%; padding: 0; <?=$cssTable1TrTd;?>">Si marca esta opción, debe completar la información requerida al TITULAR 1 y al TITULAR 2</td>
                <td style="width: 7.5%; padding: 0; <?=$cssTable1TrTd;?>"><span style="<?=$cssTittle;?>">Banca Comunal</span></td>
                <td style="width: 2%; padding: 0; <?=$cssTable1TrTd;?>"><div style="<?=$cssCheck1;?>"><?=@$cobertura[1];?></div></td>
                <td style="width: 23.5%; padding: 0; <?=$cssTable1TrTd;?>">&nbsp;</td>
            </tr>
        </table>
    </div>
    
    <div style="<?=$cssContent2;?>">
		<span style="<?=$cssTittle;?>">DATOS PERSONALES</span>
        <?php
		  if($rsDt->data_seek(0)){
          	
			  while($regi2=$rsDt->fetch_array(MYSQLI_ASSOC)){
				 
               $sexoA = formatCheck($regi2['sexo']);                
		?>
                <table style="<?=$cssTable1;?>" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width: 100%; padding: 2px 0;" colspan="6"><span style="<?=$cssTittle;?>">INFORMACION SOBRE EL TITULAR <?=@$regi2['titular_num'];?></span></td>
                    </tr>
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                    
                    <tr>
                        <td style="width: 10%;">Nombre Completo:</td>
                        <td style="width: 26%;">
                        	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['paterno'];?></p></td>
                        	</tr></table>
                        </td>
                        <td style="width: 26%;">
                        	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['materno'];?></p></td>
                        	</tr></table>
                        </td>
                        <td style="width: 27%;">
                        	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['nombre'];?></p></td>
                        	</tr></table>
                        </td>
                        <td style="width: 6%;">Hombre <div style="<?=$cssCheck1;?> float:right;"><?=@$sexoA[0];?></div></td>
                        <td style="width: 5%;">Mujer <div style="<?=$cssCheck1;?> float:right;"><?=@$sexoA[1];?></div></td>
                    </tr>
                    <tr>
	                    <td>&nbsp;</td>
                        <td style="text-align:center;">Apellido Paterno</td>
                        <td style="text-align:center;">Apellido Materno</td>
                        <td style="text-align:center;">Nombres</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>                   
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                    
                    <tr>
                    	<td colspan="6">
                        	<table style="<?=$cssTable2;?>" border="0" cellpadding="0" cellspacing="0">
                   				<tr>
                                	<td style="width: 15%;">Lugar y Fecha de Nacimiento:</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['lugar_nacimiento'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['fecha_nacimiento'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 3%;">C.I.:</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['ci'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 5%;">Edad:</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['edad'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 7%;">Peso (kg):</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['peso'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 8%;">Estatura (cm):</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['estatura'];?></p></td>
                                        </tr></table>
                                    </td>
                                </tr>
                            </table>        
                    	</td>
                    </tr>
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                    
                    <tr>
                    	<td colspan="6">
                        	<table style="<?=$cssTable2;?>" border="0" cellpadding="0" cellspacing="0">
                   				<tr>
                                    <td style="width:6%;">Dirección:</td>
                                    <td style="width:50%;" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['direccion'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width:5%;">Telf. Dom.: </td>
                                    <td style="width:17%;">                       
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['telefono'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width:6%;">Telf. Oficina:</td>
                                    <td style="width:16%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['tel_of'];?></p></td>
                                        </tr></table>
                                    </td>
                    			</tr>
                            </table>
                        </td>
                    </tr> 
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                      
                    <tr>
                    	<td colspan="6">
                        	<table style="<?=$cssTable2;?>" border="0" cellpadding="0" cellspacing="0">
                   				<tr>
                                    <td style="width:5%;">Ocupación:</td>
                                    <td style="width:40%;" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['ocupacion'];?></p></td>
                                        </tr></table>
                                    </td>
                                    <td style="width:12%;">Nombre Asoc. Comunal: </td>
                                    <td style="width:18%;">                       
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><!--<p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['nombre'];?></p>--></td>
                                        </tr></table>
                                    </td>
                                    <td style="width:8%;">Código:</td>
                                    <td style="width:17%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>"><!--<p style="<?=$cssDatos;?>">&nbsp;<?=@$regi2['nombre'];?></p>--></td>
                                        </tr></table>
                                    </td>
                    			</tr>
                            </table>
                        </td>
                    </tr> 
                     
                    <tr><td colspan="6">&nbsp;</td></tr>                   
                </table><br />
            
        <?php	
			  }
			  if($row['num_cliente']!=2){
			   ?>
                  <table style="<?=$cssTable1;?>" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width: 100%; padding: 2px 0;" colspan="6"><span style="<?=$cssTittle;?>">INFORMACION SOBRE EL TITULAR 2</span></td>
                    </tr>
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                    
                    <tr>
                        <td style="width: 10%;">Nombre Completo:</td>
                        <td style="width: 26%;">
                        	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                        	</tr></table>
                        </td>
                        <td style="width: 26%;">
                        	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                        	</tr></table>
                        </td>
                        <td style="width: 27%;">
                        	<table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                        	</tr></table>
                        </td>
                        <td style="width: 6%;">Hombre <div style="<?=$cssCheck1;?> float:right;">&nbsp;</div></td>
                        <td style="width: 5%;">Mujer <div style="<?=$cssCheck1;?> float:right;">&nbsp;</div></td>
                    </tr>
                    <tr>
	                    <td>&nbsp;</td>
                        <td style="text-align:center;">Apellido Paterno</td>
                        <td style="text-align:center;">Apellido Materno</td>
                        <td style="text-align:center;">Nombres</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                    
                    <tr>
                    	<td colspan="6">
                        	<table style="<?=$cssTable2;?>" border="0" cellpadding="0" cellspacing="0">
                   				<tr>
                                	<td style="width: 15%;">Lugar y Fecha de Nacimiento:</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 3%;">C.I.:</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 5%;">Edad:</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 7%;">Peso (kg):</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width: 8%;">Estatura (cm):</td>
                                    <td style="width: 10%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                </tr>
                            </table>        
                    	</td>
                    </tr>
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                    
                    <tr>
                    	<td colspan="6">
                        	<table style="<?=$cssTable2;?>" border="0" cellpadding="0" cellspacing="0">
                   				<tr>
                                    <td style="width:6%;">Dirección:</td>
                                    <td style="width:50%;" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width:5%;">Telf. Dom.: </td>
                                    <td style="width:17%;">                       
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width:6%;">Telf. Oficina:</td>
                                    <td style="width:16%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                    			</tr>
                            </table>
                        </td>
                    </tr> 
                    
                    <tr><td colspan="6">&nbsp;</td></tr>
                      
                    <tr>
                    	<td colspan="6">
                        	<table style="<?=$cssTable2;?>" border="0" cellpadding="0" cellspacing="0">
                   				<tr>
                                    <td style="width:5%;">Ocupación:</td>
                                    <td style="width:40%;" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width:12%;">Nombre Asoc. Comunal: </td>
                                    <td style="width:18%;">                       
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                                    <td style="width:8%;">Código:</td>
                                    <td style="width:17%;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                            <td style="width: 100%; <?=$table_borde2;?>">&nbsp;</td>
                                        </tr></table>
                                    </td>
                    			</tr>
                            </table>
                        </td>
                    </tr> 
                     
                    <tr><td colspan="6">&nbsp;</td></tr>
                </table>
               <?php	  
			  }
		  }
		?>    
	</div>
    <div style="<?=$cssContent2;?>">
		<table style="<?=$cssTable1;?>" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 70%;"><span style="<?=$cssTittle;?>">CUESTIONARIO (Las Respuestas debe marcarlas con una aspa)</span></td>
				<td style="width: 15%; text-align: center;"><span style="<?=$cssTittle;?>">RESPUESTAS<br />TITULAR 1</span></td>
				<td style="width: 15%; text-align: center;"><span style="<?=$cssTittle;?>">RESPUESTAS<br />TITULAR 2</span></td>
			</tr>
            <tr><td colspan="3">
            	<table style="<?=$cssTable2;?>" border="0" cellpadding="1"cellspacing="0">
                    <tr>
                        <td style="width: 70%; text-align: left;">&nbsp;</td>
                        <td style="width: 7.5%; text-align: center;">SI</td>
                        <td style="width: 7.5%; text-align: center;">NO</td>
                        <td style="width: 7.5%; text-align: center;">SI</td>
                        <td style="width: 7.5%; text-align: center;">NO</td>				
                    </tr>
                    <?php
                       if($rsDt->data_seek(0)){
                           $arrayQs = array();
                           $vec = array();
                           $obvs = array();
                           $c=1;
                           while($resp=$rsDt->fetch_array(MYSQLI_ASSOC)){
                               $jsonData=$resp['respuesta'];
                               $phpArray = json_decode($jsonData, true);
                               if($resp['titular_txt']=='DD'){
                                   $j=1;
                                   foreach($phpArray as $value){
                                      //echo $value; echo'<br/>'; 
                                      $vec=explode('|',$value);
                                      $arrayQs[$j][1]=$vec[1];
                                      if($row['num_cliente']==1){
                                        $arrayQs[$j][2] = '';
                                      } 
                                      $j++;
                                   }
                                   $obvs[$c][1]=$resp['observacion'];
                                   if($row['num_cliente']==1){
                                       $obvs[$c+1][2]='';
                                   }  
                               }
                               
                               if($resp['titular_txt']=='CC'){
                                     $j=1;
                                     foreach($phpArray as $value){
                                       //echo $value; echo'<br/>'; 
                                       $vec=explode('|',$value);
                                       $arrayQs[$j][2] = $vec[1];
                                       $j++;
                                     }
                                     $obvs[$c][2]=$resp['observacion'];
                               }
                               $c++;
                           }
                       }	
                        
                        $select5="select
                                      pregunta,
                                      respuesta,
                                      orden
                                    from
                                      s_pregunta
                                    where
                                      id_ef_cia='".$row['id_ef_cia']."'   
                                    order by
                                       orden asc;";
                        $res5 = $conexion->query($select5,MYSQLI_STORE_RESULT);
                        $k=1;
                        while($regi5=$res5->fetch_array(MYSQLI_ASSOC)){
                            
                    ?>
                              <tr>
                                  <td style="width: 70%; text-align: left;"><?=$regi5['pregunta']?></td>
                                  <?php 
                                    if($arrayQs[$k][1]==1){
                                  ?>
                                      <td style="width: 7.5%; padding-left:26px;"><div style="<?=$cssCheck2;?>">X</div></td>
                                      <td style="width: 7.5%; padding-left:26px;"><div style="<?=$cssCheck2;?>">&nbsp;</div></td>
                                   <?php
                                    }elseif($arrayQs[$k][1]==0){
                                   ?>   
                                      <td style="width: 7.5%; padding-left:26px;"><div style="<?=$cssCheck2;?>">&nbsp;</div></td>
                                      <td style="width: 7.5%; padding-left:26px;"><div style="<?=$cssCheck2;?>">X</div></td>
                                   <?php
                                    }
                                    if($row['num_cliente']!=1){
                                        if($arrayQs[$k][2]==1){
                                   ?>   
                                            <td style="width: 7.5%; padding-left:26px;" align="center"><div style="<?=$cssCheck2;?>">X</div></td>
                                            <td style="width: 7.5%; padding-left:26px;" align="center"><div style="<?=$cssCheck2;?>">&nbsp;</div></td>
                                   <?php
                                        }elseif($arrayQs[$k][2]==0){
                                   ?>
                                            <td style="width: 7.5%; padding-left:26px;" align="center"><div style="<?=$cssCheck2;?>">&nbsp;</div></td>
                                            <td style="width: 7.5%; padding-left:26px;" align="center"><div style="<?=$cssCheck2;?>">X</div></td>
                                   <?php 	
                                        }
                                    }else{
                                    ?>	
                                       <td style="width: 7.5%; padding-left:26px;" align="center"><div style="<?=$cssCheck2;?>">&nbsp;</div></td>
                                       <td style="width: 7.5%; padding-left:26px;" align="center"><div style="<?=$cssCheck2;?>">&nbsp;</div></td>
                                    
                                    <?php	
                                    }
                                   ?>   
                              </tr>
                    <?php
                          $k++;
                        }
                    ?>
                </table> <br />
				Si ha contestado afirmativamente a alguno de los puntos 1 al 4, detallar los mismos:  
                <table style="<?=$cssTable2;?> margin-top: 5px;" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width: 15%;">Titular 1:</td>
                        <td style="width: 85%;">
                            <table style="<?=$cssTable2;?>">
                                <tr><td style="width: 100%; <?=$cssBorderB;?>">&nbsp;<?=$obvs[1][1];?></td></tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">Titular 2:</td>
                        <td style="width: 85%;">
                            <table style="<?=$cssTable2;?>">
                                <tr><td style="width: 100%; <?=$cssBorderB;?>">&nbsp;<?=$obvs[2][2];?></td></tr>
                            </table>
                        </td>
                    </tr>
                </table> <br />
                Declaro que las respuestas que he consignado en esta solicitud son verdaderas y completas y que es de mi conocimiento que cualquier declaración reticente o inexacta, omisión u ocultación hará èrder todos los beneficios del Seguro.<br /><br />
                
                Declaro beneficiario a titulo oneroso de ésta póliza a CRÉDITO CON EDUCACIÓN RURAL <?=@$row['ef_nombre']?> para el pago del saldo deudor existente, en caso de sinistro cubierto de acuerdo a los términos y condiciones del Seguro.<br /><br />
                
                Asimismo autorizo a los médicos, clínicas, hospitales y otros centros de salud que me hayan atendido o que me atiendan en el futuro, para que proporcionen a <?=@$row['compania']?> todos los resultados de los informes referentes a mi salud, en caso de enfermedad o accidente, para lo cual releva a dichos médicos y centros médicos en relación con su secreto profesional, de toda responsabilidad en que pudiera incurrir al proporcionar tales informes. Asimismo, autorizo a <?=@$row['compania']?> a proporcionar resultados a CRÉDITO CON EDUCACION RURAL <?=@$row['ef_nombre']?>. Asimismo me comprometo a hacer conocer a los beneficiarios la existencia de este Seguro y sus terminos y condiciones. 
                
                <table style="<?=$cssTable2;?> margin-top: 35px;" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:10%;">LUGAR Y FECHA</td>
                        <td style="width:20%;">
                            <table border="0" cellpadding="0" cellspacing="0" style="<?=$table;?>"><tr>
                                <td style="width: 100%; <?=$table_borde2;?>"><?=@$row['user_departamento'];?>, <?=@$row['fecha_emision'];?></td>
                            </tr></table>
                        </td>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr><td colspan="5">&nbsp;</td></tr>
                    <tr><td colspan="5">&nbsp;</td></tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td style="width: 30%; border-top:1px solid #000;" align="center">FIRMA DEL SOLICITANTE (TITULAR 1)</td>
                        <td style="width: 10%;">&nbsp;</td>
                        <td style="width: 30%; border-top:1px solid #000;" align="center">FIRMA DEL SOLICITANTE (TITULAR 2)</td>
                    </tr>
                </table>
            </td></tr>
		</table>
	</div>    
    
    <div style="<?=$cssContent2;?>">
		<span style="<?=$cssTittle;?>">NOTA: </span>La Compañia se reserva el derecho de solicitar examen(es) médico(s) o información adicional.<br />		
	</div><br />    
	<br />
    <span style="<?=$cssTittle;?>">Emisión de certificado de acuerdo a Slip de Cotización No. <?=@$row['no_cotizacion'];?> &nbsp;&nbsp;<?php
      $anulados="select
				  no_emision,
				  id_cotizacion,
				  anulado
				from
				  s_de_em_cabecera
				where
				  id_cotizacion='".$row['id_cotizacion']."' and anulado=1;";
	  $resu=$conexion->query($anulados, MYSQLI_STORE_RESULT);
	  $num=$resu->num_rows;
	  $text_anulados='';
	  if($num>0){
		  echo'Certificados anulados:&nbsp;'; 
		  while($regi=$resu->fetch_array(MYSQLI_ASSOC)){
		      $text_anulados .= 'DE-'.$regi['no_emision'].', ';
		  }
		  echo trim($text_anulados,', ');
	  }			  
		?> 
	</span><br /><br /> 
     <?php
     if((boolean)$row['facultativo'] === TRUE){
		 if(!empty($row['aprobado'])){ 
		?>
              <table border="0" cellpadding="1" cellspacing="0" style="width: 100%; font-size: 8px; border-collapse: collapse;">
                    <tr>
                        <td colspan="7" style="width:100%; text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">Caso Facultativo</td>
                    </tr>
                    <tr>
                        
                        <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Aprobado</td>
                        <td style="width:12%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa de Recargo</td>
                        <td style="width:14%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Porcentaje de Recargo</td>
                        <td style="width:12%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa Actual</td>

                        <td style="width:12%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Tasa Final</td>
                        <td style="width:45%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Observaciones</td>
                    </tr>
                    <tr>
                        
                        <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['aprobado'];?></td>
                        <td style="width:12%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['tasa_recargo'];?></td>
                        <td style="width:14%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['porcentaje_recargo'];?> %</td>
                        <td style="width:12%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['tasa_actual'];?> %</td>
                        <td style="width:12%; text-align: center; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['tasa_final'];?> %</td>
                        <td style="width:45%; text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['observacion'];?></td>
                    </tr>
               </table>
              
		<?php
		 }else{
		?> 	 
			<table border="0" cellpadding="1" cellspacing="0" style="width: 100%; font-size: 8px; border-collapse: collapse;">
                    <tr>
                        <td colspan="7" style="width:100%; text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">Caso Facultativo</td>
                    </tr>
                    <tr>
                        <td style="width:100%; text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">Observaciones</td>
                    </tr>
                    <tr>
                        
                        <td style="width:100%; text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;"><?=$row['motivo_facultativo'];?></td>
                    </tr>
               </table>
     <?php
		 }
	  }
	 ?>
     
     <div style="page-break-after: always;">&nbsp;</div>
         <div style="<?=$cssContent2;?> margin-top: 50px; <?=$fuenteDet;?>">			
            <h1 style="<?=$cssH1_2;?> margin-top: 45px;">
            	<table style="<?=$cssTable2;?> margin-top: 5px; <?=$fuenteDet;?>" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:100px; text-align:center;"><img src="<?=$url;?>images/<?=$row['logo_cia'];?>" style="width:100%;"/></td>
                        <td style="width:545px; text-align:center;"> 
                        	<span style="font-size:10px;">Anexo Nº 1 del Contrato de Crédito Nº</span><br />
			                <span style="<?=$cssH1span_2;?>">Póliza de Seguro de Desgravamen Hipotecario <br />Certificado de Cobertura Individual</span><br/>Código. Asignado A.P.S.: 204-934904-2007 07 049-4001
                        </td>
                        <td style="width:100px; text-align:center;">
                            <img src="<?=$url;?>images/<?=$row['logo_ef'];?>"/>
                        </td>
                    </tr>
                </table> 
               
            </h1>  
            
            
            <table style="<?=$cssTable2;?> margin-top: 5px; <?=$fuenteDet;?>" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="font-weight:bold; width:8%;">CONTRATANTE: </td>
                    <td style="font-weight:bold; width:52%;" colspan="5">Crédito con Educación Rural "<?=@$row['ef_nombre']?>"</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">PÓLIZA: </td>
                    <td style="font-weight:bold;"  colspan="5"><?=@$row['no_poliza'];?></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">ASEGURADO: </td>
                    <td colspan="5">Prestatarios de <?=@$row['ef_nombre']?>, nominado en el Contrato de Crédito del que forma parte de este Anexo y que cumpla con los límites de edad y requisitos de asegurabilidad de la Póliza.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td valign="top" style="font-weight:bold; width:8%;">Límites de edad:</td>
                    <td valign="top" style="font-weight:bold; width:7%;">Para Muerte: </td>
                    <td style="width:37%;">De ingreso: Mínima 15 Años, Máxima 70 años.<br />De permanencia: Hasta los 75 años.</td>
                    <td valign="top" style="font-weight:bold; width:8%;">Para Invalidez: </td>
                    <td style="width:32%">De ingreso Mínima 15 Años, máxima 64 años.<br /> De permanencia: Hasta los 65 años.</td>
                </tr>
                <tr>
                    <td colspan="6" style="font-weight:bold;">BENEFICIARIO A TÍTULO ONEROSO: Crédito con Educación Rural "<?=@$row['ef_nombre']?>"</td>
                </tr>
                <tr><td colspan="6">&nbsp;</td></tr>
                <tr>
                    <td colspan="6" style="border-top:1px solid #000; border-bottom:1px solid #000; padding:2px 2px 2px 2px;"><?=@$row['compania']?> CERTIFICA QUE SE ENCUENTRA ASEGURADO (A) CON LAS SIGUIENTES COBERTURAS:</td>
                </tr>                    
            </table>
            <table style="<?=$cssTable2;?> margin-top: 5px; <?=$fuenteDet;?>" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="width:40%;">
                        <span style="font-weight:bold;">COBERTURAS:</span>
                        <ol style="list-style:disc;">
                            <li>Muerte Natural y/o Accidental</li>
                            <li>Pago Anticipado por invalidez Total y Permanente</li>
                        </ol>
                    </td>
                    <td style="width:40%;">
                        <span style="font-weight:bold;">CAPITAL ASEGURADO:</span>
                        <ol style="font-weight:normal; list-style:disc;">
                            <li>Saldo Deudor</li>
                            <li>Saldo Deudor</li>
                        </ol>
                    </td>
                </tr>   
            </table>
			<table style="<?=$cssTable2;?> margin-top: 5px; <?=$fuenteDet;?>" border="0" cellpadding="0" cellspacing="0">
                <tr>
					<td style="<?=$cssTextPage;?> <?=$fuenteDet;?>">
						<b style="<?=$cssMarginTop;?>">COBERTURAS ADICIONALES:<br />
                        PAGO ANTICIPADO POR INVALIDEZ TOTAL Y PERMANENTE:</b><br /> 
						<br/>
                        A los efectos de la presente cobertura se considera invalidez Total y Permanente el hecho de que el Asegurado, antes de llegar a los 65 años de edad, quede incapacitado en por lo menos un 65%, a causa de un estado crónico, debido a enfermedad, o a lesion o a la pérdida de miembros o funciones, que impida ejecutar cualquier trabajo y siempre que el caracter de tal incapacidad sea reconocido.<br /><br />
						
                        <b>EXCLUSIONES:<br /><br /> Para muerte natural y/o accidental:</b><br/>
                        <ol style="list-style:lower-alpha; margin:0; padding-left:10px;">
                        	<li>Pena de muerte o participación, directa o indirecta en calidad de autor o cómplice en cualquier acto delictivo.</li>
                            <li>Guerra, guerra civil, invacion o acción de un enemigo extranjero, hostilidades u operaciones bélicas, ya sea bajo declaración de guerra o no.</li>
                            <li>Confiscación, nacionalización, requisición hecha u ordenada por cualquier autoridad pública, nacional o local, ley marcial o Estado de sitio, rebelión, revolución insurrecciñin, sedición, insubordinación, poder militar o usurpado, huelgas, motines, asonada, conmoción civil o popular de cualquier clase, daño malicioso, vandalismo, sabotaje y/o terrorismo, siempre que el Asegurado tenga participación activa en dichos hechos.</li>
                            <li>Enfermedades preexistentes, o lesiones, o dolencias preexistentes, entendiéndose por tales cualquier lesión o enfermedad, o dolencia que afecte el asegurado, que haya sido conocida por él y que haya sido diagnosticada con anterioridad a la fecha de incorporación del Asegurado de la póliza.</li>
						</ol>
                        En todos estos casos, si ocurriese la muerte del Asegurado como consecuencia de una causa excluida, no corresponderá la devolución de Prima alguna.<br /><br />
                        
                        <b>Para invalidez total y permanente:</b><br/>
                        <ol style="list-style:lower-alpha; margin:0; padding-left:10px;">
                        	<li>Participación directa o indirecta, en calidad de autor o cómplice en cualquier acto delictivo.</li>
                            <li>Guerra, invasión, actos de enemigos extranjeros, hostilidades y operaciones bélicas, sea que haya habido o no declaración de guerra, servicio militar, revolución, insurrección sublevación, rebelión, sedición, motín; hechos que las leyes califican como delitos contra la Seguridad del Estado.</li>
                            <li>Enfermedades, lesiones o dolencias preexistentes entendiéndose por tales cualquier lesión, enfermedad o dolencia que afecte al Asegurado, que haya sido conocida por él y que haya sido diagnosticada con anterioridad a la fecha de incorporación del Asegurado a la Póliza.</li>
                            <li>La práctica o desempeño de alguna actividad, profesión u oficio claramente reisgoso, que no haya sido declarado por el Asegurado al momento de contratar el seguro o durante su vigencia, y que no haya sido aceptado por la Compañía mediante anexo expreso, sujeto a extra prima.</li>
                            <li>Falsas declaraciones, omisión o reticencia del Asegurado que puedan influir en la comprobación de su estado de invalidez.</li>
						</ol><br />
                        
						<b style="<?=$cssMarginTop;?>">PROCEDIMIENTO EN CASO DE SINIESTRO:</b><br/>
                        El beneficiario a Titulo Oneroso, tan prontoy a mas tardar dentro de los 90 días calendario de tener conocimiento del fallecimiento de alguno de los Asegurados, deberá comunicar tal hecho a la Compañía, salvo fuerza mayor o impedimento justificado. En caso de muerte presunta, ésta deberá acreditarse de acuerdo a ley.						
						</td>
						<td style="<?=$cssTextPage;?> <?=$fuenteDet;?>">
							Una vez recibidos los documentos probatorios del fallecimiento del Asegurado, la Compañía en caso de conformidad, pagará el Capital Asegurado correspondiente al Beneficiario.<br /><br />
                            
                            La obligación de pagar el Capital Asegurado deberá ser cumplida por la Compañía en un solo acto, por su valor total y en dinero. Y quedará sujeta a los términos y condiciones establecidos en los Articulos 1031, 1033 y 1034 del Código de Comercio.<br /><br />
                            El Beneficiario deberá presentar a la Compañía la siguiente documentación.
                            
                            <b>Para Muerte por cualquier causa.</b><br/>
                            <ol style="list-style:lower-alpha; margin:0; padding-left:10px;">
                            	<li>Fotocopia del Certificado de Nacimiento o Fotocopia del Carnet de Identidad del Asegurado.</li>
                                <li>Certificado de Defunción Original.</li>
                                <li>Liquidación de cartera con el monto indemnizable.</li>
                                <li>Fotocopia del contrato de préstamo y la planilla de desembolso o la planilla de solicitud de Prestamo en caso de Banca Comunal.</li>
                                <li>Extracto de préstamo por modalidad de crédito;</li>
                            </ol><br />
                            
                            La compañía se reserva el derecho de exigir a las autoridades competentes y a su costa, la autopsia o exhumación del cadaver para establecer las causas de la muerte. El Beneficiario y/o sucesores deben prestar su colaboración y concurso para la obtención de las correspondientes autorizaciones oficiales. Si el Beneficiario y/o los sucesores se negaran a permitir dicha autopsia o exhumación, o la retardan en la forma que ella sea inútil para el fin perseguido, el beneficiario perderá el derecho a la indemnización del Cápital asegurado por esta Póliza.<br /><br />
                            
							<b>Por Invalidez total y permanente.</b><br />
							<ol style="list-style:lower-alpha; margin:0; padding-left:10px;">
                            	<li>Fotocopia del Certificado de Nacimiento o Fotocopia del Carnet de Identidad del Asegurado.</li>
                                <li>Liquidación de cartera con el monto indemnizable.</li>
                                <li>Fotocopia del contrato de préstamo y la Planilla de Desembolso o la planilla de solicitud de Prestamo en caso de Banca Comunal.</li>
                                <li>Extracto de préstamo por tipo de crédito.</li>
                                <li>Informe del médico tratante correspondiente.</li>
                                <li>Certificado INSO (Instituto Nacional de Salud Ocupacional) o en su defecto de otra institución o médico que este debidamente autorizado por la Autoridad Competente la cual determine el grado de Invalidez.</li>
                            </ol><br />
                            
							<b style="<?=$cssMarginTop;?>">CONDICIÓN DE ADHESIÓN:</b> El Asegurado se adhiere voluntariamente al Seguro de Desgravamen Hipotecario. La firma del Asegurado en el Contrato de Crédito, implica el conocimiento, aceptación, adhesion voluntaria al presente Seguro, y la recepción del presente Certificado de Cobertura.<br /><br />
							
							<b style="<?=$cssMarginTop;?>">TODOS LOS BENEFICIOS A LOS CUALES EL ASEGURADO TIENE DERECHO SE SUJETAN A LO ESTIPULADO EN LAS CONDICIONES GENERALES, PARTICULARES Y/O ESPECIALES DE LA PÓLIZA DE DESGRAVAMEN HIPOTECARIO GRUPO No <?=@$row['no_poliza'];?> DE LA CUAL EL PRESENTE CERTIFICADO FORMA PARTE INTEGRANTE.</b><br />
                            
							<b style="<?=$cssMarginTop;?>">PRIMA:</b> De acuerdo a declaraciones mensuales del Contratante.<br/>
                            <b style="<?=$cssMarginTop;?>">FORMA DE PAGO:</b> CONTANDO A TRAVÉS DE CRÉDITO CON EDUCACION RURAL <?=@$row['ef_nombre']?> LUGAR Y FECHA: De acuerdo al Contrato de Crédito del que este Anexo forma parte.<br/>
						</td>
					</tr>
			</table>
		</div><br /><br /><br /><br /><br /><br /><br />

        
        
        
          <div style="<?=$cssContent2;?>">
              <table style="<?=$cssTable2;?> <?=$fuenteDet;?>" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                      <td style="width: 20%;"></td>
                      <td style="width: 20%; text-align:center;">
                          <img src="img/firma-ds.jpg" width="84" height="97" />
                      </td>
                      <td style="width: 20%; text-align:center;" rowspan="2"><?=@$row['compania']?></td>
                      <td style="width: 20%; text-align:center;">
                          <img src="img/firma-rs.jpg" width="46" height="97" />
                      </td>
                      <td style="width: 20%;"></td>
                  </tr>
                  <tr>
                      <td style="width: 20%;"></td>
                      <td style="width: 20%; text-align: center;">Santiago Bustillos Ardaya<br/><b>APODERADO</b></td>
                      <td style="width: 20%; text-align: center;">Jorge Alvarez Pol<br/><b>APODERADO</b></td>
                      <td style="width: 20%;"></td>
                  </tr>
              </table>
          </div>
<?php
	if ($fac === TRUE) {
		$url .= 'index.php?ms='.md5('MS_DE').'&page='.md5('P_fac').'&ide='.base64_encode($row['id_emision']).'';
?>
<br>
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
?>
	</div>
</div>
<?php
	$html = ob_get_clean();
	return $html;
}

function formatCheck($data){
	return explode('-', $data);
}
?>