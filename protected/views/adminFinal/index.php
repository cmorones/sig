<?php
/* @var $this AdminFinalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admin Finals',
);

$this->menu=array(
	array('label'=>'Create AdminFinal', 'url'=>array('create')),
	array('label'=>'Manage AdminFinal', 'url'=>array('admin')),
);
?>

<h1>Admin Finals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
