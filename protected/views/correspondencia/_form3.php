<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
/* @var $form CActiveForm */

$sql = "SELECT * from documentos where id=$model->id_docto"; 
$docto = Yii::app()->db->createCommand($sql)->queryRow();

$sql2 = "SELECT * from correspondencia where id_docto=$model->id_docto and tipo=1"; 
$corresp = Yii::app()->db->createCommand($sql2)->queryRow();


$sql3 = "SELECT * from expedientes where id_corresp=$model->id"; 
$exp = Yii::app()->db->createCommand($sql3)->queryRow();

$sql2 = "SELECT 
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
  directorio.id =$docto[remitente]"; 
$rem = Yii::app()->db->createCommand($sql2)->queryRow();

$sql3 = "SELECT 
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
  directorio.id =$model->destinatario"; 

//echo $sql3;
$dest = Yii::app()->db->createCommand($sql3)->queryRow();

?>


<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h3>Datos del Documento</h3>
<table class="table table-bordered table-condensed table-striped table-hover">
<tr>
  <th>Documento:</th>
  <td><span class="docto"><?=$model->docto->documento?></span></td>

</tr>

<tr>
  <th>Folio:</th>
  <td><?=$model->folio?></td>

</tr>
<tr>
  <th>Area Remitente</th>
  <td ><? echo $rem['nomarea']?> </td>

</tr>
<tr>
  <th>Remitente</th>
  <td ><? echo $rem['nombre']." ".$rem['apellido_p']." ".$rem['apellido_m']?> </td>

</tr>
<tr>
  <th>Cargo</th>
  <td ><? echo $rem['cargo']?> </td>

</tr>
<tr>
  <th>Area Destinatario</th>
  <td ><? echo $dest['nomarea']?> </td>

</tr>
<tr>
  <th>Destinatario</th>
  <td ><? echo $dest['nombre']." ".$dest['apellido_p']." ".$dest['apellido_m']?> </td>

</tr>
<tr>
  <th>Cargo</th>
  <td ><? echo $dest['cargo']?> </td>

</tr>

<tr>
  <th>Fecha del Documento</th>
  <td ><?=$model->docto->fecha?></td>

</tr>

<tr>
  <th>Tipo de Documento</th>
  <td ><?=$model->docto->tipo->nombre?></td>

</tr>
<tr>
  <th>Documento Relacionado</th>
  <td ><?=$model->docto->referencia?></td>

</tr>
<tr>
  <th>Caracter</th>
  <td ><?=$model->docto->caracter->nombre?></td>

</tr>

<tr>
  <th>Asunto</th>
  <td ><?=$model->docto->asunto?></td>

</tr>

<?php
if ($exp['expediente']!=''){

$idexp =$exp['id'];

?>

<tr>
  <th>Serie:</th>
  <td ><?=$exp['serie']?></td>

</tr>

<tr>
  <th>Expediente:</th>
  <td ><span class="expediente"><?=$exp['expediente']?></span>
  </td>
  </tr>
  <tr>
  <td></td>
  <td>
  <p>
 
 <a href="<?php echo CController::createUrl('expedientes/update',array('id'=>$idexp, 'id_corresp'=>$model->id)); ?>" class="btn-sm btn btn-primary pull-left"><i class="fa fa-refresh"></i>Modificar Numero de Expediente</a></p>

  </td>

</tr>

<?php

}else{


?>


<tr>
  <th>Expediente para Archivo:</th>
  <td >
    
   <p><a href="<?php echo CController::createUrl('expedientes/create',array('id_corresp'=>$model->id)); ?>" class="btn-sm btn btn-primary pull-left"><i class="fa fa-plus-square"></i>Generar Numero de Expediente</a></p>


  </td>

</tr>

<?php
}
?>

<tr>
  <th>Estado</th>
  <td ><?

 $sql = "SELECT count(id) as cuenta from turnos where id_corresp=$model->id"; 
  $turnos = Yii::app()->db->createCommand($sql)->queryRow();

    if($model->estado_acuse=='1'){
    echo $imagen="<div class=\"label label-info\"><i class=\"fa fa-check-circle\"></i> CONFIRMADO</button></div>";
    }

    if($model->estado_acuse=='1' && $turnos['cuenta']>0){
    echo $imagen="<div class=\"label label-warning\"><i class=\"fa fa-check-circle\"></i> TURNADO</button></div>";
    }

 





  ?></td>

</tr>



</table>
  </div>
</div>







<div class="row">
  <div class="col-md-10 ">
  <p>


    <?php
    $id_area = Yii::app()->user->id_area;
                  if($id_area==32 || $id_area==33 || $id_area==34 || $id_area==35 || $id_area==36 || $id_area==37 || $id_area==38 || $id_area==39 || $id_area==40 || $id_area==41 || $id_area==42  || $id_area==43 || $id_area==44 || $id_area==45 || $id_area==46  || $id_area==47  || $id_area==48 || $id_area==437  ||  $id_area==453){

                    ?>
                    
                
                  <?php
                } elseif($dest['id_area']==$id_area) {

                  ?>
    <p><a href="<?php echo CController::createUrl('turnos/create',array('id_area'=>$dest['id_area'],'id_corresp'=>$model->id,'rem'=>$model->destinatario)); ?>" class="btn-sm btn btn-warning pull-left"><i class="fa fa-plus-square"></i>Generar Nuevo Turno</a></p>

    <?php
  }

  ?>
  
  </p>
  <br>
  <h3>Turnos</h3>
        <table class="table table-bordered table-condensed table-striped table-hover">

</tr>

<?php

$resultado = Turnos::model()->findAll((array(
    'condition'=>"id_corresp=$model->id and estado=1",
    'order'=>'fecha_reg desc'
  )));


if($resultado){

?>

<tr>
  <th>Fecha</th>
  <th>Folio</th>
  <th>Remitente</th>
  <th>Turnado a:</th>
  <th>Estado</th>
  <th>Solucion</th>
  <th colspan="2">Acciones</th>
</tr>

<?php

  foreach ($resultado as $key => $row) {


    $sqldest = "SELECT 
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
  directorio.id =$row->destinatario"; 

//echo $sql3;
$desty = Yii::app()->db->createCommand($sqldest)->queryRow();



    $sqlrem = "SELECT 
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
  directorio.id =$row->remitente"; 

//echo $sql3;
$remy = Yii::app()->db->createCommand($sqlrem)->queryRow();


   if($row->estado_sol=='1'){
    $imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> SOLUCIONADO</button></div>";
    }else{
     $imagen="<div class=\"label label-warning\"><i class=\"fa fa-check-circle\"></i> PENDIENTE</button></div>";  
    }
  ?>


<tr>
  <td><?php echo $row->fecha_turno; ?></td>
  <td><?php echo $row->id; ?></td>
  <td><? echo $remy['nombre']." ".$remy['apellido_p']." ".$remy['apellido_m']?><bR><strong><? echo $remy['cargo']?></strong></td>
  <td><? echo $desty['nombre']." ".$desty['apellido_p']." ".$desty['apellido_m']?><bR><strong><? echo $desty['cargo']?></strong></td>
  
  <td><?=$imagen?></td>
  <td><?=$row->solucion?></td>
            <td>
             
                <a href="<?php echo CController::createUrl('turnos/info', array('id'=>$row->id)); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Ver Turno</a>

            </td>

             <td>
               <a href="<?php echo CController::createUrl('apipdf/turno', array('id'=>$row->id)); ?>" class="btn-sm btn btn-warning pull-left"><i class="glyphicon glypicon-plus"></i>Imprimir </a>
              

            </td>
</tr>




  <?php  

    
      
}

}else {

  ?>

 <tr><td colspan="5">
   
   <div class="alert alert-danger" role="alert">
  No existe información para mostrar!!!!
</div>
 </td></tr>
  <?php
}

?>


</table>
  </div>
</div>




