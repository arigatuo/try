<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	$model->item_type_id=>array('view','id'=>$model->item_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemType', 'url'=>array('index')),
	array('label'=>'Create ItemType', 'url'=>array('create')),
	array('label'=>'View ItemType', 'url'=>array('view', 'id'=>$model->item_type_id)),
	array('label'=>'Manage ItemType', 'url'=>array('admin')),
);
?>

<h1>Update ItemType <?php echo $model->item_type_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>