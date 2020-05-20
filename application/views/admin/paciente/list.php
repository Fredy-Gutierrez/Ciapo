
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Paciente
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">

                <?php if ($this->session->userdata("rol")=="Trabajo Social" || $this->session->userdata("rol")=="Administrador") { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo base_url();?>mantenimiento/paciente/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Paciente</a>
                            <a href="<?php echo base_url();?>mantenimiento/paciente/index" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Ver Activos</a>
                            <a href="<?php echo base_url();?>mantenimiento/paciente/inactivos" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Ver Inactivos</a>
                        </div>
                    </div>    
                <?php } ?>
                
                <?php if($this->session->flashdata("exito")):?>
                    <hr>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exito"); ?></p>
                             </div>
                        <?php endif;?>
                <hr>
                <div class="row">
                    <form action="<?php echo base_url();?>mantenimiento/paciente/searchpac" method="POST">
                            
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th scope="col">
                                   <div  class="form-group">
                                        <label for="expediente">NO. DE EXP / CURP:</label>
                                        
                                        <input type="nummber" id="no_exp" name="no_exp" required>
                                    
                                        <button type="submit" class="btn btn-success btn-flat">BUSCAR</button>

                                    </div>
                                </th>
                                </tr>
                               </thead>      
                            </table>
                        </form>
                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Curp</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($paciente)):?>
                                    <?php foreach($paciente as $pacientes):?>
                                        <tr>
                                            <td><?php echo $pacientes->id_pac;?></td>
                                            <td><?php echo $pacientes->curp;?></td>
                                            <td><?php echo $pacientes->nombrepx;?></td>
                                            <?php if($pacientes->estado == "t"):?>
                                            <td>Activo</td>
                                                <td>
                                                    <div class="btn-group">
                                                       <button type="button" class="btn btn-info btn-viewpac" data-toggle="modal" data-target="#modal-default" value="<?php echo $pacientes->id_pac;?>">
                                                            <span class="fa fa-search"></span>
                                                        </button>

                                                        <?php if ($this->session->userdata("rol")=="Trabajo Social" || $this->session->userdata("rol")=="Administrador") { ?>

                                                        <a href="<?php echo base_url()?>mantenimiento/paciente/edit/<?php echo $pacientes->id_pac;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                        <a href="<?php echo base_url();?>mantenimiento/paciente/delete/<?php echo $pacientes->id_pac;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>

                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                            
                                            <?php if($pacientes->estado == "f"):?>
                                            <td>Inactivo</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url();?>mantenimiento/paciente/activar/<?php echo $pacientes->id_pac;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
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
