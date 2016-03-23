<?php 
$imagen_link ="boton-excel-mini.png";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Emisiones Idepro</title>

  <link type="text/css" href="../jQueryAssets/smoothness/jquery.ui.all.css" rel="stylesheet" >
  
  <link type="text/css" href="../css/tooltip-ui.css" rel="stylesheet" />
  <link type="text/css" href="../css/flat/_all.css" rel="stylesheet" />
  <link type="text/css" href="../css/square/_all.css" rel="stylesheet" />
  <link type="text/css" href="../css/line/_all.css" rel="stylesheet" />

  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../jQueryAssets/ui/jquery.ui.core.js"></script>
  <script type="text/javascript" src="../jQueryAssets/ui/jquery.ui.widget.js"></script>

  <script type="text/javascript" src="../jQueryAssets/ui/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="../jQueryAssets/ui/i18n/jquery.ui.datepicker-es.js"></script>
</head>


<script type="text/javascript">
$(document).ready(function(e) {
  $(".date").datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd',
    yearRange: "c-100:c+100"
  });
  
  $(".date").datepicker($.datepicker.regional[ "es" ]);
  
});
</script>


<body>
  <center><br><br>
	<table border="0" cellspacing="0" cellpadding="0" style="border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-color: #2A80B9; color:#444444; font-family: Arial;">
    <tr style="background: #2A80B9; color:white; text-align:center;">
      <td colspan="3" height="40">Reporte de Emisiones Ideprollamadas</td>
    </tr>
    <tr style="background: #2A80B9; color:white; text-align:center;">
      <td style="width:190px;" height="40">Producto</td>
      <td style="width:300px;" height="40">Periodo</td>
      <td style="width:190px;" height="40">Reporte</td>
    </tr>
    <tr>
      <td colspan="3" style="background:#1C6592;" height="6"></td>
    </tr>
    <tr><td colspan="3"><br></td></tr>
		<tr>
			<td align="center">
				<select name="producto" id="producto" style="color:#444444;">
          <option value="">Seleccione</option>
					<option value="desgravamen">Desgravamen</option>
				</select>
			</td>
      <td style="font-size:9pt;" align="center">
        <div class="periodo" style="display:none;">
          <table>
            <tr style="background:#2A80B9; color:white; text-align:center;"><td>Fecha Inicio</td><td>Fecha Fin</td></tr>
            <tr>
              <td>
                <input type="text" name="fecha_ini" id="fecha_ini"  style="width: 125px; text-align:center" maxlength="10" readonly="readonly" class="date" placeholder="Fecha Inicio" /> 
              </td>
              <td>
                <input type="text" name="fecha_fin" id="fecha_fin"  style="width: 125px; text-align:center" maxlength="10" readonly="readonly" class="date" placeholder="Fecha Fin" /> 
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td align="center">
        <a href="#" id="link_ha_a" style="display:none;"><img src="../images/<?=$imagen_link?>" onClick=abrir_ventana(); /> <a/>
      </td>
    </tr>
    <tr><td colspan="3"><br></td></tr>
    <tr>
      <td colspan="3" style="background:#2A80B9;">&nbsp;</td>
    </tr>
	</table>
  <div style="font-family:Arial; font-size:6pt; color:#2A80B9;">
    &copy; Power by Coboser, tchiri@coboser.com
  </div>
  <script type="text/javascript">
    var producto='';
    $(document).ready(function(){
      $('#producto').change(function(e){
        producto = $(this).prop('value');
        switch  (producto){
          case 'desgravamen': 
            $('.periodo').css({'display':''});
            $('#link_ha_a').css({'display':''});
            break;
          default:
            $('.periodo').css({'display':'none'});
            $('#link_ha_a').css({'display':'none'});
        }
      });
    }); 
    //FUNCION GENERAL DE REDIRECCION
    function abrir_ventana(){
      var link='';
      switch  (producto){
        case 'desgravamen': 
          var fecha_ini=document.getElementById("fecha_ini").value;
          var fecha_fin=document.getElementById("fecha_fin").value;
          if (fecha_ini!='' && fecha_fin!='') {
            link ="emisiones.php?producto="+producto+"&fecha_ini="+fecha_ini+"&fecha_fin="+fecha_fin;
            //alert(link);
          }else{
            alert('Seleccione Rango de Fechas');
          }
          break;
        case '':
          alert('No posible');
          break;
      }
      if (link!='') {
        window.open(link);
      }
    }
  </script>
</body>
</html>