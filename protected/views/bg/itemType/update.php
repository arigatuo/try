<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	$model->item_type_id=>array('view','id'=>$model->item_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','View'), 'url'=>array('view', 'id'=>$model->item_type_id)),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Update ItemType <?php echo $model->item_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>