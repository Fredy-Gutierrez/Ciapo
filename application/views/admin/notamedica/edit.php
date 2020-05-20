
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Editar
        <small>Nota Medica</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        <?php if($this->session->flashdata("exito")):?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exito"); ?></p>
                             </div>
                        <?php endif;?>
                        
                        <form action="" method="POST">
                            
                            <input type="hidden" value="<?php if(!empty($nota)){echo $nota->id_pac;}?>" name="id_pac">
                            <input type="hidden" value="<?php if(!empty($cns)){echo $cns->cns;}?>" name="id_sig" id="id_sig">
                            <input type="hidden" value="<?php if(!empty($nota)){echo $nota->id_nota;}?>" name="id_nota">
                            <input type="hidden" value="<?php if(!empty($nota)){echo $nota->id_consulta;}?>" name="id_consulta">

                            <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/patient.png" width="100" height="50"></center>
                            <br>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="expediente">Nombre:</label>
                                        <input type="nummber" class="form-control" id="nombrepx" name="no_exp" style=" width:300px;height:30px" value="<?php if(!empty($paciente)){ echo $paciente->nombrepx;}?>" readonly>
                                    </div>   
                                  </div>


                                  <div class="col-md-4">   
                                    <div  class="form-group" align="center"> 
                                        <label for="curp">Apellido Paterno:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px"  id="ape_pat" name="ape_pat" value="<?php if(!empty($paciente)){ echo $paciente->ape_pat;}?>" readonly>
                                    </div>  
                                  </div>

                                  <div class="col-md-4">          
                                    <div  class="form-group" align="center"> 
                                        <label for="curp">Apellido Materno:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="ape_mat" name="ape_mat" value="<?php if(!empty($paciente)){ echo $paciente->ape_mat;}?>" readonly>
                                    </div>
                                  </div>
                                  
                              </div>
                            </div>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="expediente">Peso:</label>
                                        <input type="number" class="form-control" style=" width:300px;height:30px" id="peso" name="peso" value="<?php if(!empty($cns)){echo $cns->peso;}?>" readonly>
                                    </div>   
                                  </div>


                                  <div class="col-md-4">   
                                    <div  class="form-group" align="center"> 
                                        <label for="estatura">Estatura:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px"  id="estatura" name="estatura" value="<?php if(!empty($cns)){echo $cns->estatura;}?>" readonly>
                                    </div>  
                                  </div>

                                  <div class="col-md-4">          
                                    <div  class="form-group" align="center"> 
                                        <label for="temperatura">Temperatura:</label>
                                        <input type="text" class="form-control" style="width:300px;height:30px" id="temperatura" name="temperatura" value="<?php if(!empty($cns)){echo $cns->temperatura;}?>" readonly>
                                    </div>
                                  </div>
                                  
                              </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">   
                                    <div  class="form-group" align="center"> 
                                        <label for="imc">IMC:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="imc" name="imc" value="<?php if(!empty($cns)){echo $cns->imc;}?>" readonly>
                                    </div>  
                                  </div>

                                  <div class="col-md-4">          
                                    <div  class="form-group" align="center"> 
                                        <label for="fc">FC:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="fc" name="fc" value="<?php if(!empty($cns)){echo $cns->fc;}?>" readonly>
                                    </div>
                                  </div>
                                  
                              </div>
                            </div>

                            <br>

                            

                            <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/medical-report.png" width="100" height="50"></center>
                            <br>
                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-3">
                                            
                                    <div  class="form-group" align="center">

                                        <label for="cat_diagnostico">DIAGNOSTICO:</label><br>
                                        
                                        <select class="form-control" style=" width:300px;height:30px" name="cat_diagnostico" id="cat_diagnostico">
                                            <?php foreach($cat_diagnostico as $cat_diagnostico):?>

                                                <option <?php if($nota->diagnostico==$cat_diagnostico->id_diag){?>selected="true"<?php }?> value="<?php echo $cat_diagnostico->id_diag;?>"> <?php echo $cat_diagnostico->desdiag;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>

                                    </div>
                                  </div>

                                  <div class="col-md-3">    
                                    <div  class="form-group" align="center"> 
                                        <label for="dosis">OBSERVACIÓN:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="observacion" name="observacion" value="<?php if(!empty($nota)){echo $nota->observacion;}?>" required>
                                    </div>  
                                  </div>

                                  <div class="col-md-3">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="dosis">ETAPA:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="etapa" name="etapa" value="<?php if(!empty($nota)){echo $nota->etapa;}?>" required>
                                    </div>
                                         
                                  </div>
                                  <div class="col-md-3">   
                                    <div  class="form-group" align="left">
                                        <label for="curp">Cobertura:</label><br>
                                        <?php if (!empty($paciente->cobertura)) {?>
                                          <?php if($paciente->cobertura == "Coberturado"){?>
                                          <input type="radio" name="cobertura" value="Coberturado" checked required>Coberturado<br>
                                          <input type="radio" name="cobertura" value="No coberturado" required>No Coberturado<br>
                                          <input type="radio" name="cobertura" value="Por definir" required>Por definir<br>
                                          <?php
                                            } elseif ($paciente->cobertura == "No coberturado") {?>
                                                <input type="radio" name="cobertura" value="Coberturado" required>Coberturado<br>
                                                <input type="radio" name="cobertura" value="No coberturado" checked required>No Coberturado<br>
                                                <input type="radio" name="cobertura" value="Por definir" required>Por definir<br>
                                          <?php }else{?>
                                                <input type="radio" name="cobertura" value="Coberturado" required>Coberturado<br>
                                                <input type="radio" name="cobertura" value="No coberturado" required>No Coberturado<br>
                                                <input type="radio" name="cobertura" value="Por definir" checked required>Por definir<br>
                                          <?php } ?>
                                        <?php }else{ ?>
                                          <input type="radio" name="cobertura" value="Coberturado" required>Coberturado<br>
                                          <input type="radio" name="cobertura" value="No coberturado" required>No Coberturado<br>
                                          <input type="radio" name="cobertura" value="Por definir" required>Por definir<br> 
                                        <?php } ?>
                                    </div> 
                                  </div>
                              </div>
                          </div>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_diagnostico">ESTADO DE LA ENFERMEDAD:</label><br>
                                        <select class="form-control" style=" width:300px;height:30px" name="estado_enfermedad" id="estado_enfermedad" <?php if(!empty($paciente->estado_enfermedad)){?> required <?php }else{?> disabled <?php } ?>>
                                        <option>Seleccione una opción</option>
                                        <option value="recurrencia" <?php if(!empty($paciente) && $paciente->estado_enfermedad=="recurrencia"){?>selected="true"<?php }?> > Recurrencia </option>
                                        <option value="progresion" <?php if(!empty($paciente) && $paciente->estado_enfermedad=="progresion"){?>selected="true"<?php }?> > Progresión </option>
                                        <option value="sin_evidencia" <?php if(!empty($paciente) && $paciente->estado_enfermedad=="sin_evidencia"){?>selected="true"<?php }?> > Sin evidencia de enfermedad </option>
                                        <option value="persistencia" <?php if(!empty($paciente) && $paciente->estado_enfermedad=="persistencia"){?>selected="true"<?php }?> > Persistencia </option>
                                        <option value="diagnostico_inicial" <?php if(!empty($paciente) && $paciente->estado_enfermedad=="diagnostico_inicial"){?>selected="true"<?php }?> > Diagnostico Oncológico Inicial </option>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4">    
                                    <div  class="form-group" align="center"> 
                                        <label for="dosis">ETAPA:</label>
                                        <input type="number" class="form-control" style=" width:300px;height:30px" id="etapa_enfermedad" name="etapa_enfermedad" value="<?php if(!empty($paciente)){ echo $paciente->etapa_enfermedad;}?>" <?php if(!empty($paciente) && ($paciente->estado_enfermedad=="recurrencia"  || $paciente->estado_enfermedad=="progresion")){?>required <?php }else{?> readonly <?php } ?>>
                                    </div>  
                                  </div>

                                  <div class="col-md-4">   
                                    <div  class="form-group" align="left">
                                        <label id="tiempo_libre">Tiempo libre de enfermedad</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="tiempo_libre_enfermedad" name="tiempo_libre_enfermedad" value="<?php if(!empty($paciente)){ echo $paciente->tiempo_libre_enfermedad;}?>" <?php if(!empty($paciente) && ($paciente->estado_enfermedad=="recurrencia"  || $paciente->estado_enfermedad=="progresion")){?>required <?php }else{?> readonly <?php } ?>>
                                    </div> 
                                  </div>

                                  
                      
                              </div>
                          </div>

                          <div class="row">
                                  <div class="col-md-12">  
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">ANTECEDENTES HEREDO FAMILIARES:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="antecedentesheredados" name="antecedentesheredados" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->antecedentes_heredados));}?></textarea>
                                    </div>  
                                  </div>
                              </div><br>

                          <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">ANTECEDENTES PERSONALES NO PATOLOGICOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="antecedentesno" name="antecedentesno" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->antecedentes_no_personales));}?></textarea>
                                    </div>
                                  </div>
                              </div><br>

                            <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="antecedentes">ANTECEDENTES PERSONALES PATOLOGICOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="antecedentes" name="antecedentes" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->antecedentes_personales));}?></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                    <label for="patologicos">ANTECEDENTES DE IMPORTANCIA PARA EL PADECIMIENTO ACTUAL:</label>
                                    <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="patologicos" name="patologicos" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->antecedentes_padecimiento));}?></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">      
                                    <div  class="form-group" align="center"> 
                                        <label for="evolucion">EVOLUCIÓN:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="evolucion" name="evolucion" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->evolucion));}?></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="evolucion">EXPLORACIÓN FISICA:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="exploracion" name="exploracion" required><?php if(!empty($nota->exploracion)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->exploracion));}?></textarea>
                                    </div>    
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12"> 
                                    <div  class="form-group" align="center"> 
                                        <label for="laboratorios">LABORATORIOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="laboratorios" name="laboratorios" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->laboratorios));}?></textarea>
                                    </div> 
                                  </div>
                              </div><br>

                              <div class="form-group">
                                <h3>
                                  ESTUDIOS DE IMAGEN
                                  <div class='btn btn-success' id="btnNuevoT" onclick="funcNuevoE()">
                                    Nuevo
                                  </div>
                                </h3>

                                <table class='table table-bordered table-hover' id="tablaEstudios">
                                  <tr>
                                    <th>Estudios</th>
                                    <th>Opciones</th>
                                  </tr>

                                  <?php if(!empty($estudios)):?>

                                    <?php 
                                    for ($i=0; $i < sizeof($estudios); $i++) { ?>
                                            <tr>
                                              <td><input type="text" class="form-control" name="estudios[]" value="<?php echo $estudios[$i]->descripcion;?>"></td>
                                              <td class="text-center">
                                                  <input type="button" class="borrar button" value="Eliminar">
                                              </td>
                                            </tr>
                                      
                                    <?php } ?>
                                <?php endif;?>

                                  <tr>
                                    <td><input type="text" class="form-control" name="estudios[]"></td>
                                    <td class="text-center">
                                      <input type="button" class="borrar button" value="Eliminar">
                                    </td>
                                  </tr>

                                </table> 
                              </div>

                          <br>
                          <br>


                              <div class="form-group">
                                <h3>
                                  HISTORIAL DE TRATAMIENTO
                                  <div class='btn btn-success' id="btnNuevoT" onclick="funcNuevoT()">
                                    Nuevo
                                  </div>
                                </h3>

                                <table class='table table-bordered table-hover' id="tablaTratamientos">
                                  <tr>
                                    <th>Tratamientos</th>
                                    <th>Opciones</th>
                                  </tr>
                                  
                                  <?php if(!empty($historial)):?>

                                    <?php 
                                    for ($i=0; $i < sizeof($historial); $i++) { ?>  

                                            <tr>
                                              <td><input type="text" class="form-control" name="tratamientos[]" value="<?php echo $historial[$i]->descripcion;?>"></td>
                                              <td class="text-center">
                                                  <input type="button" class="borrar button" value="Eliminar">
                                              </td>
                                            </tr>
                                      

                                  <?php  } ?>
                                <?php endif;?>

                                  <tr>
                                    <td><input type="text" class="form-control" name="tratamientos[]"></td>
                                    <td class="text-center">
                                      <input type="button" class="borrar button" value="Eliminar">
                                    </td>
                                  </tr>

                                </table> 
                              </div>
                              <br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center"> 
                                        <label for="toxicidad">REPORTE DE HISTOPATOLOGÍA:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="histopatologia" name="histopatologia" required><?php if(!empty($nota->histopatologia)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->histopatologia));}?></textarea>
                                    </div> 
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="toxicidad">TOXICIDAD:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="toxicidad" name="toxicidad" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->toxicidad));}?></textarea>
                                    </div>  
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="sintomas">SINTOMAS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="sintomas" name="sintomas" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->sintomas));}?></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="plan">PLAN:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="plan" name="plan" required><?php if(!empty($nota)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->plan));}?></textarea>
                                    </div>  
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="plan">PRONOSTICO:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="pronostico" name="pronostico" required><?php if(!empty($nota->pronostico)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->pronostico));}?></textarea>
                                    </div>  
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="plan">ANALISIS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="analisis" name="analisis" required><?php if(!empty($nota->analisis)){echo preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, str_ireplace('<br />', PHP_EOL,$nota->analisis));}?></textarea>
                                    </div>  
                                  </div>
                              </div><br>


                        <?php if(!empty($this->session->userdata("id_med"))):?>

                          <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div  class="form-group" align="right">

                                        <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/update">
                                            <i class="fa fa-save"></i> GUARDAR
                                        </button>
                                        
                                        <!--<input type="submit" class="btn btn-success" name="enviar1" value="GUARDAR" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/store">-->
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/updateandprint">
                                            <i class="fa fa-print"></i> GUARDAR E IMPRIMIR
                                        </button>
                                    </div>
                                  </div>

                                  <?php if (!empty($receta)) {  ?>
                                    <div class="col-md-4">  
                                      <div  class="form-group" align="left">
                                          <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/updateandrecet">
                                              <i class="fa fa-arrow-right"></i> GUARDAR Y RECETAR
                                          </button>
                                      </div>
                                    </div>
                                  <?php } ?>

                                  
                              </div>
                          </div>

                          <?php endif;?>

                           <?php if(empty($this->session->userdata("id_med"))):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i>¡NO ES MEDICO!, Si lo es registre sus datos en el apartado de medicos, hasta el momento se deshabilitaran los botones para GUARDAR INFORMACIÓN</p>
                             </div>
                        <?php endif;?>
                                
                        </form>

                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<style type="text/css">
  input[data-readonly] {
    pointer-events: none;
  }
  .button{
  background-color: #f44336;
  border: none;
  color: white;
  padding: 7px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px; 
}
</style>

<script type="text/javascript">

      $(document).ready(function()
    {

      $("#estado_enfermedad").change(function(){
        $("#estado_enfermedad option:selected").each(function(){
            estado_enfermedad = $(this).val();
            if(estado_enfermedad=="recurrencia"){
              document.getElementById('tiempo_libre').innerHTML= 'Tiempo libre de enfermedad';
              $("#etapa_enfermedad").removeAttr("readonly");
              $("#tiempo_libre_enfermedad").removeAttr("readonly");

              $("#etapa_enfermedad").attr("required","required");
              $("#tiempo_libre_enfermedad").attr("required","required");
            }else if(estado_enfermedad=="progresion"){
              document.getElementById('tiempo_libre').innerHTML= 'Tiempo libre de progresión';
              $("#etapa_enfermedad").removeAttr("readonly");
              $("#tiempo_libre_enfermedad").removeAttr("readonly");

              $("#etapa_enfermedad").attr("required","required");
              $("#tiempo_libre_enfermedad").attr("required","required");
            }else{
              $("#etapa_enfermedad").val( '' );
              $("#tiempo_libre_enfermedad").val( '' );


              $("#etapa_enfermedad").attr("readonly","readonly");
              $("#tiempo_libre_enfermedad").attr("readonly","readonly");
            }
        });
      });

    });


  $(document).on('click', '.borrar', function (event){
    event.preventDefault();
    $(this).closest('tr').remove();
  });

  function funcNuevoT()
  {
    $("#tablaTratamientos")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','tratamientos[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('borrar button').attr('value','Eliminar')
            )
        )

    );
  }

  function funcNuevoE()
  {
    $("#tablaEstudios")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','estudios[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('borrar button').attr('value','Eliminar')
            )
        )

    );
  }



</script>

