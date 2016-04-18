<?php
/* @var $this EntradaViewController */
/* @var $model EntradaView */

$this->breadcrumbs=array(
	'Entrada Views'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EntradaView', 'url'=>array('index')),
	array('label'=>'Create EntradaView', 'url'=>array('create')),
	array('label'=>'Update EntradaView', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EntradaView', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EntradaView', 'url'=>array('admin')),
);
?>

<h1>View EntradaView #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'folio',
		'fecha',
		'documento',
		'estado_acuse',
		'id_area',
		'nombre',
		'nombre2',
		'id',
	),
)); ?>
