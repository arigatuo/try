<?php
$this->breadcrumbs=array(
	'Media Positions',
);

$this->menu=array(
	array('label'=>'Create MediaPosition', 'url'=>array('create')),
	array('label'=>'Manage MediaPosition', 'url'=>array('admin')),
);
?>

<h1>Media Positions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
