<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->article_id,
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Update'), 'url'=>array('update', 'id'=>$model->article_id)),
	array('label'=>Yii::t('base','Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->article_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>View Article #<?php echo $model->article_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'article_id',
		'item_id',
		'user_id',
		'article_title',
		//'article_content',
		'item_point',
		'article_ctime',
        array(
            'name' => 'bbs_tid',
            'value' => !empty($model->bbs_tid) ? CHtml::link('对应论坛帖子',CommonHelper::returnBbsUrlByTid($model->bbs_tid), array('target'=>'_blank')) : '',
            'type' => 'raw'
        ),
	),
)); ?>

<h3>内容</h3>
<div>
    <?php echo  $model->article_content; ?>
</div>

