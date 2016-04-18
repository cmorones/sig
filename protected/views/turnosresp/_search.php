<?php
/* @var $this TurnosController */
/* @var $model Turnos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_corresp'); ?>
		<?php echo $form->textField($model,'id_corresp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remitente'); ?>
		<?php echo $form->textField($model,'remitente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_rem'); ?>
		<?php echo $form->textField($model,'estado_rem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destinatario'); ?>
		<?php echo $form->textField($model,'destinatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_dest'); ?>
		<?php echo $form->textField($model,'estado_dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instruccion1'); ?>
		<?php echo $form->textField($model,'instruccion1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instruccion2'); ?>
		<?php echo $form->textField($model,'instruccion2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instruccion_adicional'); ?>
		<?php echo $form->textField($model,'instruccion_adicional',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caracter'); ?>
		<?php echo $form->textField($model,'caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_plazo'); ?>
		<?php echo $form->textField($model,'fecha_plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc_respuesta'); ?>
		<?php echo $form->textField($model,'doc_respuesta',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solucion'); ?>
		<?php echo $form->textField($model,'solucion',array('size'=>60,'maxlength'=>5000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_solucuion'); ?>
		<?php echo $form->textField($model,'fecha_solucuion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_mod'); ?>
		<?php echo $form->textField($model,'fecha_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_reg'); ?>
		<?php echo $form->textField($model,'user_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->