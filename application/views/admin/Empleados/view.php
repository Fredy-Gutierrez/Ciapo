<p><strong>#ID:</strong> <?php echo $cat_empleados->id_emp; ?></p>
<p><strong>Nombre:</strong> <?php echo $cat_empleados->nombre; ?></p>
<p><strong>Apellido Paterno:</strong> <?php echo $cat_empleados->ape_pat; ?></p>
<p><strong>Apellido Materno:</strong> <?php echo $cat_empleados->ape_mat; ?></p>
<p><strong>NIP:</strong> <?php echo $cat_empleados->nip; ?></p>
<p><strong>RFC:</strong> <?php echo $cat_empleados->rfc; ?></p>
<p><strong>Curp:</strong> <?php echo $cat_empleados->curp; ?></p>
<p><strong>DIreccion:</strong> <?php echo $cat_empleados->direccion; ?></p>
<p><strong>Tipo:</strong> <?php echo $cat_empleados->id_tipoemp; ?></p>
<?php if($cat_empleados->estado == "t"):?>
	<p><strong>Estado: </strong>Activo</p>
<?php endif;?>
<?php if($cat_empleados->estado == "f"):?>
	<p><strong>Estado: </strong>Inactivo</p>
<?php endif;?>
<!--<p><strong>Estado:</strong> <?php echo $medicamentos->estado; ?></p>-->