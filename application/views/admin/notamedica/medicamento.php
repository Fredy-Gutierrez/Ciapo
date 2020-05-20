<!-- Content Wrapper. Contains page content -->
<style type="text/css">
    label,textarea{
        display: inline-block;
        vertical-align: middle;
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        RECETA
        <small>Agregar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("exito")):?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exito"); ?></p>
                             </div>
                        <?php endif;?>
                        <center><h1>
                        Medicamentos
                        
                        </h1></center>
            <div class="box box-danger box-solid">
                <div class="box box-header with-border"></div>
                    <div class="row">
                        
                      <form action="<?php echo base_url();?>mantenimiento/notamedica/storedetreceta" method="POST">
                            
                            <input type="hidden" id="idnota" name="idnota" value="<?php echo $nota; ?>" >
                            <input type="hidden" id="idnotap" name="idnotap" value="<?php echo $notap; ?>" >

                    <center><h1><small>MEDICAMENTOS</small></h1></center>

                    <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/medicina.png" width="100" height="50"></center>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_med">Medicamento:</label><br>
                                        <select class="form-control" style=" width:300px;height:30px" name="medicamento" id="medicamento">
                                            <?php foreach($cat_medicamentos as $cat_medicamentos):?>
                                                <option value="<?php echo $cat_medicamentos->idmed;?>"> <?php echo $cat_medicamentos->nombregen;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <label for="dosis">Dosis:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="dosis" name="dosis">
                                    </div>
                                  </div>

                                  <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="frecuencia">Frecuencia:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="frecuencia" name="frecuencia">
                                    </div>
                                  </div>
                              </div>
                          </div>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center">

                                        <label for="admin">Via de administración:</label><br>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="administracion" name="administracion">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <label for="frecuencia">Dilución:</label><br>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="dilucion" name="dilucion">
                                    </div>
                                  </div>

                                  <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="descrip">Tiempo de infusión:</label><br>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF; width:300px;height:40px;" id="descripcion" name="descripcion" ></textarea>
                                    </div>
                                  </div>
                              </div>
                          </div>

                          <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">  
                                  <div  class="form-group" align="center">
                                    <label for="descrip">Fecha de tratamiento:</label><br>
                                    <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF; width:300px;height:40px;" id="fecha_aplicacion" name="fecha_aplicacion"></textarea>
                                  </div>
                                </div>
<!--
-------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="col-md-4">
                                <div  class="form-group" align="center">
                                  <div class='btn btn-success' id="btnNuevoT" onclick="agregar()">
                                      Guardar
                                  </div>
                                </div>
                            </div>
                            </div>
                          </div>

                          <center><h1><small>Lista de Medicamentos</small></h1></center>
                          <div class="table-responsive col-md-12">
                      
                            <table class='table table-bordered table-hover' id="tablaM">
                                
                                    <tr>
                                        <th>Id</th>
                                        <th>Medicamento</th>
                                        <th>Dosis</th>
                                        <th>Frecuencia:</th>
                                        <th>Via de Administración</th>
                                        <th>Dilución</th>
                                        <th>Tiempo de infusión:</th>
                                        <th>Fecha De aplicacion</th>
                                        <th>Opciones</th>
                                    </tr>

                                    <?php if (!empty($medicamentos)) { ?>

                                      <?php

                                        for ($i=0; $i < sizeof($medicamentos); $i++) { ?>
                                        
                                            <tr>

                                            <td>
                                              <input type="text" name="idm[]" class="form-control" value="<?php echo $medicamentos[$i]->id_medicamento?>" readonly>
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="nombrem[]" class="form-control" value="<?php echo $medicamentos[$i]->nombregen?>" readonly>
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="dosism[]" class="form-control" value="<?php echo $medicamentos[$i]->dosis?>">
                                            </td>

                                            <td>
                                              <input type="text" name="frecuenciam[]" class="form-control" value="<?php echo $medicamentos[$i]->frecuencia?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="administracionm[]" class="form-control" value="<?php echo $medicamentos[$i]->via_administracion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="dilucionm[]" class="form-control" value="<?php echo $medicamentos[$i]->dilucion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="descripcionm[]" class="form-control" value="<?php echo $medicamentos[$i]->descripcion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="fecha_aplicacionm[]" class="form-control" value="<?php echo $medicamentos[$i]->fecha_aplicacion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="button" class="button borrar" value="eliminar">
                                            </td>
                                          </tr>
                                        
                                        <?php } ?>

                                    <?php }?>
                                    
                                
                            </table>
                          </div>
            

                      <center><h1><small>PREMEDICACIÓN</small></h1></center>
                      <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/extra.png" width="100" height="50"></center>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_med">Medicamento:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="medicamentopr" name="medicamentopr">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <label for="dosis">Dosis:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="dosispr" name="dosispr">
                                    </div>
                                  </div>

                                  <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="frecuencia">Frecuencia:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="frecuenciapr" name="frecuenciapr">
                                    </div>
                                  </div>
                              </div>
                          </div>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center">

                                        <label for="admin">Via de administración:</label><br>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="administracionpr" name="administracionpr">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <label for="frecuencia">Dilución:</label><br>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="dilucionpr" name="dilucionpr">
                                    </div>
                                  </div>

                                  <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="descrip">Tiempo de infusión:</label><br>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF; width:300px;height:40px;" id="descripcionpr" name="descripcionpr"></textarea>
                                    </div>
                                  </div>
                              </div>
                          </div>

                          <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="descrip">Fecha de tratamiento:</label><br>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF; width:300px;height:40px;" id="fecha_aplicacionpr" name="fecha_aplicacionpr"></textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <div class='btn btn-success' id="btnNuevoT" onclick="agregarp()">
                                          Guardar
                                        </div>
                                    </div>
                                  </div>

                              </div>
                          </div>
                          <!--  div para table responsive -->
                          <center><h1><small>Lista de Premedicación</small></h1></center>
                          <div class="table-responsive col-md-12">
                      
                            <table class='table table-bordered table-hover' id="tablap">
                                
                                    <tr>
                                        <th>Medicamento</th>
                                        <th>Dosis</th>
                                        <th>Frecuencia:</th>
                                        <th>Via de Administración</th>
                                        <th>Dilución</th>
                                        <th>Tiempo de infusión:</th>
                                        <th>Fecha De aplicacion</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <?php if (!empty($medicamentosextra)) { ?>

                                      <?php

                                        for ($i=0; $i < sizeof($medicamentosextra); $i++) { ?>
                                        
                                            <tr>
                                            
                                            <td>
                                              <input type="text" name="nombrep[]" class="form-control" value="<?php echo $medicamentosextra[$i]->medicamento?>" readonly>
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="dosisp[]" class="form-control" value="<?php echo $medicamentosextra[$i]->dosis?>">
                                            </td>

                                            <td>
                                              <input type="text" name="frecuenciap[]" class="form-control" value="<?php echo $medicamentosextra[$i]->frecuencia?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="administracionp[]" class="form-control" value="<?php echo $medicamentosextra[$i]->via_administracion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="dilucionp[]" class="form-control" value="<?php echo $medicamentosextra[$i]->dilucion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="descripcionp[]" class="form-control" value="<?php echo $medicamentosextra[$i]->descripcion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="fecha_aplicacionp[]" class="form-control" value="<?php echo $medicamentosextra[$i]->fecha_aplicacion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="button" class="button borrar" value="eliminar">
                                            </td>
                                          </tr>
                                        
                                        <?php } ?>

                                    <?php }?>
                                
                            </table>
                          </div>

                      <center><h1><small>ALTERNATIVA DE MEDICAMENTOS</small></h1></center>
                      <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/medicina.png" width="100" height="50"></center>

                      <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_med">Medicamento:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="medicamentoalt" name="medicamentoalt">
                                    </div>
                                  </div>

                                  

                                  <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="frecuencia">Frecuencia:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="frecuenciaalt" name="frecuenciaalt">
                                    </div>
                                  </div>

                              </div>
                          </div>

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center">

                                        <label for="admin">Via de administración:</label><br>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="administracionalt" name="administracionalt">
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <label for="frecuencia">Dilución:</label><br>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="dilucionalt" name="dilucionalt">
                                    </div>
                                  </div>

                                  <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="descrip">Tiempo de infusión::</label><br>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF; width:300px;height:40px;" id="descripcionalt" name="descripcionalt"></textarea>
                                    </div>
                                  </div>
                              </div>
                          </div>

                          <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">  
                                    <div  class="form-group" align="center">
                                        <label for="descrip">Fecha de tratamiento:</label><br>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF; width:300px;height:40px;" id="fecha_aplicacionalt" name="fecha_aplicacionalt"></textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <div class='btn btn-success' id="btnNuevoT" onclick="agregaralt()">
                                          Guardar
                                        </div>
                                    </div>
                                  </div>

                              </div>
                          </div>
                          <center><h1><small>Lista de Alternativas para medicamentos</small></h1></center>
                         <div class="table-responsive col-md-12">
                      
                            <table class='table table-bordered table-hover' id="tablaalt">
                                
                                    <tr>
                                        <th>Medicamento</th>
                                        <th>Frecuencia:</th>
                                        <th>Via de Administración</th>
                                        <th>Dilución</th>
                                        <th>Tiempo de infusión:</th>
                                        <th>Fecha De aplicacion</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <?php if (!empty($alternativas)) { ?>

                                      <?php

                                        for ($i=0; $i < sizeof($alternativas); $i++) { ?>
                                        
                                            <tr>
                                            
                                            <td>
                                              <input type="text" name="nombrea[]" class="form-control" value="<?php echo $alternativas[$i]->medicamento?>" readonly>
                                            </td>

                                            <td>
                                              <input type="text" name="frecuenciaa[]" class="form-control" value="<?php echo $alternativas[$i]->frecuencia?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="administraciona[]" class="form-control" value="<?php echo $alternativas[$i]->via_administracion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="diluciona[]" class="form-control" value="<?php echo $alternativas[$i]->dilucion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="descripciona[]" class="form-control" value="<?php echo $alternativas[$i]->descripcion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="text" name="fecha_aplicaciona[]" class="form-control" value="<?php echo $alternativas[$i]->fecha_aplicacion?>">
                                            </td>
                                            
                                            <td>
                                              <input type="button" class="button borrar" value="eliminar">
                                            </td>
                                          </tr>
                                        
                                        <?php } ?>

                                    <?php }?>
                                
                            </table>
                          </div>

                          <br>
                          <br>

                          <div class="col-md-12">    
                              <div  class="form-group" align="center">
                                  <label for="indicaciones">NOMBRE DEL CICLO:</label>
                                  <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="observacion" name="observacion" required><?php if (!empty($observacion)) {
                                    echo $observacion;
                                  } ?></textarea>
                              </div>
                          </div>

                        <div class="col-md-12">
                            <div  class="form-group" align="center">
                                <br>
                                <button type="submit" class="btn btn-success btn-flat">GUARDAR Y GENERAR</button>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div  class="form-group" align="left">
                                <br>
                                <button type="button" href="<?php echo base_url()?>mantenimiento/notamedica/salir" class="btn btn-danger btn-salir"><span class="fa fa-sign-out"></span>SALIR</button>
                                
                            </div>
                        </div>

                        


                      </form>
  
                </div>
              </div>

            </div>
          </div>
        </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">


  $(document).on('click', '.borrar', function (event){
    event.preventDefault();
    $(this).closest('tr').remove();
  });


  function agregar()
  {
    var id = document.getElementById("medicamento").value;
    var m = document.getElementById("medicamento");
    var texto = m.options[m.selectedIndex].text;
    var dosis = document.getElementById("dosis").value;
    var frecuencia = document.getElementById("frecuencia").value;
    var administracion = document.getElementById("administracion").value;
    var dilucion = document.getElementById("dilucion").value;
    var descripcion = document.getElementById("descripcion").value;
    var fecha_aplicacion = document.getElementById("fecha_aplicacion").value;

    $("#tablaM")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','idm[]').attr('value',id).attr('readonly',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','nombrem[]').attr('value',texto).attr('readonly',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','dosism[]').attr('value',dosis).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','frecuenciam[]').attr('value',frecuencia).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','administracionm[]').attr('value',administracion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','dilucionm[]').attr('value',dilucion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','descripcionm[]').attr('value',descripcion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','fecha_aplicacionm[]').attr('value',fecha_aplicacion).attr('required',true)
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('button borrar').attr('value','Eliminar')
            )
        )

    );

    //comienza la limpieza
    $("#dosis").val('');
    $("#frecuencia").val('');
    $("#administracion").val('');
    $("#dilucion").val('');
    $("#descripcion").val('');
    $("#fecha_aplicacion").val('');
  }

  function agregarp()
  {
    
    var texto = document.getElementById("medicamentopr").value;
    var dosis = document.getElementById("dosispr").value;
    var frecuencia = document.getElementById("frecuenciapr").value;
    var administracion = document.getElementById("administracionpr").value;
    var dilucion = document.getElementById("dilucionpr").value;
    var descripcion = document.getElementById("descripcionpr").value;
    var fecha_aplicacion = document.getElementById("fecha_aplicacionpr").value;

    $("#tablap")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','nombrep[]').attr('value',texto).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','dosisp[]').attr('value',dosis).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','frecuenciap[]').attr('value',frecuencia).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','administracionp[]').attr('value',administracion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','dilucionp[]').attr('value',dilucion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','descripcionp[]').attr('value',descripcion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','fecha_aplicacionp[]').attr('value',fecha_aplicacion).attr('required',true)
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('button borrar').attr('value','Eliminar')
            )
        )

    );

    //comienza la limpieza
    $("#medicamentopr").val('');
    $("#dosispr").val('');
    $("#frecuenciapr").val('');
    $("#administracionpr").val('');
    $("#dilucionpr").val('');
    $("#descripcionpr").val('');
    $("#fecha_aplicacionpr").val('');
  }
  function agregaralt()
  {
    
    var texto = document.getElementById("medicamentoalt").value;
    
    var dilucion = document.getElementById("dilucionalt").value;
    var frecuencia = document.getElementById("frecuenciaalt").value;
    var administracion = document.getElementById("administracionalt").value;
    var descripcion = document.getElementById("descripcionalt").value;
    var fecha_aplicacion = document.getElementById("fecha_aplicacionalt").value;

    $("#tablaalt")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','nombrea[]').attr('value',texto).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','frecuenciaa[]').attr('value',frecuencia).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','administraciona[]').attr('value',administracion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','diluciona[]').attr('value',dilucion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','descripciona[]').attr('value',descripcion).attr('required',true)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','fecha_aplicaciona[]').attr('value',fecha_aplicacion).attr('required',true)
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('button borrar').attr('value','Eliminar')
            )
        )

    );

    //comienza la limpieza
    $("#medicamentoalt").val('');
    $("#frecuenciaalt").val('');
    $("#administracionalt").val('');
    $("#dilucionalt").val('');
    $("#descripcionalt").val('');
    $("#fecha_aplicacionalt").val('');
  }
</script>