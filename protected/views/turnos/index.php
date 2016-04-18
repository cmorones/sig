<?php
/* @var $this TurnosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turnoses',
);

$this->menu=array(
	array('label'=>'Create Turnos', 'url'=>array('create')),
	array('label'=>'Manage Turnos', 'url'=>array('admin')),
);
?>

<h1>Turnoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
