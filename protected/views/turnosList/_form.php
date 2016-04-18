<?php
/* @var $this TurnosListController */
/* @var $model TurnosList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turnos-list-form',
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
		<?php echo $form->labelEx($model,'estado_sol'); ?>
		<?php echo $form->textField($model,'estado_sol'); ?>
		<?php echo $form->error($model,'estado_sol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documento'); ?>
		<?php echo $form->textArea($model,'documento',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'documento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_area'); ?>
		<?php echo $form->textField($model,'id_area'); ?>
		<?php echo $form->error($model,'id_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_turno'); ?>
		<?php echo $form->textField($model,'fecha_turno'); ?>
		<?php echo $form->error($model,'fecha_turno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->