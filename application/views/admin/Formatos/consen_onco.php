

<style>
    label
    {
      font-size: 9.6; font-family:'Comic Sans MS,arial,verdana';
    }
</style>
        <div class="table-responsive"><center>
        <table class="table" ALIGN="center">

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- el rowspan sirve para una columna ocupe los lugares hacia abajo  -->
<!-- el colspan sirve para una columna ocupe los lugares hacia la derecha-->
            <tr>
                <th  ><img src="application/views/admin/notamedica/salud.jpg" alt="" style="width:20%"></th>

                <th style="width:80%" style="height:40%" ><center><h3>SECRETARIA DE SALUD</h3>
                    Centro Regional de Alta Especialidad de Chiapas <br>
                    Hostpital Regional de Alta Especialidad Ciudad Salud</center>
                </th>
                <th ><img src="application/views/admin/notamedica/logo.png" alt="" width="90" height="90" </th>
            </tr>
        </table>

            <p align = left>Lic. 
            Sanitaria : Q070890155</p>
            
            <center> <h3> CARTA DE CONSENTIMIENTO BAJO INFORMACION </h3></center>

            <p align = left>Procedimiento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; QUIMEOTERAPIA</p>

        <table border=1 cellspacing=0 cellpadding=1 class="table">

            <tr >


                <td colspan="3"><center> <label> Con fundamento en la ley general de salud, artículos 77 bis, reglamento de la ley general de salud en materia de prestación de servicios de atención médica. Artículos 80, 81, 82 83 y NORMA Oficial Mexicana NOM-004-SSA3-2012, Del expediente clínico fracciones de la 10.1 a la 10.1.4</label> </center></td>

            </tr>

            <tr>
                <th colspan="3"><center><label>Tapachula de Cordova y Ordoñez, Chiapas a <?php echo $fecha;?></label></center></th>
                
            </tr>

            <tr>
                <td colspan="2"><label><b>Yo:</b> <?php echo $infopac->nombrepx;?> <?php echo $infopac->ape_pat;?> <?php echo $infopac->ape_mat;?></label></td>
                <th ><label>con numero de expediente: <?php echo $infopac->no_exp;?></label></th>
            </tr>

            <tr>
                <th><label>Y de genero: <?php echo $infopac->sexo;?></label></th>
                <th><label>con fecha de nacimiento: <?php echo $infopac->fecha_nac;?></label></th>
                <th><label>y edad actual de : <?php echo $edad;?></label></th>
            </tr>

            <tr>
                <td colspan="3"><label><justify>Manifiesto mi libre voluntad para autorizar los procedimientos diagnósticos, terapéuticos y quirúrgicos que se me indiquen, o apliquen después de haber recibido y entendido la información suficiente, clara, oportuna y veraz sobre mi enfermedad y estado actual, además de los beneficios, riesgos, complicaciones y secuelas inherentes. 
Se me han comunicado las alternativas existentes y disponibles, el derecho a cambiar mi decisión en cualquier momento antes del procedimiento o intervención.
Me comprometo a proporcionar información completa y veraz, así como a seguir las indicaciones médicas con el propósito de que mi atención sea adecuada.
Otorgo mi autorización al personal de salud para la atención de contingencias y urgencias derivadas del acto médico señalado, atendiendo al principio de libertad prescriptiva.</justify>
</label></td>
            </tr>

            <tr>
                <td colspan="3"><label><b>Procedimiento o intervención Quirurgica:</b>Electiva(<?php if($procedimiento == "efectiva"){ echo "X";}?>) Urgencia(<?php if($procedimiento == "urgencia"){ echo "X";}?>)</label></td>
            </tr>

            <tr>
                <td colspan="3"><label><b>Diagnostico previo al procedimiento o Intervención Quirúrgica:</b> <?php echo $diagnostico;?></label><br></td>
            </tr>

            <tr>
                <td colspan="3"><label><b>Procedimiento o Intervención Quirúrgica Proyectada:</b> <?php echo $intervencion;?></label></td>
            </tr>

            <tr>
                <td colspan="3"><label><b>Riesgos más frecuentes inherentes al procedimiento o intervención quirúrgica y a las condiciones actuales del paciente:</b>
<br><justify>Nausea, vómito, diarrea, estreñimiento, pérdida del apetito, infecciones, fiebre, dolor de cabeza, sangrado por cualquier vía, fatiga generalizada, caída de cabello. Dolor en el trayecto venoso, prurito, erupciones en la piel, dolor torácico, perforación intestinal, sensación de ahogo, hipotensión, hipertensión, trombosis, alergia, hipersensibilidad y anafilaxia. Alteraciones en la sensibilidad y fuerza tanto de un miembro específico como también en forma generalizada. A nivel sanguíneo en algunos casos se puede presentar anemia, disminución en los glóbulos blancos (defensas) y/o disminución de las plaquetas. Se me informa que de no aplicarse, dicho tratamiento la enfermedad pudiera progresar y llevar al deterioro del estado de salud, incluso a la muerte.</justify>
</label></td>
            </tr>

            <tr>
                <td colspan="3"><label><b>Beneficios:</b><br><?php echo $beneficios;?></label></td>
            </tr>
            

        </table><br>

        <table border=1 cellspacing=0 cellpadding=1 class="table">

            <tr>
                <td><br><br><center><label><?php echo $tutor;?></label></center></td>
                <td><br><br><center><label><?php echo $medico->nombre;?> <?php echo $medico->ape_pat;?> <?php echo $medico->ape_mat;?> <?php echo $medico->cedula;?></label></center></td>
                

            </tr>
            <tr>
                <th><label>Nombre completo y firma del paciente, tutor o persona legalmente responsable</label></th>
                <th><label>Nombre completo. Cedula y firma del medico tratante</label></th>
                
            </tr>

        </table> <br>

        <table border=1 cellspacing=0 cellpadding=1 class="table">

            <tr>
                <td><br><br><center><label><?php echo $testigo1;?></label></center></td>
                <td><br><br><center><label><?php echo $testigo2;?></label></center></td>
                

            </tr>
            <tr>
                <th style="width:30%"><label>Nombre completo y firma del testigo </label></th>
                <th style="width:30%"><label>Nombre completo y firma del testigo 2</label></th>
                
            </tr>

        </table><br>

        <table>
            <tr><label>Este documento se elabora de acuerdo a lo establecido en la NOM-004-SSA2-2012 y las recomendaciones de la CONAMED</label></tr>

        </table>

    </center>
    </div>




