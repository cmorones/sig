<?php
/* @var $this ExpedientesController */
/* @var $model Expedientes */

$this->breadcrumbs=array(
	'Expedientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Expedientes', 'url'=>array('index')),
	array('label'=>'Create Expedientes', 'url'=>array('create')),
	array('label'=>'Update Expedientes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Expedientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Expedientes', 'url'=>array('admin')),
);
?>

<h1>View Expedientes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_corresp',
		'serie',
		'expediente',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
