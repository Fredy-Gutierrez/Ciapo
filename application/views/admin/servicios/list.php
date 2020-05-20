
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Servicios
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
                        <a href="<?php echo base_url();?>mantenimiento/Servicios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Servicio</a>

                        <a href="<?php echo base_url();?>mantenimiento/Servicios/index" class="btn btn-primary btn-flat"><span class=""></span> Ver Activos</a>
                        <a href="<?php echo base_url();?>mantenimiento/Servicios/Inactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Ver Inactivos</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cat_servicios)):?>
                                    <?php foreach($cat_servicios as $cat_servicios):?>
                                        <tr>
                                            <td><?php echo $cat_servicios->id_catser;?></td>
                                            <td><?php echo $cat_servicios->desser;?></td>
                                            <?php if($cat_servicios->estado == "t"):?>
                                            <td>Activo</td>
                                             <td>
                                                <div class="btn-group">
                                                    
                                                    <a href="<?php echo base_url()?>mantenimiento/Servicios/edit/<?php echo $cat_servicios->id_catser;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/Servicios/delete/<?php echo $cat_servicios->id_catser;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    
                                                </div>
                                            </td>
                                            <?php endif;?>
                                            <?php if($cat_servicios->estado == "f"):?>
                                            <td>Inactivo</td>
                                             <td>
                                                <div class="btn-group">
                                                    
                                                     <a href="<?php echo base_url();?>mantenimiento/Servicios/activar/<?php echo $cat_servicios->id_catser;?>" class="btn btn-success btn-remove"><span class="fa fa-power-off"></span></a>
                                                    
                                                </div>
                                            </td>
                                            <?php endif;?>
                                           
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