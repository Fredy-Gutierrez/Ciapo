
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/select2/js/select2.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/select2/css/select2.css">

<!-- Content Wrapper. Contains page content -->


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
                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspERROR EN LA BUSQUEDA DEL NUMERO DE EXPEDIENTE</font>
                <p></p>
                
                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $this->session->flashdata("error_gastCat"); ?>
                        
                </p>
            </div>
        <?php endif;?>
        
        <h1>
        GASTOS CATASTROFICOS
        <small>Busqueda por Expediente</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box-solid">
          <div class="box-body">
                
            <div class="box row ">
                    
              <form action="<?php echo base_url();?>mantenimiento/gasto_catastroficos/busc_no_exp" method="POST">
                <div class="col-md-12">
                  <br>
                    <label for="no_exp">Numero de Expediente</label>
                    <input title="Anota el Numero de Expediente del Paciente para ver las Recetas" type="text" style="text-transform: uppercase;" class="form-control" id="no_exp" name="no_exp" required="true">
                    <button title="Busca al Paciente respecto a su Numero de Expediente" type="submit" class="btn btn-primary btn-flat">
                      <span class="fa fa-search"> </span>&nbsp Buscar
                    </button>
                    
                </div>
              </form>

              <form action="<?php echo base_url();?>mantenimiento/gasto_catastroficos" method="POST">
                <table class="table table-striped">
                 <table class="table table-striped"> 
                  <tr>
                    <hr>
                      <div class="col-md-12">
                        <?php if (isset($paciente->no_exp)): ?>
                          <label for="nom_medico1">Numero de Expediente:</label>
                          <input type="text" style="text-transform: uppercase; font-weight: bold; color: red; border:solid 1.5px #0013E1;" class="form-control" id="nom_medico1" value="<?php if(isset($paciente->no_exp)) echo $paciente->no_exp ?>" name="nom_medico[]" readonly>

                          <br>
                          <label>Estado de Poliza</label>

                          <?php if ($fecha_Actual<$paciente->fin_poliza): ?>
                            <input type="text" id="poliza" style="text-transform: uppercase; font-weight: bold; color: green; border:solid 1.5px green;" class="form-control" readonly="true" value="ACTIVA">
                          <?php else: ?>
                            <input type="text" id="poliza" style="text-transform: uppercase; font-weight: bold; color: red; border:solid 1.5px #EE6C00;" class="form-control" readonly="true" value="INACTIVA">
                          <?php endif ?>

                        <?php else: ?>
                          <label for="nom_medico1">Numero de Expediente:</label>
                          <input type="text" style="text-transform: uppercase; font-weight: bold; color: red;" class="form-control" id="nom_medico1" value="<?php if(isset($paciente->no_exp)) echo $paciente->no_exp ?>" name="nom_medico[]" readonly>
                        <?php endif ?>
                        
                          
                      </div>
                     
                  </tr>
                </table>
              </table>

              <table class="table table-striped"> 
                  <thead id="data_nombrepx">
                    <table class="table table-striped"> 
                    <tr>
                        <div class="col-md-12">
                          <?php if (isset($paciente->nombrepx)): ?>
                            <label for="descripcion">Nombre de Paciente:</label>
                            <input type="text" title="Nombre completo del Paciente" style="text-transform: uppercase; border:solid 1.5px #0013E1;" class="form-control" id="nom_medico" name="nom_pac[]" value="<?php if(isset($paciente->nombrepx)) echo $paciente->nombrepx?>" readonly>
                          <?php else: ?>
                            <label for="descripcion">Nombre de Paciente:</label>
                            <input type="text" title="Nombre completo del Paciente" style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_pac[]" value="<?php if(isset($paciente->nombrepx)) echo $paciente->nombrepx?>" readonly>
                          <?php endif ?>
                            
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
                          <?php if (isset($paciente->ape_pat)): ?>
                            <label for="id_religion">Apellido Paterno de Paciente</label>
                          <input type="text" title="Primer Apellido del Paciente" style="text-transform: uppercase; border:solid 1.5px #0013E1;" class="form-control" id="nom_medico" name="nom_pac[]" value="<?php if(isset($paciente->ape_pat)) echo $paciente->ape_pat?>" readonly>
                          <?php else: ?>
                            <label for="id_religion">Apellido Paterno de Paciente</label>
                          <input type="text" title="Primer Apellido del Paciente" style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_pac[]" value="<?php if(isset($paciente->ape_pat)) echo $paciente->ape_pat?>" readonly>
                          <?php endif ?>
                          
                                   
                      </div>
                    </th>
                     
                    <th scope="col">
                      <div class="col-md-12">
                        <?php if (isset($paciente->ape_mat)): ?>
                          <label for="id_religion">Apellido Materno de Paciente</label>
                          <input type="text" title="Segundo Apellido del Paciente" style="text-transform: uppercase; border:solid 1.5px #0013E1;" class="form-control" id="nom_pacie" name="nom_pac[]" value="<?php if(isset($paciente->ape_mat)) echo $paciente->ape_mat?>" readonly>
                        <?php else: ?>
                          <label for="id_religion">Apellido Materno de Paciente</label>
                          <input type="text" title="Segundo Apellido del Paciente" style="text-transform: uppercase;" class="form-control" id="nom_pacie" name="nom_pac[]" value="<?php if(isset($paciente->ape_mat)) echo $paciente->ape_mat?>" readonly>
                        <?php endif ?>
                          
                      </div>
                    </th>

                    </tr>
                   </thead>
              </table>

              <div class="table-responsive" >
              <table class="table table-striped"> 
                <thead id="data_medicinas">
                  <tr>
                    <th scope="col">
                      <div class="col-md-12">
                    
                    <table id="example2" class="table table-bordered table-hover">
                      <thead style="background-color: #F7F7F7">
                          <tr>
                              <th><font size="3" style="font-weight: bold;">Numero de Receta</font></th> <!-- Nombre de las columnas-->
                              <th><font size="3" style="font-weight: bold;">Nombre de Medico</font></th> <!-- Nombre de las columnas-->
                              <th><font size="3" style="font-weight: bold;">Apellido Paterno de Medico</font></th>
                              <th><font size="3" style="font-weight: bold;">Apellido Materno de Medico</font></th>
                              <th><font size="3" style="font-weight: bold;">Fecha de Emision</font></th>
                              <th><font size="3" style="font-weight: bold;">Nombre de Validador</font></th>
                              <th><font size="3" style="font-weight: bold;">Estado de Validación</font></th>
                              <th><font size="3" style="font-weight: bold;">Opciones</font></th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          <?php if (isset($medico)): ?>
                            <?php foreach ($medico as $medico): ?>
                              <tr>
                                <td><font color="#E05800" style="font-weight: bold;"><?php echo $medico->idreceta ?></font></td>
                                <td><font style="font-weight: normal;"><?php echo $medico->nombre ?></font></td>
                                <td><font style="font-weight: normal;"><?php echo $medico->ape_pat ?></font></td>
                                <td><font style="font-weight: normal;"><?php echo $medico->ape_mat ?></font></td>
                                <td width="150" title="Fecha en la que la receta fue Creada (Día, Mes, Año)"><font style="font-weight: normal;"><?php echo $medico->fecha ?></font></td>
                                <td><font style="font-weight: normal;"><?php echo $medico->usuario_valid ?></font></td>

                                <?php if ($medico->verificado=="t"): ?>
                                  <td title="RECETA VALIDADA"><font color="green">VALIDADO</font></td>
                                <?php else: ?>
                                  <td title="DEBE SER VALIDADO"><font color="#C02100">NO VALIDADO</font></td>
                                <?php endif ?>

                                <?php if ($fecha_Actual<$paciente->fin_poliza): ?>
                                  <td width="10%">
                                    
                                    <?php if (empty($id_med)): ?>
                                      <a title="Validar los Medicamentos" href="<?php echo base_url()?>mantenimiento/Gasto_Catastroficos/busc_idReceta/<?php echo $medico->idreceta ?>" class="btn btn-info btn-viewus">
                                      <span class="fa fa-search"></span>
                                      </a>
                                        <?php if ($medico->verificado=="t"): ?>
                                        <a title="Imprimir Receta" href="<?php echo base_url()?>mantenimiento/Gasto_Catastroficos/pdf/<?php echo $medico->idreceta ?>" class="btn btn-success btn-viewus">
                                        <span class="fa fa-print"></span>
                                        </a>
                                      <?php endif ?>
                                    <?php endif ?>
                                    
                                    <?php if (!empty($id_med)): ?>
                                      <a title="Ver Receta" href="<?php echo base_url()?>mantenimiento/Gasto_Catastroficos/pdf_prueba/<?php echo $medico->idreceta ?>" class="btn btn-warning btn-viewus">
                                      <span class="fa fa-eye"></span>
                                      </a>
                                    <?php endif ?>
                                    
                                    
                                    
                                  </td>

                                <?php else: ?>
                                	<td width="10%">
                                  <?php if (empty($id_med)): ?>
                                    
                                    
                                    <a title="No puedes Validar los Medicamentos pues la Poliza Vencio" href="#" for="poliza"  class="btn btn-info btn-viewus" disabled>
                                      <span class="fa fa-search"></span>
                                    </a>
                                    <?php if ($medico->verificado=="t"): ?>
                                      <a title="No puedes Imprimir la Receta pues la Poliza Vencio" href="#" for="poliza" class="btn btn-success btn-viewus" disabled>
                                      <span class="fa fa-print"></span>
                                    </a>
                                    <?php endif ?>
                                  <?php endif ?>
                                  
                                  <?php if (!empty($id_med)): ?>
                                      <a title="No puedes Ver la Receta pues la Poliza Vencio" class="btn btn-warning btn-viewus" disabled>
                                      <span class="fa fa-eye"></span>
                                      </a>
                                    <?php endif ?>
                                </td>
                                  
                                <?php endif ?>
                                
                              </tr>
                            <?php endforeach ?>

                          <?php endif ?>
                      </tbody>
                      
                    </table>
                  </div>
                  
                    </th>
                  </tr>
                </thead>
              </table>
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
</script>