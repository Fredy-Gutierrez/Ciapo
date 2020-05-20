
<div class="table-responsive"> 
    <table border=0 cellspacing=0 width="100%" cellpadding=1 class="table" style="margin: 0 auto;">
     <tbody>
        <tr>
          <td >
              <img src="application/views/admin/notamedica/salud.jpg" width="160" height="60" />
          </td>
          <td>

            <p class=MsoNormal ><span lang=ES
            style='font-size:8.5pt;font-family:"Arial",sans-serif;'><center>
            <b>HOSPITAL REGIONAL DE ALTA ESPECIALIDAD <br/> "CIUDAD SALUD" <br/> SOLICITUD DE ESTUDIO DE ANATOMIA PATOLOGICA </center> </b><o:p></o:p></span></p> 
          </td>
          <td>
          	<center>
            	<img src="application/views/admin/notamedica/logo.jpg" width="130" height="70"/>
        	</center>
          </td>
        </tr>
     </tbody>
   </table>
</div>

<div class="table-responsive">
		<table border=2 width="100%" cellspacing=0 cellpadding=1 class="table">
			<tbody>
				<tr>
					<td>
						<p class=MsoNormal ><span lang=ES
            style='font-size:8.5pt;font-family:"Arial",sans-serif;'><b> TIPO DE ESTUDIO SOLICITADO:<br/> </b><?php echo $estudio; ?>
					</td>
					
				</tr>

				<tr>
					<td>
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
			 			?>
			 			<br/>
			 			<span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><b>Nombre del paciente: </b>
                	<span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><?php echo $paciente->ape_pat." ".$paciente->ape_mat." ".$paciente->nombrepx." "." ";?> 
						<span lang=ES
						style='font-size:8;font-family:"Arial",sans-serif'><b> Edad:</b> <?php echo $calc_edad." "." ";?> <b> Fecha Nac.</b> <?php echo $dia."/".$mes."/".$anio." "." ";?> <b> Sexo:</b><?php echo " ".$paciente->sexo ;?><br/>
						<b>Servicio:</b> <?php echo $servicio."  " ;?> 
						<b> Cama:</b>  <?php echo $cama."  " ;?>
						<b> No. de Estudio: </b>  <?php echo " ".$num." " ;?><br/>
						<b>No. de Expediente: </b>  <?php echo " ".$paciente->no_exp." " ;?><br/><br/>
						<b>TIPO DE PIEZA QUIRURGICA O ESPECIMEN ENVIADO:</b><br/>
						<?php echo $pieza ;?><br/><br/>
						<b>DATOS CLINICOS:</b><br/>
						<?php echo $datos ;?><br/><br/>
						<b>DIAGNOSTICO CLINICO:</b><br/>
						<?php echo $paciente->desdiag ;?><br/><br/>
						<b>FECHA DE ENVIO:</b>
						<?php echo " ".$fecha ;?><br/><br/><br/>
						<center>
							<u>
							<?php echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre; ?>
							</u><br/>
							<b>NOMBRE Y FIRMA DEL MEDICO</b><br/><br/><br/>
						</center>
						<span lang=ES
						style='font-size:8;font-family:"Arial"'>
						<left>
							<b>*Nota:</b> Es imprescindible el envio de los datos clinicos principales asi como la preservacion adecuada del tejido, sin los cuales no es posible brindar un diagnostico optimo y oportuno.
						</left>
					</td>
				</tr>
			</tbody>

		</table>
</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- el rowspan sirve para una columna ocupe los lugares hacia abajo  -->
<!-- el colspan sirve para una columna ocupe los lugares hacia la derecha-->




