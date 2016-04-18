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
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'nombre'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'nombre',array('id'=>'nombre','placeholder'=>'nombre', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'nombre'); ?>
            </div>
         </div>

           <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'apellido_p'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'apellido_p',array('id'=>'apellido_p','placeholder'=>'apellido_p', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'apellido_p'); ?>
            </div>
         </div>

         <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'apellido_m'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'apellido_m',array('id'=>'apellido_m','placeholder'=>'apellido_m', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'apellido_m'); ?>
            </div>
         </div>

         <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'genero'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'genero',array('id'=>'genero','placeholder'=>'genero', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'genero'); ?>
            </div>
         </div>

         <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'fecha_nac'); ?></label>
            <div class="col-sm-9">
              <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_nac',


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
                                'yearRange' => '1950:2015'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:30px;width:100px;',
                                'id'=>'fecha_nac',
                                //'class'=>'span12'
                               
                            ),
                        ));
                      
 ?>
             <?php echo $form->error($model,'fecha_nac'); ?>
            </div>
         </div>

         <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'email'); ?></label>
            <div class="col-sm-9">
             <?php echo $form->textField($model,'email',array('id'=>'email','placeholder'=>'email', 'class'=>"form-control")); ?>
             <?php echo $form->error($model,'email'); ?>
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













