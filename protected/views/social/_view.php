<?php
/* @var $this SocialPostController */
/* @var $data SocialPost */
?>
<div class="view social-panel item media" id="social-<?=$data->id; ?>">
    <input class="pull-left" type="checkbox" name="postId[]" value="<?=$data->id; ?>">
    <a class="pull-left" href="#"><img class="img-polaroid" src="<?=$data->user_profile_image; ?>"></a>
    <div class="media-body pull-left">
        <section>
            <span class="title"><?php echo CHtml::encode($data->user_name); ?></span>
            <?php if ($data->source == 'twitter') { ?>
                <span class="muted">&nbsp;&nbsp;<?='@'.CHtml::encode($data->user_screen_name); ?></span>
            <?php } ?>
        </section>
        <?php
            if($data->post_text!=""){
                $post = $data->post_text;
            } else if($data->post_story_text!=""){
                $post = $data->post_story_text;
            } else if($data->post_name!=""){
                $post = $data->post_name;
            }
        ?>
        <p><?php
                if(strlen($post) > 250 ) echo substr( CHtml::encode($post), 0, 250).' [..]';
                else echo $post;
            ?></p>
        <section class="muted"><i class="<?='icon-'.$data->source; ?>"></i> <a target="_blank" href="<?php echo CHtml::encode($data->post_url); ?>"><?=strtolower(CHtml::encode($data->post_url)); ?></a></section>
    </div>
    <div class="media-action pull-right">
        <span><i class="icon-search"></i> <?php echo (isset($data->stream->keyword)) ? $data->stream->keyword : 'post'; ?></span>
        <span><i class="icon-calendar"></i> <?=date('r', $data->date_published_ts); ?></span>
        <span class="button-bar">
            <?php $btnType = ($data->post_status == 'approved') ? 'btn-success' : ( ($data->post_status == 'rejected') ? 'btn-danger' : 'btn-warning'); ?>
            <button class="posts-action btn btn-small <?=$btnType; ?>" type="button" data-type="social" data-action="change-status" id="<?=$data->id; ?>" data-value="<?=$data->post_status; ?>" title="Click to Change Status"><?=ucwords($data->post_status); ?></button>
            <a href="javascript:void(0);" class="posts-action btn btn-mini" data-type="social" data-value="post" data-action="delete" id="<?=$data->id; ?>" title="Delete this Post"><i class="icon-trash"></i></a>
        </span>
    </div>
</div>