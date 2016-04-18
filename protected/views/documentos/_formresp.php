<?php
/* @var $this DocumentosController */
/* @var $model Documentos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documentos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'remitente'); ?>
		<?php 
		$remitentes = array();

$query ='SELECT
"public".directorio."id",
"public".directorio."cargo",
"public".datos_personales.nombre,
"public".datos_personales.apellido_p,
"public".datos_personales.apellido_m
FROM
"public".directorio
INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
WHERE "public".directorio.status = 38';


$resultrem=Yii::app()->db->createCommand($query)->queryAll();

$remitentes[0] = 'Seleccionar';

 foreach ($resultrem as $value) {
            $remitentes[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
        }


		$this->widget('ext.widgets.select2.XSelect2', array(
   		'model'=>$model,
    	'attribute'=>'remitente',
   	    'data'=>$remitentes,
    	'htmlOptions'=>array(
        'style'=>'width:600px',
    ),
));
		?>
		<?php echo $form->error($model,'remitente'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'destinatario'); ?>
		<?php 
		$remitentes = array();

$query ='SELECT
"public".directorio."id",
"public".directorio."cargo",
"public".datos_personales.nombre,
"public".datos_personales.apellido_p,
"public".datos_personales.apellido_m
FROM
"public".directorio
INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
WHERE "public".directorio.status = 1';


$resultrem=Yii::app()->db->createCommand($query)->queryAll();

$remitentes[0] = 'Seleccionar';

 foreach ($resultrem as $value) {
            $remitentes[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
        }


		$this->widget('ext.widgets.select2.XSelect2', array(
   		'model'=>$model,
    	'attribute'=>'destinatario',
   	    'data'=>$remitentes,
    	'htmlOptions'=>array(
        'style'=>'width:600px',
    ),
));
		?>
		<?php echo $form->error($model,'destinatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documento'); ?>
		<?php echo $form->textField($model,'documento',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'documento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'referencia'); ?>
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
		<?php echo $form->labelEx($model,'tipo_caracter'); ?>
		<?php echo $form->textField($model,'tipo_caracter'); ?>
		<?php echo $form->error($model,'tipo_caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
		// you must specify name or model/attribute
		//'model'=>$model,
		//'attribute'=>'projectDateStart',
		'name'=>'fecha',

		// optional: what's the initial value/date?
		//'value' => $model->projectDateStart
		//'value' => '08/20/2010',

		// optional: change the language
		//'language' => 'de',
		//'language' => 'fr',
		//'language' => 'es',
		'language' => 'es',

		/* optional: change visual
		 * themeUrl: "where the themes for this widget are located?"
		 * theme: theme name. Note that there must be a folder under themeUrl with the theme name
		 * cssFile: specifies the css file name under the theme folder. You may specify a
		 *          single filename or an array of filenames
		 * try http://jqueryui.com/themeroller/
		*/
	//	'themeUrl' => Yii::app()->baseUrl.'/css/pool' ,
	//	'theme'=>'pool',	//try 'bee' also to see the changes
	//	'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),


		//  optional: jquery Datepicker options
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy-mm-dd',

			// user will be able to change month and year
			'changeMonth' => 'true',
			'changeYear' => 'true',

			// shows the button panel under the calendar (buttons like "today" and "done")
			'showButtonPanel' => 'true',

			// this is useful to allow only valid chars in the input field, according to dateFormat
			'constrainInput' => 'false',

			// speed at which the datepicker appears, time in ms or "slow", "normal" or "fast"
			'duration'=>'fast',

			// animation effect, see http://docs.jquery.com/UI/Effects
			'showAnim' =>'slide',
		),


		// optional: html options will affect the input element, not the datepicker widget itself
		'htmlOptions'=>array(
        'style'=>'width:30',
    ),
	)
);
 ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copias'); ?>
		<?php 
		$remitentes = array();

$query ='SELECT
"public".directorio."id",
"public".directorio."cargo",
"public".datos_personales.nombre,
"public".datos_personales.apellido_p,
"public".datos_personales.apellido_m
FROM
"public".directorio
INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
WHERE "public".directorio.status = 38 limit 10';


$resultrem=Yii::app()->db->createCommand($query)->queryAll();

$remitentes[0] = 'Seleccionar';

 foreach ($resultrem as $value) {
            $remitentes[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
        }


$this->widget(
      'application.widget.emultiselect.EMultiSelect',
      array('sortable'=>true, 'searchable'=>true, 'sortable'=>true, 
                 )
);

echo $form->dropDownList(
    $model,
    'copias',
    $remitentes,
    array('multiple'=>'multiple',
        'key'=>'copias', 'class'=>'multiselect')
);

?>

		<?php echo $form->error($model,'copias'); ?>
</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->