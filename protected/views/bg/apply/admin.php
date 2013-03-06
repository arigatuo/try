<?php
$this->breadcrumbs=array(
	'Applies'=>array('index'),
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
	$.fn.yiiGridView.update('apply-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1><?php echo Yii::t('base',"Manage");?></h1>


<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'upload-search-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data')
));

$theGridViewId = "apply-grid";
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>$theGridViewId,
    'selectableRows'=>2,
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'value' => '$data->apply_id',
            'class' => 'CCheckBoxColumn',
        ),
		'apply_id',
		'user_id',
        array(
            'name' => 'item_brand_id',
            'value' => 'Brand::model()->findByPk($data->item_brand_id)->getAttribute("brand_name")',
            'filter' => CHtml::listData(Brand::model()->findAll(), "brand_id", "brand_name"),
        ),
        array(
            'name' => 'item_id',
            'value' => 'Item::model()->findByPk($data->item_id)->getAttribute("item_name")',
            'filter' => ( !empty($_GET['Apply']['item_brand_id']) && is_numeric($_GET['Apply']['item_brand_id']) ) ? CHtml::listData(Item::model()->findAllByAttributes(array("item_brand_id"=>$_GET['Apply']['item_brand_id'])),"item_id", "item_name") : CHtml::listData(Item::model()->findAll(), 'item_id', 'item_name'),
        ),
        array(
            'name' => 'apply_status',
            'value' => 'Apply::model()->statusList($data->apply_status)',
            'filter' => Apply::model()->statusList(),
        ),
		'apply_text',
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
