


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
                <th ><img src="application/views/admin/notamedica/logo.png" alt="" style="width:20%"></th>
            </tr>
        </table>

            <p align = left>Lic. 
            Sanitaria : Q123456789</p>
            
            <center> <h3> CARTA DE CONSENTIMIENTO BAJO INFORMACION </h3></center>

            <p align = left>Procedimiento</p>

        <table border=1 cellspacing=0 cellpadding=1 class="table">

            <tr >


                <td colspan="3"><center> <font size=2 face="Comic Sans MS,arial,verdana"> Con fundamento en la ley general de salud, artículos 77 bis, reglamento de la ley general de salud en materia de prestación de servicios de atención médica. Artículos 80, 81, 82 83 y NORMA Oficial Mexicana NOM-004-SSA3-2012, Del expediente clínico fracciones de la 10.1 a la 10.1.4</font> </center></td>

            </tr>

            <tr>
                <th ><font size=2 face="Comic Sans MS,arial,verdana">Tapachula, Chiapas</font></th>
                <th ><font size=2 face="Comic Sans MS,arial,verdana">Fecha <?php echo $fecha;?></font></th>
                <th ><font size=2 face="Comic Sans MS,arial,verdana">Espediente <?php echo $infopac->no_exp;?></font></th>
            </tr>

            <tr>
                <td><font size=2 face="Comic Sans MS,arial,verdana">Yo: <?php echo $infopac->nombrepx;?> <?php echo $infopac->ape_pat;?> <?php echo $infopac->ape_mat;?></font></td>
                <td colspan="2"></td>
            </tr>

            <tr>
                <th><font size=2 face="Comic Sans MS,arial,verdana">Del sexo: <?php echo $infopac->sexo;?></font></th>
                <th><font size=2 face="Comic Sans MS,arial,verdana">Fecha de Nacimiento <?php echo $infopac->fecha_nac;?></font></th>
                <th><font size=2 face="Comic Sans MS,arial,verdana">Edad: <?php echo $edad;?></font></th>
            </tr>

            <tr>
                <td colspan="3"><font size=2 face="Comic Sans MS,arial,verdana">Manifiesto mi libre voluntad para autorizar los procedimientos diagnósticos, terapéuticos y quirúrgicos que se me indiquen, o apliquen después de haber recibido y entendido la información suficiente, clara, oportuna y veraz sobre mi enfermedad y estado actual, además de los beneficios, riesgos, complicaciones y secuelas inherentes. 
Se me han comunicado las alternativas existentes y disponibles, el derecho a cambiar mi decisión en cualquier momento antes del procedimiento o intervención.
Me comprometo a prop0orcionar información completa y veraz, así como a seguir las indicaciones médicas con el propósito de que mi atención sea adecuada.
Otorgo mi autorización al personal de salud para la atención de contingencias y urgencias derivadas del acto médico señalado, atendiendo al principio de libertad prescriptiva.
</font></td>
            </tr>

            <tr>
                <td colspan="3"><font size=2 face="Comic Sans MS,arial,verdana">Procedimiento:   Electiva(<?php if($procedimiento == "efectiva"){ echo "X";}?>) Urgencia(<?php if($procedimiento == "urgencia"){ echo "X";}?>)</font></td>
            </tr>

            <tr>
                <td colspan="3"><font size=2 face="Comic Sans MS,arial,verdana">Diagnostico Previo. <?php echo $diagnostico;?></font><br></td>
            </tr>

            <tr>
                <td colspan="3"><font size=2 face="Comic Sans MS,arial,verdana">Procedimiento de intervicion. <?php echo $intervencion;?></font></td>
            </tr>

            <tr>
                <td colspan="3"><font size=2 face="Comic Sans MS,arial,verdana">Riesgos más frecuentes inherentes al procedimiento o intervención quirúrgica y a las condiciones actuales del paciente:
Nausea, vómito, diarrea, estreñimiento, pérdida del apetito, infecciones, fiebre, dolor de cabeza, sangrado por cualquier vía, fatiga generalizada, caída de cabello. Dolor en el trayecto venoso, prurito, erupciones en la piel, dolor torácico, perforación intestinal, sensación de ahogo, hipotensión, hipertensión, trombosis, alergia, hipersensibilidad y anafilaxia. Alteraciones en la sensibilidad y fuerza tanto de un miembro específico como también en forma generalizada. A nivel sanguíneo en algunos casos se puede presentar anemia, disminución en los glóbulos blancos (defensas) y/o disminución de las plaquetas. Se me informa que de no aplicarse, dicho tratamiento la enfermedad pudiera progresar y llevar al deterioro del estado de salud, incluso a la muerte. He informado del consumo de medicamentos o sustancias  ya  que podrian intervenir con mi tratamiento.
</font></td>
            </tr>

            <tr>
                <td colspan="3"><font size=2 face="Comic Sans MS,arial,verdana">Beneficios: <?php echo $beneficios;?></font></td>
            </tr>
            

        </table><br>

        <table border=1 cellspacing=0 cellpadding=1 class="table">

            <tr>
                <td><center><?php echo $tutor;?></center></td>
                <td><center><?php echo $medicoinfo->nombre;?> <?php echo $medicoinfo->ape_pat;?> <?php echo $medicoinfo->ape_mat;?> <?php echo $medicoinfo->cedula;?></center></td>
                

            </tr>
            <tr>
                <th><font size=2 face="Comic Sans MS,arial,verdana">Nombre completo y firma del paciente, tutor o persona legalmente responsable</font></th>
                <th><font size=2 face="Comic Sans MS,arial,verdana">Nombre completo. Cedula y froma del medico tratante</font></th>
                
            </tr>

        </table> <br>

        <table border=1 cellspacing=0 cellpadding=1 class="table">

            <tr>
                <td><center><?php echo $testigo1;?></center></td>
                <td><center><?php echo $testigo2;?></center></td>
                

            </tr>
            <tr>
                <th style="width:30%"><font size=2 face="Comic Sans MS,arial,verdana">Nombre completo y firma del testigo </font></th>
                <th style="width:30%"><font size=2 face="Comic Sans MS,arial,verdana">Nombre completo y firma del testigo 2





                </font></th>
                
            </tr>

        </table><br>

        <table>
            <tr><font size=2 face="Comic Sans MS,arial,verdana">Este documento se elabora de acuerdo a lo establecido en la NOM-004-SSA2-2012 y las recomendaciones de la CONAMED</font></tr>

        </table>

    </center>
    </div>




