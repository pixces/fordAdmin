<?php
//check and get the profile image
if ($data->userProfiles->profile_image){
    $thumbImage = $data->userProfiles->profile_image;
} else {
    $thumbImage = Yii::app()->baseUrl."/images/no-image.png";
}

//get the content details
$totalVotes = 0;
$contentArray = array();

if($data->contents){
    foreach($data->contents as $content){
        if($content->is_submitted && $content->status == 'approved'){
            if ($content->type == 'video' || $content->type == 'image' || $content->type == 'photo'){
                $cThumbImage = $content->thumb_image;
            } else if ($content->type == 'blog' || $content->type == 'text'){
                $cThumbImage = Yii::app()->baseUrl."/images/blog.png";
            } else {
                $cThumbImage = Yii::app()->baseUrl."/images/file.png";
            }
            $contentArray[] = array('thumb_image'=>$cThumbImage, 'vote'=>$content->vote,'url'=>$content->media_url,'type'=>$content->type);
            $totalVotes += $content->vote;
        }
    }
}

//get the details of the button
$btn['color'] = 'btn-warning';
$btn['title'] = 'Mark Shortlisted';
$btn['winner'] = 'hidden';

if ($data->is_shortlisted){
    $btn['color'] = 'btn-success';
    $btn['title'] = 'UnMark Shortlisted';
    $btn['winner'] = 'show';
}
?>
<?php if(count($contentArray) > 0){?>
<div class="row" id="user-<?=$data->id; ?>">
    <div class="span1">
        <label class="checkbox">
            <input type="checkbox">
        </label>
    </div>
    <div class="span2">
        <div class="image-thumb">
            <a href="#imgModal" class="img-modal thumbnail-img" data-img-url="" data-type="" data-title="" >
                <img src="<?php echo $thumbImage;?>">
            </a>
            <div class="icons">
                <p class="pull-left"><i class="heart"></i> <?=$totalVotes; ?></p>
                <p class="pull-right"></p>
            </div>
        </div>
    </div>
    <div class="span6">
        <blockquote class="list-body">
            <h4><span class="title"><a href="https://grabyourdream.com/user/profile/<?=$data->id;?>" target="_blank"><?php echo $data->userProfiles->full_name; ?></a></span></h4>
            <!--p>Description<a class="btn-link">[...]</a></p -->
            <p><?php echo $data->userProfiles->about_me; ?></p>
            <p class="posted-by"><small><em><?php echo ucwords(strtolower($data->userProfiles->occupation)); ?></em> | from <em><?php echo ucwords(strtolower($data->userProfiles->city)); ?></em></small></p>
            <?php if ($contentArray) {?>
            <div class="row-fluid">
                <ul class="thumbnails">
                    <?php foreach($contentArray as $content){ ?>
                        <li class="span2">
                            <div class="thumbnail">
                                <img alt="" src="<?=$content['thumb_image']; ?>">
                                <div>
                                    <p class="pull-left"><i class="icon-heart"></i> <?=$content['vote']; ?></p>
                                    <p class="pull-right"><i class="<?=$content['type']; ?>"></i></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } else { ?>
                <span class="label label-important">No UGC Content submitted by this user.</span>
            <?php } ?>
        </blockquote>
    </div>
    <div class="span3">
        <div class="list-action">
            <div>
                <i class="icon-calendar"></i> <?=date('r', strtotime($data->date_modified)); ?>
            </div>
            <span id="btn-set-<?=$data->id; ?>">
                <span class="button-bar">
                    <?php if (!$data->is_shortlisted) { ?>
                        <?php echo CHtml::link(
                            'Mark Shortlisted',
                            '#',
                            array(
                                'class'=>"shortlist-action btn btn-toggle-large btn-warning",
                                'data-type'=>"users",
                                'data-action'=>"shortlist",
                                'data-value'=>$data->is_shortlisted,
                                'id'=>$data->id,
                                'title'=>"Mark as Shortlisted",
                                'data-group'=>"shortlist",
                            )
                        ); ?>
                    <?php } else if ($data->is_shortlisted && !$data->is_winner)  { ?>
                        <?php echo CHtml::link(
                            'Mark Winner',
                            '#',
                            array(
                                'class'=>"winner-action btn btn-toggle-large btn-info",
                                'data-type'=>"users",
                                'data-action'=>"winner",
                                'data-value'=>$data->is_winner,
                                'id'=>$data->id,
                                'title'=>"Mark user as Winner",
                                'data-group'=>'',
                            )
                        ); ?>
                        <?php echo CHtml::link(
                        'UnMark Shortlisted',
                        '#',
                        array(
                            'class'=>"shortlist-action btn btn-toggle-large btn-success",
                            'data-type'=>"users",
                            'data-action'=>"shortlist",
                            'data-value'=>$data->is_shortlisted,
                            'id'=>$data->id,
                            'title'=>"UnMark as Shortlisted",
                            'data-group'=>"shortlist",
                        )
                    ); ?>
                    <?php } else if ($data->is_winner)  { ?>
                        <?php echo CHtml::link(
                            'UnMark Winner',
                            '#',
                            array(
                                'class'=>"winner-action btn btn-toggle-large btn-info",
                                'data-type'=>"users",
                                'data-action'=>"winner",
                                'data-value'=>$data->is_winner,
                                'id'=>$data->id,
                                'title'=>"Mark user as Winner",
                                'data-group'=>'',
                            )
                        ); ?>
                    <?php } ?>
                </span>
        </div>
    </div>
</div>
<?php }?>