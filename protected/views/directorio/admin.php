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
                                    <li><i class="fa fa-home"></i><a href="#">Administracion</a></li>
                                    <li class="active">Directorio</li>
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
                                                <h3><i class="fa fa-desktop"></i> DIRECTORIO</h3>
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
	'id'=>'directorio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_area',
         array(
            'name'=>'id_area',
            'value'=>'$data->areas->nombre',
        ),
		'id_dp',
		'cargo',
        'status',
		  array(
            'name'=>'status',
            'type' => 'html',
            'filter'=>false,
            'value' => '$data->imagen',
            
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
        ),
        
		/*
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
                'url'=>'yii::app()->createUrl("directorio/update",array("id"=>$data->id))',
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




