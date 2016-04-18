<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perfil'); ?>
		<?php echo $form->textField($model,'perfil'); ?>
		<?php echo $form->error($model,'perfil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

		<hr/>
	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->checkBox($model,'_activ', array('class'=>'image_ind')); ?>
		<?php //echo $form->hiddenField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
	</div>
		<script>
			$(document).ready(function(){
				//codigo para la imagen en lugar de datos
				if($(".image_ind").is(':checked')){
						//si esta seleccionado
						$("#up_image").attr('style','display:block');
				}else{
					//si no esta seleccionado
					$("#up_image").attr('style','display:none');
				}
				
				$(".image_ind").click(function(){
					if($(".image_ind").is(':checked')){
						//si esta seleccionado
						$("#up_image").attr('style','display:block');
					}else{
						//si no esta seleccionado
						$("#up_image").attr('style','display:none');
					}
				});

			});
		</script>
		<div class="row" id="up_image" style="display:none">
			
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'password'); ?>
		</div>
	

	<hr/>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->