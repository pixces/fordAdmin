<?php
/* @var $this SocialCallController */
/* @var $model SocialCall */

$this->breadcrumbs=array(
	'Social Calls'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SocialCall', 'url'=>array('index')),
	array('label'=>'Create SocialCall', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#social-call-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Social Calls</h1>

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
	'id'=>'social-call-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'stream_id',
		'source',
		'keyword_string',
		'base_api_url',
		'post_count',
		/*
		'frequency',
		'last_call_time',
		'next_call_time',
		'date_added',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
