<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'List Gallery', 'url'=>array('index')),
	/*
	array('label'=>'Create Gallery', 'url'=>array('create')),
	array('label'=>'Update Gallery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Gallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this gallery?')),
	*/
	array('label'=>'Create Content', 'url'=>array('content/create','gallery'=>$model->id)),
);
?>

<?php $this->renderPartial('_header', array('data'=>$model, 'is_ugc'=>$is_ugc)); ?>
<div>
    <div class="form-inline">
        <form class="form-inline" method="GET" action="">
            <fieldset>
                <select class="" name="cType">
                    <option value="all">All Content Type</option>
                    <option value="image">Only Photo</option>
                    <option value="video">Only Video</option>
                    <option value="file">Only Files</option>
                    <option value="blog">Only Blog</option>
                </select>
                <select class="" name="cStatus">
                    <option value="all">All Status</option>
                    <option value="under_review">Pending Approval</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
                <button class="btn btn-info" type="submit">Filter</button>
            </fieldset>
        </form>
    </div>
    <div class="formHeading">
        <div class="row">
            <div class="span2">
                <label class="checkbox">
                    <input type="checkbox">
                </label>
            </div>
            <div class="span10"></div>
        </div>
    </div>
    <div class="contentListing">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$contentDataProvider,
            'viewData' => array( 'is_ugc' => $is_ugc ),
            'itemView'=>'/content/_view'
        ));
        ?>
    </div>
    <!--
    <div class="formHeading">
        <div class="row">
            <div class="span2">
                <label class="checkbox">
                    <input type="checkbox">
                </label>
            </div>
            <div class="span10">
                <select>
                    <option>Select Lorem</option>
                    <option>Lorem ipsum21</option>
                    <option>Lorem ipsum22</option>
                    <option>Lorem ipsum23</option>
                    <option>Lorem ipsum24</option>
                </select>
            </div>
        </div>
    </div>
    -->
    <div class="">
        <div class="row">
            <div class="span6">
                <div class="submission-type">
                    <ul>
                        <li><i class="photo"></i> Photo</li>
                        <li><i class="video"></i> Video</li>
                        <li><i class="pdf"></i> PDF</li>
                        <li><i class="ppt"></i> PPT/PPS</li>
                        <li><i class="doc"></i> DOC</li>
                        <li><i class="blog"></i> Text/Blog</li>
                    </ul>
                </div>
            </div>
            <!--
            <div class="span6">
                <div class="pagination pagination-right">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            -->
        </div>
    </div>
</div>

<!-- Modal to show the preview --->
<div id="imgModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
        <span class="image">
            <img src="<?=Yii::app()->baseUrl."/images/loaderA64.gif"; ?>">
        </span>

    </div>
</div>

<!-- Modal code ends --->

<script>
    $(function() {
        $(".content-action").live("click",ACTION.listAction);
        $(".ugc-action").live("click",ACTION.ugcAction);

        $('.img-modal').click(function (e) {

        var itemURL = $(this).attr('data-img-url');
        var itemTitle = $(this).attr('data-title');
        var itemType =  $(this).attr('data-type');

        if (itemType == 'pps' || itemType == 'ppt' || itemType == 'doc' || itemType == 'docx' || itemType == 'pptx' || itemType == 'pdf'){
            itemType = 'file';
        }
            //replace the loaded image with the default loader;
            $("#imgModal .image img").attr('src',"<?=Yii::app()->baseUrl."/images/loaderA64.gif"; ?>");

            console.log( itemURL +" : "+itemTitle+" : "+ itemType);

            if (itemType != 'blog') {
            }
            if (itemType == 'video' || itemType == 'file' ){
                //open in the new tab
                var url = itemURL;
                var win=window.open(url, '_blank');
                win.focus();
            }
            if (itemType == 'image'){
                var markup = '<img src="'+itemURL+'">';
                //add title and the new image
                $("#imgModal h3#myModalLabel").text(itemTitle);
                $("#imgModal .image").html(markup);
                $('#imgModal').modal('show');

            }
           return false;
        });


    });
</script>
