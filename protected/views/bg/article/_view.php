<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->article_id), array('view', 'id'=>$data->article_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_title')); ?>:</b>
	<?php echo CHtml::encode($data->article_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_content')); ?>:</b>
	<?php echo CHtml::decode($data->article_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_point')); ?>:</b>
	<?php echo CHtml::encode($data->item_point); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_ctime')); ?>:</b>
	<?php echo CHtml::encode($data->article_ctime); ?>
	<br />


</div>
