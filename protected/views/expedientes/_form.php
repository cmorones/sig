<?php
/* @var $this ExpedientesController */
/* @var $model Expedientes */
/* @var $form CActiveForm */

$model->id_corresp =$id_corresp;
?>
 <div class="widget">
     <div class="widget-header">
        <h3><i class="fa fa-edit"></i> Expediente</h3>
      </div>
    <div class="widget-content">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expedientes-form',
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'form-horizontal',
     'role'=>'form'),
)); ?>

 <fieldset>
  <legend>Informacion de Expediente</legend>
 <div class="form-group">
       
        <div class="col-sm-9">
           	<?php echo $form->hiddenField($model,'id_corresp'); ?>
           
        </div>
  </div>

   <div class="form-group">
        <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'serie'); ?></label>
        <div class="col-sm-9">
           	<?php echo $form->textField($model,'serie',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'serie'); ?>
        </div>
  </div>

   <div class="form-group">
        <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'expediente'); ?></label>
        <div class="col-sm-9">
           <?php echo $form->textField($model,'expediente',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'expediente'); ?>
        </div>
  </div>



	  <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"></label>
                                                            <div class="col-sm-6">
                                                                
                                          
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('id'=>"btn",'class'=>"agregar btn btn-success pull-left")); ?>
                                                                                                                  
     

                                                            </div>
                                                        </div>

	
  </fieldset> 
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>