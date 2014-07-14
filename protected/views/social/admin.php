<?php
/* @var $this SocialPostController */
/* @var $model SocialPost */

$this->breadcrumbs=array(
	'Social Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SocialPost', 'url'=>array('index')),
	array('label'=>'Create SocialPost', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#social-post-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Social Posts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'social-post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'stream_id',
		'source',
		'post_id',
		'post_hash',
		'post_text',
		/*
		'post_lang',
		'post_source',
		'post_url',
		'post_type',
		'post_story_text',
		'post_picture',
		'post_link',
		'post_name',
		'post_caption',
		'post_description',
		'user_category',
		'user_profile_image',
		'user_name',
		'user_screen_name',
		'user_id',
		'user_lang',
		'user_location',
		'user_followers_count',
		'user_friend_count',
		'user_status_count',
		'post_likes',
		'post_comments',
		'user_url',
		'post_status',
		'date_published',
		'date_published_ts',
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
