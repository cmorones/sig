<?php
/* @var $this TurnosListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turnos Lists',
);

$this->menu=array(
	array('label'=>'Create TurnosList', 'url'=>array('create')),
	array('label'=>'Manage TurnosList', 'url'=>array('admin')),
);
?>

<h1>Turnos Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
