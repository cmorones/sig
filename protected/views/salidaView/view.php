<?php
/* @var $this SalidaViewController */
/* @var $model SalidaView */

$this->breadcrumbs=array(
	'Salida Views'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SalidaView', 'url'=>array('index')),
	array('label'=>'Create SalidaView', 'url'=>array('create')),
	array('label'=>'Update SalidaView', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SalidaView', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SalidaView', 'url'=>array('admin')),
);
?>

<h1>View SalidaView #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'folio',
		'documento',
		'fecha',
		'estado_acuse',
		'id_area',
		'nombre',
		'id',
		'tipoc',
		'asunto',
	),
)); ?>
