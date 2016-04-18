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

    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Bandeja</a></li>
                                    <li class="active">Turnos</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">
                            
                            <div class="main-content">
                               

                            

                                <div class="row">
                                    <div class="col-md-12">
                                              <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> BANDEJA DE TURNOS</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                                <div class="btn-group widget-header-toolbar">
                                                  
                                                </div>
                                            </div>
                                            <div class="widget-content">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'turnos-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'afterAjaxUpdate' => 'reinstallDatePicker', 
	'columns'=>array(
		'id',
      //  'fecha_turno',
		 array(
            'name'=>'fecha_search',
            'value'=>'$data->fecha_turno',
            'filter' =>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha_search', 
                'language' => 'es',
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '15',
                    'style'=>'width: 100px',
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
            'name'=>'documento',
            'htmlOptions'=>array('style'=>'width: 200px;  text-align:center;'),
        ),
        'asunto',
        array(
            'name'=>'id_area2',
            'value'=>'$data->Areas2->nombre',
            'filter'=>Areas::model()->options,
            'htmlOptions'=>array('style'=>'width: 200px;  text-align:center;'),
                    ),
          array(
            'name'=>'id_area',
            'value'=>'$data->Areas->nombre',
            'filter'=>Areas::model()->options,
            'htmlOptions'=>array('style'=>'width: 200px;  text-align:center;'),
                    ),
        array(
            'name'=>'estado_sol',
            'type' => 'html',
            'filter'=>false,
            'value' => '$data->imagen',
            
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
        ),
		
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{confirmar}',
			'buttons'=>array(

				'confirmar'=>array
				(
				'label'=>'salida',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/editar.png',
				'url'=>'yii::app()->createUrl("turnos/info",array("id"=>$data->id))',
				),
			),

		),
	),
)); ?>

                                            </div>
                                        </div>
                                        <!-- END WIDGET TABLE -->


                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->

