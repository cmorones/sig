<?php
/* @var $this TurnosController */
/* @var $model Turnos */

$this->breadcrumbs=array(
	'Turnoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Turnos', 'url'=>array('index')),
	array('label'=>'Create Turnos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#turnos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Turnoses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'turnos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'folio',
		'id_corresp',
		'remitente',
		'estado_rem',
		'destinatario',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
