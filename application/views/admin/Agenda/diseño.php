
 <style>
    @page { margin: 190px 50px; }
    #header { position: fixed; left: 0px; top: -164px; right: 0px; height: 80px;  text-align: right; }
    #header2 { position: fixed; left: 0px; top: -155px; right: 0px; height: 80px;  text-align: left; }
    #header3 { position: fixed; left: 0px; top: -60px; right: 0px; height: 80px;  text-align: right; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 75px;  text-align: right;}
    #footer2 { position: fixed; left: 0px; bottom: -130px; right: 0px; height: 75px;  text-align: left;}

		table {
		  border-collapse: collapse;
		  width: 100%;
		  border-color:#8f0000 ;
		  line-height: 13px;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		  border: 1px solid #8f0000;
		}

	th {
		 background-color: #ff4a4a;
		 color: white;
		}

	tr:nth-child(even) {
		background-color: #f2f2f2;
		font-size:9.0pt;
		font-family:"Arial",sans-serif;
	}
	tr{
		background-color: #f2f2f2;
		font-size:9.0pt;
		font-family:"Arial",sans-serif;
	}

  </style>

<div id="header">
	<p class=MsoNormal ><span lang=ES
	style='font-size:8.4pt;font-family:"Arial",sans-serif;color:#9b9b9b;'> 
	Comision Coordinadora de Institutos Nacionales de Salud y<br/> 
	Hospitales de Alta Especialidad<br/> 
	Centro Regional de Alta Especialidad de Chiapas<br/>
	Hospital Regional de Alta Especialidad Ciudad Salud<br/>
	Dirección General Adjunta<br/>
	Direccion Medica <br/>  <o:p></o:p></span></p> 
	
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
			style='font-size:11.0pt;font-family:"Arial",sans-serif'><?php echo "Tapachula, Chiapas a ".$dia." de ".$meses[date('n')-1]. " del ".date('Y')." siendo las ".$hora.":".$minutos."hrs" ; ?> <o:p></o:p></span></p> 
</div>

<div id="footer">
    	<p class="page"><span lang=ES
		style='font-size:8.0pt;font-family:"Arial",sans-serif'>Carretera  Puerto Madero S/N Km. 15  200, Col. Los Toros <br/>
								Tapachula, Chiapas C.P. 30830.  Teléfono: (962) 620 1100 Ext. 10002 y 10004  Fax: Ext. 10342 <o:p></o:p></span></p> 
  
	 
</div>	
<body>
		<div class="table-responsive col-md-12">
                    <table id="example2" class="table table-bordered table-hover" >
                        <thead>
                            <tr>
								<th>Exp</th>
                                <th>Nombre del Paciente</th>
								<th>Fecha Nacimiento</th>
                                <th>Diagnostico</th>
                                <th>Medicamentos Validados</th>
                                <th>Medicamentos No Validados</th>
                                <th>Medicamentos Extra</th>
                                <th>Medico</th>
								<th>Estado</th>
								<th>Fecha Cita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($datos)):?>
                                <?php foreach($datos as $datos ):?>
                                    <tr>
										<td><?php echo $datos ->expediente;?></td>
                                        <td><?php echo $datos ->paciente;?></td>
										<td><?php echo $datos ->fecha_nac;?></td>
                                        <td><?php echo $datos ->cdgc;?></td>
                                        <td><?php echo $datos ->medic_onco;?></td>
                                        <td><?php echo $datos ->medic_onco_noval;?></td>
                                        <td><?php echo $datos ->pre_medic;?></td>
                                        <td><?php echo $datos ->medico;?></td>
										<td><?php echo $datos ->estado;?></td>
										<td><?php echo $datos ->fecha;?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>

                
<div id="footer2">
    <p class="page"><img src="application/views/admin/notamedica/logo.jpg" /></p>
</div>	