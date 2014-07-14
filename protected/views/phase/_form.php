<?php
/* @var $this PhaseController */
/* @var $model Phase */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phase-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'phase_name'); ?>
		<?php echo $form->textField($model,'phase_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'phase_name'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'landing_page'); ?><span class="required">*</span>
                <?php 
                        $landingPageId ;
                        $associatePageId =array();
                       if(isset($phases)){
                    
                        foreach ($phases as $ps){
                            if($ps->link_type == 'landing')
                                $landingPageId = $ps->page_id;
                            else
                                array_push ($associatePageId, $ps->page_id);
                        }
                    ?>
               <?php echo $form->dropDownList($model,'landing_page',$landing_pages,array('options' => array($landingPageId=>array('selected'=>true)))); ?>
                
                <?php }else{?>
		<?php echo $form->dropDownList($model,'landing_page',$landing_pages); ?>
                <?php }?>
		<?php echo $form->error($model,'landing_page'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'associate_page'). ' : '; ?>
            <div class="controls">
            <?php foreach ($associate_pages as $key =>$pages){?>
            <?php if(in_array($key,$associatePageId)){?>
            <?php echo $form->checkBox($model,'associate_page[]',array('value'=>$key,'checked'=>'checked')); ?>
            <?php }else{?>
            <?php echo $form->checkBox($model,'associate_page[]',array('value'=>$key)); ?>
            <?php }?>
            <?php echo $form->labelEx($model,$pages); ?>
            <?php }?>
            </div>
		</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->