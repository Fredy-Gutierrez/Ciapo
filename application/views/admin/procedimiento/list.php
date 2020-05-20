
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Procedimientos
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
                        <a href="<?php echo base_url();?>mantenimiento/procedimiento/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Procedimiento</a>
                   
                        <a href="<?php echo base_url();?>mantenimiento/procedimiento/inactivos" class="btn btn-danger btn-flat"><span class="fa fa-plus"></span> Ver Inactivos</a>
                        <a href="<?php echo base_url();?>mantenimiento/procedimiento/index" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Ver Activos</a>
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
                                    <th>ID_TAB</th>
                                    <th>ESTADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($procedimiento)):?>
                                    <?php foreach($procedimiento as $cat_procedimiento):?>
                                        <tr>
                                            <td><?php echo $cat_procedimiento->id_proc;?></td>
                                            <td><?php echo $cat_procedimiento->desproc;?></td>
                                            <td><?php echo $cat_procedimiento->id_tab;?></td>
                                            <!--<td><?php echo $cat_procedimiento->estado;?></td>-->
                                            
                                              
                                           <?php if($cat_procedimiento-> estado== "t") :?>
                                            <td> Activo</td>
                                            <td>
                                                <div class="btn-group">
                                                    
                                                    <a href="<?php echo base_url()?>mantenimiento/procedimiento/edit/<?php echo $cat_procedimiento->id_proc;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                    
                                                    <a href="<?php echo base_url();?>mantenimiento/procedimiento/delete/<?php echo $cat_procedimiento->id_proc;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar-->
                                                    
                                                </div>
                                            </td>
                                            
                                            <?php endif;?>

                                            <?php if($cat_procedimiento-> estado== "f") :?>
                                            <td> Inactivo</td>
                                            <td>
                                                <div class="btn-group">
                                                    
                                                    <!--<a href="<?php echo base_url()?>mantenimiento/religion/edit/<?php echo $religion->id_religion;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                    
                                                    <a href="<?php echo base_url();?>mantenimiento/procedimiento/activado/<?php echo $cat_procedimiento->id_proc;?>" class="btn btn-success btn-remove"><span class="fa fa-refresh"></span></a> <!-- Eliminar-->
                                                    
                                                    
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
