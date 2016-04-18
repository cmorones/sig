<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Areases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Areas', 'url'=>array('index')),
	array('label'=>'Create Areas', 'url'=>array('create')),
	array('label'=>'Update Areas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Areas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Areas', 'url'=>array('admin')),
);
?>

<h1>View Areas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_dep',
		'acronimo',
		'nombre',
		'nivel',
		'status',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
