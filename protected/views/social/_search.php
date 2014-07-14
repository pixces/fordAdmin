<?php
/* @var $this SocialPostController */
/* @var $model SocialPost */
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
		<?php echo $form->label($model,'post_id'); ?>
		<?php echo $form->textField($model,'post_id',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_hash'); ?>
		<?php echo $form->textField($model,'post_hash',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_text'); ?>
		<?php echo $form->textArea($model,'post_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_lang'); ?>
		<?php echo $form->textField($model,'post_lang',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_source'); ?>
		<?php echo $form->textArea($model,'post_source',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_url'); ?>
		<?php echo $form->textArea($model,'post_url',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_type'); ?>
		<?php echo $form->textField($model,'post_type',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_story_text'); ?>
		<?php echo $form->textArea($model,'post_story_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_picture'); ?>
		<?php echo $form->textArea($model,'post_picture',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_link'); ?>
		<?php echo $form->textArea($model,'post_link',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_name'); ?>
		<?php echo $form->textArea($model,'post_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_caption'); ?>
		<?php echo $form->textArea($model,'post_caption',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_description'); ?>
		<?php echo $form->textArea($model,'post_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_category'); ?>
		<?php echo $form->textField($model,'user_category',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_profile_image'); ?>
		<?php echo $form->textArea($model,'user_profile_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_screen_name'); ?>
		<?php echo $form->textField($model,'user_screen_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_lang'); ?>
		<?php echo $form->textField($model,'user_lang',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_location'); ?>
		<?php echo $form->textArea($model,'user_location',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_followers_count'); ?>
		<?php echo $form->textField($model,'user_followers_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_friend_count'); ?>
		<?php echo $form->textField($model,'user_friend_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_status_count'); ?>
		<?php echo $form->textField($model,'user_status_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_likes'); ?>
		<?php echo $form->textField($model,'post_likes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_comments'); ?>
		<?php echo $form->textField($model,'post_comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_url'); ?>
		<?php echo $form->textArea($model,'user_url',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_status'); ?>
		<?php echo $form->textField($model,'post_status',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_published'); ?>
		<?php echo $form->textField($model,'date_published',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_published_ts'); ?>
		<?php echo $form->textField($model,'date_published_ts',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->