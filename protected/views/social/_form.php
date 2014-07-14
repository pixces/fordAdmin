<?php
/* @var $this SocialPostController */
/* @var $model SocialPost */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'social-post-form',
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
		<?php echo $form->labelEx($model,'post_id'); ?>
		<?php echo $form->textField($model,'post_id',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'post_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_hash'); ?>
		<?php echo $form->textField($model,'post_hash',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'post_hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_text'); ?>
		<?php echo $form->textArea($model,'post_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_lang'); ?>
		<?php echo $form->textField($model,'post_lang',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'post_lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_source'); ?>
		<?php echo $form->textArea($model,'post_source',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_url'); ?>
		<?php echo $form->textArea($model,'post_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_type'); ?>
		<?php echo $form->textField($model,'post_type',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'post_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_story_text'); ?>
		<?php echo $form->textArea($model,'post_story_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_story_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_picture'); ?>
		<?php echo $form->textArea($model,'post_picture',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_link'); ?>
		<?php echo $form->textArea($model,'post_link',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_name'); ?>
		<?php echo $form->textArea($model,'post_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_caption'); ?>
		<?php echo $form->textArea($model,'post_caption',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_caption'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_description'); ?>
		<?php echo $form->textArea($model,'post_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_category'); ?>
		<?php echo $form->textField($model,'user_category',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'user_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_profile_image'); ?>
		<?php echo $form->textArea($model,'user_profile_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_profile_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_screen_name'); ?>
		<?php echo $form->textField($model,'user_screen_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'user_screen_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_lang'); ?>
		<?php echo $form->textField($model,'user_lang',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'user_lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_location'); ?>
		<?php echo $form->textArea($model,'user_location',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_followers_count'); ?>
		<?php echo $form->textField($model,'user_followers_count'); ?>
		<?php echo $form->error($model,'user_followers_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_friend_count'); ?>
		<?php echo $form->textField($model,'user_friend_count'); ?>
		<?php echo $form->error($model,'user_friend_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_status_count'); ?>
		<?php echo $form->textField($model,'user_status_count'); ?>
		<?php echo $form->error($model,'user_status_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_likes'); ?>
		<?php echo $form->textField($model,'post_likes'); ?>
		<?php echo $form->error($model,'post_likes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_comments'); ?>
		<?php echo $form->textField($model,'post_comments'); ?>
		<?php echo $form->error($model,'post_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_url'); ?>
		<?php echo $form->textArea($model,'user_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_status'); ?>
		<?php echo $form->textField($model,'post_status',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'post_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_published'); ?>
		<?php echo $form->textField($model,'date_published',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'date_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_published_ts'); ?>
		<?php echo $form->textField($model,'date_published_ts',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'date_published_ts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->