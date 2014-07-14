<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'View Page', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/gallery.js',CClientScript::POS_END);

?>

<h1>Update Page <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'widgets'=>$widgets,'galleries'=>$galleries,'page_galleries'=>$page_galleries,'page_widgets' =>$page_widget)); ?>