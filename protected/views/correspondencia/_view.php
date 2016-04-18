<?php
/* @var $this CorrespondenciaController */
/* @var $data Correspondencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_docto')); ?>:</b>
	<?php echo CHtml::encode($data->id_docto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio_inst')); ?>:</b>
	<?php echo CHtml::encode($data->folio_inst); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destinatario')); ?>:</b>
	<?php echo CHtml::encode($data->destinatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_acuse')); ?>:</b>
	<?php echo CHtml::encode($data->estado_acuse); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_acuse')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_acuse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caracter')); ?>:</b>
	<?php echo CHtml::encode($data->caracter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_rem')); ?>:</b>
	<?php echo CHtml::encode($data->estado_rem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_dest')); ?>:</b>
	<?php echo CHtml::encode($data->estado_dest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

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

	*/ ?>

</div>