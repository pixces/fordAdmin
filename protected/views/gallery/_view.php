<?php
/* @var $this GalleryController */
/* @var $data Gallery */
?>
<div id="gallery-<?=$data->id; ?>" class="view list-panel item media">
        <a class="pull-left" href="#">
            <img class="img-polaroid" src="<?php echo $data->thumb;?>">
        </a>
        <div class="media-body pull-left">
            <section>
                <span class="title"><?php echo CHtml::encode($data->title); ?></span>
            </section>
            <p><?php echo substr( CHtml::encode($data->description), 0, 250).' [..]'; ?></p>
        </div>
        <div class="media-action pull-right">
            <span><i class="icon-calendar"></i> <?=date('r', strtotime($data->date_modified)); ?></span>
            <span class="button-bar">
                <?php $btnType = ($data->status == 'active') ? 'btn-success' : ( ($data->status == 'inactive') ? 'btn-danger' : 'btn-warning'); ?>
                <button class="gallery-action btn btn-toggle-large <?=$btnType; ?>" type="button" data-type="gallery" data-action="change-status" id="<?=$data->id; ?>" data-value="<?=$data->status; ?>" title="Click to Change Status"><?=ucwords($data->status); ?></button>
            </span>
            <span>
                <?php echo CHtml::link('<i class="icon-search"></i> View', array('view', 'id'=>$data->id),array(
                    'class'=>"btn btn-mini",
                    'data-type'=>"gallery",
                    'data-action'=>"view",
                    'id'=>$data->id,
                    'title'=>"View Gallery",
                )); ?>
                <?php if (!$data->is_ugc) { ?>
                <?php echo CHtml::link('<i class="icon-pencil"></i> Edit', array('update', 'id'=>$data->id),array(
                    'class'=>"btn btn-mini",
                    'data-type'=>"gallery",
                    'data-action'=>"edit",
                    'id'=>$data->id,
                    'title'=>"Edit Gallery",
                )); ?>
                <?php } ?>
                <!-- a href="javascript:void(0);" class="gallery-action btn btn-mini" data-type="gallery" data-action="delete" id="<?=$data->id; ?>" data-value="<?=$data->name; ?>" title="Delete gallery <?=$data->name; ?>"><i class="icon-trash"></i> Delete</a -->
            </span>
        </div>
</div>