<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
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
	$.fn.yiiGridView.update('item-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('base','Manage');?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'upload-search-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data')
));

$theGridViewId = "item-grid";
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>$theGridViewId,
    'selectableRows'=>2,
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'value' => '$data->item_id',
            'class' => 'CCheckBoxColumn',
        ),
		'item_id',
		'item_name',
        array(
            'name' => 'item_pic_small',
            'value' => 'CHtml::image($data->item_pic_small, "", array("style"=>"width:100px;height:100px;"))',
            'type' => 'raw',
        ),
        array(
            'name' => 'item_type_id',
            'value' => 'ItemType::model()->findByPk($data->item_type_id)->getAttribute("item_type_name")',
            'filter' => CHtml::listData(ItemType::model()->findAll(), "item_type_id", "item_type_name"),
        ),
        array(
            'name' => 'item_brand_id',
            'value' => 'Brand::model()->findByPk($data->item_brand_id)->getAttribute("brand_name")',
            'filter' => CHtml::listData(Brand::model()->findAll(), "brand_id", "brand_name"),
        ),
        array(
            'name' => 'item_status',
            'value' => 'Item::model()->statusList($data->item_status)',
            'filter' => Item::model()->statusList(),
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

<?php
echo $this->renderPartial("////common/multiSelect", array(
    'baseUrl' => Yii::app()->createUrl('bg/Helper/MultiAction'),
    'selectIdName' => $theGridViewId,
));

$this->endWidget();
?>
