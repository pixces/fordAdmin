<?php
/* @var $this ContentController */
/* @var $model Content */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/gallery.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/content/content.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/jquery.form.js',CClientScript::POS_END);
?>
<?php $this->renderPartial('_header', array('data'=>$gallery)); ?>
<youtubeApiUrl href ="<?php echo $youtubeApiUrl;?>" />
<?php echo CHtml::button('Add a Youtube Content', array('class'=>'add-cnt','data-attr'=>'video','gallery'=>$model->gallery_id))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
<?php echo CHtml::button('Add a Image Content', array('class'=>'add-cnt','data-attr'=>'image','gallery'=>$model->gallery_id))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
<?php echo CHtml::button('Add a Text Content', array('class'=>'add-cnt','data-attr'=>'text','gallery'=>$model->gallery_id))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
<div class="content-form-container">
</div>