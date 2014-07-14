<?php

class GalleryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
        return array(
            array('allow',
                'actions'=>array('index','view'),
                'roles'=>array('adminUser','admin'), // use for listing all authors and viewing 1 author
            ),
            array('allow',
                'actions'=>array('admin'),
                'roles'=>array('adminUser','admin'), // "manage" page with search
            ),
            array('allow',
                'actions'=>array('create'),
                'roles'=>array('admin'),
            ),
            array('allow',
                'actions'=>array('update'),
                'roles'=>array('adminUser','admin'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'roles'=>array('admin'),
            ),
            /*
            array('deny',
                'users'=>array('*'), // deny all other action/role combinations
            ),*/
        );

    }

	/**
	 * Displays a particular model.
	 */
    public function actionView()
	{
        $id = $_GET['id'];

        //get the details of this gallery to check if this is not a ugc gallery
        $gallery = $this->loadModel($id);
        $is_ugc = $gallery->is_ugc;

        $contentType = isset($_GET['cType']) ? $_GET['cType'] : 'all';
        $contentStatus = isset($_GET['cStatus']) ? $_GET['cStatus'] : 'under_review';



        if ($is_ugc){
            $condition = " t.gallery_id = :galleryId";

            //content type
            if ($contentType != 'all'){
                //image, video, file, blog
                if ($contentType == 'blog'){
                    $condition .= " AND t.type IN ('text','blog') ";
                }
                else if ($contentType == 'file'){
                    $condition .= " AND t.type IN ('ppt','pdf','doc') ";
                } else {
                    $condition .= " AND t.type = '".$contentType."' ";
                }
            }
            //get the status filter
            if ($contentStatus != '' && $contentStatus != 'all'){
                 $condition .= " AND t.status = '".$contentStatus."' ";
            } else {
                $condition .= " AND t.status IN ('under_review','approved','rejected') ";
            }

            //echo $condition;

            $contentDataProvider = new CActiveDataProvider('Content',array(
                'criteria' => array(
                    'with' => 'user',
                    'condition' => $condition,
                    'order' => 't.date_created DESC',
                    'params'=>array(
                        ':galleryId' => $this->loadModel($id)->id
                    ),
                ),
                'pagination' => array('pageSize'=>100),
            ));
        } else {
            $contentDataProvider = new CActiveDataProvider('Content',array(
                'criteria' => array(
                    'condition' => 'gallery_id = :galleryId AND status != :status',
                    'order' => 'date_modified DESC',
                    'params'=>array(
                        ':galleryId' => $this->loadModel($id)->id,
                        ':status' => 'deleted',
                    ),
                ),
                'pagination' => array('pageSize'=>25),
            ));
        }

		$this->render('view',array(
            'is_ugc' => $is_ugc,
            'model' => $gallery,
            'contentDataProvider' => $contentDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gallery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{

			$model->attributes=$_POST['Gallery'];
                        if(!empty($_FILES['Gallery']['name']['thumb'])){
                            $image_info = getimagesize($_FILES["Gallery"]["tmp_name"]['thumb']);
                            $image_width = $image_info[0];
                            $image_height = $image_info[1];
                            //save the thumb image
                            $thumbImageName = ImageUpload::uploadImage($model, 'thumb',$this->getDbConfigByKey('thumb_width'),$this->getDbConfigByKey('thumb_height'),'galleryImageName','thumb');
                            //original
                            $alternativeImageName= ImageUpload::uploadImage($model, 'thumb',$image_width,$image_height,'galleryImageName','default');
                            $model->thumb = $thumbImageName;
                        }			
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Gallery']))
		{   
                    $_POST['Gallery']['thumb'] = $model->thumb;
                    $model->attributes=$_POST['Gallery'];
                    
                        if(!empty($_FILES['Gallery']['name']['thumb'])){
                            $imageName = ImageUpload::uploadImage($model, 'thumb',$this->getDbConfigByKey('thumb_width'),$this->getDbConfigByKey('thumb_height'),'galleryImageName','thumb');
                            $model->thumb = $imageName;
                        }
			if($model->save())
                $this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    /**
     *
     */
    public function actionUpdateStatus(){

        if(Yii::app()->request->isPostRequest)
        {
            if (isset($_POST['id']) && $_POST['data'] != ''){
                $id = $_POST['id'];
                $currentStatus = $_POST['data'];

                $model = $this->loadModel($id);
                $model->status = ($currentStatus == 'active' ? 'inactive' : 'active');
                if ( $model->save() ){
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Galery status updated to <b>\'%s\'</b>', $model->status), 'newstatus' => $model->status);
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot update search keyword status.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }


    /**
     * Will always be a post request
     * also will always be an ajax call
     * @throws CHttpException
     */
    public function actionDelete()
	{

        if(Yii::app()->request->isPostRequest)
        {
            if (isset($_POST['id'])){
                $id = $_POST['id'];

                $model = $this->loadModel($id);
                $model->status = 'deleted';
                if ( $model->save() ){
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Gallery %s successfully deleted.',$model->title));
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot delete gallery.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Gallery',array(
            'criteria' => array(
                'condition' => 'status != :status',
                'order' => 'date_modified DESC',
                'params'=>array(
                    ':status' => 'deleted',
                ),
            ),
            'pagination' => array('pageSize'=>25),
        ));

        //along with the total count
        $stats = array('count'=>15, 'video'=>10, 'image'=>5,'text'=> 0);
        $this->render('index',array(
			'dataProvider'=>$dataProvider,
            'content_stats'=>$stats,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gallery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    /**
     * Performs the AJAX validation.
     * @param Galleries $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'galleries-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    protected function gridStatusColumn($data,$row)
     {
       $image = $data->gallery_image;   
       if($image)
            return CHtml::image($image,'Gallery Image');
       else
           return true;
     }

    public function actionUGC(){

        //get the current ugc gallery Id
        $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
        $criteria->condition = "is_ugc = 1 AND status = 'active'";

        $model=Gallery::model()->find($criteria);

        $galleryId = $model->id;

        //redirect to this gallery

        $this->redirect(Yii::app()->createAbsoluteUrl('gallery/'.$model->id));
        Yii::app()->end();
    }


}
