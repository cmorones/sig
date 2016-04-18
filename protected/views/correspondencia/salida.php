<a href="<?php echo CController::createUrl('correspondencia/entrada'); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Regresar</a>
<br>
<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy/mm/dd'}));
}
");
?>


<h1>Correspondencia Salida</h1>

<a href="<?php echo CController::createUrl('documentos/create/'); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> Agregar</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'correspondencia-grid',
	'dataProvider'=>$model->search3(),
	'filter'=>$model,
	'afterAjaxUpdate' => 'reinstallDatePicker', 
	'columns'=>array(
		array(
			'name'=>'fecha_search',
			'value'=>'$data->docto->fecha',
			'filter' =>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha_search', 
                'language' => 'es',
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
            ), 
            true), 
			
		),
		array(
			'name'=>'docto_search',
			'value'=>'$data->docto->documento',
		),
			array(
			'name'=>'tipo',
			'value'=>'$data->tipoc->nombre',
		),

		array(
			'name'=>'asunto_search',
			'value'=>'$data->docto->asunto',
		),
		
		/*'id_docto',
		'folio',
		'folio_inst',
		'destinatario',
		'tipo',
		/*
		'estado_acuse',
		'fecha_acuse',
		'caracter',
		'estado_rem',
		'estado_dest',
		'estado',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{confirmar}',
			'buttons'=>array(

				'confirmar'=>array
				(
				'label'=>'salida',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/editar.png',
				'url'=>'yii::app()->createUrl("correspondencia/salidas",array("id"=>$data->id))',
				),
			),

		),
	),
)); ?>
