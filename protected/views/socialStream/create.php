<?php
/* @var $this SocialStreamController */
/* @var $model SocialStream */

$this->breadcrumbs=array(
	'Social Streams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Moderate Posts', 'url'=>array('/social/index')),
);
?>

<h1>Manage Social Streams</h1>
<div class="box box-shadow">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>

<!-- display the added search terms //-->
<table class="table table-hover">
    <thead>
    <tr>
        <th class="column-mini">#</th>
        <th>Search Term</th>
        <th class="column-small">Posts</th>
        <th class="column-small">Type</th>
        <th class="column-small">Source</th>
        <th class="column-mini"></th>
    </tr>
    </thead>
    <tbody>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>
    </tbody>
</table>
<script>
    $(function() {
        $(".stream-action").live("click",ACTION.listAction);
    });
</script>