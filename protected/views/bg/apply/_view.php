<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('apply_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->apply_id), array('view', 'id'=>$data->apply_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apply_status')); ?>:</b>
	<?php echo CHtml::encode($data->apply_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apply_text')); ?>:</b>
	<?php echo CHtml::encode($data->apply_text); ?>
	<br />


</div>