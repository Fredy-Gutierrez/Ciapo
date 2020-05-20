<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        USUARIO
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if($this->session->flashdata("exitoUs")):?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspLOS DATOS HAN SIDO GUARDADOS DE MANERA EXITOSA</font>
                <p></p>
                <p> &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp
                    <?php echo $this->session->flashdata("exitoUs"); ?>
                        
                </p>
            </div>
        <?php endif;?>
        
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">

                <?php if ($this->session->userdata("rol")=="Trabajo Social" || $this->session->userdata("rol")=="Administrador") {?>
                <div class="row">
                    <div class="col-md-12">
                       
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Usuarios</a>
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/index" class="btn btn-primary btn-flat"><span class="fa fa-search-plus"></span> Ver Activos</a>
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/verInactivos" class="btn btn-warning btn-flat"><span class="fa fa-search-minus"></span> Ver Inactivos</a>
                    </div>
                    
                </div>


                <hr>
                
                    <form action="<?php echo base_url();?>mantenimiento/usuarios/search" method="POST">
                        <div class="busqueda">
                            <label id="Busqu_usuario">BUSCAR USUARIO POR NOMBRE</label>
                            <input type="text" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="id_usuario" name="id_usuario">
                            <button type="submit" class="btn btn-success btn-flat">BUSCAR</button>
                        </div>
                    </form>

                <hr>

                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example2"  class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Usuario</th> <!-- Nombre de las columnas-->
                                        <th>Nombre de Usuario</th>
                                        <th>Estado Activo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($usuario)):?>
                                        <?php foreach($usuario as $usuario):?>
                                            <tr>
                                                
                                                <td><?php echo $usuario->id_usuario;?></td>
                                                <td><?php echo $usuario->usuario;?></td>
                                                
                                                
                                                <?php if($usuario->estado== "t") :?>
                                                <td> Activo</td>
                                                <td>
                                                    
                                                       <button type="button" class="btn btn-info btn-viewus" data-toggle="modal" data-target="#modal-default" value="<?php echo $usuario->id_usuario;?>">
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                        
                                                        <a href="<?php echo base_url()?>mantenimiento/usuarios/edit/<?php echo $usuario->id_usuario;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                        
                                                        <a href="<?php echo base_url();?>mantenimiento/usuarios/delete/<?php echo $usuario->id_usuario;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar-->
                                                        
                                                    
                                                </td>
                                                
                                                <?php endif;?>
                                                
                                                <?php if($usuario->estado== "f") :?>
                                                <td> Inactivo</td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <!--<a href="<?php echo base_url()?>mantenimiento/usuario/edit/<?php echo $usuario->id_religion;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> <!-- Para editar-->
                                                        
                                                        <a href="<?php echo base_url();?>mantenimiento/usuarios/deleteInact/<?php echo $usuario->id_usuario;?>" class="btn btn-success btn-remove"><span class="fa fa-trash"></span></a> <!-- Eliminar-->
                                                        
                                                        
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