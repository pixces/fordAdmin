<?php
/* @var $this WidgetController */
/* @var $model Widget */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'widget-form',
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
	<h3><?php  if($model->isNewRecord){ echo 'Create';}else{echo 'Update';}?> Partners Widget</h3>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
        <?php echo CHtml::hiddenField('is_new' , (!$model->isNewRecord) ?'0':'1', array('id' => 'is_new'));?>
        <?php echo CHtml::hiddenField('widget_id' , (!$model->isNewRecord) ?$model->id:'');?>
	<?php echo $form->hiddenField($model,'widget_type_id',array('id'=>'widget_type_id')); ?>
        <?php echo $form->hiddenField($model,'widget_type',array('id'=>'widget_type_id','value'=>$data['widgetType'])); ?>
	
    <div class="control-group">
        <?php echo $form->labelEx($model,'Widget Name'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Unique name for this widget. To be used as identifier for all internal purpose.</span>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Partners Logo'); ?>
        <div class="controls">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Partner Logo</th>
                    <th>Hyperlink URL</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class='add-more-cont'>
                   <?php 
                        if((!$model->isNewRecord)){
                            $ad=0;
                            foreach ($modelData->link_url as $value){
                                $ad++;
                            }
                      
                            $count = 1;
                        foreach ($modelData->link_url as $value){
                            $image ='image'.$count;
                            $preview ='preview'.$count;
                       ?>
                    <tr id="row-1">
                    <td><?php echo $form->fileField($model,$image,array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>$preview)); ?>
                    <img id="<?php echo $preview?>" src="<?php if(($modelData->$image))echo $modelData->$image;?>" alt="your image" style="<?php if(($model->isNewRecord)){ ?> display:none;<?php }?> width:150px"/>
                    </td>
                    <td><?php echo $form->textField($model,"link_url[$count]",array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge','value'=>$value)); ?></td>
                    <?php if($ad == $count){?>
                    <td><span class="add-mre"><i class="icon-plus-sign"></i> </span>
                    
                    </td>
                    <?php }?>   
                    <?php echo $form->hiddenField($model,'add-more-count',array('id'=>'add-more-count','value'=>$ad+1)); ?>
                    <td></td>
                    </tr>
                        <?php $count++;}}else{?>
                        <tr id="row-1">
                            <td><?php echo $form->fileField($model,'image1',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview1')); ?>
                                <img id="preview1" src="#" alt="your image" style="display:none; width:150px"/></td>
                            <td><?php echo $form->textField($model,'link_url[1]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge')); ?></td>
                            
                    
                            <td></td>
                        </tr>
                        <tr id="row-2">
                            <td><?php echo $form->fileField($model,'image2',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview2')); ?>
                            <img id="preview2" src="#" alt="your image" style="display:none; width:150px"/></td>
                            <td><?php echo $form->textField($model,'link_url[2]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge')); ?></td>
                            
                            <td><a href=""></td>
                        </tr>
                        <tr id="row-3">
                            <td><?php echo $form->fileField($model,'image3',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview3')); ?>
                                <img id="preview3" src="#" alt="your image" style="display:none; width:150px"/></td>
                            <td><?php echo $form->textField($model,'link_url[3]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge')); ?></td>
                            <td><a href=""></td>
                        </tr>
                        <tr id="row-4">
                            <td><?php echo $form->fileField($model,'image4',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview4')); ?>
                                <img id="preview4" src="#" alt="your image" style="display:none; width:150px"/></td>
                            <td><?php echo $form->textField($model,'link_url[4]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge')); ?></td>
                            <td><span class="add-mre"><i class="icon-plus-sign"></i> </span>
                        </tr>
                       
                   <?php }?>
                </tbody>
            </table>
             
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::button($model->isNewRecord ? 'Create Widget' : 'Update Widget', array('class'=>'btn btn-primary','id'=>'submit-content')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
