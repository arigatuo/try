<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	$model->item_type_id,
);

$this->menu=array(
	array('label'=>'List ItemType', 'url'=>array('index')),
	array('label'=>'Create ItemType', 'url'=>array('create')),
	array('label'=>'Update ItemType', 'url'=>array('update', 'id'=>$model->item_type_id)),
	array('label'=>'Delete ItemType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemType', 'url'=>array('admin')),
);
?>

<h1>View ItemType #<?php echo $model->item_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_type_id',
		'item_type_name',
	),
)); ?>
