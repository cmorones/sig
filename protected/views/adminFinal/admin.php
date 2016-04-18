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
                                    <li class="active">Administracion de Docuemntos</li>
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

                                                <h3><i class="fa fa-desktop"></i> SEGUIMIENTO DOCUMENTOS</h3>
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
	'id'=>'admin-final-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			array(
            'name'=>'fecha',
            //'value'=>'$data->Tipodoc->nombre',
            // 'filter'=>TipoDoc::model()->options,
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
                    ),
			array(
            'name'=>'documento',
            //'value'=>'$data->Tipodoc->nombre',
            // 'filter'=>TipoDoc::model()->options,
            'htmlOptions'=>array('style'=>'width: 200px;  text-align:center;'),
                    ),
		array(
            'name'=>'tipo_docto',
            'value'=>'$data->Tipodoc->nombre',
             'filter'=>TipoDoc::model()->options,
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
                    ),
		//'tipo',
		array(
            'name'=>'tipo',
            'value'=>'$data->Tipo->nombre',
             'filter'=>TipoCopia::model()->options,
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
                    ),
		'nombre',
		'apellido_p',
		'apellido_m',
		'cargo',
		//'id_area',
		 array(
            'name'=>'id_area',
            'value'=>'$data->Areas->nombre',
            'filter'=>Areas::model()->options,
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
                    ),
		'asunto',
		'nombre_des',
		'apellidop_des',
		'apellidom_des',
		'cargo_des',
		//'area_des',
		  array(
            'name'=>'area_des',
            'value'=>'$data->Areas2->nombre',
            'filter'=>Areas::model()->options,
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
                    ),
      
		/*
		'nombre',
		'apellido_p',
		'apellido_m',
		'nombre_des',
		'apellidop_des',
		'apellidom_des',
		'tipo',
		
		'asunto',
		'fecha',
		*/
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


