<?php 
$imagen_link ="boton-excel-mini.png";
//include('../header.inc.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comisiones Ideprollamadas</title>

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
    yearRange: "c-1:c"
  });
  
  $(".date").datepicker($.datepicker.regional[ "es" ]);
  
});
</script>


<body>
  <center><br><br>
  <table border="0" cellspacing="0" cellpadding="0" style="border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-color: #17A086; color:#444444; font-family: Arial;">
    <tr style="background: #17A086; color:white; text-align:center;">
      <td colspan="3" height="40">Reporte de <b>Comisiones</b> Ideprollamadas</td>
    </tr>
    <tr style="background: #17A086; color:white; text-align:center;">
      <td style="width:190px;" height="40">Tipo</td>
      <td style="width:300px;" height="40">Periodo</td>
      <td style="width:190px;" height="40">Reporte</td>
    </tr>
    <tr>
      <td colspan="3" style="background:#068A72;" height="6"></td>
    </tr>
    <tr><td colspan="3"><br></td></tr>
    <tr>
      <td align="center">
        <select name="tipo" id="tipo" style="color:#444444;">
          <option value="">Seleccione</option>
          <option value="diario">Diario</option>
          <option value="mensual">Mensual</option>
          <option value="campana">Trimestral</option>
          <option value="anual">Campa&ntilde;a</option>
          <option value="agencias">Por Agencias</option>
        </select>
      </td>
      <td style="font-size:9pt;" align="center">
        <div class="periodo_dia" style="display:none;">
          <table>
            <tr style="background:#17A086; color:white; text-align:center;"><td>Fecha Inicio</td><td>Fecha Fin</td></tr>
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
        <div class="periodo_mes" style="display:none;">
          <table>
            <tr style="background:#17A086; color:white; text-align:center;"><td>Mes</td><td>A&ntilde;o</td></tr>
            <tr>
              <td>
                <select name="mes" id="mes" style="color:#444444;">
                  <option value="">Seleccione</option>
                  <option value="1" 
                  <?php if (date("m")==1) {
                    echo " selected ";
                  }?>
                  >01 Enero</option>
                  <option value="2" 
                  <?php if (date("m")==2) {
                    echo " selected ";
                  }?>
                  >02 Febrero</option>
                  <option value="3" 
                  <?php if (date("m")==3) {
                    echo " selected ";
                  }?>
                  >03 Marzo</option>
                  <option value="4" 
                  <?php if (date("m")==4) {
                    echo " selected ";
                  }?>
                  >04 Abril</option>
                  <option value="5" 
                  <?php if (date("m")==5) {
                    echo " selected ";
                  }?>
                  >05 Mayo</option>
                  <option value="6" 
                  <?php if (date("m")==6) {
                    echo " selected ";
                  }?>
                  >06 Junio</option>
                  <option value="7" 
                  <?php if (date("m")==7) {
                    echo " selected ";
                  }?>
                  >07 Julio</option>
                  <option value="8" 
                  <?php if (date("m")==8) {
                    echo " selected ";
                  }?>
                  >08 Agosto</option>
                  <option value="9" 
                  <?php if (date("m")==9) {
                    echo " selected ";
                  }?>
                  >09 Septiembre</option>
                  <option value="10" 
                  <?php if (date("m")==10) {
                    echo " selected ";
                  }?>
                  >10 Octubre</option>
                  <option value="11" 
                  <?php if (date("m")==11) {
                    echo " selected ";
                  }?>
                  >11 Noviembre</option>
                  <option value="12" 
                  <?php if (date("m")==12) {
                    echo " selected ";
                  }?>
                  >12 Diciembre</option>
                </select>
              </td>
              <td>
                <select name="anio_m" id="anio_m" style="color:#444444;">
                  <?php
                  for ($i=2015; $i <= date("Y"); $i++) { 
                    echo'
                    <option value="'.$i.'"';
                    if ($i==date("Y")) {
                      echo ' selected ';
                    }
                    echo ' >'.$i.'</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </div>

        <div class="periodo_campana" style="display:none;">
          <table>
            <tr style="background:#17A086; color:white; text-align:center;"><td>Trimestre</td><td>A&ntilde;o</td></tr>
            <tr>
            <tr>
              <td>
                <select name="campana" id="campana" style="color:#444444;">
                  <option value="">Seleccione</option>
                  <option value="1">1 [Enero/Febrero/Marzo]</option>
                  <option value="2">2 [Abril/Mayo/Junio]</option>
                  <option value="3">3 [Julio/Agosto/Septiembre]</option>
                  <option value="4">4 [Octubre/Noviembre/Diciembre]</option>
                </select>        
              </td>
              <td>
                <select name="anio" id="anio" style="color:#444444;">
                  <?php
                  for ($i=2015; $i <= date("Y"); $i++) { 
                    echo'
                    <option value="'.$i.'"';
                    if ($i==date("Y")) {
                      echo ' selected ';
                    }
                    echo ' >'.$i.'</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </div>

        <div class="periodo_anual" style="display:none;">
          <table>
            <tr style="background:#17A086; color:white; text-align:center; font-weight:bold;"><td>A&ntilde;o</td></tr>
            <tr>
              <td>
                <select name="anio_a" id="anio_a" style="color:#444444;">
                  <?php
                  for ($i=2015; $i <= date("Y"); $i++) { 
                    echo'
                    <option value="'.$i.'"';
                    if ($i==date("Y")) {
                      echo ' selected ';
                    }
                    echo ' >'.$i.'</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td align="center">
        <a href="#" id="link" style="display:none;"><img src="../images/<?=$imagen_link?>" onClick=abrir_ventana(); /> <a/>
      </td>
    </tr>
    <tr><td colspan="3"><br></td></tr>
    <tr>
      <td colspan="3" style="background:#17A086;">&nbsp;</td>
    </tr>
  </table>
  <div style="font-family:Arial; font-size:6pt; color:#17A086;">
    &copy; Power by Coboser, tchiri@coboser.com
  </div>
  <script type="text/javascript">
    var tipo='';
    $(document).ready(function(){
      $('#tipo').change(function(e){
        tipo = $(this).prop('value');
        switch  (tipo){
          case 'diario': 
            $('.periodo_dia').css({'display':''});
            $('.periodo_mes').css({'display':'none'});
            $('.periodo_campana').css({'display':'none'});
            $('.periodo_anual').css({'display':'none'});
            $('#link').css({'display':''});
            break;
          case 'mensual': 
            $('.periodo_dia').css({'display':'none'});
            $('.periodo_mes').css({'display':''});
            $('.periodo_campana').css({'display':'none'});
            $('.periodo_anual').css({'display':'none'});
            $('#link').css({'display':''});
            break;
          case 'campana': 
            $('.periodo_dia').css({'display':'none'});
            $('.periodo_mes').css({'display':'none'});
            $('.periodo_campana').css({'display':''});
            $('.periodo_anual').css({'display':'none'});
            $('#link').css({'display':''});
            break;
          case 'anual': 
            $('.periodo_dia').css({'display':'none'});
            $('.periodo_mes').css({'display':'none'});
            $('.periodo_campana').css({'display':'none'});
            $('.periodo_anual').css({'display':''});
            $('#link').css({'display':''});
            break;
          case 'agencias': 
            $('.periodo_dia').css({'display':'none'});
            $('.periodo_mes').css({'display':'none'});
            $('.periodo_campana').css({'display':'none'});
            $('.periodo_anual').css({'display':''});
            $('#link').css({'display':''});
            break;
          default:
            $('.periodo_dia').css({'display':'none'});
            $('.periodo_mes').css({'display':'none'});
            $('.periodo_campana').css({'display':'none'});
            $('.periodo_anual').css({'display':'none'});
            $('#link').css({'display':'none'});
        }
      });
    }); 
    //FUNCION GENERAL DE REDIRECCION
    function abrir_ventana(){
      var link='';
      switch  (tipo){
        case 'diario': 
          var ini=document.getElementById("fecha_ini").value;
          var fin=document.getElementById("fecha_fin").value;
          if (ini!='' && fin!='') {
            link ="comisiones_ideprollamadas.php?tipo="+tipo+"&fecha_ini="+ini+"&fecha_fin="+fin;
            //alert(link);
          }else{
            alert('Seleccione Rango de Fechas');
          }
          break;
        case 'mensual': 
          var mes=document.getElementById("mes").value;
          var anio_m=document.getElementById("anio_m").value;
          if (mes!='' && anio_m!='') {
            link ="comisiones_ideprollamadas.php?tipo="+tipo+"&mes="+mes+"&anio="+anio_m;
            //alert(link);
          }else{
            alert('Seleccione Mes y Año');
          }
          break;
        case 'campana': 
          var campana=document.getElementById("campana").value;
          var anio=document.getElementById("anio").value;
          if (campana!='' && anio!='') {
            link ="comisiones_ideprollamadas.php?tipo="+tipo+"&campana="+campana+"&anio="+anio;
            //alert(link);
          }else{
            alert('Seleccione Campaña y Año');
          }
          break;
        case 'anual': 
          var anio=document.getElementById("anio_a").value;
          if (anio!='') {
            link ="comisiones_ideprollamadas.php?tipo="+tipo+"&anio="+anio;
            //alert(link);
          }else{
            alert('Seleccione Año');
          }
          break;
        case 'agencias': 
          var anio=document.getElementById("anio_a").value;
          if (anio!='') {
            link ="comisiones_ideprollamadas.php?tipo="+tipo+"&anio="+anio;
            //alert(link);
          }else{
            alert('Seleccione Año');
          }
          break;
        case '':
          alert('No posible');
          break;
      }
      if (link!='') {
        window.open(link);
        //alert(link);
      }
    }
  </script>
</body>
</html>