<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
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
	$.fn.yiiGridView.update('brand-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('base','Manage');?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'brand-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'brand_id',
		'brand_name',
        array(
            'name' => 'brand_pic',
            'value' => '!empty($data->brand_pic) ? CHtml::image($data->brand_pic,"",
            array("style"=>"width:100px;height:100px")) : ""',
            'type' => 'raw',
        ),
        array(
            'name' => 'brand_ctime',
            'value' => 'CommonHelper::formatDate($data->brand_ctime)',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
