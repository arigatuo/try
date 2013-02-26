<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->media_id,
);

$this->menu=array(
	array('label'=>'List Media', 'url'=>array('index')),
	array('label'=>'Create Media', 'url'=>array('create')),
	array('label'=>'Update Media', 'url'=>array('update', 'id'=>$model->media_id)),
	array('label'=>'Delete Media', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->media_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Media', 'url'=>array('admin')),
);
?>

<h1>View Media #<?php echo $model->media_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'media_id',
		'media_position',
		'media_url',
		'media_photo',
		'media_text',
		'media_ctime',
	),
)); ?>
