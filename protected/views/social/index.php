<?php
/* @var $this SocialPostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Social'=>array('index'),
    'Moderate Posts',
);

$this->menu=array(
	array('label'=>'Manage Social Stream', 'url'=>array('/socialstream/create')),
);
?>

<h1>
    <span class="pull-left">Manage Posts</span>
    <span class="pull-right h1-nested">
        <span class="pill pill-muted">
            <?php echo CHtml::link('<i class="icon-plus-sign"></i> Create Social Stream',array('/socialstream/create')); ?>
        </span>
    </span>
    <span class="clearfix"></span>
</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<script>
    $(function() {
        $(".posts-action").live("click",ACTION.listAction);
    });
</script>
