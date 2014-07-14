<?php
/* @var $this PhaseController */
/* @var $model Phase */

$this->breadcrumbs=array(
	'Phases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Phase', 'url'=>array('index')),
	array('label'=>'Create Phase', 'url'=>array('create')),
	array('label'=>'View Phase', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Phase', 'url'=>array('admin')),
);
?>

<h1>Update Phase <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'phases'=>$phases, 'landing_pages'=>$landing_pages,'associate_pages'=>$associate_pages)); ?>