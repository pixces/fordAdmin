<?php

class ContentController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';
    private $model;
    private $data;
    private $userId = 1;
    /**
     * @var private property containing the associated Gallery model instance.
     */
    private $_gallery = null;

    /**
     * @return gallery model instance
     * to which the content belongs
     */
    public function getGallery()
    {
        return $this->_gallery;
    }

    protected function loadGallery($gallery_id)
    {
        //if the gallery property is null create it based on the id provided
        if ($this->_gallery === null) {
            $this->_gallery = Gallery::model()->findByPk($gallery_id);
            if ($this->_gallery === null) {
                throw new CHttpException(404, 'The requested gallery does not exist');
            }
        }
        return $this->_gallery;
    }


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            'GalleryContext - update, view', //check for gallery on all cases except update or view
        );
    }

    /**
     * In-class defined filter method, configured for use in the above filters() method
     * It is called before the actionCreate() action method is run inorder to ensure a proper project context
     */
    public function filterGalleryContext($filterChain)
    {

        $gallery_id = null;
        if (isset($_GET['gallery'])) {
            $gallery_id = $_GET['gallery'];
        } else if (isset($_POST['gallery'])) {
            $gallery_id = $_POST['gallery'];
        }

        $this->loadGallery($gallery_id);

        $filterChain->run();
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            /*
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),*/
            array('allow', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id), 'data' => $this->data
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     */
    public function actionCreate()
    {
        $model = new Content;
        $model->gallery_id = $this->_gallery->id;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        //print_r($this->data);

        $this->render('create', array(
            'model' => $model,
            'gallery' => $this->getGallery(),
            'youtubeApiUrl' => $this->getDbConfigByKey('youtube_api_url')
        ));
    }

    public function actionAddYoutube($post)
    {
        $this->model = new Content;
        
         //need to change to the logged in user id
        
        if($post['is_new'] == 0)
            $this->model=$this->loadModel($post['Content']['id']);
        
        $this->model->attributes = $post['Content'];
        $this->model->user_id = $this->userId;
        
        $this->model->status = ($this->_gallery->is_moderated) ? 'pending' : 'active';

        if ($this->model->save()) {
           
            $model = new ContentView;
            
            if($post['is_new'] == 0){
                $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
                $criteria->compare('content_id', $post['Content']['id']);
                ContentView::model()->deleteAll($criteria);
            }
            $model->content_id = $this->model->id;
            $model->environment_id = Environment::getEnvironmentByName('youtube');
            $model->views = $post['view'];
            if($model->save()) {
                echo 'Succesfully Added The Content';
                exit;
            } else {
                print_r($model->errors());
                echo 'Some Error Occured';
                exit;
            }
        } else {
            echo 'Some Error Occured';
            exit;
        }
        
    }

    public function actionAddImage($post, $files)
    {   
        $this->data['type'] = 'image';
        $this->model = new Content;
        if($post['is_new'] == 0){
            $this->model=$this->loadModel($post['Content']['id']);
            $thumbImageName = $this->model->thumb_image;
            $alternativeImageName = $this->model->alternate_image;
        }
        
        if (!empty($files['Content']['name']['thumb_image'])) {
            $image_info = getimagesize($files["Content"]["tmp_name"]['thumb_image']);

            $image_width = $image_info[0];
            $image_height = $image_info[1];

            //thumb image
            $thumbImageName = ImageUpload::uploadImage($this->model, 'thumb_image', $this->getDbConfigByKey('thumb_width'), $this->getDbConfigByKey('thumb_height'), 'contentImageName', 'thumb');

            //original
            $alternativeImageName = ImageUpload::uploadImage($this->model, 'thumb_image', $image_width, $image_height, 'contentImageName', 'default');
            
          

        }
        
        $this->model->attributes = $post['Content'];
        $this->model->user_id = $this->userId; //need to change to the logged in user id
        $this->model->thumb_image = $thumbImageName;
        $this->model->alternate_image = $alternativeImageName;
        /*
         * if the gallery is marked as moderated
         * set the status to pending
         */
        $this->model->status = ($this->_gallery->is_moderated) ? 'pending' : 'active';

        if ($this->model->save()) {
            echo 'Succesfully Added The Content';
            exit;
        } else {
            echo 'Some Error Occuried';
            exit;
        }


    }

    public function actionAddText($post)
    {
        $model = new Content;
        if($post['is_new'] == 0)
            $model=$this->loadModel($post['Content']['id']);
        $model->attributes = $post['Content'];
        $model->user_id = $this->userId; //need to change to the logged in user id

        if ($model->save()) {
            echo 'Succesfully Added The Content';
            exit;
        } else {
            echo 'Some Error Occuried';
            exit;
        }
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
        $criteria->compare('content_id', $model->id);
        $contentViews = ContentView::model()->find($criteria);
        $view=0;
        if(isset($contentViews->views)){
            $view = $contentViews->views;
        }
        
        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id, 'gallery_id' => $this->data['gallery_id']));
            }
        }
        //echo "shittt";print_r($_POST);exit;
        $this->render('update', array(
            'model' => $model,'youtubeApiUrl' => $this->getDbConfigByKey('youtube_api_url'),
            'data' => array('type' =>$model->type,'views'=>$view)
        ));
    }

    /**
     * Delete a particlar model
     * based on the gallery selected
     * ..if gallery not provided throws errors
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
                    $result = array('status' => 'success', 'message' => sprintf('Content %s successfully deleted.',$model->title));
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot delete Content.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }


        /*
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index', 'gallery_id' => $this->data['gallery_id']));
        */
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
        $criteria->compare('gallery_id', $this->data['gallery_id']);
        $dataProvider = new CActiveDataProvider('Content', array('criteria' => $criteria));
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'data' => $this->data
        ));
    }

    /**
     * loads the content form depending on the type
     */
    public function actionLoadContentForm()
    {
        $model = new Content;
        $model->gallery_id = $this->_gallery->id;

        if (isset($_POST['contentType'])) {
            $data['type'] = $_POST['contentType'];
            $this->renderPartial('_form', array('model' => $model, 'data' => $data));
            exit;
        }
    }


    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Content('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Content']))
            $model->attributes = $_GET['Content'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Content the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Content::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Content $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'content-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * save the content
     */
    public function actionSaveContent()
    {   
        if (isset($_POST['Content'])) {
            switch ($_POST['Content']['type']) {
                case 'video' :
                    $this->actionAddYoutube($_POST);
                    break;
                case 'image':
                    $this->actionAddImage($_POST, $_FILES);
                    break;
                case 'text':

                    $this->actionAddText($_POST);
                    break;
            }

        }
    }


    /**
     * @author Zainul
     */
    public function actionUpdateStatus()
    {
        if (Yii::app()->request->isPostRequest) {

            if (isset($_POST['id']) && $_POST['data'] != '') {

                $is_ugc = false;
                $id = $_POST['id'];
                $currentStatus = $_POST['data'];

                $model = $this->loadModel($id);

                if ($_POST['is_ugc'] && !empty($_POST['is_ugc'])){
                    $is_ugc = true;
                    //get the details of the submitting user
                    $user = User::model()->findByPk($model->user_id);

                    //update the status based on the type
                    if ($_POST['type'] == 'video' && $_POST['data'] == 'approved'){
                        $contentStatus = 'processing';
                    } else {
                        $contentStatus = $_POST['data'];
                    }

                } else {
                    $contentStatus = ($currentStatus == 'active' ? 'inactive' : 'active');
                }

                //now update the status to the model;
                $model->status = $contentStatus;

                //save the model;
                if ($model->save()) {
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Content status updated to <b>\'%s\'</b>', $model->status), 'newstatus' => $model->status);

                    // log it to the activity Logs
                    $activityModel = new ActivityLogs;
                    $activityModel->activity ='moderation';
                    $activityModel->comment = $model->status;
                    $activityModel->user_id = Yii::app()->user->getId();;
                    $activityModel->content_id =$id;
                    $activityModel->save();

                    //also send email to the user;
                    //only if the content if from UGC Submission
                    if ($is_ugc &&  $contentStatus != 'processing'){
                        $this->sendMail(
                            array(
                                'email'=> $user->email,
                                'name'=> $user->first_name." ".$user->last_name,
                                'profile_url'=>"https://grabyourdream.com/user/profile/".$user->id."?lang=en&env=base",
                                'title' => $model->title,
                            ),
                            $contentStatus
                        );
                    }
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot update content status.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function sendMail($data,$type='approved'){

        if ($type == 'approved'){
            $view = 'submission-accepted';
            $subject = "[GrabYourDream] Your submission is approved.";
        } else if ($type == 'rejected'){
            $view = 'submission-rejected';
            $subject = "[GrabYourDream] Your submission is rejected.";
        }

        $mail = new Mailer();
        if ( $mail->sendMail($view,$data['email'],$subject,$data) ){
            return true;
        } else {
            return false;
        }
    }


    /*
    public function beforeAction($action)
    {

        $this->model = new Content;
        $gallery_id = Yii::app()->request->getParam('gallery');
        $gallery = new Gallery;
        $galleryData = $gallery->findByPk($gallery_id);
        if (!empty($galleryData)) {
            $this->data = array('gallery_id' => $gallery_id);
            return true;
        } else {
            echo "why";
            exit;
            $this->redirect(array('gallery/index'));
        }
    }

    public function beforeAction($action)
    {

        $this->model = new Content;

        $gallery_id = Yii::app()->request->getParam('gallery_id');
        $gallery = new Gallery;
        $galleryData = $gallery->findByPk($gallery_id);
        if (!empty($galleryData)) {
            $this->data = array('gallery_id' => $gallery_id);
            if ($action->id != 'loadcontentform' && $action->id != 'savecontent') {

                $gallery_id = Yii::app()->request->getParam('gallery');

                $dataProvider = new CActiveDataProvider('Gallery', array(
                    'criteria' => array(
                        'condition' => 'id=:id',
                        'params' => array(':id' => $gallery_id),

                    )));
                if (count($dataProvider->getData()) > 0) {
                    $this->data = array('gallery' => $dataProvider, 'gallery_id' => $gallery_id);
                    return true;
                } else {
                    echo "why";
                    exit;

                    $this->redirect(array('gallery/index'));
                }
            }
            return true;
        }
    } */


}
