<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_area')); ?>:</b>
	<?php echo CHtml::encode($data->id_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dp')); ?>:</b>
	<?php echo CHtml::encode($data->id_dp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_perfil')); ?>:</b>
	<?php echo CHtml::encode($data->id_perfil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_reg')); ?>:</b>
	<?php echo CHtml::encode($data->user_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?>:</b>
	<?php echo CHtml::encode($data->user_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	*/ ?>

</div>