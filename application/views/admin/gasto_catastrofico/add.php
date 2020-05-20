<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        GASTO CATASTROFICO
        <small>SELECCIÓN</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                      <a href="<?php echo base_url();?>mantenimiento/gasto_catastroficos" class="btn btn-primary btn-flat"><span class="fa fa-mail-reply"></span> Regresar</a>
                       <!--
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Usuarios</a>
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/index" class="btn btn-primary btn-flat"><span class="fa fa-search-minus"></span> Ver Activos</a>
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/verInactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Ver Inactivos</a>
                        -->
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                       <label for="id_med">#NOMBRE MEDICO</label>
                                <input type="text" class="form-control" id="id_med" name="id_med" value="NOMBRE DE UN MEDICO X" style="color:black;"  title="Este campo no puede ser editado" readonly>

                                <label for="id_med">#NOMBRE PACIENTE</label>
                                <input type="text" class="form-control" id="id_med" name="id_med" value="NOMBRE DE UN PACIENTE X" style="color:black;"  title="Este campo no puede ser editado" readonly>

                    </div>
                
                </div>
                
                <hr>
                
                <div class="row">
                   
                   
                    <div class="col-md-12">
                       
                       
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>MEDICAMENTO</th> <!-- Nombre de las columnas-->
                                    <th>DOSIS</th>
                                    <th>FRECUENCIA</th>
                                    <th>VIA ADMINISTRACIÓN</th>
                                    <th>FECHA INICIO</th>
                                    <th>FECHA FINAL</th>
                                    <th>VALIDACIÓN</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <?php if(!empty($usuario)):?>
                                    <?php foreach($usuario as $usuario):?>
                                        <tr>
                                            
                                            <td><?php echo $usuario->id_usuario;?></td>
                                            <td><?php echo $usuario->usuario;?></td>
                                            
                                            <td>
                                                <div class="btn-group">
                                                   <button type="button" class="btn btn-info btn-viewus" data-toggle="modal" data-target="#modal-default" value="<?php echo $usuario->id_usuario;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    
                                                    <a href="<?php echo base_url()?>mantenimiento/usuarios/edit/<?php echo $usuario->id_usuario;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar
                                                    
                                                    <a href="<?php echo base_url();?>mantenimiento/usuarios/delete/<?php echo $usuario->id_usuario;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody> -->
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
        <h4 class="modal-title">Informacion del Usuario</h4>
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