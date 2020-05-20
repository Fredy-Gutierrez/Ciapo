<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PACIENTES
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        
                        <form action="<?php echo base_url();?>mantenimiento/paciente/store" method="POST">
      
                             <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">NO. EXPEDIENTE:</label><br>
                                        <input type="number" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="no_exp" name="no_exp" onkeyup="getnomex()" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">CURP:</label><br>
                                        <input type="text" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="curp" name="curp" onkeyup="getcurp()" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Fecha de Ingreso</label><br>
                                        <input id="datein" name="datein" type="date" class="form-control" style=" width:300px;height:30px" required>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Nombre del paciente</label><br>
                                        <input type="text" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="nombrepx" name="nombrepx" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">Apellido Paterno:</label><br>
                                        <input type="text" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="ape_pat" name="ape_pat" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">Apellido Materno:</label><br>
                                        <input type="text" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="ape_mat" name="ape_mat">
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Fecha de Nacimiento:</label><br>
                                        <input id="datenac" name="datenac" type="date" class="form-control" style=" width:300px;height:30px" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">Sexo:</label><br>
                                        <input type="radio" name="gender" value="masculino" required> Masculino<br>
                                        <input type="radio" name="gender" value="femenino" required> Femenino<br>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_tiposangre">Tipo de sangre:</label><br>
                                    
                                        <select name="cat_tiposangre" id="cat_tiposangre" class="form-control" style=" width:300px;height:30px">
                                          <?php foreach($cat_tiposangre as $cat_tiposangre):?>

                                              <option value="<?php echo $cat_tiposangre->id_sangre;?>"> <?php echo $cat_tiposangre->descripcion;?> </option>
                                          
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
                                        <input type="number" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="no_poliza" name="no_poliza">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">FECHA DE INICIO DE LA POLIZA</label><br>
                                        <input id="dateinpoliza" name="dateinpoliza" type="date" class="form-control" style=" width:300px;height:30px">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">FECHA DE VIGENCIA DE LA POLIZA</label><br>
                                        <input id="datefinpoliza" name="datefinpoliza" type="date" class="form-control" style=" width:300px;height:30px">
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_nacionalidades">Nacionalidad:</label><br>
                                        <select style=" width:300px;height:30px" name="cat_nacionalidades" id="cat_nacionalidades" class="form-control">
                                            <?php foreach($nacionalidades as $nacionalidades):?>

                                                <option value="<?php echo $nacionalidades->codigo;?>"> <?php echo $nacionalidades->nacionalidad;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_estados">Estado:</label><br>
                                        <select name="cat_estados" id="cat_estados" class="form-control" style=" width:300px;height:30px">
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="cat_municipios">Municipios:</label><br>
                                        <select name="cat_municipios" id="cat_municipios" class="form-control" style=" width:300px;height:30px">
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
                                      </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Dirección</label><br>
                                        <input type="text" style=" width:300px;height:30px" class="form-control" id="direccion" name="direccion" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="Teléfono">Teléfono:</label><br>
                                        <input type="text" style=" width:300px;height:30px"  min="1" step="1" class="form-control" id="telefono" name="telefono">
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

                                              <option value="<?php echo $grupos->id_etnicos;?>"> <?php echo $grupos->descripcion;?> </option>
                                          
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Religión:</label><br>
                                          <select name="religion" id="religion" class="form-control" style=" width:300px;height:30px">
                                          <?php foreach($religion as $religion):?>
                                              <option value="<?php echo $religion->id_religion;?>"> <?php echo $religion->descripcion;?> </option>
                                          <?php endforeach;?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Discapacidad:</label><br>
                                        <select name="discapacidades" id="discapacidades" class="form-control" style=" width:300px;height:30px">
                                          <?php foreach($discapacidades as $discapacidades):?>

                                              <option value="<?php echo $discapacidades->id_discapacidad;?>"> <?php echo $discapacidades->descripcion;?> </option>
                                          
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
                                              <option value="<?php echo $vivienda->id_vivienda;?>"> <?php echo $vivienda->descripcion;?> </option>
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="expediente">Nivel Socio-Economico:</label>
                                        <select name="nivelsocio" id="nivelsocio" class="form-control" style=" width:300px;height:30px">
                                            <?php foreach($nivelsocio as $nivelsocio):?>

                                              <option value="<?php echo $nivelsocio->idnse;?>"> <?php echo $nivelsocio->descripcion;?> </option>
                                          
                                            <?php endforeach;?>
                                        </select>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-4">
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_diagnostico">DERECHOHABIENCIA:</label><br>
                                        <select class="form-control" style=" width:300px;height:30px" name="derechohabiencia" id="derechohabiencia" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="IMSS"> IMSS </option>
                                        <option value="ISSSTE"> ISSSTE </option>
                                        <option value="ISSTECH"> ISSTECH </option>
                                        <option value="SEDENA"> SEDENA </option>
                                        <option value="MARINA"> MARINA </option>
                                        <option value="PEMEX"> PEMEX </option>
                                        <option value="SEGURO POPULAR"> SEGURO POPULAR </option>
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
                                        <input type="radio" id="supervivencia" name="supervivencia" value="activo" required>Activo<br>
                                        <input type="radio" id="supervivencia" name="supervivencia" value="defuncion" required>Defunción<br>
                                      </div>
                                  </div>
                                    <div class="col-md-4">
                                        <div class="form-group" align="center">
                                          <label for="expediente">Fecha de Defunción:</label><br>
                                          <input type="date" style=" width:300px;height:30px"  class="form-control" id="fecha_defuncion" name="fecha_defuncion" readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                              </div>
                              
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form><!-- termina-->
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

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
  var base_url= "<?php echo base_url();?>";
  function getnomex(){
    var id = $("#no_exp").val();
    $.ajax({
            url: base_url + "mantenimiento/paciente/searchpacbynoexp/" + id,
            type:"POST",

        }).done( function( info ) {

            var paciente = JSON.parse( info );

            if(!$.isArray(paciente.paciente) ||  !paciente.paciente.length){
                //si esta vacio

            }else{
                swal({
                    title: 'HAY PACIENTES CON ESE NO.EXPEDIENTE',
                    text: "Si omite esta alerta no podra guardar ni recuperar lo escrito",
                    type: 'error',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                }); 
            }


        });

  }

  function getcurp(){
    var id = $("#curp").val();
    $.ajax({
            url: base_url + "mantenimiento/paciente/searchpacbycurp/" + id,
            type:"POST",

        }).done( function( info ) {

            var paciente = JSON.parse( info );

            if(!$.isArray(paciente.paciente) ||  !paciente.paciente.length){
                //si esta vacio

            }else{
                swal({
                    title: 'HAY PACIENTES CON ESA CURP REGISTRADOS',
                    text: "Si omite esta alerta no podra guardar ni recuperar lo escrito",
                    type: 'error',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                }); 
            }


        });

  }

</script>