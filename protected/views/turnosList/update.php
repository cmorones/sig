<?php
/* @var $this TurnosListController */
/* @var $model TurnosList */

$this->breadcrumbs=array(
	'Turnos Lists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TurnosList', 'url'=>array('index')),
	array('label'=>'Create TurnosList', 'url'=>array('create')),
	array('label'=>'View TurnosList', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TurnosList', 'url'=>array('admin')),
);
?>

<h1>Update TurnosList <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>