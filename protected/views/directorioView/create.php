<?php
/* @var $this DirectorioViewController */
/* @var $model DirectorioView */

$this->breadcrumbs=array(
	'Directorio Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DirectorioView', 'url'=>array('index')),
	array('label'=>'Manage DirectorioView', 'url'=>array('admin')),
);
?>

<h1>Create DirectorioView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>