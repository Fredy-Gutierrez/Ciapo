
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Estados
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
                        <form action="<?php echo base_url();?>mantenimiento/Estados/update" method="POST">
                            <input type="hidden" style="text-transform: uppercase;" value="<?php echo $cat_estados->id_edo;?>" name="id">

                            <div class="form-group">
                                <label for="nombre">ID:</label>
                                <input type="text" class="form-control"  onchange="javascript:this.value=this.value.toUpperCase();" id="id_edo" name="id_edo" value="<?php echo $cat_estados->id_edo?>">

                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre del Estado:</label>
                                <input type="text" class="form-control"  onchange="javascript:this.value=this.value.toUpperCase();" id="descripcion" name="descripcion" value="<?php echo $cat_estados->descripcion?>">

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