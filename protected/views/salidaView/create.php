<?php
/* @var $this SalidaViewController */
/* @var $model SalidaView */

$this->breadcrumbs=array(
	'Salida Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SalidaView', 'url'=>array('index')),
	array('label'=>'Manage SalidaView', 'url'=>array('admin')),
);
?>

<h1>Create SalidaView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>