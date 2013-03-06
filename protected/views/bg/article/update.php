<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->article_id=>array('view','id'=>$model->article_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('base','List'), 'url'=>array('index')),
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','View'), 'url'=>array('view', 'id'=>$model->article_id)),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Update Article <?php echo $model->article_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>