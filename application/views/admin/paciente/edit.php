
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Editar
        <small>Paciente</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="table-responsive row">
                    <div class="col-md-12">
                    <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                    <form action="<?php echo base_url();?>mantenimiento/paciente/update" method="POST">

                        <input type="hidden" value="<?php echo $paciente->id_pac;?>" name="id_pac">
<!----------------------------------------------------------------------------------------------------------------------->
                          <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">NO. EXPEDIENTE:</label><br>
                                        <input type="number" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="no_exp" name="no_exp" value="<?php echo $paciente->no_exp?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">Curp:</label><br>
                                        <input type="text" style=" width:300px;height:30px" class="form-control" id="curp" name="curp" value="<?php echo $paciente->curp?>">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Fecha de Ingreso</label><br>
                                        <input id="datein" name="datein" type="date" value="<?php echo $paciente->fecha_ingr?>" class="form-control" style=" width:300px;height:30px" required>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="nombre">Nombre:</label><br>
                                        <input type="text" style=" width:300px;height:30px" class="form-control" id="nombrepx" name="nombrepx" value="<?php echo $paciente->nombrepx?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="nombre">Apellido Paterno:</label><br>
                                        <input type="text" style=" width:300px;height:30px" class="form-control" id="ape_pat" name="ape_pat" value="<?php echo $paciente->ape_pat?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="nombre">Apellido Materno:</label><br>
                                        <input type="text" style=" width:300px;height:30px" class="form-control" id="ape_mat" name="ape_mat" value="<?php echo $paciente->ape_mat?>">
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Fecha de Nacimiento</label><br>
                                        <input id="datenac" name="datenac" type="date" value="<?php echo $paciente->fecha_nac?>" class="form-control" style=" width:300px;height:30px" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">Sexo:</label><br>
                            
                                        <?php if($paciente->sexo == "masculino"){?>
                                            <input type="radio" name="gender" value="masculino" checked required> Masculino<br>
                                            <input type="radio" name="gender" value="femenino" required> Femenino<br>
                                            <?php
                                            } else{?>
                                            <input type="radio" name="gender" value="masculino" required> Masculino<br>
                                        <input type="radio" name="gender" value="femenino" checked required> Femenino<br>
                                        <?php }?>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_tiposangre">Tipo de sangre:</label><br>
                                            
                                            <select name="cat_tiposangre" id="cat_tiposangre" class="form-control" style=" width:300px;height:30px">
                                                <?php foreach($cat_tiposangre as $cat_tiposangre):?>

                                            <option  <?php if($paciente->id_tiposangre==$cat_tiposangre->id_sangre){?>selected="true"<?php }?>   value="<?php echo $cat_tiposangre->id_sangre;?>"> <?php echo $cat_tiposangre->descripcion;?> </option>
                                                
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">NO. POLIZA DE SEGURO:</label><br>
                                        <input type="number" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="no_poliza" name="no_poliza" value="<?php echo $paciente->no_poliza?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">FECHA DE INICIO DE LA POLIZA</label><br>
                                      <input id="dateinpoliza" name="dateinpoliza" type="date" value="<?php echo $paciente->inicio_poliza?>" class="form-control" style=" width:300px;height:30px" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">FECHA DE VIGENCIA DE LA POLIZA</label><br>
                                        <input id="datefinpoliza" name="datefinpoliza" type="date" value="<?php echo $paciente->fin_poliza?>" class="form-control" style=" width:300px;height:30px" required>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_nacionalidades">Nacionalidad:</label><br>
                                        <select name="cat_nacionalidades" id="cat_nacionalidades" class="form-control" style=" width:300px;height:30px">
                                            <?php foreach($nacionalidades as $nacionalidades):?>

                                                <option <?php if($paciente->id_nacionalidad==$nacionalidades->codigo){?>selected="true"<?php }?> value="<?php echo $nacionalidades->codigo;?>"> <?php echo $nacionalidades->nacionalidad;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_estados">Estado:</label><br>
                                        <select name="cat_estados" id="cat_estados" class="form-control" style=" width:300px;height:30px">
                                           <?php if($paciente->id_nacionalidad==223){ ?>
                                               <?php foreach($estados as $estados):?>

                                                    <option <?php if($paciente->id_estado==$estados->id){?>selected="true"<?php }?> value="<?php echo $estados->id;?>"> <?php echo $estados->nombre;?> </option>
                                                
                                                <?php endforeach;?>
                                            <?php } ?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_municipios">Municipios:</label><br>
                                        <select name="cat_municipios" id="cat_municipios" class="form-control" style=" width:300px;height:30px">
                                           <?php foreach($municipios as $municipios):?>

                                                <option <?php if($paciente->id_municipio==$municipios->id){?>selected="true"<?php }?> value="<?php echo $municipios->id;?>"> <?php echo $municipios->nombre;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_localidades">Localidad:</label><br>
                                        <select name="cat_localidades" id="cat_localidades" class="form-control" style=" width:300px;height:30px">
                                           <?php foreach($localidades as $localidades):?>

                                                <option <?php if($paciente->id_localidad==$localidades->id){?>selected="true"<?php }?> value="<?php echo $localidades->id;?>"> <?php echo $localidades->nombre;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Dirección</label><br>
                                        <input type="text" style=" width:300px;height:30px" class="form-control" id="direccion" name="direccion" value="<?php echo $paciente->domicilio?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="Teléfono">Teléfono:</label><br>
                                        <input type="text" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="telefono" name="telefono" value="<?php echo $paciente->telefono?>" required>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Grupo Étnico:</label><br>
                                        <select name="grupos" id="grupos" class="form-control" style=" width:300px;height:30px">
                                            <?php foreach($grupos as $grupos):?>
                                                <option <?php if($paciente->id_gpoetnico==$grupos->id_etnicos){?>selected="true"<?php }?> value="<?php echo $grupos->id_etnicos;?>"> <?php echo $grupos->descripcion;?> </option>
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Religión:</label><br>
                                            <select name="religion" id="religion" class="form-control" style=" width:300px;height:30px">
                                              <?php foreach($religion as $religion):?>

                                              <option <?php if($paciente->id_religion==$religion->id_religion){?>selected="true"<?php }?> value="<?php echo $religion->id_religion;?>"> <?php echo $religion->descripcion;?> </option>
                                                  
                                              <?php endforeach;?>
                                            </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Discapacidad:</label><br>
                                          <select name="discapacidades" id="discapacidades" class="form-control" style=" width:300px;height:30px">
                                              <?php foreach($discapacidades as $discapacidades):?>

                                                <option <?php if($paciente->id_discapacidad==$discapacidades->id_discapacidad){?>selected="true"<?php }?> value="<?php echo $discapacidades->id_discapacidad;?>"> <?php echo $discapacidades->descripcion;?> </option>
                                                  
                                              <?php endforeach;?>
                                          </select>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Vivienda:</label><br>
                                        <select name="vivienda" id="vivienda" class="form-control" style=" width:300px;height:30px">
                                            <?php foreach($vivienda as $vivienda):?>

                                            <option <?php if($paciente->id_vivienda==$vivienda->id_vivienda){?>selected="true"<?php }?> value="<?php echo $vivienda->id_vivienda;?>"> <?php echo $vivienda->descripcion;?> </option>
                                                  
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Nivel Socio-Economico:</label><br>
                                            <select name="nivelsocio" id="nivelsocio" class="form-control" style=" width:300px;height:30px">
                                                <?php foreach($nivelsocio as $nivelsocio):?>

                                                <option <?php if($paciente->id_niv==$nivelsocio->idnse){?>selected="true"<?php }?> value="<?php echo $nivelsocio->idnse;?>"> <?php echo $nivelsocio->descripcion;?> </option>
                                                  
                                                <?php endforeach;?>
                                            </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_diagnostico">DERECHOHABIENCIA:</label><br>
                                        <select class="form-control" style=" width:300px;height:30px" name="derechohabiencia" id="derechohabiencia" required>
                                        <option value="">Seleccione una opción</option>
                                        <option <?php if($paciente->derecho_habiencia=="IMSS"){?>selected="true"<?php }?> value="IMSS"> IMSS </option>
                                        <option <?php if($paciente->derecho_habiencia=="ISSSTE"){?>selected="true"<?php }?> value="ISSSTE"> ISSSTE </option>
                                        <option <?php if($paciente->derecho_habiencia=="ISSTECH"){?>selected="true"<?php }?> value="ISSTECH"> ISSTECH </option>
                                        <option <?php if($paciente->derecho_habiencia=="SEDENA"){?>selected="true"<?php }?> value="SEDENA"> SEDENA </option>
                                        <option <?php if($paciente->derecho_habiencia=="MARINA"){?>selected="true"<?php }?> value="MARINA"> MARINA </option>
                                        <option <?php if($paciente->derecho_habiencia=="PEMEX"){?>selected="true"<?php }?> value="PEMEX"> PEMEX </option>
                                        <option <?php if($paciente->derecho_habiencia=="SEGURO POPULAR"){?>selected="true"<?php }?> value="SEGURO POPULAR"> SEGURO POPULAR </option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">  Supervivencia:</label><br>
                                        <?php if (!empty($paciente->supervivencia)) { ?>
                                            <?php if($paciente->supervivencia == "activo"){?>
                                              <input type="radio" id="supervivencia" name="supervivencia" value="activo" checked required>Activo<br>
                                              <input type="radio" id="supervivencia" name="supervivencia" value="defuncion" required>Defunción<br>
                                            <?php
                                            } else{?>
                                              <input type="radio" id="supervivencia" name="supervivencia" value="activo" required>Activo<br>
                                              <input type="radio" id="supervivencia" name="supervivencia" value="defuncion" checked required>Defunción<br>
                                            <?php }?>
                                       <?php }else{ ?>
                                        <input type="radio" id="supervivencia" name="supervivencia" value="activo" required>Activo<br>
                                        <input type="radio" id="supervivencia" name="supervivencia" value="defuncion" required>Defunción<br>
                                       <?php } ?>
                                      </div>
                                  </div>
                                    <div class="col-md-4">
                                        <div class="form-group" align="center">
                                          <label for="expediente">Fecha de Defunción:</label><br>
                                          <input type="date" style=" width:300px;height:30px"  class="form-control" id="fecha_defuncion" name="fecha_defuncion" value="<?php if(!empty($paciente->fecha_defuncion)){ echo $paciente->fecha_defuncion;} ?>" readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                              </div>
                              
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
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

<script>
  $(document).ready(function()
    {
      $("input[name=supervivencia]").change(function () {   
        if($(this).val()=="activo"){
          $("#fecha_defuncion").val("");
          $("#fecha_defuncion").removeAttr("required");
          $("#fecha_defuncion").attr("readonly","readonly");
        }else{
          $("#fecha_defuncion").removeAttr("readonly");
          $("#fecha_defuncion").attr("required","required");
        }
      });
    });
</script>
