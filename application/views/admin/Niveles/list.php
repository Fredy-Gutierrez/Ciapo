
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Niveles
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
                        <a href="<?php echo base_url();?>mantenimiento/Niveles/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Nivel</a>
                        <a href="<?php echo base_url();?>mantenimiento/Niveles/Inactivos" class="btn btn-danger btn-flat"><span class="fa fa-plus"></span> Inactivos</a>
                        <a href="<?php echo base_url();?>mantenimiento/Niveles/index" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Activos</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($Niveles)):?>
                                    <?php foreach($Niveles as $Niveles):?>
                                        <tr>
                                            <td><?php echo $Niveles->idnse;?></td>
                                            <td><?php echo $Niveles->descripcion;?></td>
                                            
                                            <?php if ($Niveles->estado=="t"): ?>
                                                <td>Activo</td>
                                                <td>
                                                <div class="btn-group">
                                                    
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/Niveles/edit/<?php echo $Niveles->idnse;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/Niveles/delete/<?php echo $Niveles->idnse;?>" class="btn btn-danger btn-remove"><span class="fa fa-power-off"></span></a>
                                                </div>
                                            </td>
                                            <?php endif ?>
                                            <?php if ($Niveles->estado=="f"): ?>
                                                <td>Inactivo</td>
                                                <td>
                                                <div class="btn-group">
                                                    
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/Niveles/edit/<?php echo $Niveles->idnse;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/Niveles/activar/<?php echo $Niveles->idnse;?>" class="btn btn-success btn-remove"><span class="fa fa-power-off"></span></a>
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
