<?php
/* @var $this TurnosController */
/* @var $model Turnos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turnos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
		<?php echo $form->error($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_corresp'); ?>
		<?php echo $form->textField($model,'id_corresp'); ?>
		<?php echo $form->error($model,'id_corresp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remitente'); ?>
		<?php echo $form->textField($model,'remitente'); ?>
		<?php echo $form->error($model,'remitente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_rem'); ?>
		<?php echo $form->textField($model,'estado_rem'); ?>
		<?php echo $form->error($model,'estado_rem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destinatario'); ?>
		<?php echo $form->textField($model,'destinatario'); ?>
		<?php echo $form->error($model,'destinatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_dest'); ?>
		<?php echo $form->textField($model,'estado_dest'); ?>
		<?php echo $form->error($model,'estado_dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instruccion1'); ?>
		<?php echo $form->textField($model,'instruccion1'); ?>
		<?php echo $form->error($model,'instruccion1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instruccion2'); ?>
		<?php echo $form->textField($model,'instruccion2'); ?>
		<?php echo $form->error($model,'instruccion2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instruccion_adicional'); ?>
		<?php echo $form->textField($model,'instruccion_adicional',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'instruccion_adicional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caracter'); ?>
		<?php echo $form->textField($model,'caracter'); ?>
		<?php echo $form->error($model,'caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_plazo'); ?>
		<?php echo $form->textField($model,'fecha_plazo'); ?>
		<?php echo $form->error($model,'fecha_plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_respuesta'); ?>
		<?php echo $form->textField($model,'doc_respuesta',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'doc_respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solucion'); ?>
		<?php echo $form->textField($model,'solucion',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'solucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_solucuion'); ?>
		<?php echo $form->textField($model,'fecha_solucuion'); ?>
		<?php echo $form->error($model,'fecha_solucuion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
		<?php echo $form->error($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_mod'); ?>
		<?php echo $form->textField($model,'fecha_mod'); ?>
		<?php echo $form->error($model,'fecha_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_reg'); ?>
		<?php echo $form->textField($model,'user_reg'); ?>
		<?php echo $form->error($model,'user_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod'); ?>
		<?php echo $form->error($model,'user_mod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->