<?php
/* @var $this AdminFinalController */
/* @var $model AdminFinal */

$this->breadcrumbs=array(
	'Admin Finals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdminFinal', 'url'=>array('index')),
	array('label'=>'Create AdminFinal', 'url'=>array('create')),
	array('label'=>'View AdminFinal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AdminFinal', 'url'=>array('admin')),
);
?>

<h1>Update AdminFinal <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>