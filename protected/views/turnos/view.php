<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Turnoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Turnos', 'url'=>array('index')),
	array('label'=>'Create Turnos', 'url'=>array('create')),
	array('label'=>'Update Turnos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Turnos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Turnos', 'url'=>array('admin')),
);
?>

<h1>View Turnos #<?php echo $model->id; ?></h1>

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
