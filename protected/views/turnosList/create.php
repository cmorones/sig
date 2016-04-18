<?php
/* @var $this TurnosListController */
/* @var $model TurnosList */

$this->breadcrumbs=array(
	'Turnos Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TurnosList', 'url'=>array('index')),
	array('label'=>'Manage TurnosList', 'url'=>array('admin')),
);
?>

<h1>Create TurnosList</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>