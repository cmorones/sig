<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>


    <!-- SUPPOR TICKET FORM -->


 <div class="widget">

                                            <div class="widget-header">
                                                <h3><i class="fa fa-edit"></i> Usuarios</h3>
                                            </div>

                                            <div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	 'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
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
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'id_area'); ?></label>
                                                            <div class="col-sm-9">
                                                               

        <?php 
        $resultEjercicio = Areas::model()->findAll( "status=1",array('order'=>'nombre'));
        $ejercicio = array();
        $ejercicio['false'] = 'Seleccionar Area';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        echo $form->dropDownList($model,'id_area',$ejercicio
        ); ?>
        <?php echo $form->error($model,'id_area'); ?>
                                                            </div>
       </div> 

       <div class="form-group">
            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'id_dp'); ?></label>
            <div class="col-sm-9">
            		<?php 

          $destinatarios = array();
        $id_area = Yii::app()->user->id_area;

        $query ='SELECT
        "public".datos_personales.id,
        "public".datos_personales.nombre,
        "public".datos_personales.apellido_p,
        "public".datos_personales.apellido_m
        FROM
        "public".datos_personales';
          

        $resultrem=Yii::app()->db->createCommand($query)->queryAll();


        $destinatarios['falso'] = 'Seleccionar nombre';

         foreach ($resultrem as $value) {
                    $destinatarios[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] ";
                }

      
        $this->widget('ext.widgets.select2.XSelect2', array(
        'model'=>$model,
        'attribute'=>'id_dp',
        'data'=>$destinatarios,
        'htmlOptions'=>array(
        'style'=>'width:600px',
        'id'=>'dest',
    ),
));
        ?>
       			    <?php echo $form->error($model,'id_dp'); ?>
            </div>
        </div>
      
           
         <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'cargo'); ?></label>
                                                            <div class="col-sm-9">
                                                                
                                                                <?php echo $form->textField($model,'cargo',array('id'=>'referencia','placeholder'=>'Referencia', 'class'=>"form-control")); ?>
        <?php echo $form->error($model,'cargo'); ?>
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

       <div class="form-group">
       <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'id_grupo'); ?></label>
       <div class="col-sm-9">
                                                               

       
        <?php 
        $resultEjercicio = CatGrupo::model()->findAll();
        $ejercicio = array();
        $ejercicio[0] = 'Selecciona grupo';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->Nombre;
        }

        echo $form->dropDownList($model,'id_grupo',$ejercicio,array('class'=>'dropdown-toggle btn btn-info')
        ); ?>
        <?php echo $form->error($model,'id_grupo'); ?>
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