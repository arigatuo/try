<?php
$this->breadcrumbs=array(
	'Media Positions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MediaPosition', 'url'=>array('index')),
	array('label'=>'Manage MediaPosition', 'url'=>array('admin')),
);
?>

<h1>Create MediaPosition</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>