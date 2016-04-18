    <!-- SUPPOR TICKET FORM -->
 <div class="widget">
      <div class="widget-header">
          <h3><i class="fa fa-edit"></i> Solución de Turno</h3>
       </div>
      <div class="widget-content">

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turnos-form',
  'action'=>Yii::app()->createUrl('//turnos/info/'.$model->id),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	 'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>true,
        ),
     'htmlOptions'=>array('class'=>'form-horizontal',
     'role'=>'form'),
)); ?>

 <fieldset>
  <legend>Informacion del Turno </legend>

    <div class="form-group">
      <label for="ticket-folio" class="col-sm-3 control-label">   <?php echo $form->labelEx($model,'folio'); ?></label>
        <div class="col-sm-9">
        <? echo $model->folio;?>
        </div>
    </div>

    <div class="form-group">
      <label for="ticket-solucion" class="col-sm-3 control-label">   <?php echo $form->labelEx($model,'solucion'); ?></label>
        <div class="col-sm-9">
        <?php echo $form->textArea($model,'solucion',array('rows'=>6, 'cols'=>85)); ?>
        <?php echo $form->error($model,'solucion'); ?>
        </div>
    </div>



     <div class="form-group">
      <label for="ticket-solucion" class="col-sm-3 control-label">  <? echo $form->labelEx($model,'fecha_solucion'); ?></label>
        <div class="col-sm-9">
       <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_solucion',


                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                               // 'yearRange' => '2013:2014'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:30px;width:100px;',
                                'id'=>'fecha',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
    <?php echo $form->error($model,'fecha_solucion'); ?>
        </div>
    </div>

        <div class="form-group">
      <label for="ticket-solucion" class="col-sm-3 control-label">  <?php echo $form->labelEx($model,'doc_respuesta'); ?></label>
        <div class="col-sm-9">
          <?php echo $form->textField($model,'doc_respuesta',array('rows'=>6, 'cols'=>85)); ?>
          <?php echo $form->error($model,'doc_respuesta'); ?>
        </div>
    </div>


      <div class="form-group">
      <label for="ticket-solucion" class="col-sm-3 control-label">  </label>
        <div class="col-sm-9">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn btn-sm btn-success')); ?>
        </div>
    </div>



 </fieldset> 





<?php $this->endWidget(); ?>

</div><!-- form -->

</div>