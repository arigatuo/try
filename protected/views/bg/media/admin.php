<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('media-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('base','Manage');?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'media-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'media_id',
        array(
            'name' => 'media_position',
            'value' => 'MediaPosition::model()->findByPk($data->media_position)->getAttribute("media_position_name")',
            'filter' => CHtml::listData(MediaPosition::model()->findAll(), "media_position", "media_position_name"),
        ),
		'media_url',
        array(
            'name' => 'media_photo',
            'value' => '!empty($data->media_photo) ? CHtml::image($data->media_photo, "",
            array("style"=>"width:100px;height:100px")) : ""',
            'type' => 'raw',
        ),
		'media_text',
		'media_ctime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
