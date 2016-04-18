<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */

$this->breadcrumbs=array(
	'Correspondencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Correspondencia', 'url'=>array('index')),
	array('label'=>'Create Correspondencia', 'url'=>array('create')),
	array('label'=>'View Correspondencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Correspondencia', 'url'=>array('admin')),
);
?>

<h1>Update Correspondencia <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_formup', array('model'=>$model)); ?>