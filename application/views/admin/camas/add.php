
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Cama
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
                        <?php if($this->session->flashdata("ocupadoc")):?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("ocupadoc"); ?></p>
                </div>
            <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/camas/store" method="POST">

                            <div class="form-group">
                                <label for="clave">Numero de Cama:</label>
                                <input type="number" id="nc" name="nc" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>

                            <div class="form-group">
                                <label for="nombregen">Tipo:</label>
                                <select id="ti" name="ti">
                                    <option value="0">Piso</option>
                                    <option value="1">Ambulatoria</option>
                                </select>
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