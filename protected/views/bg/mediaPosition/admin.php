<?php
$this->breadcrumbs=array(
	'Media Positions'=>array('index'),
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
	$.fn.yiiGridView.update('media-position-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('base','Manage');?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'media-position-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'media_position',
		'media_position_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
