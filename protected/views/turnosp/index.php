<?php
/* @var $this TurnospController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turnosps',
);

$this->menu=array(
	array('label'=>'Create Turnosp', 'url'=>array('create')),
	array('label'=>'Manage Turnosp', 'url'=>array('admin')),
);
?>

<h1>Turnosps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
