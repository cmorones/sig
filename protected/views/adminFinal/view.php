<?php
/* @var $this AdminFinalController */
/* @var $model AdminFinal */

$this->breadcrumbs=array(
	'Admin Finals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AdminFinal', 'url'=>array('index')),
	array('label'=>'Create AdminFinal', 'url'=>array('create')),
	array('label'=>'Update AdminFinal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdminFinal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdminFinal', 'url'=>array('admin')),
);
?>

<h1>View AdminFinal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'documento',
		'id_area',
		'cargo',
		'cargo_des',
		'area_des',
		'nombre',
		'apellido_p',
		'apellido_m',
		'nombre_des',
		'apellidop_des',
		'apellidom_des',
		'tipo',
		'tipo_docto',
		'asunto',
		'fecha',
	),
)); ?>
