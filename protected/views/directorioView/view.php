<?php
/* @var $this DirectorioViewController */
/* @var $model DirectorioView */

$this->breadcrumbs=array(
	'Directorio Views'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DirectorioView', 'url'=>array('index')),
	array('label'=>'Create DirectorioView', 'url'=>array('create')),
	array('label'=>'Update DirectorioView', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DirectorioView', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DirectorioView', 'url'=>array('admin')),
);
?>

<h1>View DirectorioView #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'area_nom',
		'nombre',
		'apellido_p',
		'apellido_m',
		'cargo',
		'status',
		'id_dp',
		'id',
		'id_area',
	),
)); ?>
