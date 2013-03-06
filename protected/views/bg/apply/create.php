<?php
$this->breadcrumbs=array(
	'Applies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Create Apply</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>