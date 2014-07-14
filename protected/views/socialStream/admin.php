<?php
/* @var $this SocialStreamController */
/* @var $model SocialStream */

$this->breadcrumbs=array(
	'Social Streams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SocialStream', 'url'=>array('index')),
	array('label'=>'Create SocialStream', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#social-stream-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Social Streams</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'social-stream-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'keyword',
		'is_phrase',
		'is_profile',
		'is_twitter',
		/*
		'is_facebook',
		'is_gplus',
		'status',
		'created_date',
		'modified_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
