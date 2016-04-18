<?php
/* @var $this DocumentosController */
/* @var $model Documentos */
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
		<?php echo $form->label($model,'remitente'); ?>
		<?php echo $form->textField($model,'remitente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documento'); ?>
		<?php echo $form->textArea($model,'documento',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referencia'); ?>
		<?php echo $form->textArea($model,'referencia',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_docto'); ?>
		<?php echo $form->textField($model,'tipo_docto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asunto'); ?>
		<?php echo $form->textArea($model,'asunto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_caracter'); ?>
		<?php echo $form->textField($model,'tipo_caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
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