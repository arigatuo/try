<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
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
	$.fn.yiiGridView.update('item-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('base','Manage');?></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'item_type_id',
		'item_type_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
