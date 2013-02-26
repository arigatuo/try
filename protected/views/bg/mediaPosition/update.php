<?php
$this->breadcrumbs=array(
	'Media Positions'=>array('index'),
	$model->media_position=>array('view','id'=>$model->media_position),
	'Update',
);

$this->menu=array(
	array('label'=>'List MediaPosition', 'url'=>array('index')),
	array('label'=>'Create MediaPosition', 'url'=>array('create')),
	array('label'=>'View MediaPosition', 'url'=>array('view', 'id'=>$model->media_position)),
	array('label'=>'Manage MediaPosition', 'url'=>array('admin')),
);
?>

<h1>Update MediaPosition <?php echo $model->media_position; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>