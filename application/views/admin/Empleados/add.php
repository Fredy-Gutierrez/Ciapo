
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Empleados
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
                        <form action="<?php echo base_url();?>mantenimiento/empleados/store" method="POST">

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="ape_pat">Apellido Paterno:</label>
                                <input type="text" id="ape_pat" name="ape_pat" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="ape_mat">Apellido Materno:</label>
                                <input type="text" id="ape_mat" name="ape_mat" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP:</label>
                                <input type="text" id="nip" name="nip" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="rfc">RFC:</label>
                                <input type="text" id="rfc" name="rfc" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="curp">Curp:</label>
                                <input type="text" id="curp" name="curp" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                            <!--<input type="text" class="form-control" id="tabulador" name="tabulador" required>-->
                            <div name="nivel" id="nivel" class="form-group" size="1" required>
                                <label for="id_tipoemp">Tipo:</label>
                                <select name="id_tipoemp" id="id_tipoemp" class="form-control">
                                   <?php foreach($tipos as $tipos):?>
                                        <option value="<?php echo $tipos->id_tipo?>"><?php echo $tipos->descripcion?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div name="estado" id="estado" class="form-group" >
                                <label for="estado">Estado:</label>
                                <input type="radio" id="estado" name="estado" value="true" required>Activo
                                <input type="radio" id="estado" name="estado" value="false" required>Inactivo
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