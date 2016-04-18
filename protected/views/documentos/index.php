<?php
/* @var $this DocumentosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documentoses',
);

$this->menu=array(
	array('label'=>'Create Documentos', 'url'=>array('create')),
	array('label'=>'Manage Documentos', 'url'=>array('admin')),
);
?>

<h1>Documentoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
