<?php
$this->breadcrumbs=array(
	'Media Positions'=>array('index'),
	$model->media_position,
);

$this->menu=array(
	array('label'=>'List MediaPosition', 'url'=>array('index')),
	array('label'=>'Create MediaPosition', 'url'=>array('create')),
	array('label'=>'Update MediaPosition', 'url'=>array('update', 'id'=>$model->media_position)),
	array('label'=>'Delete MediaPosition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->media_position),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MediaPosition', 'url'=>array('admin')),
);
?>

<h1>View MediaPosition #<?php echo $model->media_position; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'media_position',
		'media_position_name',
	),
)); ?>
