    <?php

/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
Yii::app()->clientScript->registerScript('re-install-date-picker', "


function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy/mm/dd'}));
}
");
if(isset($_GET['id'])){
Yii::app()->user->setFlash('success',"Documento modificado correctamente!");
}

?>

    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Bandeja</a></li>
                                    <li class="active">Salida</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">
                           
                            <div class="main-content">
                               

                                <div id="resultado"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                              <div class="widget widget-table">
                                            <div class="widget-header">

                                                <h3><i class="fa fa-desktop"></i> BANDEJA DE SALIDA</h3>
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
	'id'=>'salida-view-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fecha',
		'folio',
		'documento',
		'nombre',
		'asunto',
		'tipoc',
        array(
            'name'=>'copias',
            'type' => 'html',
            'filter'=>false,
            'value' => '$data->copiasf',
            
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
        ),
		array(
            'name'=>'estado_acuse',
            'type' => 'html',
            'filter'=>false,
            'value' => '$data->imagen',
            
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
        ),
		/*
		'id',
		'tipoc',
		'asunto',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{confirmar}',
			'buttons'=>array(

				'confirmar'=>array
				(
				'label'=>'entrada',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/editar.png',
				'url'=>'yii::app()->createUrl("documentos/update",array("id"=>$data->id,"acuse"=>base64_encode($data->estado_acuse),"idc"=>$data->idc))',
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


