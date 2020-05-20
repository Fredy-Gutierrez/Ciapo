<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Medicos
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
                        <form action="<?php echo base_url();?>mantenimiento/Medicos/update" method="POST">
<!--Botones de editar  etc -->                    
                            <div class="form-group">
                                <label for="id_med">#ID</label>
                                <input type="text" class="form-control" id="id_med" name="id_med" value="<?php echo $medicos->id_med?>" style="color:red;"  title="Este campor no puede ser editado" readonly>
                            </div>
							
							<div class="form-group">
                             <label for="id_emp">ID Empleado:</label>
                            <select name="id_emp" id="id_emp" class="form-control" value="<?php echo $cat_empleados->id_emp?>">
                                    <?php foreach($cat_empleados as $cat_empleados):?>
                                        <option value="<?php echo $cat_empleados->id_emp?>"><?php echo $cat_empleados->id_emp?>: <?php echo $cat_empleados->nombre?> <?php echo $cat_empleados->ape_pat?> <?php echo $cat_empleados->ape_mat?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
							
                            <div class="form-group">
                                <label for="cedula">Cedula:</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $medicos->cedula?>" required>
                            </div>
                            <div class="form-group">
                                <label for="clues">Clues:</label>
                                <input type="text" class="form-control" id="clues" name="clues" value="<?php echo $medicos->clues?>" required>
                            </div>
							
                            <div class="form-group">
                                <label for="id_especialidad">Especialidad:</label>
                            <select name="id_especialidad" id="id_especialidad" class="form-control" value="<?php echo $cat_especialidades->idesp?>">
                                    <?php foreach($cat_especialidades as $cat_especialidades):?>
                                        <option value="<?php echo $cat_especialidades->idesp?>"><?php echo $cat_especialidades->nombreesp?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div name="estado" id="estado" class="form-group" value="<?php echo $medicos->estado?>" readonly>
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