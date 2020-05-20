<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section name= "cabeza" id="cabeza" class="content-header">
        <h1>
        CAMAS
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <?php if($this->session->flashdata("ex")):?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("ex"); ?></p>
                </div>
            <?php endif;?>
            <?php if($this->session->flashdata("exg")):?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exg"); ?></p>
                </div>
            <?php endif;?>
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url();?>mantenimiento/Camas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Cama</a>
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                            <a href="<?php echo base_url();?>mantenimiento/camas/index_p" class="btn btn-success btn-flat"><span class="fa fa-search-plus"></span> Mostrar Camas De Piso</a>
                    </div>
                    <div class="col-md-2">
                            <a href="<?php echo base_url();?>mantenimiento/camas/index_a" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Mostrar Camas Ambulatorias</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cama)):?>
                                    <?php foreach($cama as $cama ):?>
                                            <tr>
                                                <td><?php echo $cama ->descripcion;?></td>
                                                    <td>
                                                    <div class="btn-group">  
                                                        <a href="<?php echo base_url();?>mantenimiento/Camas/delete/<?php echo $cama ->id_cama;?>" class="btn btn-danger">Eliminar <span class="fa fa-remove"></span></a>
                                                    </div>
                                                </td>
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
