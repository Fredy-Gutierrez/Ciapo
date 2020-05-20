<div class="table-responsive"><center>
		<table border=1 width="87%" cellspacing=0 cellpadding=1 class="table">

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- el rowspan sirve para una columna ocupe los lugares hacia abajo  -->
<!-- el colspan sirve para una columna ocupe los lugares hacia la derecha-->
			<tr>
				<th style="width:20%" style="height:30%" ><img src="application/views/admin/notamedica/salud.jpg" width="160" height="60" /></th>
				<th style="width:50%" style="height:20%" colspan="2"><span lang=ES
					style='font-size:8.5;font-family:"Arial",sans-serif'><center><br/>SECRETARIA DE SALUD <br>
                    HOSPITAL REGIONAL ALTA ESPECIALIDAD CIUDAD SALUD <br>
                    TELEFONO 62 011 00 EXT, 10023, 10077 <br>
                    SOLICITUD DE ESTUDIO PARA EL SERVICIO DE IMAGENEOLOGIA </center></p> <br/> 
                </th>
				<th style="width:5%" style="height:30%"><center><img src="application/views/admin/notamedica/logo.jpg" width="130" height="70"/></th>
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
			 ?>
			<tr>
				<td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>NOMBRE DEL PACIENTE </b></td>
                <td><center><span lang=ES
					style='font-size:8.0;font-family:"Arial",sans-serif'><?php echo $paciente->ape_pat;?> <br/> <?php echo $paciente->ape_mat." ".$paciente->nombrepx;?></td>
                <td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>FECHA DE NACIMIENTO</td>
                <td><center><?php echo $paciente->fecha_nac;?></td>
                
			</tr>

			<tr>
				<td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>EXPEDIENTE</td>
                <td><center><?php echo $no_exp;?></center></td>
                <td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>EDAD</td>
                <td><center><?php echo $calc_edad;?></center></td>

			</tr>

			<tr>
				<td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>SEXO</td>
                <td><center><?php echo $paciente->sexo;?></center></td>
                <td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>SERVICIO/CAMA</td>
                <td><center><?php echo $servicio;?></center></td>

			</tr>

			<?php 
			
            $fecha1 = $fecha;
            $fechaComoEntero = strtotime($fecha1);
            $mes = date("m", $fechaComoEntero);
            $anio = date("Y", $fechaComoEntero);
            $dia = date("d", $fechaComoEntero);
            
          	?>

			<tr>
				<td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>FECHA DE SOLICITUD</td>
                <td><center><?php echo $dia."/".$mes."/".$anio;?></center></td>
                <td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>DIAGNOSTICO</td>
                <td><center><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><?php echo $paciente->desdiag;?></center></td>
                
			</tr>

			<tr>
				<td><span lang=ES
					style='font-size:8.0;font-family:"Arial",sans-serif'><center><b>NOMBRE COMPLETO <br/> Y FIRMA DEL MEDICO</center></td>
                <td><center> <span lang=ES
					style='font-size:8;'><br/><br/>____________________________<br/><?php echo $medico->ape_pat;?> <br/><?php echo $medico->ape_mat." ".$medico->nombre;?></center></td>
                <td><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><center><b>CITA MEDICA</center></td>
                <td><center><?php echo $cita;?></center></td>
                
			</tr>

			<tr>
				<td colspan="4"><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><b>ESTUDIOS: <br/>
					<?php echo $estudios;?></td>

			</tr>

			<tr>
				<td colspan="4"><span lang=ES
					style='font-size:8;font-family:"Arial",sans-serif'><left><b> DIAGNOSTICO Y RESUMEN<br/> <?php echo $diagnostico;?></td>
				
			</tr>

			

		</table>


	</div>




