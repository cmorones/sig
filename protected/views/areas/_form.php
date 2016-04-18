<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>


    <!-- SUPPOR TICKET FORM -->


 <div class="widget">

                                            <div class="widget-header">
                                                <h3><i class="fa fa-edit"></i> Áreas</h3>
                                            </div>

                                            <div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	 'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        //'validateOnSubmit'=>true,
        //'validateOnChange'=>true,
        //'validateOnType'=>true,
        ),
    'htmlOptions'=>array('class'=>'form-horizontal',
     'role'=>'form'),

)); ?>



	<?php echo $form->errorSummary($model); ?>
        <fieldset>

            <div class="form-group">
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'id_dep'); ?></label>
                                                            <div class="col-sm-9">
                                                               

        <?php 
        $resultEjercicio = Areas::model()->findAll();
        $ejercicio = array();
        $ejercicio[0] = 'Sin Area';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        echo $form->dropDownList($model,'id_dep',$ejercicio
        ); ?>
        <?php echo $form->error($model,'id_dep'); ?>
                                                            </div>
       </div> 

       

          <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'acronimo'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'acronimo',array('id'=>'acronimo','placeholder'=>'Acronimo', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'acronimo'); ?>
            </div>
         </div>

           <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'nombre'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'nombre',array('id'=>'nombre','placeholder'=>'nombre', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'nombre'); ?>
            </div>
         </div>


           <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'nivel'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'nivel',array('id'=>'nivel','placeholder'=>'nivel', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'nivel'); ?>
            </div>
         </div>

      

      <div class="form-group">
       <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'status'); ?></label>
       <div class="col-sm-9">
                                                               

       
        <?php 
        $resultEjercicio = CatStatus::model()->findAll();
        $ejercicio = array();
        $ejercicio['false'] = 'Selecciona estado';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->Nombre;
        }

        echo $form->dropDownList($model,'status',$ejercicio,array('class'=>'dropdown-toggle btn btn-info')
        ); ?>
        <?php echo $form->error($model,'status'); ?>
                                                            </div>
                                                        </div>
           
                                                 
                                                     
       </fieldset>
  <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"></label>
                                                            <div class="col-sm-6">
                                                                
                                          
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Generar' : 'Guardar',array('id'=>"btn",'class'=>"agregar btn btn-success pull-left")); ?>
                                                                                                                  
     

                                                            </div>
                                                        </div>

</div>
</div>





<?php $this->endWidget(); ?>

</div><!-- form -->















































