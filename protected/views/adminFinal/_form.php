<?php
/* @var $this AdminFinalController */
/* @var $model AdminFinal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-final-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
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
		<?php echo $form->labelEx($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cargo_des'); ?>
		<?php echo $form->textField($model,'cargo_des',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'cargo_des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_des'); ?>
		<?php echo $form->textField($model,'area_des'); ?>
		<?php echo $form->error($model,'area_des'); ?>
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
		<?php echo $form->labelEx($model,'nombre_des'); ?>
		<?php echo $form->textField($model,'nombre_des',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombre_des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidop_des'); ?>
		<?php echo $form->textField($model,'apellidop_des',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'apellidop_des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidom_des'); ?>
		<?php echo $form->textField($model,'apellidom_des',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'apellidom_des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_docto'); ?>
		<?php echo $form->textField($model,'tipo_docto'); ?>
		<?php echo $form->error($model,'tipo_docto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asunto'); ?>
		<?php echo $form->textArea($model,'asunto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->