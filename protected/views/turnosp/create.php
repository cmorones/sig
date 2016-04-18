<?php
/* @var $this TurnospController */
/* @var $model Turnosp */

$this->breadcrumbs=array(
	'Turnosps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Turnosp', 'url'=>array('index')),
	array('label'=>'Manage Turnosp', 'url'=>array('admin')),
);
?>

<h1>Create Turnosp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>