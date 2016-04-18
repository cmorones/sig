<?php
/* @var $this TurnosViewController */
/* @var $model TurnosView */

$this->breadcrumbs=array(
	'Turnos Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TurnosView', 'url'=>array('index')),
	array('label'=>'Manage TurnosView', 'url'=>array('admin')),
);
?>

<h1>Create TurnosView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>