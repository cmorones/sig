<?php
/* @var $this CorrespondenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Correspondencias',
);

$this->menu=array(
	array('label'=>'Create Correspondencia', 'url'=>array('create')),
	array('label'=>'Manage Correspondencia', 'url'=>array('admin')),
);
?>

<h1>Correspondencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
