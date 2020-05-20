<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section name= "cabeza" id="cabeza" class="content-header">
        <h1>
        Empleados
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
                        <a href="<?php echo base_url();?>mantenimiento/Empleados/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Empleado</a>
                    </div>
                    
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                            <a href="<?php echo base_url();?>mantenimiento/Empleados/index" class="btn btn-success btn-flat"><span class="fa fa-search-plus"></span> Empleados Activos</a>
                    </div>
                    <div class="col-md-2">
                            <a href="<?php echo base_url();?>mantenimiento/Empleados/index_Inactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Empleados Inactivos</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido P</th>
                                    <th>Apellido M</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cat_empleados)):?>
                                    <?php foreach($cat_empleados as $cat_empleados):?>
                                        <tr>
                                            <td><?php echo $cat_empleados->id_emp;?></td>
                                            <td><?php echo $cat_empleados->nombre;?></td>
                                            <td><?php echo $cat_empleados->ape_pat;?></td>
                                            <td><?php echo $cat_empleados->ape_mat;?></td>
                                            <td><?php echo $cat_empleados->id_tipoemp;?></td>
                                            <?php if($cat_empleados->estado == "t"):?>
                                                <td>Activo</td>
                                                <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-viewemp" data-toggle="modal" data-target="#modal-default" value="<?php echo $cat_empleados->id_emp;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
        
                                                    <a href="<?php echo base_url()?>mantenimiento/Empleados/edit/<?php echo $cat_empleados->id_emp;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?php echo base_url();?>mantenimiento/Empleados/delete/<?php echo $cat_empleados->id_emp;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                            <?php endif;?>
                                            <?php if($cat_empleados->estado == "f"):?>
                                                <td>Inactivo</td>
                                                <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $cat_empleados->id_emp;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
 
                                                    <a href="<?php echo base_url();?>mantenimiento/Empleados/activated/<?php echo $cat_empleados->id_emp;?>" class="btn btn-success btn-remove"><span class="fa fa-power-off"></span>
                                                    </a>
                                                </div>
                                            </td>
                                            <?php endif;?>
                                            <!--<td><?php echo $medicamentos->estado;?></td>-->
                                            
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
