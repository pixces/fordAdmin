<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/gallery.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/content/content.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/jquery.form.js',CClientScript::POS_END);
?>

<h1>Update Content <?php echo $model->id; ?></h1>
<youtubeApiUrl href ="<?php echo $youtubeApiUrl;?>" />
<?php $this->renderPartial('_form', array('model'=>$model,'data'=>$data,'update'=>true)); ?>