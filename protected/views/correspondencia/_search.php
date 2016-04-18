<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
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
		<?php echo $form->label($model,'id_docto'); ?>
		<?php echo $form->textField($model,'id_docto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio_inst'); ?>
		<?php echo $form->textField($model,'folio_inst'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destinatario'); ?>
		<?php echo $form->textField($model,'destinatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_acuse'); ?>
		<?php echo $form->textField($model,'estado_acuse'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_acuse'); ?>
		<?php echo $form->textField($model,'fecha_acuse'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caracter'); ?>
		<?php echo $form->textField($model,'caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_rem'); ?>
		<?php echo $form->textField($model,'estado_rem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_dest'); ?>
		<?php echo $form->textField($model,'estado_dest'); ?>
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