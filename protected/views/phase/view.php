<?php
/* @var $this PhaseController */
/* @var $model Phase */

$this->breadcrumbs=array(
	'Phases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Phase', 'url'=>array('index')),
	array('label'=>'Create Phase', 'url'=>array('create')),
	array('label'=>'Update Phase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Phase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Phase', 'url'=>array('admin')),
);
?>

<h1>View Phase #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'phase_name',
		'page_id',
		'page_name',
		'link_type',
		'status',
		'date_modified',
	),
)); ?>
