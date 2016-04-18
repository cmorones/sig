<?php
/* @var $this TurnosViewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turnos Views',
);

$this->menu=array(
	array('label'=>'Create TurnosView', 'url'=>array('create')),
	array('label'=>'Manage TurnosView', 'url'=>array('admin')),
);
?>

<h1>Turnos Views</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
