<!--$var = '/img/headers/header1.png';
 
echo '<img src="/img/headers/header1.png" border="0" />';
echo "<img src=\"$var\" border=\"0\" />";

<img src="<?php echo $var; ?>" border="0" />
-->
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
    background-repeat: no-repeat;
  }


</style>

<div id="header">
	<div id="menu">
		<label><span
		style='font-size:7.0pt;font-family:"Arial",sans-serif;color:#9b9b9b;'> 
		Comision Coordinadora de Institutos Nacionales de Salud y<br> 
		Hospitales de Alta Especialidad<br> 
		Centro Regional de Alta Especialidad de Chiapas<br>
		Hospital Regional de Alta Especialidad Ciudad Salud<br>
		Dirección General Adjunta<br>
		Direccion Medica <br>  </span></label> 
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
			style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php echo "Tapachula, Chiapas a ".$dia." de ".$meses[date('n')-1]. " del ".date('Y')." siendo las ".$hora.":".$minutos."hrs" ; ?> <o:p></o:p></span></p> 
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
    <label style='font-size:9;font-family:"Arial",sans-serif'><center>
            <b>NOTA DE CONSULTA EXTERNA</b></center> </b></label>

	<label style='text-align:left;'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>DATOS DE IDENTIFICACION DEL PACIENTE </span></b></label> <br/>
	<span lang=ES
	style='font-size:8.0pt;font-family:"Arial",sans-serif'>Nombre: <?php  echo $pac->ape_pat." ".$pac->ape_mat." ".$pac->nombrepx?>
	 &nbsp;&nbsp;&nbsp; Expediente: <?php  echo $pac->no_exp; ?>
	 &nbsp;&nbsp;&nbsp; Fecha de nacimiento: <?php  echo $pac->fecha_nac; ?> <br/> </span>

	 



	 <br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ANTECEDENTES FAMILIARES HEREDADOS</span></b></label><br/>

	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->antecedentes_heredados; ?></span></label>

	<br/><br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ANTECEDENTES PERSONALES NO PATOLOGICOS </span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->antecedentes_no_personales; ?></span></label><br/> 

	 <br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ANTECEDENTES PERSONALES PATOLOGICOS  </span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->antecedentes_personales; ?></span></label><br/> 
	

	 <br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ANTECEDENTES DE IMPORTANCIA PARA EL PADECIMIENTO ACTUAL </span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->antecedentes_padecimiento; ?></span></label><br/> 

		<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>  EVOLUCION</span></b></label><br/> 
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->evolucion; ?></span></label><br/><br/>

	<label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>EXPLORACIÓN FISICA</span></b></label><br/>

	<span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif'>
	<b> Peso:</b> <?php  echo $pac->peso; ?> Kg. <b>  &nbsp;&nbsp;&nbsp;Estatura:</b> <?php  echo $pac->estatura; ?> Cm. <b>&nbsp;&nbsp;&nbsp;IMC:</b> <?php  echo $pac->imc; ?> Kg/m<sup>2</sup> <b>&nbsp;&nbsp;&nbsp;Temperatura:</b> <?php  echo $pac->temperatura; ?> °c <b>&nbsp;&nbsp;&nbsp;FC:</b> <?php  echo $pac->fc; ?> x<sup>1</sup> &nbsp;&nbsp;&nbsp;<b>FR:</b><?php  echo $pac->fr; ?> x<sup>1</sup> <b>&nbsp;&nbsp;&nbsp;TA:</b> <?php  echo $pac->ta; ?> mmHg.</span>
	 <br/>
	 <label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->exploracion; ?></span></label><br/>

	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>TOXICIDAD</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->toxicidad; ?></span></label><br/>


	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>LABORATORIOS</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->laboratorios; ?></span></label><br/> 


	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ESTUDIOS DE IMAGEN</span></b></label> 
		  <table >
		    <?php if(!empty($estudios)):?>
		        <?php 
                $x = sizeof($estudios)-5;
               for ($i=0; $i < sizeof($estudios); $i++) {
	                if ($i >= $x) { ?>
				        <tr>
			 				<td> <label style='text-align:justify'><span style='font-size:7.0pt;font-family:"Arial",sans-serif'><?php echo $estudios[$i]->descripcion;?></span></label></td>
						</tr>
					<?php }
                } ?>	
		    <?php endif;?>
		  </table>

		  <br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>REPORTE DE HISTOPATOLOGÍA</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->histopatologia; ?></span></label><br/> 

	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>HISTORIAL DE TX (TRATAMIENTO)</span></b></label><br/>
		  <table >
		    <?php if(!empty($historial)):?>
		        <?php 
                $x = sizeof($historial)-5;
                for ($i=0; $i < sizeof($historial); $i++) {
                	if ($i >= $x) { ?>
				        <tr>
				        	<td> <label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php echo $historial[$i]->descripcion;?></span></label></td>
						</tr>
		        	<?php }

                } ?>
		    <?php endif;?>
		  </table>





	<!--<label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>SINTOMAS</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->sintomas; ?></span></label><br/>-->

	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ANALISIS</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->analisis; ?></span></label><br/>

	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>PLAN</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->plan; ?></span></label><br/>

	<br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>PRONOSTICO</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $nota->pronostico; ?></span></label><br/>

	<br/>

	<label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>DIAGNOSTICO</span></b></label><br/>
	<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $pac->desdiag." ".$nota->observacion; ?></span></label><br/> 
	<br/><br/>

	<b><span lang=ES
		style='font-size:7.5pt;font-family:"Arial",sans-serif'><center>________________________________ <br/><?php  echo $medico2->ape_pat." ".$medico2->ape_mat." ".$medico2->nombre  ?> <br/>No. Ced: <?php  echo $medico2->cedula; ?> 
		<br/>Especialidad: <?php  echo $medico2->nombreesp; ?></center></span></b>


	
	
	
<head>
	<style>
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th {
		  text-align: left;
		  padding: 7px;
		}

		td {
		  text-align: left;
		  padding: 0px;
		}

		th {
		  background-color: #4CAF50;
		  color: white;
		}

		tr:nth-child(even) {background-color: #f2f2f2;}
		</style>
		</head>
		<body>

			<?php if(!empty($medicamentos) or !empty($med) or !empty($med2)):?>
				<br><table style='page-break-after:always;'></br></table><br>
			<?php endif;?>

		    <?php if(!empty($medicamentos) or !empty($med)):?>
				<p class=MsoNormal style='text-align:center'><b><span lang=ES
				style='font-size:8.0pt;font-family:"Arial",sans-serif'> INDICACIONES MEDICAS<o:p></o:p></span></b></p>
				<label style='text-align:left;'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>DATOS DE IDENTIFICACION DEL PACIENTE </span></b></label> <br/>
			<span lang=ES
			style='font-size:8.0pt;font-family:"Arial",sans-serif'>Nombre: <?php  echo $pac->ape_pat." ".$pac->ape_mat." ".$pac->nombrepx?>
			 &nbsp;&nbsp;&nbsp; Expediente: <?php  echo $pac->no_exp; ?>
			 &nbsp;&nbsp;&nbsp; Fecha de nacimiento: <?php  echo $pac->fecha_nac; ?> <br/> </span>

			<label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>EXPLORACIÓN FISICA</span></b></label><br/>
			<span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif'>
			<b> Peso:</b> <?php  echo $pac->peso; ?> Kg. <b>  &nbsp;&nbsp;&nbsp;Estatura:</b> <?php  echo $pac->estatura; ?> Cm. <b>&nbsp;&nbsp;&nbsp;IMC:</b> <?php  echo $pac->imc; ?> Kg/m<sup>2</sup> <b>&nbsp;&nbsp;&nbsp;Temperatura:</b> <?php  echo $pac->temperatura; ?> °c <b>&nbsp;&nbsp;&nbsp;FC:</b> <?php  echo $pac->fc; ?> x<sup>1</sup> &nbsp;&nbsp;&nbsp;<b>FR:</b><?php  echo $pac->fr; ?> x<sup>1</sup> <b>&nbsp;&nbsp;&nbsp;TA:</b> <?php  echo $pac->ta; ?> mmHg.</span><br/><br/>
			 <br/>
		    	<div style="overflow-x:auto;">
				  <table  sTYLE="table-layout:fixed">
				    <tr >
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'>Nombre </label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Dosis</center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Via <br/>administración </center></label> </th>
				      <th> <label style='font-size:10px;font-family:"Arial",sans-serif'> <center>Dilución </center> </label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Tiempo de <br/>infusión</center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Frecuencia</center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Fecha <br/>aplicación</center></label></th>
				    </tr>

		        <?php foreach($medicamentos as $medicamentos):?>
		        <tr>
		        	
		             
	 				<td> <p class=MsoNormal style='text-align:left;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->nombregen;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->dosis;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->via_administracion;?><o:p></o:p></span></p></td>

					<td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->dilucion;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->descripcion;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->frecuencia;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $medicamentos->fecha_aplicacion;?><o:p></o:p></span></p></td>
	 				
		        </tr>
		        <?php endforeach;?>
		        <?php foreach($med as $med):?>
		        <tr>
		        	<td> <p class=MsoNormal style='text-align:left;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->medicamento;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->dosis;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->via_administracion;?><o:p></o:p></span></p></td>

					<td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->dilucion;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->descripcion;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->frecuencia;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->fecha_aplicacion;?><o:p></o:p></span></p></td>


	 				
		        </tr>
		        <?php endforeach;?>
		    <?php endif;?>
		  </table>
		</div>

</body><br/><br/>
		
		
		    <?php if(!empty($med2)):?>

				<label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>ALTERNATIVA DE MEDICAMENTOS</span></b></label><br/><br/>

				<div style="overflow-x:auto;">
				  <table >
				    <tr>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'>Nombre</label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Via <br/>administración</center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Dilución   </center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Tiempo de <br/>infusión</center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Frecuencia</center></label></th>
				      <th><label style='font-size:10px;font-family:"Arial",sans-serif'><center>Fecha <br/>aplicación</center></label>   </th>
				    </tr>
		        <?php foreach($med2 as $med):?>
		        <tr>
		        	
		           
	 				<td> <p class=MsoNormal style='text-align:left;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->medicamento;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->via_administracion;?><o:p></o:p></span></p></td>

					<td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->dilucion;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->descripcion;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->frecuencia;?><o:p></o:p></span></p></td>

		            <td><p class=MsoNormal style='text-align:center;'><span lang=ES
					style='font-size:7.5pt;font-family:"Arial",sans-serif'>
					<?php echo $med->fecha_aplicacion;?><o:p></o:p></span></p></td>
	 				
		        </tr>
		        <?php endforeach;?>
		    <?php endif;?>
		  </table>
		</div>

		<?php if(!empty($observacion)):?>
			<?php if($observacion->observacion!=''):?>
				<br/><br/><label style='text-align:justify'><b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>NOMBRE DEL CICLO, FRECUENCIA Y NUMERO DE CICLIO</span></b></label><br/>
				<label style='text-align:justify'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'><?php  echo $observacion->observacion; ?> </span></label><br/> 
			<?php endif;?>
		<?php endif;?>

		<br/><br/><br/><br/>
		<?php if(!empty($med) or !empty($medicamentos)):?>
			<b><span lang=ES
			style='font-size:7.5pt;font-family:"Arial",sans-serif'><center>________________________________ <br/><?php  echo $medico2->ape_pat." ".$medico2->ape_mat." ".$medico2->nombre  ?> <br/>No. Ced: <?php  echo $medico2->cedula; ?> 
				<br/>Especialidad: <?php  echo $medico2->nombreesp; ?></center></span></b>
		<?php endif;?>
		

	
    </font>

</div>
</body>
</html>