<?php
/* @var $this DirectorioViewController */
/* @var $model DirectorioView */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'directorio-view-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'area_nom'); ?>
		<?php echo $form->textField($model,'area_nom',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'area_nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_p'); ?>
		<?php echo $form->textField($model,'apellido_p',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'apellido_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_m'); ?>
		<?php echo $form->textField($model,'apellido_m',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'apellido_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dp'); ?>
		<?php echo $form->textField($model,'id_dp'); ?>
		<?php echo $form->error($model,'id_dp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_area'); ?>
		<?php echo $form->textField($model,'id_area'); ?>
		<?php echo $form->error($model,'id_area'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->