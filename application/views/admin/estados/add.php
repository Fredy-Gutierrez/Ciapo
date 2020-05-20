
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nuevo Estado
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
                        <form action="<?php echo base_url();?>mantenimiento/Estados/store" method="POST">
                            <div class="form-group">
                                <label for="nombre">Datos del Estado:</label>
                                <input type="hidden" min="1" step="1" class="form-control" id="id_edo" name="id_edo" required>
                            </div>

                            <div class="form-group">

                           <label for="id">ID: </label><TD align="left"><INPUT type="text"  onchange="javascript:this.value=this.value.toUpperCase();" name="id_edo" size="25"></TD>
                            
                             </div>

                            <div class="form-group">
                                <label for="descripcion">Nombre del Estado: </label><TD align="left"><INPUT type="text"  onchange="javascript:this.value=this.value.toUpperCase();" name="descripcion" size="25"></TD>

                            </div>
                            <div class="form-group">
                                <label for="estadoo">Estado:</label>
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
