<?php
/* @var $this ActivityLogsController */
/* @var $model ActivityLogs */

$this->breadcrumbs=array(
	'Activity Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ActivityLogs', 'url'=>array('index')),
	array('label'=>'Create ActivityLogs', 'url'=>array('create')),
	array('label'=>'View ActivityLogs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ActivityLogs', 'url'=>array('admin')),
);
?>

<h1>Update ActivityLogs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>