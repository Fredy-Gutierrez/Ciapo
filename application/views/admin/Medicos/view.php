<p><strong>#ID:</strong> <?php echo $medicos->id_med; ?></p>
<p><strong>ID Empleado:</strong> <?php echo $medicos ->id_emp; ?></p>
<p><strong>Cedula:</strong> <?php echo $medicos->cedula; ?></p>
<p><strong>Clues:</strong> <?php echo $medicos->clues; ?></p>
<p><strong>ID Especialidad:</strong> <?php echo $medicos->id_especialidad; ?></p>
<?php if($medicos->estado == "t"):?>
	<p><strong>Estado: </strong>Activo</p>
<?php endif;?>
<?php if($medicos->estado == "f"):?>
	<p><strong>Estado: </strong>Inactivo</p>
<?php endif;?>
<!--<p><strong>Estado:</strong> <?php echo $medicamentos->estado; ?></p>-->