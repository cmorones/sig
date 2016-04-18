<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
/* @var $form CActiveForm */

$sql = "SELECT * from documentos where id=$model->id_docto"; 
$docto = Yii::app()->db->createCommand($sql)->queryRow();

$sql2 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$docto[remitente]"; 
$info = Yii::app()->db->createCommand($sql2)->queryRow();




?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'correspondencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



<div class="row">
  <div class="col-md-8 col-md-offset-2">
  <h3>Información del Documento</h3>

<table class="table table-bordered table-condensed table-striped table-hover">
<tr>
	<th width="30px;">Documento:</th>
	<td><?=$model->docto->documento?></td>

</tr>
<tr>
	<th width="30px;">Area:</th>
	<td ><?=$model->docto->remitentes->areas->nombre?></td>

</tr>
<tr>
	<th width="30px;">Remitente:</th>
	<td ><?=$info['nombre']?>  <?=$info['apellido_p']?>  <?=$info['apellido_m']?>  </td>

</tr>
<tr>
	<th width="30px;">Cargo:</th>
	<td ><?=$model->docto->remitentes->cargo?> </td>

</tr>
<tr>
	<th width="30px;">Fecha documento:</th>
	<td ><?php  echo $docto['fecha']?></td>

</tr>
<tr>
	<th width="30px;">Tipo documento:</th>
	<td ><?=$model->docto->tipo->nombre?></td>

</tr>


<tr>
	<th width="30px;">Asunto:</th>
	<td ><?php  echo $docto['asunto']?></td>

</tr>


	
</table>

<h3>Destinatario</h3>

<table class="table table-bordered table-condensed table-striped table-hover">

<tr>
  <th width="30px;">Area:</th>
  <td ><?=$model->dest->areas->nombre?></td>

</tr>
<tr>
  <th width="30px;">Destinatario:</th>
  <td > </td>

</tr>
<tr>
  <th width="30px;">Cargo:</th>
  <td ><?=$model->dest->cargo?> </td>

</tr>




<tr>
  <th width="30px;">Tipo copia:</th>
  <td ><?php  echo $model->tipoc->nombre?></td>

</tr>
  
</table>

  <div class="row">

    <?php echo $form->labelEx($model,'fecha_acuse'); ?>
    <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_acuse',


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
                                'yearRange' => '2016'
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:100px;height:30px;',
                                'id'=>'fecha_ing',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
    <?php echo $form->error($model,'fecha_acuse'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Confirmar',array('class'=>'btn btn-sm btn-success')); ?>
  
    
  </div>







<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>



