<?php
/* @var $this ContentController */
/* @var $data Content */
?>

<div id="content-<?=$data->id; ?>" class="view list-panel item media">
   <a class="pull-left" href="<?php echo Yii::app()->request->baseUrl; ?>/content/<?php echo $data->id?>">
        <img class="img-polaroid img-thumb pull-left" src="<?php echo $data->thumb_image;?>">
    </a>
    <div class="media-body pull-left">
        <section>
            <span class="title"><?php echo CHtml::encode($data->title); ?></span>
        </section>
        <p><?php echo substr( CHtml::encode($data->description), 0, 150).' [..]'; ?></p>
        <div class="muted">
            <span>
                <span>Posted By</span>
                <span></span>
            </span>
            <span>
                <span>Content Id: </span>
                <span><?=$data->id; ?></span>
            </span>
        </div>
    </div>
    <div class="media-action pull-right">
        <span><i class="icon-calendar"></i> <?=date('r', strtotime($data->date_modified)); ?></span>
        <?php if($data->status == 'pending'){  ?>
        <span class="button-bar">
            <?php echo CHtml::link('Approve', array('#'),array(
                'class'=>"content-action btn btn-toggle-large btn-info",
                'data-type'=>"content",
                'data-action'=>"change-status",
                'data-value'=> $data->status,
                'data-gallery'=>$data->gallery_id,
                'id'=>$data->id,
                'title'=>"Approve",
            )); ?>
        </span>
        <span class="button-bar">
            <?php echo CHtml::link('Reject', array('#'),array(
                'class'=>"content-action btn btn-toggle-large btn-warning",
                'data-type'=>"content",
                'data-action'=>"delete",
                'data-value'=> $data->title,
                'data-gallery'=>$data->gallery_id,
                'id'=>$data->id,
                'title'=>"Edit Gallery",
            )); ?>
        </span>
        <span class="button-bar">
            <?php echo CHtml::link('<i class="icon-pencil"></i> Edit', array('content/update', 'id'=>$data->id),array(
                'class'=>"btn btn-toggle-large",
                'data-type'=>"content",
                'data-action'=>"edit",
                'id'=>$data->id,
                'title'=>"Edit Gallery",
            )); ?>
        </span>
        <?php } else { ?>
        <span class="button-bar">
            <?php $btnType = ($data->status == 'active') ? 'btn-success' : ( ($data->status == 'inactive') ? 'btn-danger' : 'btn-warning'); ?>
            <button class="content-action btn  btn-toggle-large <?=$btnType; ?>" type="button" data-type="content" data-action="change-status" id="<?=$data->id; ?>" data-gallery="<?=$data->gallery_id; ?>" data-value="<?=$data->status; ?>" title="Click to Change Status"><?=ucwords($data->status); ?></button>
        </span>
        <span class="button-bar">
            <?php echo CHtml::link('<i class="icon-pencil"></i> Edit', array('content/update', 'id'=>$data->id),array(
                'class'=>"btn btn-mini",
                'data-type'=>"content",
                'data-action'=>"edit",
                'id'=>$data->id,
                'title'=>"Edit Gallery",
            )); ?>
            <a href="javascript:void(0);" class="content-action btn btn-mini" data-type="content" data-action="delete" id="<?=$data->id; ?>" data-gallery="<?=$data->gallery_id; ?>" data-value="<?=$data->title; ?>" title="Delete gallery <?=$data->title; ?>"><i class="icon-trash"></i> Delete</a>
        </span>
        <?php } ?>
    </div>
</div>