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
                                    <li class="active">Por Confirmar</li>
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
                                                <h3><i class="fa fa-desktop"></i> BANDEJA POR CONFIRMAR</h3>
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
    'id'=>'correspondencia-grid',
    'dataProvider'=>$model->search(),
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
            'name'=>'docto_search',
            'value'=>'$data->docto->documento',
            'htmlOptions'=>array('style'=>'width: 250px;  text-align:center;'),
        ),

      /*  array(
            'name'=>'tipo_search',
            'value'=>'$data->docto->tipo->nombre',
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
        ),
*/      
        array(
            'name'=>'asunto_search',
            'value'=>'$data->docto->asunto',
        ),

            array(
            'name'=>'tipo',
            'value'=>'$data->tipoc->nombre',
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
        ),
        array(
            'name'=>'fueratiempo',
            'type' => 'html',
            'filter'=>false,
            'value' => '$data->imagen',
            
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
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
                'label'=>'confirmar',
                'imageUrl'=>Yii::app()->request->baseUrl.'/images/editar.png',
                'url'=>'yii::app()->createUrl("correspondencia/confirmado",array("id"=>$data->id))',
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