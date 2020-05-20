<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <?php if($this->session->flashdata("exito_gastCat")):?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <i class="icon fa fa-check"></i>
                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspLOS DATOS HAN SIDO GUARDADOS DE MANERA EXITOSA</font>
                <p></p>
                
                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $this->session->flashdata("exito_gastCat"); ?>
                        
                </p>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata("error_gastCat")):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i>
                <font size=4 face="Helvetica" style="font-weight: bold;"> ERROR EN LA ACTUALIZACION DE LOS DATOS</font>
                <p></p>
                <p> &nbsp &nbsp &nbsp&nbsp
                    <?php echo $this->session->flashdata("error_gastCat"); ?>
                        
                </p>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata("errorbusq_gastCat")):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i>
                <font size=4 face="Helvetica" style="font-weight: bold;"> ERROR EN LA BUSQUEDA DE LOS DATOS</font>
                <p></p>
                <p> &nbsp &nbsp &nbsp&nbsp
                    <?php echo $this->session->flashdata("errorbusq_gastCat"); ?>
                        
                </p>
            </div>
        <?php endif;?>
        
        <h1>
        GASTOS CATASTROFICOS
        <small>Detalle de Receta</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box-solid">
          <div class="box-body">
            <div class="box row ">
              <form action="<?php echo base_url()?>mantenimiento/Gasto_Catastroficos/busc_no_exp" method="POST">
                <table class="table table-striped">
                  <table class="table table-striped">
                    <div class="col-md-12">
                      <input type="hidden" id="no_exp" name="no_exp" value="<?php if(isset($paciente->no_exp)) echo $paciente->no_exp ?>">
                      <button title="Regresa a la página de Paciente por Expediente" type="submit" class="btn btn-warning btn-primary">
                        <span class="fa fa-mail-reply"> </span>&nbsp Regresar
                      </button>
                    </div>
                  </table>
                
              </form>
              <hr>
              <form action="<?php echo base_url();?>mantenimiento/gasto_catastroficos/update" method="POST">
                <table class="table table-striped">
                 
                  
                    
                      <div class="col-md-12">
                        
                          <label  for="num_Receta">Numero de Receta:</label>
                          <input type="text" style="font-weight: bold; color: red;" class="form-control" id="num_Receta" value="<?php if(isset($receta->idreceta)) echo $receta->idreceta ?>" name="nom_medico[]" readonly><font color="#960000" size=5></font>
                      </div>
                     
                  
                
              </table>

              <table class="table table-striped"> 
                <hr>
                 <table class="table table-striped"> 
                  <tr>
                       <center>
                         <font size=5 style="font-weight: bold;" color="#0F3D00">MEDICO</font>
                       </center>
                      <div class="col-md-12">
                          <label for="nom_medico1">Nombre de Medico:</label>
                          <input type="text" style="text-transform: uppercase;  border:solid 1.5px #186100;" class="form-control" id="nom_medico1" name="nom_medico[]" value="<?php if(isset($medico->nombre)) echo $medico->nombre?>" readonly>
                          
                          
                      </div>
                     
                  </tr>
                </table>
              </table>

              <table class="table table-striped"> 
                  <thead id="data_medico2">
                    <tr>
                    <th scope="col">

                      <div class="col-md-12"> 
                          
                          <label for="appat_medico">Apellido Paterno de Medico</label>
                          <input type="text" style="text-transform: uppercase; border:solid 1.5px #186100;" class="form-control" id="appat_medico" name="nom_medico[]" value="<?php if(isset($medico->ape_pat)) echo $medico->ape_pat?>" readonly>

                      </div>
                    </th>
                         
                     <th scope="col">

                      <div class="col-md-12">
                      
                          <label for="id_religion">Apellido Materno de Medico</label>
                          <input type="text" style="text-transform: uppercase; border:solid 1.5px #186100;" class="form-control" id="nom_pacie" name="nom_medico[]" value="<?php if(isset($medico->ape_mat)) echo $medico->ape_mat?>" readonly>
                     
                         
                          
                      </div>
                     </th>
                     
                    </tr>
                   </thead>
              </table>


              <table class="table table-striped"> 
                  <thead id="data_nombrepx">
                    <table class="table table-striped"> 
                    <tr>
                      <center>
                         <font size=5 style="font-weight: bold;" color="#000B44">PACIENTE</font>
                       </center>
                        <div class="col-md-12">
                            <label for="descripcion">Nombre de Paciente:</label>
                            <input type="text" style="text-transform: uppercase;  border:solid 1.5px #0013E1;" class="form-control" id="nom_medico" name="nom_pac[]" value="<?php if(isset($paciente->nombrepx)) echo $paciente->nombrepx?>" readonly>
                        </div>
                       
                    </tr>
                    </table>
                   </thead>
              </table>
               
              <table class="table table-striped"> 
                  <thead id="data_paciente">
                    <tr>
                    <th scope="col">

                      <div class="col-md-12"> <!-- Se crea para la columna ID Categorias -->
                          
                          <label for="id_religion">Apellido Paterno de Paciente</label>
                          <input type="text" style="text-transform: uppercase;  border:solid 1.5px #0013E1;" class="form-control" id="nom_medico" name="nom_pac[]" value="<?php if(isset($paciente->ape_pat)) echo $paciente->ape_pat?>" readonly>
                                   
                      </div>
                    </th>
                     
                    <th scope="col">
                      <div class="col-md-12">
                      
                          <label for="id_religion">Apellido Materno de Paciente</label>
                          <input type="text" style="text-transform: uppercase;  border:solid 1.5px #0013E1;" class="form-control" id="nom_pacie" name="nom_pac[]" value="<?php if(isset($paciente->ape_mat)) echo $paciente->ape_mat?>" readonly>
                      </div>
                    </th>

                    </tr>
                   </thead>
              </table>

              <!-- AQUI EMPIEZA LA TABLA -->
              <br>
              <center>
                <font size=5 style="font-weight: bold;" color="#0F3D00">TABLA DE MEDICAMENTOS</font>
              </center>
              <br>

              <div class="table-responsive">
                <table class="table table-striped"> 
                  <thead id="data_medicinas">
                    <tr>
                      <th scope="col">
                        <div class="col-md-12">

                          <table id="example2" class="table table-bordered table-hover">
                            <thead style="background-color: #F7F7F7">
                              <tr>
                                <th>Clave de Medicamento</th> <!-- Nombre de las columnas-->
                                <th>Nombre de Medicamento</th> <!-- Nombre de las columnas-->
                                <th>Dosis</th>
                                <th>Frecuencia</th>
                                <th>Vía Administración</th>
                                <th>Fecha Aplicación</th>
                                <th>Descripción</th>
                                <th>Aceptado/ No Aceptado</th>
                                <th>Comentario</th>
                              </tr>
                            </thead>
                            <?php if (!empty($medicinas) && isset($medicinas)): ?>
                              <?php  $i=0;?>
                              <?php foreach ($medicinas as $medicinas): ?>
                                <?php $i++; ?>
                                <tbody>
                                  <tr>
                                  <td><font color="red" style="font-weight: bold;"><?php echo $medicinas->clave;?></font></td>
                                  <td><font style="font-weight: normal;"><?php echo $medicinas->nombregen;?></font></td>
                                  <td><font style="font-weight: normal;"><?php echo $medicinas->dosis;?></font></td>
                                  <td><font style="font-weight: normal;"><?php echo $medicinas->frecuencia;?></font></td>
                                  <td><font style="font-weight: normal;"><?php echo $medicinas->via_administracion;?></font></td>
                                  <td><font style="text-transform: uppercase; font-weight: normal;"><?php echo $medicinas->fecha_aplicacion;?></font></td>
                                  <td><font style="font-weight: normal;"><?php echo $medicinas->descripcion;?></font></td>

                                  <?php if ($medicinas->validacion=='t'): ?>
                                    <td class="botones">
                                      <head>

                                        <div class="form-group">
                                          <input type="hidden" name="idRec[<?php echo $i;?>]" id="idRec[<?php $i; ?>]" value="<?php echo $medicinas->idreceta;?>">

                                          <input type="hidden" name="idMed[<?php echo $i;?>]" id="idMed[<?php $i; ?>]" value="<?php echo $medicinas->id_medicamento;?>">

                                          <input type="hidden" name="idMedDet[<?php echo $i;?>]" id="idMedDet[<?php $i; ?>]" value="<?php echo $medicinas->id_detreceta;?>">

                                          <label class="radio-inline">

                                            <input type="radio" onclick="cambiarPos('<?php echo $i;?>')" class='activ' val="<?php echo $i;?>" name="optradio[<?php echo $i;?>]" id="opcion1" value="true" checked> <font color="green">VALIDADO</font>
                                          </label>

                                          <br>
                                          <label class="radio-inline">

                                            <input type="radio" onclick="cambiarNeg('<?php echo $i;?>')" class='desact' val="<?php echo $i;?>"  name="optradio[<?php echo $i;?>]"  id="opcion2" value="false" ><font color="#A70000">NO VALIDADO</font>
                                          </label>

                                        </div>
                                      </head>
                                    </td>
                                    <td>
                                      <textarea disabled="true" style="overflow:auto;resize:none" maxlength="50" name="coment[<?php echo $i;?>]" id="coment[<?php echo $i;?>]" rows="3" cols="25"  value="" ></textarea>
                                      <!--<input type="textarea" class='texto_camb${i}' value='' name="coment[${i}]" id="coment${i}" disabled>-->
                                    </td>
                                    <?php else: ?>
                                      <td class="botones">
                                        <head>

                                          <div class="form-group">
                                            <input type="hidden" name="idRec[<?php echo $i;?>]" id="idRec[<?php $i; ?>]" value="<?php echo $medicinas->idreceta;?>">

                                            <input type="hidden" name="idMed[<?php echo $i;?>]" id="idMed[<?php $i; ?>]" value="<?php echo $medicinas->id_medicamento;?>">

                                            <input type="hidden" name="idMedDet[<?php echo $i;?>]" id="idMedDet[<?php $i; ?>]" value="<?php echo $medicinas->id_detreceta;?>">

                                            <label class="radio-inline">

                                              <input type="radio" onclick="cambiarPos('<?php echo $i;?>')" class='activ' val="<?php echo $i;?>" name="optradio[<?php echo $i;?>]" id="opcion1" value="true"> <font color="green">VALIDADO</font>
                                            </label>

                                            <br>
                                            <label class="radio-inline">

                                              <input type="radio" onclick="cambiarNeg('<?php echo $i;?>')" class='desact' val="<?php echo $i;?>"  name="optradio[<?php echo $i;?>]"  id="opcion2" value="false" checked><font color="#A70000">NO VALIDADO</font> 
                                            </label>

                                          </div>
                                        </head>
                                      </td>
                                      <td>
                                        <textarea style="overflow:auto;resize:none" name="coment[<?php echo $i;?>]" id="coment[<?php echo $i;?>]" rows="3" cols="25"  value=""  placeholder='¿Por qué es rechazado?' maxlength="50" required><?php echo $medicinas->justif;?></textarea >
                                        <!--<input type="textarea" class='texto_camb${i}' value='' name="coment[${i}]" id="coment${i}" disabled>-->
                                      </td>
                                    <?php endif ?>
                                  </tr>
                                </tbody>
                              <?php endforeach ?>
                            <?php endif ?>
                          </table>
                        </div>
                  
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>

              <!-- AQUI ACABA LA TABLA DE MEDICAMENTOS NORMALES -->

              <!-- AQUI EMPIEZA LA TABLA DE MEDICAMENTOS ALTERNATIVOS -->
              
              <?php if (!empty($medicinasAlt)): ?>
                <br>
                <center>
                  <font size=5 style="font-weight: bold;" color="#0F3D00">TABLA DE MEDICAMENTOS <i>ALTERNATIVOS</i></font>
                </center>
                <br>
              
                <div class="table-responsive">
                  <table class="table table-striped"> 
                    <thead id="data_medicinas">
                      <tr>
                        <th scope="col">
                          <div class="col-md-12">

                            <table id="example2" class="table table-bordered table-hover">
                              <thead style="background-color: #F7F7F7">
                                <tr>
                                  
                                  <th>Nombre de Medicamento</th> <!-- Nombre de las columnas-->
                                  <th>Dosis</th>
                                  <th>Frecuencia</th>
                                  <th>Vía Administración</th>
                                  <th>Fecha Aplicación</th>
                                  <th>Descripción</th>
                                  <th>Aceptado/ No Aceptado</th>
                                  <th>Comentario</th>
                                </tr>
                              </thead>
                              <?php if (!empty($medicinasAlt) && isset($medicinasAlt)): ?>
                                <?php  $i=0;?>
                                <?php foreach ($medicinasAlt as $medicinasAlt): ?>
                                  <?php $i++; ?>
                                  <tbody>
                                    <tr>
                                    <td><font style="font-weight: normal;"><?php echo $medicinasAlt->medicamento;?></font></td>
                                    <td><font style="font-weight: normal;"><?php echo $medicinasAlt->dosis;?></font></td>
                                    <td><font style="font-weight: normal;"><?php echo $medicinasAlt->frecuencia;?></font></td>
                                    <td><font style="font-weight: normal;"><?php echo $medicinasAlt->via_administracion;?></font></td>
                                    <td><font style="text-transform: uppercase; font-weight: normal;"><?php echo $medicinasAlt->fecha_aplicacion;?></font></td>
                                    <td><font style="font-weight: normal;"><?php echo $medicinasAlt->descripcion;?></font></td>

                                    <?php if ($medicinasAlt->validacion=='t'): ?>
                                      <td class="botonesAlt">
                                        <head>

                                          <div class="form-group">
                                            <input type="hidden" name="idRecAlt[<?php echo $i;?>]" id="idRecAlt[<?php $i; ?>]" value="<?php echo $medicinasAlt->idreceta;?>">

                                            <input type="hidden" name="idMedcAlt[<?php echo $i;?>]" id="idRecAlt[<?php $i; ?>]" value="<?php echo $medicinasAlt->id_alternativa;?>">

                                            <label class="radio-inline">

                                              <input type="radio" onclick="DesComen('<?php echo $i;?>')" class='activ' val="<?php echo $i;?>" name="optradioAlt[<?php echo $i;?>]" id="opc1" value="true" checked> <font color="green">VALIDADO</font>
                                            </label>

                                            <br>
                                            <label class="radio-inline">

                                              <input type="radio" onclick="ActComen('<?php echo $i;?>')" class='desact' val="<?php echo $i;?>"  name="optradioAlt[<?php echo $i;?>]"  id="opc2" value="false" ><font color="#A70000">NO VALIDADO</font>
                                            </label>

                                          </div>
                                        </head>
                                      </td>
                                      <td>
                                        <textarea disabled="true" style="overflow:auto;resize:none" maxlength="50" name="comentario[<?php echo $i;?>]" id="comentario[<?php echo $i;?>]" rows="3" cols="25"  value="" ></textarea>
                                        <!--<input type="textarea" class='texto_camb${i}' value='' name="coment[${i}]" id="coment${i}" disabled>-->
                                      </td>

                                      <?php else: ?>
                                        <td class="botonesAlt">
                                          <head>

                                            <div class="form-group">
                                              <input type="hidden" name="idRecAlt[<?php echo $i;?>]" id="idRecAlt[<?php $i; ?>]" value="<?php echo $medicinasAlt->idreceta;?>">

                                              <input type="hidden" name="idMedcAlt[<?php echo $i;?>]" id="idRecAlt[<?php $i; ?>]" value="<?php echo $medicinasAlt->id_alternativa;?>">

                                              <label class="radio-inline">

                                                <input type="radio" onclick="DesComen('<?php echo $i;?>')" class='activ' val="<?php echo $i;?>" name="optradioAlt[<?php echo $i;?>]" id="opc1" value="true"> <font color="green">VALIDADO</font>
                                              </label>

                                              <br>
                                              <label class="radio-inline">

                                                <input type="radio" onclick="ActComen('<?php echo $i;?>')" class='desact' val="<?php echo $i;?>"  name="optradioAlt[<?php echo $i;?>]"  id="opc2" value="false" checked><font color="#A70000">NO VALIDADO</font> 
                                              </label>

                                            </div>
                                          </head>
                                        </td>
                                        <td>
                                          <textarea style="overflow:auto;resize:none" name="comentario[<?php echo $i;?>]" id="comentario[<?php echo $i;?>]" rows="3" cols="25"  value=""  placeholder='¿Por qué es rechazado?' maxlength="50" required><?php echo $medicinasAlt->justif;?></textarea >
                                          <!--<input type="textarea" class='texto_camb${i}' value='' name="coment[${i}]" id="coment${i}" disabled>-->
                                        </td>
                                      <?php endif ?>
                                    </tr>
                                  </tbody>
                                <?php endforeach ?>
                              <?php endif ?>
                            </table>
                          </div>
                    
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              <?php endif ?>

              
              <!-- AQUI TERMINA LA TABLA DE MEDICAMENTOS ALTERNATIVOS -->

              <table class="table table-striped"> 
                  <thead id="data_boton">
                   <div class="col-md-12">
                    <br>
                      
                      
                      <button type="submit" class="btn btn-success btn-lg">
                        <span class="fa fa-save"> </span>&nbsp Guardar
                      </button>
                      
                  </div>
              </table>

                           <table class="table table-striped"> 
                              <thead id="data_cambio_prueba">
                                
                               </thead>
                           </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del paciente</h4>
      </div>
      <div class="modal-body">
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
  
  $valorTem="";

  //MEDICAMENTOS NORMALES
  function cambiarPos(i){
    $comeName= "coment["+i+"]";

    $coment = document.getElementById($comeName);
    $coment.required=false;
    $coment.disabled=true;
    $valorTem=$coment.value;
    $coment.value="";
    $coment.placeholder="";
    

  }

  function cambiarNeg(i){

    $comeName= "coment["+i+"]";
    
    $coment = document.getElementById($comeName);
    
    $coment.required=true;
    $coment.disabled=false;
    $coment.value=$valorTem;
    $coment.placeholder="¿Por qué es rechazado?";
  }

  //MEDICAMENTOS ALTERNATIVOS
  function DesComen(i){
    $comeName= "comentario["+i+"]";

    $coment = document.getElementById($comeName);
    $coment.required=false;
    $coment.disabled=true;
    $coment.value="";
    $coment.placeholder="";
    

  }

  function ActComen(i){

    $comeName= "comentario["+i+"]";
    
    $coment = document.getElementById($comeName);
    
    $coment.required=true;
    $coment.disabled=false;
    $coment.placeholder="¿Por qué es rechazado?";
  }
</script>