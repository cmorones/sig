<?php
/* @var $this TurnospController */
/* @var $model Turnosp */

$this->breadcrumbs=array(
	'Turnosps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Turnosp', 'url'=>array('index')),
	array('label'=>'Create Turnosp', 'url'=>array('create')),
	array('label'=>'Update Turnosp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Turnosp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Turnosp', 'url'=>array('admin')),
);
?>

<h1>View Turnosp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'folio',
		'id_corresp',
		'remitente',
		'estado_rem',
		'destinatario',
		'estado_dest',
		'instruccion1',
		'instruccion2',
		'instruccion_adicional',
		'caracter',
		'fecha_plazo',
		'doc_respuesta',
		'solucion',
		'fecha_turno',
		'fecha_solucion',
		'estado_sol',
		'estado',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
