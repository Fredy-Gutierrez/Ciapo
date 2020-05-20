
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Diagnosticos
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
                        <a href="<?php echo base_url();?>mantenimiento/diagnostico/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Diagnostico</a>

                        <a href="<?php echo base_url();?>mantenimiento/diagnostico/inactivos" class="btn btn-danger btn-flat"><span class="fa fa-plus"></span> Ver Inactivos</a>
                        <a href="<?php echo base_url();?>mantenimiento/diagnostico/index" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Ver Activos</a>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DESCRIPCION</th>
                                    <th>ID_ESP</th>
                                    <th>ESTADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($diagnostico)):?>
                                    <?php foreach($diagnostico as $cat_diagnostico):?>
                                        <tr>
                                            <td><?php echo $cat_diagnostico->id_diag;?></td>
                                            <td><?php echo $cat_diagnostico->desdiag;?></td>
                                            <td><?php echo $cat_diagnostico->idesp;?></td>
                                            <!--<td><?php echo $cat_diagnostico->estado;?></td>-->
                                           <?php if($cat_diagnostico-> estado == "t") :?>
                                            <td> Activo</td>
                                            <td>
                                                <div class="btn-group">
                                                    
                                                    <a href="<?php echo base_url()?>mantenimiento/diagnostico/edit/<?php echo $cat_diagnostico->id_diag;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                    
                                                    <a href="<?php echo base_url();?>mantenimiento/diagnostico/delete/<?php echo $cat_diagnostico->id_diag;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar-->
                                                    
                                                </div>
                                            </td>
                                            
                                            <?php endif;?>

                                            <?php if($cat_diagnostico-> estado == "f") :?>
                                            <td> Inactivo</td>
                                            <td>
                                                <div class="btn-group">
                                                    
                                                    
                                                    
                                                    <a href="<?php echo base_url();?>mantenimiento/diagnostico/activado/<?php echo $cat_diagnostico->id_diag;?>" class="btn btn-success btn-remove"><span class="fa fa-refresh"></span></a> <!-- Eliminar-->
                                                    
                                                    
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
