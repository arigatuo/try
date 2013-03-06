<?php
$this->breadcrumbs=array(
	'Media Positions'=>array('index'),
	$model->media_position,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->media_position)),
	array('label'=>Yii::t('base','Delete'),'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->media_position),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
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
