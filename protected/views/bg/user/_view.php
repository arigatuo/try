<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_detail')); ?>:</b>
	<?php echo CHtml::encode($data->user_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_real_user')); ?>:</b>
	<?php echo CHtml::encode($data->is_real_user); ?>
	<br />


</div>