<?php
$this->breadcrumbs=array(
	'Applies'=>array('index'),
	$model->apply_id,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->apply_id)),
	array('label'=>Yii::t('base','Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->apply_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>View Apply #<?php echo $model->apply_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'apply_id',
		'user_id',
		'item_id',
		'apply_status',
		'apply_text',
        'addr_name',
        'addr_phone',
        'addr_city',
        'addr_province',
        'addr_address',
        'addr_email',
	),
)); ?>
