<?php
/* @var $this DatosPersonalesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Datos Personales',
);

$this->menu=array(
	array('label'=>'Create DatosPersonales', 'url'=>array('create')),
	array('label'=>'Manage DatosPersonales', 'url'=>array('admin')),
);
?>

<h1>Datos Personales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
