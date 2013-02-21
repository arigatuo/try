<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->item_id), array('view', 'id'=>$data->item_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_name')); ?>:</b>
	<?php echo CHtml::encode($data->item_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_ctime')); ?>:</b>
	<?php echo CHtml::encode($data->item_ctime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_status')); ?>:</b>
	<?php echo CHtml::encode($data->item_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_start_time')); ?>:</b>
	<?php echo CHtml::encode($data->item_start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_end_time')); ?>:</b>
	<?php echo CHtml::encode($data->item_end_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('item_intro')); ?>:</b>
	<?php echo CHtml::encode($data->item_intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_apply_num_plus')); ?>:</b>
	<?php echo CHtml::encode($data->item_apply_num_plus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_apply_num')); ?>:</b>
	<?php echo CHtml::encode($data->item_apply_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_piece')); ?>:</b>
	<?php echo CHtml::encode($data->item_piece); ?>
	<br />

	*/ ?>

</div>