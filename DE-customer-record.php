<?php
require('sibas-db.class.php');

$arrDE = array(0 => 0, 1 => 'R', 2 => 'Error.');

if(isset($_POST['dc-token']) 
	&& isset($_POST['dc-idc']) 
	&& isset($_POST['ms']) 
	&& isset($_POST['page']) 
	&& isset($_POST['pr']) 
	&& isset($_POST['id-ef'])){
	$swEmpty = FALSE;
	
	/*foreach($_POST as $key => $value){
		if($key != 'dc-ln-matern' && $key != 'dc-phone-2' 
				&& $key != 'dc-phone-office' && $key != 'dc-ln-married' 
				&& $key != 'dc-comp' && $key != 'dc-email'
				&& $key != 'dc-country' && $key != 'dc-place-birth'
				&& $key != 'dc-locality'){
			if(empty($value))
				$swEmpty = TRUE;
		}
	}*/
	
	if($swEmpty === FALSE && $_POST['pr'] === base64_encode('DE|02')){
		$link = new SibasDB();
		
		$idc = $link->real_escape_string(trim(base64_decode($_POST['dc-idc'])));
		$idef = $link->real_escape_string(trim(base64_decode($_POST['id-ef'])));
		
		$idClient = 0;
		$flag = FALSE;
		if(isset($_POST['dc-idCl'])){
			$flag = TRUE;
			$idClient = $link->real_escape_string(trim(base64_decode($_POST['dc-idCl'])));
		}
		
		$dc_name = $link->real_escape_string(trim($_POST['dc-name']));
		$dc_lnpatern = $link->real_escape_string(trim($_POST['dc-ln-patern']));
		$dc_lnmatern = $link->real_escape_string(trim($_POST['dc-ln-matern']));
		$dc_lnmarried = $link->real_escape_string(trim($_POST['dc-ln-married']));
		$dc_status = $link->real_escape_string(trim($_POST['dc-status']));
		$dc_type_doc = $link->real_escape_string(trim($_POST['dc-type-doc']));
		$dc_doc_id = $link->real_escape_string(trim($_POST['dc-doc-id']));
		$dc_comp = $link->real_escape_string(trim($_POST['dc-comp']));
		$dc_ext = $link->real_escape_string(trim($_POST['dc-ext']));
		$dc_country = $link->real_escape_string(trim($_POST['dc-country']));
		$dc_birth = $link->real_escape_string(trim($_POST['dc-date-birth']));
		$dc_place_birth = $link->real_escape_string(trim($_POST['dc-place-birth']));
		$dc_place_res = $link->real_escape_string(trim($_POST['dc-place-res']));
		$dc_locality = $link->real_escape_string(trim($_POST['dc-locality']));
		$dc_address = $link->real_escape_string(trim($_POST['dc-address']));
		$dc_occupation = $link->real_escape_string(trim(base64_decode($_POST['dc-occupation'])));
		$dc_phone_1 = $link->real_escape_string(trim($_POST['dc-phone-1']));
		$dc_desc_occ = $link->real_escape_string(trim($_POST['dc-desc-occ']));
		$dc_phone_2 = $link->real_escape_string(trim($_POST['dc-phone-2']));
		$dc_email = $link->real_escape_string(trim($_POST['dc-email']));
		$dc_phone_office = $link->real_escape_string(trim($_POST['dc-phone-office']));
		$dc_gender = $link->real_escape_string(trim($_POST['dc-gender']));
		$dc_weight = $link->real_escape_string(trim($_POST['dc-weight']));
		$dc_height = $link->real_escape_string(trim($_POST['dc-height']));
        $dc_amount = 0;
        if (isset($_POST['dc-amount'])) {
            $dc_amount = $link->real_escape_string(trim(base64_decode($_POST['dc-amount'])));
        }
		
		if($dc_status !== 'CAS' || $dc_gender !== 'F')
			$dc_lnmarried = '';
		
		$ms = $link->real_escape_string(trim($_POST['ms']));
		$page = $link->real_escape_string(trim($_POST['page']));
		$pr = $link->real_escape_string(trim($_POST['pr']));
		
		$sqlAge = 'select 
				count(ssh.id_home) as token,
				ssh.edad_max,
				ssh.edad_min,
				(TIMESTAMPDIFF(year,
					"'.$dc_birth.'",
					curdate()) between ssh.edad_min and ssh.edad_max) as flag
			from
				s_sgc_home as ssh
					inner join s_entidad_financiera as sef ON (sef.id_ef = ssh.id_ef)
			where
				ssh.producto = "DE"
					and sef.id_ef = "'.$idef.'"
					and sef.activado = true
			;';
		
		$rsAge = $link->query($sqlAge,MYSQLI_STORE_RESULT);
		$rowAge = $rsAge->fetch_array(MYSQLI_ASSOC);
		$rsAge->free();

		$rowAge['flag'] = $link->verifyYearUser($rowAge['edad_min'], $rowAge['edad_max'], $dc_birth);
		
		if($rowAge['flag'] === true){
			$sql = '';
			if($flag === TRUE){
				$sql = 'update s_de_cot_cliente as scl
                set scl.tipo = 0, scl.razon_social = "",
                    scl.paterno = "'.$dc_lnpatern.'",
                    scl.materno = "'.$dc_lnmatern.'",
                    scl.nombre = "'.$dc_name.'",
                    scl.ap_casada = "'.$dc_lnmarried.'",
                    scl.fecha_nacimiento = "'.$dc_birth.'",
                    scl.lugar_nacimiento = "'.$dc_place_birth.'",
                    scl.ci = "'.$dc_doc_id.'",
                    scl.extension = '.$dc_ext.',
                    scl.complemento = "'.$dc_comp.'",
                    scl.tipo_documento = "'.$dc_type_doc.'",
                    scl.estado_civil = "'.$dc_status.'",
                    scl.lugar_residencia = '.$dc_place_res.',
                    scl.localidad = "'.$dc_locality.'",
                    scl.direccion = "'.$dc_address.'",
                    scl.pais = "'.$dc_country.'",
                    scl.id_ocupacion = "'.$dc_occupation.'",
                    scl.desc_ocupacion = "'.$dc_desc_occ.'",
                    scl.telefono_domicilio = "'.$dc_phone_1.'",
                    scl.telefono_oficina = "'.$dc_phone_office.'",
                    scl.telefono_celular = "'.$dc_phone_2.'",
                    scl.email = "'.$dc_email.'",
                    scl.peso = '.$dc_weight.',
                    scl.estatura = '.$dc_height.',
                    scl.genero = "'.$dc_gender.'",
                    scl.edad = TIMESTAMPDIFF(YEAR, "'.$dc_birth.'", curdate()),
                    scl.saldo_deudor = ' . $dc_amount . '
                where scl.id_cliente = "'.$idClient.'"
                ;';
				
				if($link->query($sql) === TRUE){
					$arrDE[0] = 1;
					$arrDE[1] = 'de-quote.php?ms='.$ms.'&page='.$page.'&pr='.$pr.'&idc='.base64_encode($idc);
					$arrDE[2] = 'Los Datos se actualizaron correctamente';
				}else{
					$arrDE[2] = 'No se pudo actualizar los datos';
				}
			}else{
				$DC = $link->number_clients($idc, $idef, FALSE);
				$vc = $link->verify_customer($dc_doc_id, $dc_ext, $idef);
				
				$idd = uniqid('@S#1$2013',true);
				
				if($vc[0] === TRUE){
					$idClient = $vc[1];
					
					$sql = 'update s_de_cot_cliente as scl
                    set scl.tipo = 0, scl.razon_social = "",
                        scl.paterno = "'.$dc_lnpatern.'",
                        scl.materno = "'.$dc_lnmatern.'",
                        scl.nombre = "'.$dc_name.'",
                        scl.ap_casada = "'.$dc_lnmarried.'",
                        scl.fecha_nacimiento = "'.$dc_birth.'",
                        scl.lugar_nacimiento = "'.$dc_place_birth.'",
                        scl.ci = "'.$dc_doc_id.'",
                        scl.extension = '.$dc_ext.',
                        scl.complemento = "'.$dc_comp.'",
                        scl.tipo_documento = "'.$dc_type_doc.'",
                        scl.estado_civil = "'.$dc_status.'",
                        scl.lugar_residencia = '.$dc_place_res.',
                        scl.localidad = "'.$dc_locality.'",
                        scl.direccion = "'.$dc_address.'",
                        scl.pais = "'.$dc_country.'",
                        scl.id_ocupacion = "'.$dc_occupation.'",
                        scl.desc_ocupacion = "'.$dc_desc_occ.'",
                        scl.telefono_domicilio = "'.$dc_phone_1.'",
                        scl.telefono_oficina = "'.$dc_phone_office.'",
                        scl.telefono_celular = "'.$dc_phone_2.'",
                        scl.email = "'.$dc_email.'",
                        scl.peso = '.$dc_weight.',
                        scl.estatura = '.$dc_height.',
                        scl.genero = "'.$dc_gender.'",
                        scl.edad = TIMESTAMPDIFF(YEAR, "'.$dc_birth.'", curdate()),
                        scl.saldo_deudor = ' . $dc_amount . '
                    where scl.id_cliente = "'.$idClient.'"
                    ;';
				}else{
					$idClient = uniqid('@S#1$2013',true);
					
					$sql = 'insert into s_de_cot_cliente
					(`id_cliente`, `id_ef`, `tipo`, `razon_social`, `paterno`,
					`materno`, `nombre`, `ap_casada`, `fecha_nacimiento`,
					`lugar_nacimiento`, `ci`, `extension`, `complemento`,
					`tipo_documento`, `estado_civil`, `lugar_residencia`,
					`localidad`, `direccion`, `pais`, `id_ocupacion`,
					`desc_ocupacion`, `telefono_domicilio`, `telefono_oficina`,
					`telefono_celular`, `email`, `peso`, `estatura`, `genero`,
					`edad`, `saldo_deudor` )
					values
					("'.$idClient.'", "'.$idef.'", 0, "", "'.$dc_lnpatern.'",
					"'.$dc_lnmatern.'", "'.$dc_name.'", "'.$dc_lnmarried.'",
                    "'.$dc_birth.'", "'.$dc_place_birth.'", "'.$dc_doc_id.'",
                    '.$dc_ext.', "'.$dc_comp.'", "'.$dc_type_doc.'",
                    "'.$dc_status.'", '.$dc_place_res.', "'.$dc_locality.'",
                    "'.$dc_address.'", "'.$dc_country.'", "'.$dc_occupation.'",
                    "'.$dc_desc_occ.'", "'.$dc_phone_1.'", "'.$dc_phone_office.'",
                    "'.$dc_phone_2.'", "'.$dc_email.'", '.$dc_weight.',
                    '.$dc_height.', "'.$dc_gender.'",
                    TIMESTAMPDIFF(YEAR, "'.$dc_birth.'", curdate()), ' . $dc_amount . ') ;';
				}
				
				if($link->query($sql) === true){
					$sqlDet = 'insert into s_de_cot_detalle
                    (`id_detalle`, `id_cotizacion`, `id_cliente`,
                    `porcentaje_credito`, `titular`)
					values
                    ("'.$idd.'", "'.$idc.'", "'.$idClient.'",
                    100, "'.$DC.'") ;';
					
					if ($link->query($sqlDet) === TRUE) {
						$arrDE[0] = 1;
						$arrDE[1] = 'de-quote.php?ms='.$ms.'&page='.$page.'&pr='.$pr.'&idc='.base64_encode($idc);
						$arrDE[2] = 'Cliente registrado con Exito';
					} else {
						$arrDE[2] = 'No se pudo registrar el Detalle';
					}
				}else{
					$arrDE[2] = 'No se pudo registrar el Cliente';
				}
			}
		}else{
			$arrDE[2] = 'La Fecha de Nacimiento no esta en el rango permitido de Edades [ ' 
				. $rowAge['edad_min'] . ' - ' . $rowAge['edad_max'] . ' ]';
		}
		echo json_encode($arrDE);
	}else{
		$arrDE[2] = 'Error .';
		echo json_encode($arrDE);
	}
}else{
	$arrDE[2] = 'Error!';
	echo json_encode($arrDE);
}
?>