<?php
/* @var $this TurnospController */
/* @var $data Turnosp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_corresp')); ?>:</b>
	<?php echo CHtml::encode($data->id_corresp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remitente')); ?>:</b>
	<?php echo CHtml::encode($data->remitente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_rem')); ?>:</b>
	<?php echo CHtml::encode($data->estado_rem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destinatario')); ?>:</b>
	<?php echo CHtml::encode($data->destinatario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_dest')); ?>:</b>
	<?php echo CHtml::encode($data->estado_dest); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('instruccion1')); ?>:</b>
	<?php echo CHtml::encode($data->instruccion1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('instruccion2')); ?>:</b>
	<?php echo CHtml::encode($data->instruccion2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('instruccion_adicional')); ?>:</b>
	<?php echo CHtml::encode($data->instruccion_adicional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caracter')); ?>:</b>
	<?php echo CHtml::encode($data->caracter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_plazo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_plazo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_respuesta')); ?>:</b>
	<?php echo CHtml::encode($data->doc_respuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solucion')); ?>:</b>
	<?php echo CHtml::encode($data->solucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_turno')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_solucion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_solucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_sol')); ?>:</b>
	<?php echo CHtml::encode($data->estado_sol); ?>
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