<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Users'=>array('index'),
    'Screening',
);
?>
<h1>
    <span class="pull-left">User Screening</span>
    <span class="pull-right h1-nested">
       <div class="form-inline" <?php if($selectedType == 'shortlist'){?>style="width: 600px;"<?php }?>>
           <form class="form-inline" method="GET" action="">
               <fieldset>
                   <?php if($selectedType == 'shortlist'){?>
                   <a href="<?php echo Yii::app()->baseUrl."/users/exportcsv"?>" class="btn btn-info">Export To Csv</a>
                   <?php }?>
                   <input class="span4 filterInput" type="text" name="uname" value="<?php echo $userName;?>" placeholder="Name">
                   <select class="" name="uType">
                       <option value="nShortlist" <?php echo ($selectedType == 'nShortlist') ? 'selected' : ''; ?>>All Non-Shortlisted</option>
                       <option value="shortlist" <?php echo ($selectedType == 'shortlist') ? 'selected' : ''; ?>>Only Shortlisted</option>
                       <option value="winner" <?php echo ($selectedType == 'winner') ? 'selected' : ''; ?>>Only Winners</option>

                   </select>
                   <button class="btn btn-info" type="submit">Filter</button>
                   
               </fieldset>
           </form>
       </div>
    </span>
    <span class="clearfix"></span>
</h1>

<div class="contentListing">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_screening',
    ));
    ?>
</div>

<script>
    $(function() {
        $(".shortlist-action").live("click",ACTION.shortlistAction);
        $(".winner-action").live("click",ACTION.winnerAction);
    });
</script>