<?php

/*$sql2 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea,
  areas.id as id_area
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$rem"; 
$rem = Yii::app()->db->createCommand($sql2)->queryRow();
*/
   /* $id_area = Yii::app()->user->id_area;
    $criteria = new CDbCriteria;
    $criteria->with=array('personas');
    //$criteria->join="right JOIN datos_personales as dp ON(dp.id=t.id_dp)";
    $criteria->condition= "t.id_area=:id_area and t.status=:status";
    $criteria->params=array(':id_area'=>$id_area,':status'=>1);
    $criteria->order = "personas.nombre";


    $resultado = Directorio::model()->findAll($criteria);
    //Apply To CActiveDataProvider
      $listTurno = array();
        $listTurno['falso'] = 'Selecciona a quien turnar';
        foreach ($resultado as $key => $value) {
            $listTurno[$value->id] = $value->personas->nombre." ".$value->personas->apellido_p." ".$value->personas->apellido_m."-".$value->cargo;
        }

     $resultBanderas = CatInstrucciones::model()->findAll(array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

     $resultCaracter = CatCaracter::model()->findAll(array('order'=>'id'));
        $caracter = array();
        $caracter['falso'] = 'Seleccionar';
        foreach ($resultCaracter as $key => $value) {
            $caracter[$value->id] = "$value->nombre";
        }*/

?>


<br>
 <div class="widget">
     <div class="widget-header">
        <h3><i class="fa fa-edit"></i> Turnos</h3>
      </div>
    <div class="widget-content">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turnos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	 'htmlOptions'=>array('class'=>'form-horizontal',
     'role'=>'form'),
)); ?>

 <fieldset>
  <legend>Informacion Seguimiento Turno</legend>
 

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
      <label for="ticket-solucion" class="col-sm-3 control-label">  <?php echo $form->labelEx($model,'num_expediente'); ?></label>
        <div class="col-sm-9">
          <?php echo $form->textField($model,'num_expediente',array('rows'=>6, 'cols'=>85)); ?>
          <?php echo $form->error($model,'num_expediente'); ?>
        </div>
    </div>

     <div class="form-group">
      <label for="ticket-solucion" class="col-sm-3 control-label"> </label>
        <div class="col-sm-9">
          <?php echo $form->hiddenField($model,'estado_sol',array('type'=>"hidden",'size'=>2,'maxlength'=>2,'value'=>1)); ?>
          
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


</div>