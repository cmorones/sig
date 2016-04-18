<?php
/* @var $this EntradaViewController */
/* @var $model EntradaView */

$this->breadcrumbs=array(
	'Entrada Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EntradaView', 'url'=>array('index')),
	array('label'=>'Manage EntradaView', 'url'=>array('admin')),
);
?>

<h1>Create EntradaView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>