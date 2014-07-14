<?php
/* @var $this PhaseController */
/* @var $model Phase */

$this->breadcrumbs=array(
	'Phases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Phase', 'url'=>array('index')),
	array('label'=>'Manage Phase', 'url'=>array('admin')),
);
?>

<h1>Create Phase</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'landing_pages'=>$landing_pages,'associate_pages'=>$associate_pages)); ?>