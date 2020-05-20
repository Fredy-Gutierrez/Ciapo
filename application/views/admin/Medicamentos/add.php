
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Medicamentos
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="table-responsive row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/medicamentos/store" method="POST">

                            <div class="form-group">
                                <label for="clave">Clave Del Medicamento:</label>
                                <input type="text" id="clave" name="clave" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>

                            <div class="form-group">
                                <label for="nombregen">Nombre Del Medicamento:</label>
                                <input type="text" id="nombregen" name="nombregen" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>

                            

                            <div name="estado" id="estado" class="form-group" >
                                <label for="estado">Estado:</label>
                                <input type="radio" id="estado" name="estado" value="true" required>Activo
                                <input type="radio" id="estado" name="estado" value="false" required>Inactivo
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