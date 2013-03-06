<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->item_id)),
	array('label'=>Yii::t('base','Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>View Item #<?php echo $model->item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_id',
		'item_name',
		'item_brand_id',
		'item_ctime',
		'item_status',
		'item_start_time',
		'item_end_time',
		'item_intro',
		'item_apply_num_plus',
		'item_apply_num',
		'item_piece',
        array(
            'name' => 'bbs_tid',
            'value' => !empty($model->bbs_tid) ? CHtml::link('对应论坛帖子',CommonHelper::returnBbsUrlByTid($model->bbs_tid), array('target'=>'_blank')) : '',
            'type' => 'raw'
        ),
	),
)); ?>
