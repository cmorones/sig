  <script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 //dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#datepicker<?php echo $id?>").datepicker();
});
</script>
<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
/* @var $form CActiveForm */
$model=new Correspondencia($id);
?>
<br>
<br>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'correspondencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'fecha_acuse'); ?>
		<?php echo $form->textField($model,'fecha_acuse',array('id'=>'datepicker'.$id)); ?>
		<?php echo $form->error($model,'fecha_acuse'); ?>
	</div>
	
	
	

<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class' => 'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->