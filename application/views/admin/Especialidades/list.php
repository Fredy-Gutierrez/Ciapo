
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Especialidades
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/Especialidades/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Especialidad</a>
                        <a href="<?php echo base_url();?>mantenimiento/Especialidades/Inactivos" class="btn btn-danger btn-flat"><span class="fa fa-plus"></span> Inactivos</a>
                        <a href="<?php echo base_url();?>mantenimiento/Especialidades/index" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Activos</a></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($Especialidades)):?>
                                    <?php foreach($Especialidades as $Especialidades):?>
                                        <tr>
                                            <td><?php echo $Especialidades->idesp;?></td>
                                            <td><?php echo $Especialidades->nombreesp;?></td>
                                            
                                           <?php if ($Especialidades->estado=="t"): ?>
                                            <td>Activo</td> 
                                                <td>
                                                <div class="btn-group">
                                                    
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/Especialidades/edit/<?php echo $Especialidades->idesp;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/Especialidades/delete/<?php echo $Especialidades->idesp;?>" class="btn btn-danger btn-remove"><span class="fa fa-power-off"></span></a>
                                                </div>
                                            </td>
                                            <?php endif ?>
                                            <?php if ($Especialidades->estado=="f"): ?>
                                                <td>Inactivo</td>
                                                <td>
                                                <div class="btn-group">
                                                    
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/Especialidades/edit/<?php echo $Especialidades->idesp;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/Especialidades/activar/<?php echo $Especialidades->idesp;?>" class="btn btn-success btn-remove"><span class="fa fa-power-off"></span></a>
                                                </div>
                                            </td>
                                            <?php endif ?>
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
        <h4 class="modal-title">Informacion de la Categoria</h4>
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
