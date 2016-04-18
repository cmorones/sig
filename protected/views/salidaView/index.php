<?php
/* @var $this SalidaViewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Salida Views',
);

$this->menu=array(
	array('label'=>'Create SalidaView', 'url'=>array('create')),
	array('label'=>'Manage SalidaView', 'url'=>array('admin')),
);
?>

<h1>Salida Views</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
