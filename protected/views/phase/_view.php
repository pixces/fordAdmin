
<?php
/* @var $this PhaseController */
/* @var $data phase */
?>
<div id="phase-<?=$data->id; ?>" class="view list-panel item media">
        <a class="pull-left" href="#">
            <img class="img-polaroid" src="#">
        </a>
        <div class="media-body pull-left">
            <section>
                <span class="title"><?php echo CHtml::encode($data->phase_name); ?></span>
            </section>
        </div>
        <div class="media-action pull-right">
            <span><i class="icon-calendar"></i> <?=date('r', strtotime($data->date_modified)); ?></span>
            <span class="button-bar">
                <?php $btnType = ($data->status == 'active') ? 'btn-success' : ( ($data->status == 'inactive') ? 'btn-danger' : 'btn-warning'); ?>
                <button class="phase-action btn btn-toggle-large <?=$btnType; ?>" type="button" data-type="phase" data-action="change-status" id="<?=$data->id; ?>" data-value="<?=$data->status; ?>" title="Click to Change Status"><?=ucwords($data->status); ?></button>
            </span>
            <span>
                <?php echo CHtml::link('<i class="icon-search"></i> View', array('view', 'id'=>$data->id),array(
                    'class'=>"btn btn-mini",
                    'data-type'=>"phase",
                    'data-action'=>"view",
                    'id'=>$data->id,
                    'title'=>"View Phase",
                )); ?>
                <?php echo CHtml::link('<i class="icon-pencil"></i> Edit', array('update', 'id'=>$data->id),array(
                    'class'=>"btn btn-mini",
                    'data-type'=>"phase",
                    'data-action'=>"edit",
                    'id'=>$data->id,
                    'title'=>"Edit Phase",
                )); ?>
                <a href="javascript:void(0);" class="phase-action btn btn-mini" data-type="phase" data-action="delete" id="<?=$data->id; ?>" data-value="<?=$data->phase_name; ?>" title="Delete gallery <?=$data->phase_name; ?>"><i class="icon-trash"></i> Delete</a>
            </span>

        </div>
</div>