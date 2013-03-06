<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->brand_id,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->brand_id)),
	array('label'=>Yii::t('base','Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->brand_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>View Brand #<?php echo $model->brand_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'brand_id',
		'brand_name',
		'brand_ctime',
		'brand_pic',
	),
)); ?>
