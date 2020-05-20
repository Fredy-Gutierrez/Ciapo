
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Medicos
        <small>Nuevo</small>
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
                        <form action="<?php echo base_url();?>mantenimiento/medicos/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id_med">#ID  Medico:</label>
                                <input type="number" id="id_med" name="id_med" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>

							<div name="nivel" id="nivel" class="form-group" size="1" required>
                                <label for="id_emp">ID Empleado:</label>
                                <select name="id_emp" id="id_emp" class="form-control">
                                   <?php foreach($cat_empleados as $cat_empleados):?>
                                        <option value="<?php echo $cat_empleados->id_emp?>"><?php echo $cat_empleados->id_emp?>: <?php echo $cat_empleados->nombre?> <?php echo $cat_empleados->ape_pat?> <?php echo $cat_empleados->ape_mat?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cedula">Cedula:</label>
                                <input type="text" id="cedula" name="cedula" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="clues">Clues:</label>
                                <input type="text" id="clues" name="clues" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>


                            <div class="form-group">
                                <label for="id_especialidad">Especialidad:</label>
                            <select name="id_especialidad" id="id_especialidad" class="form-control" value="<?php echo $cat_especialidades->idesp?>">
                                    <?php foreach($cat_especialidades as $cat_especialidades):?>
                                        <option value="<?php echo $cat_especialidades->idesp?>"><?php echo $cat_especialidades->nombreesp?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
							
                            <div name="estado" id="estado" class="form-group" >
                                <label for="estado">Estado:</label>
                                <input type="radio" id="estado" name="estado" value="true" required>Activo
                                <input type="radio" id="estado" name="estado" value="false" required>Inactivo
                            </div>

                            <div class="form-group">
                                <label for="foto">FIRMA:</label>
                                <input type="file" id="foto" name="foto" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
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