<?php
/* @var $this TurnospController */
/* @var $model Turnosp */

$this->breadcrumbs=array(
	'Turnosps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Turnosp', 'url'=>array('index')),
	array('label'=>'Create Turnosp', 'url'=>array('create')),
	array('label'=>'View Turnosp', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Turnosp', 'url'=>array('admin')),
);
?>

<h1>Update Turnosp <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>