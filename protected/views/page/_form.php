<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
        'class'=>'form-horizontal',
    )
)); ?>
    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model,'name'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge', 'data-action'=>'elem-title')); ?>
            <span class="help-block">All contents will be identified by the gallery name</span>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Custom_url'); ?>
        <div class="controls">
            <?php echo "<b>http://coxnkings.position2.com/in_en/youtube/</b> ".$form->textField($model,'seo_title',array('size'=>60,'maxlength'=>255,'class'=>'span3 sef-title')); ?>
            <span class="help-block">The final url of the page. Will be used in Facebook, Youtube as embed url.</span>
            <?php echo $form->error($model,'seo_title'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
            <span class="help-block">All contents will be identified by the gallery name</span>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'description'); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'description',array('rows'=>6, 'class'=>'input-xxlarge')); ?>
            <span class="help-block">All contents will be identified by the gallery name</span>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Page Thumbnail Image'); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'thumb',array('size'=>60,'maxlength'=>255,'class' =>'image_upload')); ?>
            <span class="help-block">PNG, JPEG or GIF image of 50px x 50px. Will be used when page is shared on Social Media.</span>
            <?php echo $form->error($model,'thumb'); ?>
            <img id="preview" src="<?php if($model->thumb)echo $model->thumb;?>" alt="your image" style="<?php if(!$model->thumb){ ?> display:none;<?php }?>height:150px;width:150px"/>
            <?php if($model->thumb) { ?>
            <?php }?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Page Share Text'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'share_text',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Will be used if page is shared on Twitter or Email</span>
            <?php echo $form->error($model,'share_text'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Theater Share text'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'theater_share_text',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Will be used while sharing the theater from this page.</span>
            <?php echo $form->error($model,'theater_share_text'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Page Share Text'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'share_url',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Url will be used as share url on various social media. (optional)</span>
            <?php echo $form->error($model,'share_url'); ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_default'); ?>
                <?php echo $form->labelEx($model,'is_default'); ?>
            </label>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Page Design Basic'); ?>
        <div class="controls">
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'header'); ?>
                <?php echo $form->labelEx($model,'header'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'footer'); ?>
                <?php echo $form->labelEx($model,'footer'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'partners'); ?>
                <?php echo $form->labelEx($model,'partners'); ?>
            </label>
        </div>
    </div>

    <div class="control-group">
        
        <?php echo $form->labelEx($model,'Page Gallery'); ?>
        <div class="controls">
            <?php   //echo $form->labelEx($model,'Page Gallery');
                    
                    // edit mode check for the gallery associated with it
                    if(!empty($page_galleries->gallery_id)){
                        $model->is_gallery = 1;
                        $model->gallery_id = $page_galleries->gallery_id;    
                    }
                
                 echo $form->radioButtonList($model,'is_gallery', array(1=>'Yes', 0=>''), array('separator'=>'No ','labelOptions'=>array('style'=>'display:inline'),'class'=>'is_gallery')); 
       ?>
         <?php //foreach ($galleries as $gallery){?>
            <?php echo $form->dropDownList($model,'gallery_id',$galleries); ?>
           
            <?php //}?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Page Widgets'); ?>
        <div class="controls">
            <?php //echo $form->textField($model,'share_url',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
           <!-- <span class="help-block">Url will be used as share url on various social media. (optional)</span> -->
            <?php //echo $form->error($model,'share_url'); ?>
            <?php 
            $ignoreArray = array();
            foreach ($widgets as $widget){?>
            <?php if(!in_array($widget->widget_type_id, $ignoreArray)){?>
            <label class="checkbox inline">
               <?php if((in_array($widget->id,$page_widgets))){?>
                  <?php echo $form->checkBox($model,'widget[]',array('value'=>$widget->id,'checked'=>'checked')); ?>
               <?php }else{ ?>
                <?php echo $form->checkBox($model,'widget[]',array('value'=>$widget->id)); ?>
               <?php }?>
                <?php echo $form->labelEx($model,$widget->name); ?>
            </label>
            <?php }}?>
            
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Add Page' : 'Save Page Details', array('class'=>'btn btn-primary')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript" >
    $(document).ready(function(){
         <?php if(empty($page_galleries->gallery_id)){ ?>
                    $('#Page_gallery_id').hide();
         <?php } ?>
       $('.is_gallery').click(function(){
           if ($(this).is(':checked')) {
                $('#Page_gallery_id').toggle();
        }
           
       });
    });
    </script>
