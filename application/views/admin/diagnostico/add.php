
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Diagnosticos
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/diagnostico/store" method="POST">
                            <div class="form-group">
                                <label for="id_diag">Id_Diagnostico:</label>
                                <input type="number" min="1" step="1" class="form-control" id="id_diag" name="id_diag" required>
                            </div>
                            <div class="form-group">
                                <label for="desdiag">Descripcion:</label>
                                <input type="text" class="form-control" id="desdiag" name="desdiag" required>
                            </div>
                            <!--<div class="form-group">
                                <label for="idesp">Id_Especialidad:</label>
                                <input type="number" min="1" step="1" class="form-control" id="idesp" name="idesp" required>
                            </div>-->
                            <div class="form-group">
                                <label for="cat_espec">ID_TAB:</label>
                                <select name="cat_espec" id="cat_espec" class="form-control">
                                    <?php foreach($cat_espec as $cat_espec):?>
                                        <option value="<?php echo $cat_espec->idesp?>"><?php echo $cat_espec->nombreesp;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="desdiag">CIE10:</label>
                                <input type="text" class="form-control" id="cie10" name="cie10" required>
                            </div>

                            <div class="form-group">
                                <label for="desdiag">Tipo:</label><br>
                                <input type="radio" name="tipo" value="1" checked required>Oncológico<br>
                                <input type="radio" name="tipo" value="2" required>No Oncológico<br>
                            </div>


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
