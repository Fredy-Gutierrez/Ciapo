<?php if (!empty($this->session->userdata("id_med"))) {
    $id_med = $this->session->userdata("id_med");
} ?>

<html>
       <head>
  <style>
    @page { margin: 190px 50px; }
    #header { position: fixed; left: 0px; top: -164px; right: 0px; height: 80px;  text-align: right; }
    #header2 { position: fixed; left: 0px; top: -155px; right: 0px; height: 80px;  text-align: left; }
    #header3 { position: fixed; left: 0px; top: -60px; right: 0px; height: 80px;  text-align: right; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 75px;  text-align: right;}
    #footer2 { position: fixed; left: 0px; bottom: -130px; right: 0px; height: 75px;  text-align: left;}
  </style>

<div id="header">
    <p class=MsoNormal ><span lang=ES
    style='font-size:8.4pt;font-family:"Arial",sans-serif;color:#9b9b9b;'> 
     Hospital Regional de Alta Especialidad "Ciudad Salud"<br/> 
                    Direccion General Adjunta<br/>
                    Direccion Medica<br/>
                    Divicion Oncologica<br/>
                    Consulta Externa<br/>  <o:p></o:p></span></p> 
    
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

<div id="footer2">
    <p class="page"><img src="application/views/admin/notamedica/logo.jpg" /></p>
</div>  

        <table cellspacing=1 cellpadding=1 class="table">

            <tr>
                <th>Fecha de vencimiento de Poliza:</th>
                <th><?php echo $pac->fin_poliza; ?></th>
                <th>Expediente:</th>
                <th><?php echo $pac->no_exp; ?></th>
            </tr>



        </table><br><br>

        <table border=2 cellspacing=2 cellpadding=2 class="table">

            <tr>
                <th><span lang=ES
                    style='font-size:12.0;font-family:"Arial"'>Fecha de Surtimieto de Farmacia</th>
                <th><span lang=ES
                    style='font-size:12.0;font-family:"Arial"'>Fecha de aplicacion por enfermeria</th>
                <th><span lang=ES
                    style='font-size:11.0;font-family:"Arial"'>Firma del Paciente por recepcion</th>
            </tr>

            <body>

            <tr>
                <th align="right" style="color:#fff";>.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

                        <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

                        <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

            <tr>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
                <th align="right" style="color:#fff">.</th>
            </tr>

           

        </table>

</div>


        <table cellspacing=0 cellpadding=1 class="table">

            <tr>
                <th><center><font size="13">RECETA MÉDICA ONCOLÓGICA</font></center></th>
            </tr>

        </table>

        <table cellspacing=1 cellpadding=1 class="table">

            <tr>
                <th style="width:30%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><b>Paciente</b></font></th>
                <th style="width:20%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><b>Fecha de nacimiento</b></font></th>
                <th style="width:20%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><b>Expediente de Paciente</b></font></th>
                <th style="width:20%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><b>Fecha de Expedición</b></th>
            </tr>

            <tr>
                <th style="width:30%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $paciente->nombrepx." ". $paciente->ape_pat." ". $paciente->ape_mat ?></font></th>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->fecha_nac; ?></font></th>
                <th style="width:12%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->no_exp; ?></font></th>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->fecha;?></font></th>
            </tr>


        </table>
        
        <table cellspacing=1 cellpadding=1 class="table">
            <tr>
                <th style="width:30%"><font lang=ES style='font-size:9.0;font-family:"Arial"'>Diagnostico</font></th>
                <th style="width:15%"><font lang=ES style='font-size:9.0;font-family:"Arial"'>Etapa</font></th>
                <th style="width:15%"><font lang=ES style='font-size:9.0;font-family:"Arial"'>Peso del Paciente</font></th>
                <th style="width:15%"><font lang=ES style='font-size:9.0;font-family:"Arial"'>Estatura del Paciente</font></th>
                <th style="width:15%"><font lang=ES style='font-size:9.0;font-family:"Arial"'>IMC del Paciente</font></th>
                
                   
            </tr>
            <tr>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->desdiag; ?></font></th>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->etapa; ?></font></th>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->peso." Kg"; ?></font></th>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->estatura." Cm"; ?></font></th>
                <th><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $pac->imc; ?></font></th>
                
            </tr>

        </table>
        
        <br>
        <table cellspacing=0 cellpadding=1 class="table">

            <tr>
                <th><font style='font-size:9.0;font-family:"Arial"'>MEDICAMENTOS ONCOLOGICOS</font></th>
            </tr>

        </table>

        
        <table class="table" border="0.5px" cellspacing=2 cellpadding=2>
            <thead>
                <tr>
                    <th style="background-color: #3B3B3B;" rows="3" cols="25"><font color="white" style='font-size:9.0;font-family:"Arial"'>NOMBRE DEL CICLO, FRECUENCIA Y NÚMERO DEL CICLO
</font></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php if (!empty($recet->observacion)): ?>
                        
                    <?php endif ?>
                    <td height="35"><?php echo $recet->observacion ?></td>
                </tr>
                
            </tbody>
        </table>
        <br>

        <table class="table" border="0.5px" cellspacing=2 cellpadding=2>
            <thead>
                <tr>
                    <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">MEDICAMENTO</font></center></th>
                    <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">DOSIS</font></center></th>
                    <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">ESPECIFICACIONES DE APLICACION</font></center></th>
                    <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">FECHAS PARA LA APLICACION</font></center></th>
                    
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($medicinas)): ?>
                    <?php foreach ($medicinas as $medicinas): ?>
                        <tr>
                            <td style="width:9%"><center><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->nombregen;?></span></center></td>
                            <!--<td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->descripcion;?></span></td>-->
                            <td style="width:3%"><center><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->dosis;?></span></center></td>
                            <td style="width:6%"><center><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->via_administracion." , ".$medicinas->frecuencia." , ".$medicinas->dilucion;?></span></center></td>
                            <td style="width:4%"><center><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->fecha_aplicacion;?></span></center></td>
                            

                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>

        </table>
        <br>

        <?php if (!empty($medAlt)): ?>
            <table class="table" cellspacing=2 cellpadding=2>

                <tr>
                    <th><font style='font-size:9.0;font-family:"Arial"'>MEDICAMENTOS ALTERNATIVOS</font></th>
                </tr>

            </table>
            <table class="table" border="0.5px" cellspacing=2 cellpadding=2>
                <thead>
                    <tr>
                        <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">MEDICAMENTO</font></center></th>
                        <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">DOSIS</font></center></th>
                        <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">ESPECIFICACIONES DE APLICACION</font></center></th>
                        <th style="background-color: #3B3B3B;"><center><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">FECHAS PARA LA APLICACION</font></center></th>
                        
                    </tr>
                </thead>


                <tbody>
                    
                    <?php foreach ($medAlt as $medAlt): ?>
                        <tr>
                            <td style="width:9%"><center><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medAlt->medicamento;?></span></center></td>
                            <td style="width:3%"><center><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medAlt->dosis;?></span></center></td>
                            <td style="width:6%"><center><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medAlt->via_administracion." , ".$medAlt->frecuencia." , ".$medAlt->dilucion;?></font></center></td>
                            <td style="width:4%"><center><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medAlt->fecha_aplicacion;?></font></center></td>

                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
            
        <?php endif ?>

        <!--
        

    -->
        

<!--
        <table cellspacing=1 cellpadding=1 class="table">

            <tr>
                <th>MEDICAMENTO SOLICITADOS</th>
            </tr>

        </table><br>

        <table border="1" cellspacing=1 cellpadding=1 class="table">

                    <tr>
                        <th><span lang=ES
                    style='font-size:9.0;font-family:"Arial"'>MEDICAMENTO</th>
                        <th><span lang=ES
                    style='font-size:9.0;font-family:"Arial"'>PRESENTACION</th>
                        <th><span lang=ES
                    style='font-size:9.0;font-family:"Arial"'>DOSIS</th>
                        <th><span lang=ES
                    style='font-size:9.0;font-family:"Arial"'>ESPECIFICACIONES PARA APLICACION DEL MEDICAMENTO</th>
                        <th><span lang=ES
                    style='font-size:9.0;font-family:"Arial"'>FECHAS PARA LA APLICACION</th>
                        <th style="width:4%"><span lang=ES
                    style='font-size:9.0;font-family:"Arial"'>Aceptado o No aceptado</th>
                    </tr>

                                        <tr>
                        <th colspan="1" rowspan="1"> 
                            <?php if(!empty($medicinas)):?>
                                <?php foreach($medicinas as $medicinas):?>
                                   <tr>
                                        <td style="width:5%"><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->nombregen;?></td>
                                        <td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->descripcion;?></td>
                                        <td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->dosis;?></td>
                                        <td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->via_administracion." , ".$medicinas->frecuencia." , ".$medicinas->dilucion;?></td>
                                        <td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->fecha_aplicacion;?></td>
                                        <?php if ($medicinas->validacion=="t"): ?>
                                        <td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'>ACEPTADO</td> 
                                       <?php endif ?>

                                       <?php if ($medicinas->validacion=="f"): ?>
                                        <td style="width:4%"><span lang=ES style='font-size:9.0;font-family:"Arial"'>NO ACEPTADO</td> 
                                       <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?></th>
                        
                    </tr>



        </table><br>
    -->

    <?php if(empty($id_med)): ?>
        
    
        <br><table style='page-break-after:always;'></br></table><br>

    <?php endif ?>    
        <head>
    <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }

        th, td {
          text-align: left;
          padding: 2px;
        }

        th {
          background-color: #ffffff;
          color: black;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
        </style>
        </head>


    

        <div style="overflow-x:auto;">
             
            
            <br>

            <br>



        <?php if (!empty($extra)): ?>
            <table cellspacing=1 cellpadding=1 class="table">

                <tr>
                    <th>PREMEDICACIÓN</th>
                </tr>

            </table>

            <table border="1">
                <thead>
                    <tr>
                        <th style="background-color: #3B3B3B;"><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">MEDICAMENTO</font></th>
                        <th style="background-color: #3B3B3B;"><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">DESCRIPCIÓN</font></th>
                        <th style="background-color: #3B3B3B;"><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">DOSIS</font></th>
                        <th style="background-color: #3B3B3B;"><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">ESPECIFICACIONES PARA APLICACION DEL MEDICAMENTO</font></th>
                        <th style="background-color: #3B3B3B;"><font lang=ES style='font-size:9.0;font-family:"Arial"' color="white">FECHA DE APLICACION</font></th>
                    </tr>
                </thead>
            <?php foreach ($extra as $medicinas): ?>
                
                    <tbody>
                        <tr>
                            <td style="width:5%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->medicamento;?></font></td>
                            <td style="width:5%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->descripcion;?></font></td>
                            <td style="width:5%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->dosis;?></font></td>
                            <td style="width:5%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->via_administracion." , ".$medicinas->frecuencia." , ".$medicinas->dilucion;?></font></td>
                            <td style="width:5%"><font lang=ES style='font-size:9.0;font-family:"Arial"'><?php echo $medicinas->fecha_aplicacion;?></font></td>
                        </tr>
                    </tbody>
                

            <?php endforeach ?>
            </table>
        <?php endif ?>

        </div><br>
         
        <br>

        <table cellspacing=1 cellpadding=1 class="table" >

            <tr align = left>
                <b><span lang=ES
            style='font-size:7.5pt;font-family:"Arial",sans-serif'><center>________________________________ <br/><?php  echo $medico->ape_pat." ".$medico->ape_mat." ".$medico->nombre  ?> <br/>No. Ced: <?php  echo $medico2->cedula; ?> 
                <br/>Especialidad: <?php  echo $medico2->nombreesp; ?></center></span></b>

                
            </tr>
        </table><br>


</div>
<html>