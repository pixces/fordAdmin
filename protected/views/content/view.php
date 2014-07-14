<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index','gallery_id' =>$data['gallery_id']),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index','gallery_id' =>$model->gallery_id)),
	array('label'=>'Create Content', 'url'=>array('create','gallery_id' =>$model->gallery_id)),
	array('label'=>'Update Content', 'url'=>array('update', 'id'=>$model->id,'gallery_id' =>$model->gallery_id)),
	array('label'=>'Delete Content', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id,'gallery_id'=>$model->gallery_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>
<h1>View Content #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'gallery_id',
		'user_id',
		'title',
		'description',
		'source',
		'media_url',
		'alternate_url',
		'type',
		'author',
		'channel_name',
		'authentication',
		'notes',
		'flags',
		'is_ugc',
		'thumb_image',
		'alternate_image',
		'status',
		'date_created',
		'date_modified',
	),
)); ?>
