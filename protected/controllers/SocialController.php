<?php

class SocialController extends Controller
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
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('auth'),
                'users'=>array('*'),
            ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('*'),
				'users'=>array('admin'),
			),
		);
	}

    /**
     * Index action will display the moderation page
     * for all the social posts
     * in order of their date_entry into the database
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('SocialPost',array(
            'criteria' => array(
                'condition' => 'post_status != :status',
                'order'=> 'date_created DESC',
                'params'=>array(
                    ':status' => 'deleted',
                ),
            ),
            'pagination' => array('pageSize' => 25),
        ));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SocialPost;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SocialPost']))
		{
			$model->attributes=$_POST['SocialPost'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['SocialPost']))
		{
			$model->attributes=$_POST['SocialPost'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
        if(Yii::app()->request->isPostRequest){
            $id = $_POST['id'];
            if ( $this->loadModel($id)->delete() ){
                //return the json data
                $result = array('status' => 'success', 'message' => sprintf('Post deleted successfully.'));
            } else {
                //throw error
                $result = array('status' => 'error', 'message' => 'Cannot delete post.');
            }
            echo CJSON::encode($result);
            Yii::app()->end();
        }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax']))
		//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    public function actionUpdateStatus(){

        if(Yii::app()->request->isPostRequest)
        {
            if (isset($_POST['id']) && $_POST['data'] != ''){
                $id = $_POST['id'];
                $currentStatus = $_POST['data'];

                $model = $this->loadModel($id);
                $model->post_status = ($currentStatus == 'new' || $currentStatus == 'rejected') ? 'approved' : 'rejected';

                try {
                    $model->save();
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Galery status updated to <b>\'%s\'</b>', $model->post_status), 'newstatus' => $model->post_status);
                } catch (Exception $e){
                    //throw error
                    $result = array('status' => 'error', 'message' => $e->getMessage());
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SocialPost('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SocialPost']))
			$model->attributes=$_GET['SocialPost'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SocialPost the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SocialPost::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SocialPost $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='social-post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionPing(){
        //Yii::import('application.components.HybridAuthIdentity');
        $path = Yii::getPathOfAlias('ext.HybridAuth');
        require_once $path . '/hybridauth-' . HybridAuthIdentity::VERSION . '/hybridauth/index.php';
    }

    public function actionAuth(){

        $path = Yii::getPathOfAlias('ext.HybridAuth');
        require_once $path . '/hybridauth-' . HybridAuthIdentity::VERSION . '/hybridauth/index.php';

    }

}
