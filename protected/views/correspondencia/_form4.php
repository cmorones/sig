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
$rem = Yii::app()->db->createCommand($sql2)->queryRow();

?>





<div class="row">
<h2>Datos del Documento</h2>
<table class="table table-bordered table-condensed table-striped table-hover">
<tr>
	<th width="20px;">Documento</th>
	<td><?=$docto['documento']?></td>

</tr>
<tr>
	<th width="20px;">Area</th>
	<td ><? echo $rem['nomarea']?> </td>

</tr>
<tr>
	<th width="20px;">Remitente</th>
	<td ><? echo $rem['nombre']." ".$rem['apellido_p']." ".$rem['apellido_m']?> </td>

</tr>
<tr>
	<th width="20px;">Cargo</th>
	<td ><? echo $rem['cargo']?> </td>

</tr>
<tr>
	<th width="20px;">Fecha</th>
	<td ><?=$docto['fecha']?></td>

</tr>
<tr>
	<th width="20px;">Tipo</th>
	<td ><?=$docto['tipo_docto']?></td>

</tr>
<tr>
	<th width="20px;">Asunto</th>
	<td ><?=$docto['asunto']?></td>

</tr>


</table>
</div>


<div class="row">





<table class="table table-bordered table-condensed table-striped table-hover">
<tr>
  <th colspan="2">Turnos</th>
  <th>
  </th>
  

</tr>
<tr>
  <th>Folio</th>
  <th>Turnado a:</th>
  <th>Condición</th>
  <th></th>
</tr>
<?php

$resultado = Turnos::model()->findAll((array(
    'condition'=>"id_corresp=$model->id",
    'order'=>'fecha_reg desc'
  )));


if($resultado){


  foreach ($resultado as $key => $row) {

  ?>


<tr>
  <td>$row->folio</td>
  <td>$row->folio</td>
  <td>$row->folio</td>
  <td>Imprimir</td>
</tr>




  <?php  

    
      
}

}else {

  ?>

 <tr><td colspan="3">No existen turno para este documento.</td></tr>
  <?php
}

?>


</table>

<p>
    <a href="<?php echo CController::createUrl('turnos/create'); ?>" class="btn-sm btn btn-success pull-left"><i class="glyphicon glypicon-plus"></i>Modificar</a>
    <a href="<?php echo CController::createUrl('turnos/create'); ?>" class="btn-sm btn btn-danger pull-left"><i class="glyphicon glypicon-plus"></i>Eliminar</a>
  </p>
<br>
<br>
<br>
<br>
<br>
</div>

