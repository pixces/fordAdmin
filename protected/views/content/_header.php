<div class="view header-panel">
    <div id="gallery-<?= $data->id; ?>" class="item">
        <a class="pull-left" href="<?php echo Yii::app()->request->baseUrl; ?>/gallery/<?php echo $data->id ?>">
            <img class="img-polaroid" src="<?php echo $data->thumb; ?>">
        </a>
        <div class="pull-left item-body">
            <div>
                <span class="title">Gallery: <?php echo CHtml::encode($data->title); ?></span>
                <span>(#<?=$data->id; ?>)</span>
            </div>
            <p><?php echo substr(CHtml::encode($data->description), 0, 250); ?></p>
            <div style="height: auto">
                <span class="pill pill-muted"><?php echo CHtml::link('<i class="icon-th-large"></i> Manage Gallery Content',array('gallery/view', 'id'=>$data->id)); ?></span>
                <span class="pill pill-muted"><?php echo CHtml::link('<i class="icon-list"></i> Gallery List',array('gallery/index')); ?></span>
                <span class="pill pill-muted"><?php echo CHtml::link('<i class="icon-pencil"></i> Edit Gallery',array('gallery/update', 'id'=>$data->id)); ?></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>