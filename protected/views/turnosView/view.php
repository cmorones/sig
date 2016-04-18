<?php
/* @var $this TurnosViewController */
/* @var $model TurnosView */

$this->breadcrumbs=array(
	'Turnos Views'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TurnosView', 'url'=>array('index')),
	array('label'=>'Create TurnosView', 'url'=>array('create')),
	array('label'=>'Update TurnosView', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TurnosView', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TurnosView', 'url'=>array('admin')),
);
?>

<h1>View TurnosView #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'folio',
		'estado_sol',
		'documento',
		'id_area',
		'id',
		'fecha_turno',
	),
)); ?>
