<?php
/* @var $this TurnosViewController */
/* @var $model TurnosView */

$this->breadcrumbs=array(
	'Turnos Views'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TurnosView', 'url'=>array('index')),
	array('label'=>'Create TurnosView', 'url'=>array('create')),
	array('label'=>'View TurnosView', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TurnosView', 'url'=>array('admin')),
);
?>

<h1>Update TurnosView <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>