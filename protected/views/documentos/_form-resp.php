<?php
/* @var $this DocumentosController */
/* @var $model Documentos */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScript('copias', "

var ccp = [];
$(function() {
    var count = 1;

   
  $(document).on(\"click\",\"#add\",function( event ) {  
	  count++;
	  
	  
	  var copia = $('#copias').val();
	  var nombre =$('#copias option:selected').html();
	  var tipoCopia = $('#tipocopia').val();
	  var nombreTipoCopia =$('#tipocopia option:selected').html();
	  var rem = $('#rem').val();
	  var dest = $('#dest').val();
	  
      if(copia == 0 || tipoCopia ==0){

      	alert('Debe seleccionar la CCP y tipo');
      	return false;
      }

       if(copia == rem){

      	alert('No puede generar copias para remitente');
      	return false;
      }

       if(copia == dest){

      	alert('No puede generar copias para destinatario');
      	return false;
      }



      $('#tblprod tr:last').after('<tr><td>'+nombre+'</td><td>'+nombreTipoCopia+'</td><td><button id=\"btn\" type=\"button\" class=\"btn btn-info\">Eliminar</button></td></div></tr>');
      event.preventDefault();
    
      ccp.push(copia);

     /* $.each(ccp,function( index, value){
         alert(value);
      });
     */
     
      $('#numcopias').push(copia);
      
      $('#contenido').text(copia.length);

     $(document).on(\"click\",\"#btn\",function( event ) {  
	  //$( '#tblprod tr:last').remove(); $(this).find('li')
	  $(this).closest('tr').remove(); // remove row
	  $('#numcopias').val(copia);
      event.preventDefault();
   });


});

});");
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
 

 		$baseUrl2 = YiiBase::getPathOfAlias("webroot");
        $menus= $baseUrl2.'/static/directorio.json';


        $datos = file_get_contents($menus);
        $remitentes = json_decode($datos, true);
	


		$this->widget('ext.widgets.select2.XSelect2', array(
   		'model'=>$model,
    	'attribute'=>'remitente',
   	    'data'=>$remitentes,
    	'htmlOptions'=>array(
        'style'=>'width:600px',
        'id'=>'rem',
    ),
));
		?>
		<?php echo $form->error($model,'remitente'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'destinatario'); ?>
		<?php 



		$this->widget('ext.widgets.select2.XSelect2', array(
   		'model'=>$model,
    	'attribute'=>'destinatario',
   	    'data'=>$remitentes,
    	'htmlOptions'=>array(
        'style'=>'width:600px',
        'id'=>'dest',
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
		<?php 
		$resultEjercicio = TipoDoc::model()->findAll();
        $ejercicio = array();
        $ejercicio[0] = 'Selecciona tipo de oficio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

		echo $form->dropDownList($model,'tipo_docto',$ejercicio,
		array(
				'ajax' => array(
				'type'=>'POST', //request type
				'url'=>CController::createUrl('documentos/tipocopia'), //url to call.
				//Style: CController::createUrl('currentController/methodToCall')
				'update'=>'#tipocopia', //selector to update
				//'data'=>'js:javascript statement' 
				//leave out the data key to pass all form values through
				))
		); ?>
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
		<?php echo $form->labelEx($model,'tipocopias'); ?>
		<?php 


		$this->widget('ext.widgets.select2.XSelect2', array(
   		'model'=>$model,
    	'attribute'=>'copias',
   	    'data'=>$remitentes,
    	'htmlOptions'=>array(
        'style'=>'width:300px',
        'id'=>'copias',
    ),
));

$tipocopia = array();

$query ='SELECT
*
FROM
"public".tipo_copia';


$resultrem2=Yii::app()->db->createCommand($query)->queryAll();

$tipocopia[0] = 'Seleccionar tipo copia';

 foreach ($resultrem2 as $value) {
            $tipocopia[$value['id']] = "$value[nombre]";
        }



	$this->widget('ext.widgets.select2.XSelect2', array(
   		'model'=>$model,
    	'attribute'=>'tipocopias',
   	    'data'=>$tipocopia,
    	'htmlOptions'=>array(
        'style'=>'width:300px',
        'id'=>'tipocopia',
    ),
));
		

        echo CHtml::button('Agregar Copias',array(
        "id"=>'add',
        'class'=>'chtmlbuttonclass'));


		 ?>


	</div>

	<div class="row">
	<?php echo $form->hiddenField($model, 'numcopias[]',array('id'=>'numcopias')); ?>
	</div>
	<div class="row">
				<table id="tblprod" class="table table-hover table-bordered">
					  <thead>
						<tr>
						  <th>Nombre</th>
						  <th>Accion</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						


						</tr>

					  </tbody>
					</table>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Generar' : 'Guardar',array('class'=>"btn btn-success")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<div id="contenido"></div>