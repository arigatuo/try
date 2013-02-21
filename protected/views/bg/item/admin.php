<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('item-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Items</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'item_id',
		'item_name',
        array(
            'name' => 'item_pic_small',
            'value' => 'CHtml::image($data->item_pic_small, "", array("style"=>"width:100px;height:100px;"))',
            'type' => 'raw',
        ),
        array(
            'name' => 'item_brand_id',
            'value' => 'Brand::model()->findByPk($data->item_brand_id)->getAttribute("brand_name")',
            'filter' => CHtml::listData(Brand::model()->findAll(), "brand_id", "brand_name"),
        ),
        array(
            'name' => 'item_status',
            'value' => '$data->item_status',
            'filter' => CHtml::listData(Item::model()->statusList(), "value", "name"),
        ),
		'item_start_time',
        'item_end_time',
        'item_ctime',
		/*
		'item_intro',
		'item_apply_num_plus',
		'item_apply_num',
		'item_piece',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
