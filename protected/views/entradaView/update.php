<?php
/* @var $this EntradaViewController */
/* @var $model EntradaView */

$this->breadcrumbs=array(
	'Entrada Views'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EntradaView', 'url'=>array('index')),
	array('label'=>'Create EntradaView', 'url'=>array('create')),
	array('label'=>'View EntradaView', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EntradaView', 'url'=>array('admin')),
);
?>

<h1>Update EntradaView <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>