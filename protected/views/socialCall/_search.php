<?php
/* @var $this SocialCallController */
/* @var $model SocialCall */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stream_id'); ?>
		<?php echo $form->textField($model,'stream_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keyword_string'); ?>
		<?php echo $form->textArea($model,'keyword_string',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'base_api_url'); ?>
		<?php echo $form->textArea($model,'base_api_url',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_count'); ?>
		<?php echo $form->textField($model,'post_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_call_time'); ?>
		<?php echo $form->textField($model,'last_call_time',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'next_call_time'); ?>
		<?php echo $form->textField($model,'next_call_time',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->