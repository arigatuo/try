<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Create ItemType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>