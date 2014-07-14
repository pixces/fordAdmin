<?php
/* @var $this SocialCallController */
/* @var $data SocialCall */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stream_id')); ?>:</b>
	<?php echo CHtml::encode($data->stream_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source')); ?>:</b>
	<?php echo CHtml::encode($data->source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keyword_string')); ?>:</b>
	<?php echo CHtml::encode($data->keyword_string); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('base_api_url')); ?>:</b>
	<?php echo CHtml::encode($data->base_api_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_count')); ?>:</b>
	<?php echo CHtml::encode($data->post_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency')); ?>:</b>
	<?php echo CHtml::encode($data->frequency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_call_time')); ?>:</b>
	<?php echo CHtml::encode($data->last_call_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next_call_time')); ?>:</b>
	<?php echo CHtml::encode($data->next_call_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	*/ ?>

</div>