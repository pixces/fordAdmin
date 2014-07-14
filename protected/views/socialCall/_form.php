<?php
/* @var $this SocialCallController */
/* @var $model SocialCall */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'social-call-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'stream_id'); ?>
		<?php echo $form->textField($model,'stream_id'); ?>
		<?php echo $form->error($model,'stream_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword_string'); ?>
		<?php echo $form->textArea($model,'keyword_string',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keyword_string'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_api_url'); ?>
		<?php echo $form->textArea($model,'base_api_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'base_api_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_count'); ?>
		<?php echo $form->textField($model,'post_count'); ?>
		<?php echo $form->error($model,'post_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency'); ?>
		<?php echo $form->error($model,'frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_call_time'); ?>
		<?php echo $form->textField($model,'last_call_time',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'last_call_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next_call_time'); ?>
		<?php echo $form->textField($model,'next_call_time',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'next_call_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->