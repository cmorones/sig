<?php
/* @var $this AdminFinalController */
/* @var $model AdminFinal */

$this->breadcrumbs=array(
	'Admin Finals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdminFinal', 'url'=>array('index')),
	array('label'=>'Manage AdminFinal', 'url'=>array('admin')),
);
?>

<h1>Create AdminFinal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>