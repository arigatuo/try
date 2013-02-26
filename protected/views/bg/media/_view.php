<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->media_id), array('view', 'id'=>$data->media_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_position')); ?>:</b>
	<?php echo CHtml::encode($data->media_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_url')); ?>:</b>
	<?php echo CHtml::encode($data->media_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_photo')); ?>:</b>
	<?php echo CHtml::encode($data->media_photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_text')); ?>:</b>
	<?php echo CHtml::encode($data->media_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_ctime')); ?>:</b>
	<?php echo CHtml::encode($data->media_ctime); ?>
	<br />


</div>