 <?php 
 $modelData = array();
if(!$model->isNewRecord)
    $modelData = json_decode ($model->data);

 $this->renderPartial('_'.$data['widgetForm'], array('model'=>$model,'data'=>$data,'modelData'=>$modelData)); ?>

</div><!-- form -->