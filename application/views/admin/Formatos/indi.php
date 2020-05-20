
<html>
  <head>
  <style>
  @page { margin: 145px 50px 105px;}
    #header { position: fixed; left: 0px; top: -109px; right: -10px; height: 8px;  text-align: right; }
    #header2 { position: fixed; left: -20px; top: -115px; right: 0px; height: 8px;  text-align: left; }
    #header3 { position: fixed; left: 0px; top: -33px; right: -10px; height: 8px;  text-align: right; }
    #footer { position: fixed; left: -10px; bottom: -136px; right: 0px; height: 75px;  text-align: right;}
    #footer2  { position: fixed; left: -10px; bottom: -85px; right: 0px; height: 75px;  text-align: left;}



  #menu{line-height: 130%;}

html,body
  {
  font-size:7px;
  }
body {
    background-image: url('application/views/admin/notamedica/logo2.jpg');
    background-position: center center; 
  }

</style>

<div id="header">
  <div id="menu">
  <label><span lang=ES
  style='font-size:7pt;font-family:"Arial",sans-serif;color:#9b9b9b;'> 
  Comision Coordinadora de Institutos Nacionales de Salud y<br/> 
  Hospitales de Alta Especialidad<br/> 
  Centro Regional de Alta Especialidad de Chiapas<br/>
  Hospital Regional de Alta Especialidad Ciudad Salud<br/>
  Dirección General Adjunta<br/>
  Direccion Medica <br/></span></label> 
  </div>
</div>

<div id="header2">

  <img src="application/views/admin/notamedica/salud.jpg" />
</div>

<div id="header3">

  <?php 
      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      
      $fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));
      $dia=$fechaa->format("d");
      $hora=$fechaa->format("H");
      $minutos=$fechaa->format("i");
        ?>
         <p class=MsoNormal style='text-align:right;' ><span lang=ES
      style='font-size:8pt;font-family:"Arial",sans-serif'><?php echo "Tapachula, Chiapas a ".$dia." de ".$meses[date('n')-1]. " del ".date('Y')." siendo las ".$hora.":".$minutos."hrs" ; ?> <o:p></o:p></span></p> 
</div>

<div id="footer">
      <label><span lang=ES
    style='font-size:6.6pt;font-family:"Arial",sans-serif'>Carretera  Puerto Madero S/N Km. 15  200, Col. Los Toros <br/>
                Tapachula, Chiapas C.P. 30830.  Teléfono: (962) 620 1100 Ext. 10002 y 10004  Fax: Ext. 10342 </span></label> 
  
   
</div>  

<div id="footer2">
    <p class="page"><img src="application/views/admin/notamedica/logo.jpg" width="70" height="70"/></p>
</div>  
        <body>
         
            
              <span lang=ES style='font-size:8.5;font-family:"Arial",sans-serif'><center>
            <b>INDICACIONES PARA <?php echo $tipo;?></b></center> </b></span>
              
            
          

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

          <label style='text-align:left;'><b><span lang=ES
          style='font-size:8pt;font-family:"Arial",sans-serif'>DATOS DE IDENTIFICACION DEL PACIENTE</span></b></label><br/>
            
            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><left>
            NOMBRE DEL PACIENTE:  <?php echo $paciente->ape_pat." ".$paciente->ape_mat." ".$paciente->nombrepx; ?></left> </b></span></label><br/>
            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><left>
           EXPEDIENTE: <?php echo $no_exp; ?></left> </b></span></label><br/>
            <span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><left>
            <label>FECHA DE NACACIMIENTO:  <?php echo $dia."/".$mes."/".$anio." ";?></label>
          
          
             <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><left>
            EDAD: <?php echo $calc_edad;?> </left></span></label>
            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><left>SEXO: <?php echo $paciente->sexo;?> </left> </span><br/></label>
            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><left>DIAGNOSTICO:  <?php echo $paciente->desdiag;?> </left></span></label><br/><br/>
          
          
            <label><span style='font-size:8;font-family:"Arial",sans-serif'><b>DIETA </b></span></label>
          
          
            <label><span style='font-size:8;font-family:"Arial",sans-serif,'> <br/><?php echo " ".$dieta."<br />"." ";?></span></label><br/>
          

          <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><b>SOLUCIONES </b></span></label><br/>
          
            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><?php echo " ".$soluciones."<br />"." ";?><br></span>
          
           <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><b>MEDICAMENTOS </b> </span>

            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'> <br/><?php echo " ".$medicamentos."<br />"." ";?><br></span>

            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><b>ESTUDIOS DE GABINETE Y LABORATORIO </b></span>

            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'> <br/><?php echo " ".$estudios."<br />"." ";?><br></span>

            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'><b>CUIDADOS </b></span>

            <label><span lang=ES style='font-size:8;font-family:"Arial",sans-serif'> <br/><?php echo " ".$cuidados."<br />"." ";?><br></span><br/><br/>

            <label><span lang=ES
            style='font-size:7.5pt;font-family:"Arial",sans-serif'><center>________________________________ <br/><?php  echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre  ?> <br/>No. Ced: <?php  echo $medico->cedula; ?> 
              <br/>Especialidad: <?php  echo $medico->nombreesp; ?></center>
          
      
  </body>
</html>