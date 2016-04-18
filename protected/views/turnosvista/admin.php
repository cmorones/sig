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
                                                    <div class="control-inline toolbar-item-group">
                                                        <span class="control-title">New Visits:</span>
                                                        <div class="label label-success"><i class="fa fa-caret-up"></i> 3.5%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'turnos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'folio',
		'fecha_turno',
		'documento',
		/*array(
			'name'=>'docto_search',
			'value'=>'$data->corresp->docto->documento',
		),*/
		
		'estado_sol',

		/*array(
			'name'=>'estado_sol',
			'filter'=>CatStatusTurno::model()->options,
			'value'=>'$data->estatus->Nombre',
		),*/
		/*'id_corresp',
		'remitente',
		'estado_rem',
		'destinatario',
		/*
		'estado_dest',
		'instruccion1',
		'instruccion2',
		'instruccion_adicional',
		'caracter',
		'fecha_plazo',
		'doc_respuesta',
		'solucion',
		'fecha_solucuion',
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
