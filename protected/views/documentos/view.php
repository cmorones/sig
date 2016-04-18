<?php
/* @var $this DocumentosController */
/* @var $model Documentos */

$this->breadcrumbs=array(
	'Documentoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Documentos', 'url'=>array('index')),
	array('label'=>'Create Documentos', 'url'=>array('create')),
	array('label'=>'Update Documentos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Documentos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Documentos', 'url'=>array('admin')),
);
?>

<h1>View Documentos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'remitente',
		'documento',
		'referencia',
		'tipo_docto',
		'asunto',
		'tipo_caracter',
		'fecha',
		'estado',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
