<?php
/* @var $this ActivityLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Activity Logs',
);

$this->menu=array(
	array('label'=>'Create ActivityLogs', 'url'=>array('create')),
	array('label'=>'Manage ActivityLogs', 'url'=>array('admin')),
);
?>

<h1>Activity Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
