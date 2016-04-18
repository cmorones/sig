<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Areases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Areas', 'url'=>array('index')),
	array('label'=>'Manage Areas', 'url'=>array('admin')),
);
?>

<h1>Create Areas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>