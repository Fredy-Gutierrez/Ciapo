<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <body>
  <div class="table-responsive"><center>
    <table border="3" width="100%" cellpadding="0" cellspacing="0" >
        <col>
        <col>
        <col>
        <col>
        <col>
        <col>
        <col>
        <tbody>
          <tr>
            <td colspan="2" rowspan="4"> <center><img src="application/views/admin/notamedica/salud.jpg" width="160" height="60" /></center></td>
            <td colspan="3" style="width:50%" style="height:20%" > <span lang=ES
          style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>SECRETARIA DE SALUD </b></center> </b></span> </td>
            <td colspan="2" rowspan="4"><center> <img src="application/views/admin/notamedica/logo.jpg" width="130" height="70"/></center></td>
          </tr>
          <tr>
            <td colspan="3">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>HOSPITAL REGIONAL DE ALTA ESPECIALIDAD</b></center> </b></span>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>CIUDAD SALUD</b></center> </b></span>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <span lang=ES style='font-size:10.2;font-family:"Arial",sans-serif'><center>
            <b>ESTUDIOS DE ELECTRODIAGNOSTICO</b></center> </b></span>
            </td>
          </tr>
          <?php 
              $dia=date("j");
              $mes=date("n");
              $anno=date("Y");
           
              //descomponer fecha de nacimiento
              $dia_nac=substr($paciente->fecha_nac, 8, 2);
              $mes_nac=substr($paciente->fecha_nac, 5, 2);
              $anno_nac=substr($paciente->fecha_nac, 0, 4);
           
              if($mes_nac>$mes){
                $calc_edad= $anno-$anno_nac-1;
              }else{
                if($mes==$mes_nac AND $dia_nac>$dia){
                  $calc_edad= $anno-$anno_nac-1;
                }else{
                  $calc_edad= $anno-$anno_nac;
                }
              }

              $fecha1 = $paciente->fecha_nac;
                    $fechaComoEntero = strtotime($fecha1);
                    $mes = date("m", $fechaComoEntero);
                    $anio = date("Y", $fechaComoEntero);
                    $dia = date("d", $fechaComoEntero);

              $fechaa2 = $fecha;
                    $fechaComoEntero2 = strtotime($fechaa2);
                    $mes2 = date("m", $fechaComoEntero2);
                    $anio2 = date("Y", $fechaComoEntero2);
                    $dia2 = date("d", $fechaComoEntero2);

              $fechaa3 = $fecha2;
                    $fechaComoEntero3 = strtotime($fechaa3);
                    $mes3 = date("m", $fechaComoEntero3);
                    $anio3 = date("Y", $fechaComoEntero3);
                    $dia3 = date("d", $fechaComoEntero3);

              $fechaa4 = $fecha3;
                    $fechaComoEntero4 = strtotime($fechaa4);
                    $mes4 = date("m", $fechaComoEntero4);
                    $anio4 = date("Y", $fechaComoEntero4);
                    $dia4 = date("d", $fechaComoEntero4);
            ?>
          <tr>
            <td><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>NUM EXP: </b> <?php echo $no_exp; ?></left> </b></span></td>
            <td colspan="4"><span lang=ES style='font-size:9.5;font-family:"Arial",sans-serif'><left>
            <b>NOMBRE DEL PACIENTE: </b> <?php echo $paciente->ape_pat." ".$paciente->ape_mat." ".$paciente->nombrepx; ?></left> </b></span></td></td>
            <td colspan="2">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>FECHA DE NAC: </b> <?php echo $dia."/".$mes."/".$anio;?> </left> </b></span></td>
            </td>
          </tr>
          <tr>
            <td rowspan="2">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>EDAD: </b> <?php echo $calc_edad;?> </left> </b></span>
            </td>
            <td colspan="4" rowspan="2">
              <span lang=ES style='font-size:9.5;font-family:"Arial",sans-serif'><left>
            <b>NOMBRE DEL MEDICO: </b> <?php echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre; ?> </left> </b></span>
            </td>
            <td colspan="2" rowspan="2">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>SERVICIO: </b><br/> <?php echo $tipo; ?></left> </b></span>
            </td>
          </tr>
          <tr>
            
          </tr>
          <tr>
            <td colspan="4"><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>FECHA DE SOLICITUD </b></left> </b></span></td>
            <td colspan="3"><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>PROXIMA CONSULTA </b></left> </b></span></td>
          </tr>
          <tr>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>HORA: </b> <?php echo $hora;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>DIA: </b> <?php echo $dia2;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>MES: </b> <?php echo $mes2;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>AÑO: </b> <?php echo $anio2;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>HORA: </b> <?php echo $hora3;?> </left> </b></span>
            </td>
            <td>
               <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>DIA: </b> <?php echo $dia4." "?><br/><b>MES:</b><?php echo $mes4." "?></left> </b></span>
            </td>
            <td>
                 <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>AÑO: </b> <?php echo $anio4;?> </left> </b></span>
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <span lang=ES style='font-size:9.0;font-family:"Arial",sans-serif'><center>
            <b>CITA </center> </b></span>
            </td>
            <td colspan="3">
              <span lang=ES style='font-size:9.0;font-family:"Arial",sans-serif'><center>
            <b>DIAGNOSTICO</center> </b></span>
            </td>
          </tr>
          <tr>
             <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>HORA: </b> <?php echo $hora2;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>DIA: </b> <?php echo $dia3;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>MES: </b> <?php echo $mes3;?> </left> </b></span>
            </td>
            <td>
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>AÑO: </b> <?php echo $anio3;?> </left> </b></span>
            </td>
            <td colspan="3" rowspan="8">
               <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
             <?php echo $paciente->desdiag;?> </center>
            </td>
          </tr>
          <tr>
            <td>
               <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>CLAVE </left> </b></span>
            </td>
            <td colspan="2">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>PROCEDIMIENTO</center> </b></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><left>
              HRAE1241</left></span></td>
            <td colspan="2">
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><center>
              ECOCARDIOGRAMA</left></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
               <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><left>
                HRAE12415</left></span></td>
            </td>
            <td colspan="2">
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><center>
              ELECTROCARDIOGRAMA</left></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
               <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><left>
                HRAE32238</left></span></td>
            </td>
            <td colspan="2">
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><center>
              PRUEB. ESFUERZO BANDA S F</left></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
               <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><left>
                HRAE32239</left></span></td>
            </td>
            <td colspan="2">
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><center>
              PRUEBA DE ESFUERZO FARMAC</left></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
               <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><left>
                HRAE53472</left></span></td>
            </td>
            <td colspan="2">
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><center>
              POTENCIALES EVOCAD AUD</left></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
               <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><left>
                HRAE3225</left></span></td>
            </td>
            <td colspan="2">
              <span lang=ES style='font-size:7.5;font-family:"Arial",sans-serif'><center>
              ELECTROENCEFALOGRAMA</left></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td colspan="7">
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
              <b> EL PACIENTE DEBERÁ PRESENTAR ESTE FORMATO EL DIA DE SU ATENCION PARA EL PAGO DE LA MISMA</left></span>
            </td>
          </tr>
        </tbody>
      </table>
    </center>
  </div>
  </body>
</html>
