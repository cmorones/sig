<?php
/* @var $this DatosPersonalesController */
/* @var $model DatosPersonales */

$this->breadcrumbs=array(
	'Datos Personales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DatosPersonales', 'url'=>array('index')),
	array('label'=>'Manage DatosPersonales', 'url'=>array('admin')),
);
?>

<h1>Create DatosPersonales</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>