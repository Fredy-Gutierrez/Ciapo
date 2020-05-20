<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        RELIGIÓN
        <small>Listado</small>
        </h1>
        
    </section>
    <!-- Main content -->
    <section class="content">

        <?php if($this->session->flashdata("exitoRelig")):?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspLOS DATOS HAN SIDO GUARDADOS DE MANERA EXITOSA</font>
                <p></p>
                <p> &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp
                    <?php echo $this->session->flashdata("exitoRelig"); ?>
                        
                </p>
            </div>
        <?php endif;?>

        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                       
                        <a href="<?php echo base_url();?>mantenimiento/religion/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Religión</a>
                        <a href="<?php echo base_url();?>mantenimiento/religion/index" class="btn btn-primary btn-flat"><span class="fa fa-search-plus"></span> Ver Activos</a>
                        <a href="<?php echo base_url();?>mantenimiento/religion/verInactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Ver Inactivos</a>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Religión</th> <!-- Nombre de las columnas-->
                                        <th>Nombre de Religión</th>
                                        <th>Estado Activo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($religion)):?>
                                        <?php foreach($religion as $religion):?>
                                            <tr>
                                                
                                                <td><?php echo $religion->id_religion;?></td>
                                                <td><?php echo $religion->descripcion;?></td>
                                                
                                                <?php if($religion->estado== "t") :?>
                                                <td> Activo</td>
                                                <td>
                                                    
                                                    <a href="<?php echo base_url()?>mantenimiento/religion/edit/<?php echo $religion->id_religion;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                    
                                                    <a href="<?php echo base_url();?>mantenimiento/religion/delete/<?php echo $religion->id_religion;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar-->
                                                        
                                                </td>
                                                
                                                <?php endif;?>
                                                
                                                <?php if($religion->estado== "f") :?>
                                                <td> Inactivo</td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <a href="<?php echo base_url()?>mantenimiento/religion/edit/<?php echo $religion->id_religion;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                        
                                                        <a href="<?php echo base_url();?>mantenimiento/religion/delete/<?php echo $religion->id_religion;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar-->
                                                        
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
        <h4 class="modal-title">Informacion de la Religiom</h4>
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