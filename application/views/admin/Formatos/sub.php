<html>
  
<div style="text-align:center;"> 
    <table border=0 cellspacing=0 width="89%" cellpadding=1 class="table" style="margin: 0 auto;">
     <tbody>
        <tr>
          <td>
              <img src="application/views/admin/notamedica/salud.jpg" width="160" height="60" />

          </td>

          <td style="width:50%" style="height:20%" >
            <p class=MsoNormal ><span lang=ES
            style='font-size:8.5pt;font-family:"Arial",sans-serif;'><center>
            <b>HOSPITAL REGIONAL DE ALTA ESPECIALIDAD <br/> "CIUDAD SALUD" <br/> DIVISION DE ONCOLOGIA <br/> SOLICITUD DE SERVICIOS SUBROGADOS </center> </b><o:p></o:p></span></p> 
          </td>
          
          <td>
          <img src="application/views/admin/notamedica/logo.jpg" width="130" height="70"/>
          </td>
        </tr>
     </tbody>
   </table>
</div>

<div class="table-responsive"><center>
  

 
		<table border=3 cellspacing=0 cellpadding=1 class="table">
		 <tbody>
          <tr >
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
           ?>
            <td style="width:50%" style="height:50%" colspan="4" rowspan="4"><p class=MsoNormal style='text-align:left;'><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><b>PACIENTE:</b> <?php echo " ".$paciente->ape_pat." ".$paciente->ape_mat." ".$paciente->nombrepx; ?><br/>
            <b>NUMERO DE EXPEDIENTE:</b> <?php echo " ".$no_exp; ?><br/>
            <b>EDAD:</b> <?php echo " ".$calc_edad."     "; ?>  &nbsp;&nbsp;&nbsp;<b>SEXO:</b> <?php echo " ".$paciente->sexo; ?><br/>
            <b>POLIZA DE SEGURO POPULAR:</b> <?php echo " ".$paciente->no_poliza; ?><o:p></o:p></span></p> </td>
            <td colspan="3"></td>
          </tr>
          <?php 
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            
             
            $fecha1 = $fecha;
            $fechaComoEntero = strtotime($fecha1);
            $mes = date("m", $fechaComoEntero);
            $anio = date("Y", $fechaComoEntero);
            $dia = date("d", $fechaComoEntero);
            
          ?>
          <tr >
            
            <td ><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><?php echo $dia?></td>
            <td ><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><?php echo $meses[$mes-1]?> </td>
            <td ><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><?php echo $anio?> </td>
          </tr>
          <tr >
            
            <td ><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>DIA</td>

            <td ><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>MES</td>
            
            <td ><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>AÑO</td>

          </tr>
          <tr >
            
            <td  colspan="3"></td>
          </tr>
          <tr >
            <td colspan="4" rowspan="3"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>UNIDAD A SUBROGAR</b> <br/><br/></center></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
          <b>NOMBRE O RAZON SOCIAL:</b> <?php echo " ".$razon; ?><br/>
          <b>DOMICILIO:</b> <?php echo " ".$domicilio; ?></td>

            <td colspan="3" rowspan="6"><span lang=ES
          style='font-size:6.0;font-family:"Arial",sans-serif'><center><br/>SELLO UNIDAD QUE SOLICITA <br/><br/></td>
          </tr>
          <tr >
            
          </tr>
          <tr >

          </tr>
          <tr >
            <td colspan="4" rowspan="3"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>UNIDAD QUE SOLICITA EL SERVICIO</b> <br/><br/></center></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
          <b>NOMBRE:</b> <?php echo " ".$servicio; ?><br/>
          <b>LIC. SANITARIA:</b> <?php echo " ".$sanitaria; ?><br/>
          <b>DOMICILIO:</b> <?php echo " ".$domicilio; ?></td>
          </tr>
          <tr >
            
          </tr>
          <tr>
            
          </tr>
          <tr>
            <td colspan="4" rowspan="3"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>TIPO DE SERVICIO</b> <br/><br/></center></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
            &nbsp;&nbsp;&nbsp;<?php echo " ".$tipo; ?></td>
            <td colspan="3" rowspan="3"><span lang=ES
          style='font-size:6.0;font-family:"Arial",sans-serif'><center><br/><br/><br/><br/><br/><br/><br/>SELLO UNIDAD PRESTADORA<br/><br/><br/><br/><br/><br/><br/></td>
          </tr>
          <tr>
          </tr>
          <tr>
          </tr>
          <tr>
            <td colspan="7" rowspan="2"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><left><b>DIAGNOSTICO O DATOS CLINICOS:
          </b> <br/></left></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
           <?php echo " ".$paciente->desdiag; ?><br/></td>
          </tr>
          <tr>
          </tr>
          <tr>
            <td colspan="4" rowspan="2"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><b>AUXLIARES DE TRATAMIENTO</b> <br/></center></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
            &nbsp;&nbsp;&nbsp;<?php echo " ".$auxiliares; ?></td>
            <td colspan="3" rowspan="2"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><left><b>ESPECIFIQUE TIPO DE TRATAMIENTO:</b> <br/></left></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
            <?php echo " ".$tratamiento; ?></td>
          </tr>
          <tr>
          </tr>
          <tr>
            <td colspan="7" rowspan="2"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><left><b>OBSERVACIONES Y/O COMENTARIOS:</b> <br/></left></span><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'>
            <?php echo " ".$observaciones; ?></td>
          </tr>
          <tr>
          </tr>
          <tr >
            <td colspan="3" rowspan="2"><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><br/><br/><br/><b>______________________________ <br/>DR. JOSE MANUEL PEREZ TIRADO<br/> DIRECTOR DEL HRAE</b> <br/><br/></center></span></td>
            <td  rowspan="2">
          <span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><br/><br/><br/><b>______________________ <br/>FIRMA DE LA UNIDAD QUE SUBROGA EL SERVICIO</b> <br/><br/></center></span></td>
            <td colspan="3" rowspan="2"> <label><span lang=ES
          style='font-size:8;font-family:"Arial",sans-serif'><center><br/><br/><br/>
            <?php echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre; ?> <br/> <?php echo "  Ced. Prof. ".$medico->cedula; ?><b>________________________________________ <br/>NOMBRE, FIRMA Y CEDULA<br/> PROFESIONAL DEL MEDICO</b> <br/><br/></center></span></label></td>
          </tr>
          <tr>
          </tr>
        </tbody>
		</table>
</div>
</html>