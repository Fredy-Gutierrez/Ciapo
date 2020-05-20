<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section name= "cabeza" id="cabeza" class="content-header">
        <h1>
        Medicamentos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url();?>mantenimiento/Medicamentos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Medicamento</a>
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                            <a href="<?php echo base_url();?>mantenimiento/Medicamentos/index" class="btn btn-success btn-flat"><span class="fa fa-search-plus"></span> Medicamentos Activos</a>
                    </div>
                    <div class="col-md-2">
                            <a href="<?php echo base_url();?>mantenimiento/Medicamentos/index_Inactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Medicamentos Inactivos</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cat_medicamentos)):?>
                                    <?php foreach($cat_medicamentos as $cat_medicamentos ):?>
                                        <tr>
                                            <td><?php echo $cat_medicamentos ->idmed;?></td>
                                            <td><?php echo $cat_medicamentos ->clave;?></td>
                                            <td><?php echo $cat_medicamentos ->nombregen;?></td>
                                            <?php if($cat_medicamentos ->estado == "t"):?>
                                                <td>Activo</td>
                                                <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-viewmedicamentos" data-toggle="modal" data-target="#modal-default" value="<?php echo $cat_medicamentos ->idmed;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
        
                                                    <a href="<?php echo base_url()?>mantenimiento/Medicamentos/edit/<?php echo $cat_medicamentos ->idmed;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?php echo base_url();?>mantenimiento/Medicamentos/delete/<?php echo $cat_medicamentos ->idmed;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                            <?php endif;?>
                                            <?php if($cat_medicamentos ->estado == "f"):?>
                                                <td>Inactivo</td>
                                                <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $cat_medicamentos->idmed;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url();?>mantenimiento/Medicamentos/activated/<?php echo $cat_medicamentos ->idmed;?>" class="btn btn-success btn-remove"><span class="fa fa-power-off"></span></a>
													
												</div>
												
                                            </td>
                                            <?php endif;?>
                                            <!--<td><?php echo $medicamentos->estado;?></td>-->
                                            
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <!---------->
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
        <h4 class="modal-title">Informacion del Medicamento</h4>
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

