<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	$model->item_type_id,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->item_type_id)),
	array('label'=>Yii::t('base','Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
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
