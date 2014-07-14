<?php
    if ($data->type == 'video'){
        $thumbImage = Yii::app()->baseUrl."/images/video.png";
    } else if ($data->type == 'image'){
        $thumbImage =  $data->thumb_image;
    } else if ($data->type == 'blog' || $data->type == 'text'){
        $thumbImage = Yii::app()->baseUrl."/images/blog.png";
    } else {
        $thumbImage = Yii::app()->baseUrl."/images/file.png";
    }
?>
<div class="row" id="content-<?=$data->id; ?>">
    <div class="span1">
        <label class="checkbox">
            <input type="checkbox">
        </label>
    </div>
    <div class="span2">
        <div class="image-thumb">
            <a href="#imgModal" class="img-modal thumbnail-img" data-img-url="<?php echo $data->media_url;?>" data-type="<?php echo $data->type;?>" data-title="<?php echo $data->title;?>" >
                <img src="<?php echo $thumbImage;?>">
            </a>
            <div class="icons">
                <p class="pull-left"><i class="heart"></i> <?=$data->vote; ?></p>
                <p class="pull-right"><i class="<?=$data->type; ?>"></i></p>
            </div>
        </div>
    </div>
    <div class="span6">
        <blockquote class="list-body">
            <h4><span class="title"><?php echo CHtml::encode($data->title); ?></span></h4>
            <!--p><?php echo substr( CHtml::encode($data->description), 0, 150)."&nbsp;&nbsp;"; ?><a class="btn-link">[...]</a></p -->
            <p><?php echo strip_tags($data->description); ?></p>
            <p class="posted-by"><small>Posted by - <a class="btn-link"><em><?=$data->user->first_name; ?></em></a><!-- from <a class="btn-link"><em>Bangalore, India</em></a --></small></p>
        </blockquote>
    </div>
    <div class="span3">
        <div class="list-action">
            <div>
                <i class="icon-calendar"></i> <?=date('r', strtotime($data->date_modified)); ?>
            </div>
            <?php if ($is_ugc){ ?>
                <?php if ($data->status == 'under_review') { ?>
                <span id="btn-set-<?=$data->id; ?>">
                <span class="button-bar">
                    <?php echo CHtml::link(
                            'Approve',
                            '#',
                            array(
                                'class'=>"ugc-action btn btn-toggle-large btn-info",
                                'data-type'=>"content",
                                'data-action'=>"approved",
                                'data-value'=> $data->status,
                                'data-gallery'=>$data->gallery_id,
                                'id'=>$data->id,
                                'title'=>"Approve Content",
                                'data-group'=>$data->type,
                            )
                        ); ?>
                    </span>
                    <span class="button-bar">
                    <?php echo CHtml::link('Reject',
                            '#',
                            array(
                                'class'=>"ugc-action btn btn-toggle-large btn-warning",
                                'data-type'=>"content",
                                'data-action'=>"rejected",
                                'data-value'=> $data->title,
                                'data-gallery'=>$data->gallery_id,
                                'id'=>$data->id,
                                'title'=>"Reject Content",
                                'data-group'=>$data->type,
                                //'confirm' => 'Are you sure you want to Reject this.'
                            )
                        ); ?>
                    </span>
                    <span class="button-bar">
                    <?php echo CHtml::link('<i class="icon-pencil"></i> Edit', array('content/update', 'id'=>$data->id),array(
                            'class'=>"btn btn-toggle-large",
                            'data-type'=>"content",
                            'data-action'=>"edit",
                            'id'=>$data->id,
                            'title'=>"Edit Gallery",
                            'data-group'=>$data->type,
                        )); ?>
                    </span>
                </span>
                <button class="btn btn-toggle-large btn-success" type="button" id='ugc-approved-<?=$data->id; ?>' style="display: none">Approved</button>
                <button class="btn btn-toggle-large btn-danger" type="button" id='ugc-rejected-<?=$data->id; ?>' style="display: none">Rejected</button>
                <?php } else if ($data->status == 'approved') { ?>
                    <button class="btn btn-toggle-large btn-success" type="button">Approved</button>
                <?php } else if ($data->status == 'rejected') { ?>
                    <button class="btn btn-toggle-large btn-danger" type="button">Rejected</button>
                <?php } ?>
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
</div>