<?php
/* @var $this DirectorioViewController */
/* @var $model DirectorioView */

$this->breadcrumbs=array(
	'Directorio Views'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DirectorioView', 'url'=>array('index')),
	array('label'=>'Create DirectorioView', 'url'=>array('create')),
	array('label'=>'View DirectorioView', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DirectorioView', 'url'=>array('admin')),
);
?>

<h1>Update DirectorioView <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>