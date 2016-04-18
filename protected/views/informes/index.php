    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                  
                        <!-- main -->
                        <div class="content">
                            <div class="main-header">
                                <h2><?php //echo $area; ?></h2>
                                <em>Informacion Estadistica del Área</em>
                            </div>
                            <div class="main-content">
                                <div class="row">
                                    <div class="col-md-9">
                                        <!-- WIDGET NO HEADER -->
                                        <div class="widget widget-hide-header">
                                            <div class="widget-header hide">
                                                <h3>Summary Info</h3>
                                            </div>
                                  
                                        </div>
                                        <!-- WIDGET NO HEADER -->
                                    </div>
                                   
                                </div>

                            <?php

                            /*  $id_area = Yii::app()->user->id_area;

                               $sql2 ="SELECT 
                                                                  count(correspondencia.id) as cuenta 
                                                                FROM 
                                                                  public.correspondencia, 
                                                                  public.documentos, 
                                                                  public.directorio, 
                                                                  public.directorio as direm
                                                                 
                                                                WHERE 
                                                                  correspondencia.destinatario = directorio.id_area AND
                                                                  documentos.id = correspondencia.id_docto AND
                                                                  documentos.remitente = direm.id AND
                                                                  documentos.estado = 1 AND
                                                                  correspondencia.estado = 1 AND
                                                                  directorio.id_area = $id_area";
                                $rem = Yii::app()->db->createCommand($sql2)->queryRow();
*/
                              ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                        <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> Informe de correspondencia por criterios</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                                <!--<div class="btn-group widget-header-toolbar">
                                                    <div class="control-inline toolbar-item-group">
                                                        <span class="control-title">Total de oficios:</span>
                                                        <div class="label label-success"><i class="fa fa-caret-up"></i><? //=$rem['cuenta'];?></div>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <div class="widget-content">
                                               

                                            <div class="form">
<?php echo CHtml::beginForm(); ?>


 <div class="row">
      <div class="col-md-12">

<?php echo CHtml::label('Fecha de Inicio', 'fecha1'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
    array(
        // you must specify name or model/attribute
        //'model'=>$model,
        //'attribute'=>'projectDateStart',
        'name'=>'fecha1',

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
    //  'themeUrl' => Yii::app()->baseUrl.'/css/pool' ,
    //  'theme'=>'pool',    //try 'bee' also to see the changes
    //  'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),


        //  optional: jquery Datepicker options
        'options' => array(
            // how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
            'dateFormat'=>'yy-mm-dd',
            //'yearRange' => '2013:2014',


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
        /*'style'=>'height:30px;
            background:#ffbf00;
            color:#00a;
            font-weight:bold;
            font-size:0.9em;
            border: 1px solid #A80;
            padding-left: 4px;'*/
        )
    )
);
 ?>

<?php echo CHtml::label('Fecha de Termino', 'fecha2'); ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
    array(
        // you must specify name or model/attribute
        //'model'=>$model,
        //'attribute'=>'projectDateStart',
        'name'=>'fecha2',

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
    //  'themeUrl' => Yii::app()->baseUrl.'/css/pool' ,
    //  'theme'=>'pool',    //try 'bee' also to see the changes
    //  'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),


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
        /*'style'=>'height:30px;
            background:#ffbf00;
            color:#00a;
            font-weight:bold;
            font-size:0.9em;
            border: 1px solid #A80;
            padding-left: 4px;'*/
        )
    )
);
 ?>
</div>

</div>

<div class="row">
 <div class="col-md-2">
 <?php  echo CHtml::label('Tipo de Informe','terms'); ?>
 </div>
 <div class="col-md-6">
    <?php 

      //  $partidas[0] = "TODOS";
    $partidas[0] = "Bandeja Por Confirmar";
    $partidas[1] = "Bandeja de Entrada";
    $partidas[2] = "Bandeja de Salida";
    $partidas[3] = "Bandeja de Turnos";


    //echo CHtml::label('Tipo de Informe','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_tipo',
   'options'=>array(
                      //  'placeholder' => 'Seleccionar Tipo de Informe', 
                    'width'=>'100%',
                    'maximumSelectionSize'=>5,
                    ),
  'data' => $partidas,
)); ?>
</div>
</div>


<div class="row">
      <div class="col-md-12">

<?php
echo CHtml::ajaxSubmitButton(
    'Generar informe ',
    array('informes/reqPto'),
    array(
        'update'=>'#req_res02',
    ),
     array('id'=>'btn','class'=>'btn-success') 
);
?>



<?php echo CHtml::submitButton('Limpiar formulario',array('class'=>'btn-info')); ?>


</div>

</div>
<div class="row-fluid">
</div>
<?php //echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm();

 ?>
</div><!-- form -->

                                               
                                            </div>
                                        </div>
                                        <!-- END WIDGET TABLE -->

                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                       
                            <div id="req_res02"></div>
                        </div>


                      
                    </div>
                    <!-- /content-wrapper -->