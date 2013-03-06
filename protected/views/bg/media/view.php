<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->media_id,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->media_id)),
	array('label'=>Yii::t('base','Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->media_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
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
