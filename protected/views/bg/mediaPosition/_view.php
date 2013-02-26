<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_position')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->media_position), array('view', 'id'=>$data->media_position)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_position_name')); ?>:</b>
	<?php echo CHtml::encode($data->media_position_name); ?>
	<br />


</div>