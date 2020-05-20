
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Categorias
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
                        <form action="<?php echo base_url();?>mantenimiento/diagnostico/update" method="POST">
                            <input type="hidden" value="<?php echo $diagnostico->id_diag;?>" name="idDiagnostico">
                            <div class="form-group">
                                <label for="desdiag">Descripcion:</label>
                                <input type="text" class="form-control" id="desdiag" name="desdiag" value="<?php echo $diagnostico->desdiag?>" required>
                            </div>

                            <div class="form-group">
                                <label for="desdiag">CIE10:</label>
                                <input type="text" class="form-control" id="cie10" name="cie10" value="<?php echo $diagnostico->cie10?>" required>
                            </div>

                            <div class="form-group">
                                <label for="desdiag">Tipo:</label><br>
                                <?php if($diagnostico->tipo == "1"){?>
                                    <input type="radio" name="tipo" value="1" checked required>Oncológicos<br>
                                    <input type="radio" name="tipo" value="2" required>No Oncológicos<br>
                                            <?php
                                } else{?>
                                    <input type="radio" name="tipo" value="1" required>Oncológicos<br>
                                    <input type="radio" name="tipo" value="2" checked required>No Oncológicos<br>
                                <?php }?>
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
