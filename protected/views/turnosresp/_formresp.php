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
    $id_area = Yii::app()->user->id_area;
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
        }

?>


<br>
 <div class="widget">
     <div class="widget-header">
        <h3><i class="fa fa-edit"></i> Generar Turno</h3>
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
  <legend>Informacion del Turno</legend>
 

	<div class="form-group">
	    <label for="ticket-subject" class="col-sm-3 control-label">   <?php echo $form->labelEx($model,'remitente'); ?></label>
	    <div class="col-sm-9">
	    <? //echo $rem['nombre']." ".$rem['apellido_p']." ".$rem['apellido_m']?>
		</div>
	</div>

	<div class="form-group">
        <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'destinatario'); ?></label>
        <div class="col-sm-9">
        <?php 

        $this->widget('ext.widgets.select2.XSelect2', array(
        'model'=>$model,
        'attribute'=>'destinatario',
        'data'=>$listTurno,
        'htmlOptions'=>array(
        'style'=>'width:600px',
        'id'=>'destinatario',
    ),
));
        ?>
        </div>
     </div>

        <div class="form-group">
        <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'instruccion1');?></label>
        <div class="col-sm-9">
          	<?php echo $form->dropDownList($model, 'instruccion1', $banderas, array('id' => 'instruccion1'));?>
            <?php echo $form->error($model,'instruccion1'); ?>
         </div>
    </div>
   <div class="form-group">
        <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'instruccion2'); ?></label>
        <div class="col-sm-9">
           	<?php echo $form->dropDownList($model, 'instruccion2', $banderas, array('id' => 'instruccion2'));?>
            <?php echo $form->error($model,'instruccion2'); ?>
        </div>
   </div>




                                                        <div class="form-group">
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'instruccion_adicional'); ?></label>
                                                            <div class="col-sm-9">
                                                               
                                                                 <?php echo $form->textArea($model,'instruccion_adicional',array('placeholder'=>'instruccion_adicional', 'class'=>"form-control")); ?>
                                                            <?php echo $form->error($model,'instruccion_adicional'); ?>
                 
                                                            </div>
                                                        </div>

    <div class="form-group">
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'caracter'); ?></label>
                                                            <div class="col-sm-9">
                                                               

      
                        <?php echo $form->dropDownList($model, 'caracter', $caracter, array(
                        'id' => 'tipo_caracter'));?>
                        <?php echo $form->error($model, 'caracter'); ?>
                                                            </div>
                                                        </div




  <div class="form-group">
     <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'fecha_plazo'); ?></label>
     <div class="col-sm-9">
 <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_plazo',


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
                                'id'=>'fecha_plazo',
                                //'class'=>'span12'
                               
                            ),
                        ));
                      
 ?>
        <?php echo $form->error($model,'fecha_plazo'); ?>
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