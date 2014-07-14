<?php
/* @var $this SocialCallController */
/* @var $model SocialCall */

$this->breadcrumbs=array(
	'Social Calls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SocialCall', 'url'=>array('index')),
	array('label'=>'Create SocialCall', 'url'=>array('create')),
	array('label'=>'Update SocialCall', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SocialCall', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SocialCall', 'url'=>array('admin')),
);
?>

<h1>View SocialCall #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'stream_id',
		'source',
		'keyword_string',
		'base_api_url',
		'post_count',
		'frequency',
		'last_call_time',
		'next_call_time',
		'date_added',
	),
)); ?>
