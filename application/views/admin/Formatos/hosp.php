
<html>
  
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
            <b>RECETA MEDICA HOSPITALARIA</b></center> </b></span>
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

              $fechaa1= new DateTime("now", new DateTimeZone('America/Monterrey'));
              $dia2=$fechaa1->format("d");
              $mes2=$fechaa1->format("m");
              $año=$fechaa1->format("Y");

              
            ?>

          <tr>
            <td> <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>NUM EXP: </b> <?php echo $no_exp; ?></left> </b></span></td>
            <td colspan="4"><span lang=ES style='font-size:9.5;font-family:"Arial",sans-serif'><left>
            <b>NOMBRE DEL PACIENTE: </b> <?php echo $paciente->ape_pat." ".$paciente->ape_mat." ".$paciente->nombrepx; ?></left> </b></span></td>
            <td colspan="2"> <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>FECHA DE NAC: </b> <?php echo $dia."/".$mes."/".$anio;?></td>
          </tr>
          <tr>
            <td> <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left>
            <b>EDAD: </b> <?php echo $calc_edad;?> </left> </b></span></td>
            <td colspan="2"> <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left><b>SEXO: </b> <?php echo $paciente->sexo;?> </left> </b></span></td>
            <td colspan="2"><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left><b>DIAGNOSTICO: </b> <?php echo $paciente->desdiag;?> </left> </b></span></td>
            <td colspan="2"><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><left><b>FECHA: </b> <?php echo $dia2."/".$mes2."/".$año;?> </left> </b></span></td>
          </tr>
          <tr>
            <td colspan="7"><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center><b>MEDICAMENTOS </b> </center> </span></td>
          </tr>
          <tr>
            <td colspan="7"><span lang=ES style='font-size:9;font-family:"Arial",sans-serif'> <br/><?php echo " ".$medicamentos."<br />"." ";?><br></span></td>
          </tr>
          <tr>
            <td><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center><b>MEDICO: </b> </center> </span></td>
            <td colspan="6"><span lang=ES style='font-size:9.5;font-family:"Arial",sans-serif'><left>
             <?php echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre; ?> </left></span></td>
          </tr>
          <tr>
            <td><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center><b>ESPECIALIDAD: </b> </center> </span></td>
            <td colspan="6"><span lang=ES style='font-size:9.5;font-family:"Arial",sans-serif'><left>
             <?php echo $medico->nombreesp; ?> </left></span></td>
          </tr>
          <tr>
            <td><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center><b>CED. PROF. </b> </center> </span></td>
            <td colspan="2"><span lang=ES style='font-size:9.5;font-family:"Arial",sans-serif'><left>
             <?php echo $medico->cedula; ?> </left></span></td>
            <td><span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center><b>FIRMA: </b> </center> </span></td>
            <td colspan="3"><br/><br/></td>
          </tr>
          <tr>
            <td colspan="7"><span lang=ES style='font-size:7;font-family:"Arial"'><center><b>Carretera Tapachula - Puerto Madero S/N Km. 15+200, Colonia Los Toros, Tapachula, Chiapas. Teléfono Conmutador 6201100 </b> </center> </span></td>
          </tr>
        </tbody>
    </table>
  </body>
</html>