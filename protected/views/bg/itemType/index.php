<?php
$this->breadcrumbs=array(
	'Item Types',
);

$this->menu=array(
	array('label'=>Yii::t('base','Create'), 'url'=>array('create')),
	array('label'=>Yii::t('base','Manage'), 'url'=>array('admin')),
);
?>

<h1>Item Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
