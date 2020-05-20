
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        RELIGIÓN
        <small>EDITAR</small>
        </h1>
        
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("errorRelig")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i>
                                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspERROR DE ACTUALIZACIÓN DE RELIGIÓN</font>
                                <p></p>
                                <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $this->session->flashdata("errorRelig"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        
                        <form action="<?php echo base_url();?>mantenimiento/religion/update" method="POST"> <!-- Editar -->
                            <input type="hidden" value="<?php echo $cat_religion->id_religion;?>" name="id_Reli">
                            
                             <div class="form-group">
                                <label for="descripc">ID RELIGION:</label>
                                <input type="text" readonly style="text-transform: uppercase;" class="form-control" id="idrelig" name="idrelig" value="<?php echo $cat_religion->id_religion?>" onchange="javascript:this.value=this.value.toUpperCase();">

                                <label for="descripc">Descripción:</label>
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="descripcion1" name="descripcion" value="<?php echo $cat_religion->descripcion?>" onchange="javascript:this.value=this.value.toUpperCase();" required="true">
                            </div>
                            
                            <!--<div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $cat_religion->descripcion?>">
                            </div>
                            -->
                            <div class="form-group">
                                <label for="Estado">Estado:</label>
                                
                                <?php if($cat_religion->estado== "t") :?>
                                    <input type="radio" id="estado" name="estado" value="true" checked>Activo
                                    <input type="radio" id="estado" name="estado" value="false">Inactivo
                                <?php endif;?>
                                <?php if($cat_religion->estado== "f") :?>
                                    <input type="radio" id="estado" name="estado" value="true">Activo
                                    <input type="radio" id="estado" name="estado" value="true" checked>Inactivo
                                <?php endif;?>
                                
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