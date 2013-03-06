<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Create Media</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>