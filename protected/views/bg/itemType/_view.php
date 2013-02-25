<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->item_type_id), array('view', 'id'=>$data->item_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_type_name')); ?>:</b>
	<?php echo CHtml::encode($data->item_type_name); ?>
	<br />


</div>