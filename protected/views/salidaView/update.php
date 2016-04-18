<?php
/* @var $this SalidaViewController */
/* @var $model SalidaView */

$this->breadcrumbs=array(
	'Salida Views'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SalidaView', 'url'=>array('index')),
	array('label'=>'Create SalidaView', 'url'=>array('create')),
	array('label'=>'View SalidaView', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SalidaView', 'url'=>array('admin')),
);
?>

<h1>Update SalidaView <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>