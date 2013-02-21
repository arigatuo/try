<?php
$this->breadcrumbs=array(
	'Applies'=>array('index'),
	$model->apply_id,
);

$this->menu=array(
	array('label'=>'List Apply', 'url'=>array('index')),
	array('label'=>'Create Apply', 'url'=>array('create')),
	array('label'=>'Update Apply', 'url'=>array('update', 'id'=>$model->apply_id)),
	array('label'=>'Delete Apply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->apply_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Apply', 'url'=>array('admin')),
);
?>

<h1>View Apply #<?php echo $model->apply_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'apply_id',
		'user_id',
		'item_id',
		'status',
	),
)); ?>
