<?php
/* @var $this DatosPersonalesController */
/* @var $model DatosPersonales */

$this->breadcrumbs=array(
	'Datos Personales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DatosPersonales', 'url'=>array('index')),
	array('label'=>'Create DatosPersonales', 'url'=>array('create')),
	array('label'=>'Update DatosPersonales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DatosPersonales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DatosPersonales', 'url'=>array('admin')),
);
?>

<h1>View DatosPersonales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellido_p',
		'apellido_m',
		'genero',
		'fecha_nac',
		'email',
		'status',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
