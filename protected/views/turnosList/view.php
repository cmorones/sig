<?php
/* @var $this TurnosListController */
/* @var $model TurnosList */

$this->breadcrumbs=array(
	'Turnos Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TurnosList', 'url'=>array('index')),
	array('label'=>'Create TurnosList', 'url'=>array('create')),
	array('label'=>'Update TurnosList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TurnosList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TurnosList', 'url'=>array('admin')),
);
?>

<h1>View TurnosList #<?php echo $model->id; ?></h1>

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
