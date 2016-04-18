    <?php

/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
Yii::app()->clientScript->registerScript('re-install-date-picker', "


function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy/mm/dd'}));
}
");
?>

    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Bandeja</a></li>
                                    <li class="active">Turnos</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">
                            
                            <div class="main-content">

<a href="<?php echo CController::createUrl('turnosList/admin'); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Regresar</a>

                            

                                <div class="row">
                                    <div class="col-md-12">
                                              <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> BANDEJA DE TURNOS</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                             
                                            </div>
                                            <div class="widget-content">



<div class="row">
  <div class="col-sm-6">
      <h3>Datos del Documento</h3>
          <table class="table table-striped table-bordered table-responsive">
          <tr><th>Documento</th><td><?=$model->corresp->docto->documento;?></td></tr>
          <tr><th>Area Remitente</th><td ><?=$model->corresp->docto->remitentes->areas->nombre;?></td></tr>
          <tr><th>Remitente</th><td ><?=$model->corresp->docto->remitentes->personas->nombre. " " .$model->corresp->docto->remitentes->personas->apellido_p." ".$model->corresp->docto->remitentes->personas->apellido_m;?> </td></tr>
          <tr><th>Cargo</th><td ><?=$model->corresp->docto->remitentes->cargo;?></td></tr>
          <tr><th>Area Destinatario</th><td ><?=$model->corresp->dest->areas->nombre;?></td></tr>
          <tr><th>Destinatario</th><td ><?=$model->corresp->dest->personas->nombre." ".$model->corresp->dest->personas->apellido_p." ".$model->corresp->dest->personas->apellido_m;?></td></tr>
          <tr><th>Cargo</th><td ><?=$model->corresp->dest->cargo;?> </td></tr>
          <tr><th>Fecha del Documento</th><td ><?=$model->corresp->docto->fecha;?></td></tr>
          <tr><th>Tipo de Documento</th><td ><?=$model->corresp->docto->tipo->nombre;?></td></tr>
          <tr><th>Documento Relacionado</th><td ><?=$model->corresp->docto->referencia;?></td></tr>
          <tr><th>Caracter</th><td ><?//=$model->corresp->docto->caracter->nombre;?></td></tr>
          <tr><th>Asunto</th><td ><?=$model->corresp->docto->asunto;?></td></tr>


</table>
  </div>
  <div class="col-sm-6">
  <h3>Datos del Turno</h3>

<table class="table table-striped table-bordered .table-condensed table-responsive">
<tr><th>Folio:</th><td><?=$model->folio;?></td></tr>
<tr><th>Turna:</th><td><?=$model->rem->personas->nombre ." ". $model->rem->personas->apellido_p ." ". $model->rem->personas->apellido_m;?></td></tr>
<tr><th>Cargo:</th><td><?=$model->rem->cargo;?></td></tr>
<tr><th>Turnado a:</th><td><?=$model->dest->personas->nombre ." ". $model->dest->personas->apellido_p ." ". $model->dest->personas->apellido_m;?></td></tr>
<tr><th>Cargo:</th><td><?=$model->dest->cargo;?></td></tr>
<tr><th>Fecha de Turno:</th><td><?=$model->fecha_reg;?></td></tr>
<tr><th>Instrucciones 1</th><td><?=$model->inst1->nombre;?></td></tr>
<tr><th>Instrucciones 2</th><td><?=$model->inst2->nombre;?></td></tr>
<tr><th>Instrucciones Adicionales</th><td><?=$model->instruccion_adicional;?></td></tr>
<tr><th>Fecha Plazo</th><td><?=$model->fecha_plazo;?></td></tr>
<tr><th>Caracter</th><td><?//=$model->tipo_caracter->nombre;?></td></tr>

<?php

if($model->estado_sol==1){
  ?>
<tr><th>Estado Solucion</th><td><div class="label label-success">SOLUCIONADO</div></td></tr>
<tr><th>Fecha solucion</th><td><?=$model->fecha_solucion;?></td></tr>
<tr><th>Solucion</th><td><?=$model->solucion;?></td></tr>
<tr><th>Documento respuesta:</th><td><?=$model->doc_respuesta;?></td></tr>
  <?php
}else {
  ?>
<tr><th>Estado Solucion</th><td><div class="label label-danger">SIN SOLUCION</div></td></tr>
  <?php
}

?>

</table>
<div class="row">
 <div class="col-sm-2" align="center">
 </div>
  <div class="col-sm-2" align="center">
    <a href="<?php echo CController::createUrl('apipdf/turno', array('id'=>$id)); ?>" class="btn-sm btn btn-warning pull-left"><i class="glyphicon glypicon-plus"></i>Imprimir </a>
    
 </div>
  <div class="col-sm-2" align="center">
   <a href="<?php echo CController::createUrl('turnos/update', array('id'=>$id)); ?>" class="btn-sm btn btn-primary pull-left"><i class="glyphicon glypicon-plus"></i>Modificar </a>
   </div>
  <div class="col-sm-2" align="center">
 <a href="<?php echo CController::createUrl('turnos/seg', array('id'=>$id)); ?>" class="btn-sm btn btn-success pull-left"><i class="glyphicon glypicon-plus"></i>Seguimiento </a>
 </div>

  <div class="col-sm-2" align="center">

<?php



    /* Input dialog with Javascript callback */
/*    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog'.$item->id.'',
        'options'=>array(
            'title'=>'Eliminar el turno',
            'autoOpen'=>false,
            'show'=>array(
                'effect'=>'blind',
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),
            'modal'=>true,
            'buttons'=>array(
               // 'Aceptar'=>'js:addItem',
                'Cancelar'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));

   echo 'Nota: Se eliminará este turno del sistema, esta seguro??<bR>';
?>
     <a href="<?php echo CController::createUrl('turnos/baja', array('id'=>$id)); ?>" class="btn-sm btn btn-danger pull-left" ><i class="glyphicon glypicon-plus"></i>Eliminar </a>
<?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');



    echo CHtml::link('Eliminar', '#', array(
            'onclick'=>'$("#mydialog'.$item->id.'").dialog("open"); return false;',
            'class'=>'btn btn-danger btn-sm',
           // 'style'=>'padding: 0px;',

    ));  */


?>


 </div>
  <div class="col-sm-2" align="center">
 </div>

 <div>
</div>

</div>


</div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>


                                            </div>
                                        </div>
                                        <!-- END WIDGET TABLE -->


                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->
