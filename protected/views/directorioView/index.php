<?php
/* @var $this DirectorioViewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directorio Views',
);

$this->menu=array(
	array('label'=>'Create DirectorioView', 'url'=>array('create')),
	array('label'=>'Manage DirectorioView', 'url'=>array('admin')),
);
?>

<h1>Directorio Views</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
