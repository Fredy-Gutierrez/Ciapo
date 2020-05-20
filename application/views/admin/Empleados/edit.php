<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Empleados
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/Empleados/update" method="POST">
<!--Botones de editar  etc -->                    
                            <div class="form-group">
                                <label for="id_emp">#ID</label>
                                <input type="text" class="form-control" id="id_emp" name="id_emp" value="<?php echo $cat_empleados->id_emp?>" style="color:red;"  title="Este campor no puede ser editado" readonly>
                            </div>
                            <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" value="<?php echo $cat_empleados->nombre;?>" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="ape_pat">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="ape_pat" name="ape_pat" value="<?php echo $cat_empleados->ape_pat?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ape_mat">Apellido Materno:</label>
                                <input type="text" class="form-control" id="ape_mat" name="ape_mat" value="<?php echo $cat_empleados->ape_mat?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP:</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $cat_empleados->nip?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rfc">RFC:</label>
                                <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $cat_empleados->rfc?>" required>
                            </div>
                            <div class="form-group">
                                <label for="curp">Curp:</label>
                                <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $cat_empleados->curp?>" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cat_empleados->direccion?>" required>
                            </div>
                            <div name="id_tipoemp" id="id_tipoemp" class="form-group">
                                <label for="id_tipoemp">Tipo:</label>
                            <select name="id_tipoemp" id="id_tipoemp" class="form-control" value="<?php echo $tipos->id_tipo?>">
                                    <?php foreach($tipos as $tipos):?>
                                        <option value="<?php echo $tipos->id_tipo?>"><?php echo $tipos->descripcion?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div name="estado" id="estado" class="form-group" value="<?php echo $cat_empleados->estado?>" readonly>
                                <label for="estado">Estado:</label>
                                <input type="radio" id="estado" name="estado" value="true" required>Activo
                                <input type="radio" id="estado" name="estado" value="false" required>Inactivo
                            </div>
<!-- Fin de Botones de editar  etc-->                
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
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