<style type="text/css">
	@page { margin: 50px 50px 40px;}
	#td {
    padding: 5px;
    border-top: 0px;
    border-right: 0px;
    border-bottom: 1px solid black;
    border-left: 0px;
    line-height: 1;
    border-collapse: collapse;
    border-spacing: 0;
}
#td2 {
	
     padding: 5px;
    border-top: 0px;
    border-right: 0px;
    border-bottom: 0px solid black;
    border-left: 0px;
    line-height: 1;
    border-collapse: collapse;
    border-spacing: 0;
}
#p {
  font-size: 6.6; font-family:Lucida, sans-serif;
}
#p2 {
  font-size: 6.6; font-family:Lucida, sans-serif;
  background-color:#FFF3C8;
}
#p3 {
  font-size: 6.6; font-family:Lucida, sans-serif;
  border-style: solid;
  background-color:#FFF3C8;
}
#footer { position: fixed; left: -10px; bottom: -85px; right: 0px; height: 75px;  text-align: center;
}
 #footer .page:after { content: counter(page); }
html,body
	{
	font-size:5px;
	}
</style>
<div id="footer">
     <label class="page" id="p"><?php $PAGE_NUM;?></label> 
</div> 
<div class="table-responsive">
		<table border=2 width="100%" cellspacing=0 cellpadding=1 class="table">
			<tbody>
				<?php 
			      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			      
			      $fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));
			      $dia=$fechaa->format("d");
			      $hora=$fechaa->format("H");
			      $minutos=$fechaa->format("i");
       		    ?>
			<tr id="tr">
				<td id="td" align="left" >
					<left><img src="application/views/admin/Formatos/seguro.png" width="123" height="31" /></left>
				</td>
				<td id="td" colspan="4">
					<label><span style='font-size:5.3;font-family:"Corbel",sans-serif;'><center>
					DIRECCIÓN GENERAL DE GESTIÓN DE SERVICIOS DE SALUD <br/> DIRECCIÓN DE ADMINISTRACIÓN DE PLANES <br/><span style='font-size:5.6;font-family:"Corbel",sans-serif;'> FONDO DE PROTECCIÓN CONTRA GASTOS CATASTRÓFICOS<br/> <span style='font-size:5.4;font-family:"Corbel",sans-serif;'>FORMATO DE AUTORIZACIÓN PARA PAGO DE LAPATINIB</center></span></label> 
				</td>
				<td id="td" width="16.6%">
					<img src="application/views/admin/Formatos/salud.png" width="105" height="39" align="right"/>
				</td>
			</tr>
			<tr>
				<td id="td2" colspan="6" align="right">
					<label id="p">Fecha:</label> <u><label id="p2"><?php echo $dia." de ".$meses[date('n')-1]. " del ".date('Y'); ?></u>  </label>
				</td>
				
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;1. Apellido Paterno:<u><label id="p2"><?php echo $paciente->ape_pat?></label></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<label id="p"> Apellido Materno:<u><label id="p2"><?php echo $paciente->ape_mat?></label></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<label id="p"> Nombre(s):<u><label id="p2"><?php echo $paciente->nombrepx?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;2. Número de Póliza (considerando número de integrante SIN uso de guión):<u><label id="p2"><?php echo $paciente->no_poliza?></label></u>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label id="p">Número de Expediente:<u><label id="p2"><?php echo $paciente->no_exp?></label></u>
				</td>
			</tr>
			<?php 
				$finpoliza = $paciente->fin_poliza;

				$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

		        $fecha_actual = $fechaa->format("Y-m-d");
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
                    $mes2 = date("m", $fechaComoEntero);
                    $anio2 = date("Y", $fechaComoEntero);
                    $dia2 = date("d", $fechaComoEntero);
			?>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;3. Póliza vigente: SI</label> <label id="p3"> 
						<?php if($fecha_actual < $finpoliza){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($fecha_actual > $finpoliza){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <label id="p">Sexo: Femenino</label> <label id="p3"> 
						<?php if($paciente->sexo=="femenino"){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;&nbsp;
			    	<label id="p">Masculino</label> <label id="p3"> 
						<?php if($paciente->sexo=="masculino"){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <label id="p">Edad:</label><u><label id="p2"><?php echo $calc_edad;?></label></u>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <label id="p">Fecha de nacimiento:</label><u><label id="p2"><?php echo $dia2."/".$mes2."/".$anio2." ";?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;4. Fase de Atención: </label><u><label id="p2"><?php echo $fase;?></label></u>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label id="p">Etapa Clínica: </label><u><label id="p2"><?php echo $paciente->etapa;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;5. Unidad Médica: </label><u><label id="p2"><?php echo $unidad;?></label></u>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label id="p">Servicio Tratante: </label><u><label id="p2"><?php echo $servicio;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;6. Entidad Federativa: </label><u><label id="p2"><?php echo $paciente->nombre;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;7. Nombre del Médico Tratante: </label><u><label id="p2"><?php  echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;8. Especialidad: </label><u><label id="p2"><?php  echo $medico->nombreesp; ?></label></u>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label id="p">Cédula Profesional:</label><u><label id="p2"><?php  echo $medico->cedula; ?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p"> &nbsp;&nbsp;9. Diagnóstico (CIE-10):</label><u><label id="p2"><?php echo $paciente->desdiag;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p">10. Datos Clínicos</label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right" width="20%">
					<label id="p">Diagnóstico histopatológico </label>
				</td>
				<td id="td2" align="left" colspan="2">		
					<label id="p">SI</label> <label id="p3"> 
						<?php if($hispa==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($hispa==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
				<td id="td2" align="right" >
					<label id="p">Reporte histopatológico:</label>
				</td>
				<td id="td2" align="left" colspan="2">
					<u><label id="p2"><?php echo $reporte;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">FEVI Basal  </label>
				</td>
				<td id="td2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<u><label id="p2"><?php echo $basal;?></label></u> <b>%</b>
					 </label>
				</td>
				<td id="td2" align="right" colspan="2">
					<label id="p">FEVI > 50%  </label>
				</td>
				<td id="td2" align="left" colspan="2">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($basal>50){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($basal<=50){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Cáncer de mama metastásico </label>
				</td>
				<td id="td2" align="left" colspan="2">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($adenopatia==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($adenopatia==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
				<td id="td2" align="left" colspan="3">
					<label id="p">Órganos afectados: </label> <u><label id="p2"><?php echo $organos;?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Sobre-expresión o amplificación<br>de Her 2+, confirmado por IHQ </label>
				</td>
				<td id="td2" align="left" colspan="5">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($hepatica==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($hepatica==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Adenopatía axilar positiva  </label>
				</td>
				<td id="td2" align="left" colspan="2">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($etapa==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($etapa==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
					 <td id="td2" align="right">
					<label id="p">Comprobación mediante biopsia  </label>
				</td>
				<td id="td2" align="left" colspan="2">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($biopsia==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($biopsia==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label id="p">Número de ganglios: </label>
					<u><label id="p2"><?php echo $ganglios;?></label></u>
				</td>
			</tr>
				<tr>

				<td id="td2" align="right">
					<label id="p">Contraindicación para uso de<br>Trastuzumab o Pertuzumab</label>
				</td>
				<td id="td2" align="left" colspan="2">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($recep==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($recep==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
					 </td>
					 <td id="td2" align="left" colspan="3">
						 <label id="p">Motivo de contraindicación: </label>
						<u><label id="p2"><?php echo $motivo;?></label></u>
					</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Insuficiencia hepática </label>
				</td>
				<td id="td2" align="left" colspan="5">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($tumor==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($tumor==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Leucocitos menores a 3,000/ml </label>
				</td>
				<td id="td2" align="left" colspan="5">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($renal==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($renal==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			
			<tr>
				
				<td id="td2" align="right">
					<label id="p">Netrófilos menores a 1,500/ml  </label>
				</td>
				<td id="td2" align="left" colspan="5">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($cancer==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($cancer==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Plaquetas menores a 100,000/ml </label>
				</td>
				<td id="td2" align="left" colspan="5">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($ihq==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($ihq==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p">11. Régimen de tratamiento:</label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Terapia neoadyuvante </label>
				</td>
				<td id="td2" align="left" colspan="5">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($terapia==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($terapia==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Antecedente de uso previo <br>de Trastuzumab</label>
				</td>
				<td id="td2" align="left" colspan="2">
						<label id="p">SI</label> <label id="p3"> 
						<?php if($antecedente==1){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?> </label>&nbsp;
					<label id="p">NO</label> <label id="p3"> 
						<?php if($antecedente==2){
			    			echo " "."X"." ";
			    		}else
			    		{
			    			echo "&nbsp;&nbsp;";
			    		} ?>
					 </label>
				</td>
				<td id="td2" align="left" colspan="3">
					<label id="p">Número de trimestres recibidos: </label>
					<u><label id="p2"><?php echo $tri;?></label></u>
				</td>
			</tr>
			
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p">12. Justificación clínica de administración (a ser llenada por el médico tratante):</label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="justify"" colspan="6">
					<u><label id="p2"><?php echo $justificacion; ?></label></u>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<label id="p">13. Autorizaciones</label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="p">Firma del(de la) paciente:</label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Acepto tratamiento con Lapatinib</label>
				</td>
				<td id="td2" align="justify" colspan="2">
					<label id="p3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				</td>
				<td id="td2" align="right">
					<label id="p">Firma o huella de autorización: </label>
				</td>
				<td border="2" align="justify" style="background-color:#FFF3C8;">
					<label style="color:#FFF3C8;">nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					</label>
				</td>
				<td id="td2" align="left">
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Confirma administración de Lapatinib</label>
				</td>
				<td id="td2" align="left" colspan="2">
					<label id="p3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				</td>
				<td id="td2" align="right">
					<label id="p">Firma o huella de conformidad: </label>
				</td>
				<td border="2" align="justify" style="background-color:#FFF3C8;">
					<label style="color:#FFF3C8;">nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					</label>
				</td>
				<td id="td2" align="left">
				</td>
			</tr>
			<tr>
				<td id="td2" align="left" colspan="6">
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="p">Firma del(de la) médico(a) tratante:</label>
				</td>
			</tr>
			<tr>
				
				<td id="td2" align="right">
					<label id="p3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				</td>
				<td id="td2" align="left" colspan="5">
					<label id="p">Declaro que la información aquí contenida es verídica y completa  </label>
				</td>
			</tr>
			<tr>
				<td id="td2" align="right">
					<label id="p">Nombre:</label>
				</td>
				<td id="td2" align="left" colspan="5">
					<u><label id="p2"><?php echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre; ?> </label></u>

				</td>
			</tr>
			
			<tr>
				<td id="td2" align="right">
					<label id="p">Firma:</label>
				</td>
				<td border="2" colspan="3" align="justify" style="background-color:#FFF3C8;">
					<label style="color:#FFF3C8;">nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					<br>&nbsp;&nbsp;<br>&nbsp;&nbsp;
					</label>
				</td>
				<td id="td2" colspan="2" align="center">
					<label style="font-size:3px; font-size: 4.9pt; font-family:Corbel,sans-serif;">Declaro bajo protesta de decir verdad que todos los datos incluidos en esta solicitud son<br>verídicos y se ecuentran contenidos en el expediente clínico correspondiente; por lo cual, el<br>soporte documental del registro y validación se encuentra a disposición de la Secretaría de Salud<br>Federal, de la Comisión Nacional de Protección Social en Salud y de los órganos de control y<br>fiscalización tanto federales como estatales.</label>
				</td>
			</tr>
			<tr>
				<td id="td2"  colspan="6">
					<label style="font-size:3px; font-size: 4.4pt; font-family:Corbel,sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Deberá cumplir con al menos uno de estos criterios</label>
				</td>
				
			</tr>

			</tbody>

		</table>
		<br>
		<blockquote><label style="font-size:3px; font-size: 4.2pt; font-family:Corbel,sans-serif;text-indent: 10px;">Si la información contenida en este formato se encuentra completa y es congruente, la respuesta normalmente será procesada en 5 días hábiles y le será notificada vía correo electrónico y/o el SIGGC.<br>La información aquí contenida se encuentra sujeta a verificación y en caso de que se considere necesario, en cualquier momento pordrá solicitarse información adicional, con la finalidad de complementar o corroborar lo declarado.<br>En caso de detectar alguna inconsistencia o falsedad de la información aquí contenida, la CNPSS se reserva el derecho de no autorizar o, en su caso, solicitar el reíntegro por concepto de pago del medicamento.<br>En caso de considerarlo necesario, la DGGSS, solicitará la intervención de algún experto clínico que participará de manera activa en el proceso de autorización.<br>Cuando se rechaza esta autorización, únicamente significa que, desde el punto de vista administrativo, la CNPSS no realizará el pago por concepto de la fase de atención que incluye la administración del pertuzumab, lo cual no deberá influir en el criterio<br>clínico del médico tratante para su indicación.<br>Este formato puede estar sujeto a modificaciones sin previo aviso.
		</label></blockquote>
</div>