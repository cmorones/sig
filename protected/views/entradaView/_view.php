<?php
/* @var $this EntradaViewController */
/* @var $data EntradaView */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('documento')); ?>:</b>
	<?php echo CHtml::encode($data->documento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_acuse')); ?>:</b>
	<?php echo CHtml::encode($data->estado_acuse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_area')); ?>:</b>
	<?php echo CHtml::encode($data->id_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre2')); ?>:</b>
	<?php echo CHtml::encode($data->nombre2); ?>
	<br />

	*/ ?>

</div>