
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Estados
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
                        <a href="<?php echo base_url();?>mantenimiento/Estados/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Nuevo Estado</a>
                        <a href="<?php echo base_url();?>mantenimiento/Estados/index" class="btn btn-primary btn-flat"><span class=""></span> Ver Activos</a>
                        <a href="<?php echo base_url();?>mantenimiento/Estados/Inactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Ver Inactivos</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cat_estados)):?>
                                    <?php foreach($cat_estados as $cat_estados):?>
                                        <tr>
                                            <td><?php echo $cat_estados->id_edo;?></td>
                                            <td><?php echo $cat_estados->descripcion;?></td>
                                            <?php if($cat_estados->estado == "t"):?>
                                            <td>Activo</td>
                                             <td>
                                                <div class="btn-group">
                                                    
                                                    <a href="<?php echo base_url()?>mantenimiento/Estados/edit/<?php echo $cat_estados->id_edo;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/Estados/delete/<?php echo $cat_estados->id_edo;?>" class="btn bt btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    
                                                </div>
                                            </td>

                                            <?php endif;?>
                                            
                                            <?php if($cat_estados->estado == "f"):?>
                                            <td>Inactivo</td>
                                             <td>
                                                <div class="btn-group">

                                                    <a href="<?php echo base_url();?>mantenimiento/Estados/activar/<?php echo $cat_estados->id_edo;?>" class="btn btn- btn-success btn-remove"><span class="fa fa-power-off"></span></a>
                                                  
                                                    
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