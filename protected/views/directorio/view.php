<?php
/* @var $this DirectorioController */
/* @var $model Directorio */

$this->breadcrumbs=array(
	'Directorios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Directorio', 'url'=>array('index')),
	array('label'=>'Create Directorio', 'url'=>array('create')),
	array('label'=>'Update Directorio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Directorio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Directorio', 'url'=>array('admin')),
);
?>

<h1>View Directorio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_area',
		'id_dp',
		'cargo',
		'status',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
