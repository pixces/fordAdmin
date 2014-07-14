<?php
/* @var $this ActivityLogsController */
/* @var $model ActivityLogs */

$this->breadcrumbs=array(
	'Activity Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ActivityLogs', 'url'=>array('index')),
	array('label'=>'Create ActivityLogs', 'url'=>array('create')),
	array('label'=>'Update ActivityLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ActivityLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ActivityLogs', 'url'=>array('admin')),
);
?>

<h1>View ActivityLogs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'activity',
		'user_id',
		'content_id',
		'comment',
	),
)); ?>
