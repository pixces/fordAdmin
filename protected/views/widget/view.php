<?php
/* @var $this WidgetController */
/* @var $model Widget */

$this->breadcrumbs=array(
	'Widgets'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Widget', 'url'=>array('index')),
	array('label'=>'Create Widget', 'url'=>array('create')),
	array('label'=>'Update Widget', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Widget', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Widget', 'url'=>array('admin')),


);
?>

<h1>View Widget #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'widget_type_id',
		'data',
		'status',
		'date_created',
		'date_modified',
	),
)); ?>
