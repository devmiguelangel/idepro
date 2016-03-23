<?php
require ('classes/WebServiceIdepro.php');
?>
<form method="post" action="">
  <input type="text" name="dni">
  <input type="submit" value="Buscar">
</form>
<?php
ini_set('display_errors', 1);

if ($_POST) {
	$ws = new WebServiceIdepro();

    $dni = $_POST['dni'];

	if ($ws->webServiceConnect($dni) === true) {
	    $data = $ws->getResult();
	    if (is_array($data) === true) {
	        $dc_name = $data['cl_nombre'];
	        $dc_lnpatern = $data['cl_paterno'];
	        $dc_lnmatern = $data['cl_materno'];
	        $dc_lnmarried = $data['cl_ap_casada'];
	        $dc_status = $data['cl_estado_civil'];
	        $dc_type_doc = 'CI';
	        $dc_doc_id = $data['cl_ci'];
	        $dc_comp = $data['cl_complemento'];
	        $dc_ext = '';
	        //if (($rowExt = $link->getExtenssionCode($data['cl_extension'])) !== false) {
	            //$dc_ext = $rowExt['id_depto'];
				$dc_ext = $data['cl_extension'];
	        //}
	        $dc_address = $data['cl_direccion'];
	        $dc_birth = $data['cl_fecha_nacimiento'];
	        $dc_occupation = '';
	        //if (($rowOcc = $link->get_occupation_code(
	                //$_SESSION['idEF'], $data['cl_caedec'], 'DE')) !== false) {
	            //$dc_occupation = $rowOcc['id_ocupacion'];
				$dc_occupation = $data['cl_caedec'];
	        //}
	        $dc_phone_1 = $data['cl_tel_domicilio'];
	        $dc_desc_occ = $data['cl_caedec_desc'];
	        $dc_phone_2 = $data['cl_celular'];
	        $dc_email = $data['cl_email'];
	        $dc_phone_office = '';
	        $dc_gender = $data['cl_genero'];
	        $dc_amount = $data['cl_saldo'];
	        ?>
	        <hr>
	        nombre: <?=$dc_name?><br>
	        paterno: <?=$dc_lnpatern?><br>
	        materno: <?=$dc_lnmatern?><br>
	        casada: <?=$dc_lnmarried?><br>
	        estado_civil: <?=$dc_status?><br>
	        tipo_doc: <?=$dc_type_doc?><br>
	        doc_id: <?=$dc_doc_id?><br>
	        comp: <?=$dc_comp?><br>
	        extension: <?=$dc_ext?><br>
	        direccion: <?=$dc_address?><br>
	        happy: <?=$dc_birth?><br>
	        occupation: <?=$dc_occupation?><br>
	       	phone: <?=$dc_phone_1?><br>
	       	desc_occ: <?=$dc_desc_occ?><br>
	       	email: <?=$dc_email?><br>
	       	phone office: <?=$dc_phone_office?><br>
	       	genero: <?=$dc_gender?><br>
	       	saldo: <?=$dc_amount?><br>
			<hr>
	        <?php
	    } else {
	        $err_search = $data;
			echo "<hr>".$err_search."<hr>";
	    }
	} else {
	    $err_search = $ws->message;
		echo "<hr>".$err_search."<hr>";
	}
}
?>