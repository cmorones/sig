<?php
/* @var $this SalidaViewController */
/* @var $model SalidaView */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'salida-view-form',
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
		<?php echo $form->labelEx($model,'documento'); ?>
		<?php echo $form->textArea($model,'documento',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'documento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_acuse'); ?>
		<?php echo $form->textField($model,'estado_acuse'); ?>
		<?php echo $form->error($model,'estado_acuse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_area'); ?>
		<?php echo $form->textField($model,'id_area'); ?>
		<?php echo $form->error($model,'id_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoc'); ?>
		<?php echo $form->textField($model,'tipoc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tipoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asunto'); ?>
		<?php echo $form->textArea($model,'asunto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->