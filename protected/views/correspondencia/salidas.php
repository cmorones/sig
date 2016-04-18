<div class="page-header">
<h2>Documentos Salida</h2>
</div>


<a href="<?php echo CController::createUrl('correspondencia/entrada'); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Regresar</a>
<br>
<br>

<br>


<?php $this->renderPartial('_form4', array('model'=>$model)); ?>
