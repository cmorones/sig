<?php
/* @var $this EntradaViewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entrada Views',
);

$this->menu=array(
	array('label'=>'Create EntradaView', 'url'=>array('create')),
	array('label'=>'Manage EntradaView', 'url'=>array('admin')),
);
?>

<h1>Entrada Views</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
