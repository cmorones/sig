<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */

$this->breadcrumbs=array(
	'Correspondencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Correspondencia', 'url'=>array('index')),
	array('label'=>'Create Correspondencia', 'url'=>array('create')),
	array('label'=>'Update Correspondencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Correspondencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Correspondencia', 'url'=>array('admin')),
);
?>

<h1>View Correspondencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_docto',
		'folio',
		'folio_inst',
		'destinatario',
		'tipo',
		'estado_acuse',
		'fecha_acuse',
		'caracter',
		'estado_rem',
		'estado_dest',
		'estado',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
