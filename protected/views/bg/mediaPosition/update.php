<?php
$this->breadcrumbs=array(
	'Media Positions'=>array('index'),
	$model->media_position=>array('view','id'=>$model->media_position),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','View'), 'url'=>array('view', 'id'=>$model->media_position)),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Update MediaPosition <?php echo $model->media_position; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>