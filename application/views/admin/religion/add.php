
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        RELIGIÓN
        <small>Agregar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
    <?php if($this->session->flashdata("errorRelig")):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i>
                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspERROR DE REGISTRO DE RELIGIÓN</font>
                <p></p> 
                <p> &nbsp &nbsp &nbsp&nbsp&nbsp
                    <?php echo $this->session->flashdata("errorRelig"); ?>
                        
                </p>
            </div>
        <?php endif;?>

        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>mantenimiento/religion/store" method="POST"> <!-- Aqui se guardaran los datos-->
                           
                            <!--<div class="form-group"> <!-- Se crea para la columna ID Categorias 
                                <label for="id_religion">ID Religion</label>
                                <input type="number" min="1" step="1" class="form-control" id="id_religion" name="id_religion" requerid>
                            </div>-->
                            <!--onchange="javascript:this.value=this.value.toUpperCase();"-->
                            
                            
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        
                                            <div class="form-group2"> <!-- Ahora se crea la columna Nombre -->
                                <label for="descripcion">Nombre:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" requerid  onchange="javascript:this.value=this.value.toUpperCase();" required="true">
                            </div>
                                       
                                    </tr>
                                </thead>
                            </table>
                            
                            <div class="form-group3">
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
