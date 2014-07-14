<?php
/* @var $this ActivityLogsController */
/* @var $model ActivityLogs */

$this->breadcrumbs=array(
	'Activity Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ActivityLogs', 'url'=>array('index')),
	array('label'=>'Manage ActivityLogs', 'url'=>array('admin')),
);
?>

<h1>Create ActivityLogs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>