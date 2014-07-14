<?php
/* @var $this SocialStreamController */
/* @var $model SocialStream */

$this->breadcrumbs=array(
	'Social Streams'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SocialStream', 'url'=>array('index')),
	array('label'=>'Create SocialStream', 'url'=>array('create')),
	array('label'=>'Update SocialStream', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SocialStream', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SocialStream', 'url'=>array('admin')),
);
?>

<h1>View SocialStream #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'keyword',
		'is_phrase',
		'is_profile',
		'is_twitter',
		'is_facebook',
		'is_gplus',
		'status',
		'created_date',
		'modified_date',
	),
)); ?>
