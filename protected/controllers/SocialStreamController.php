<?php

class SocialstreamController extends Controller
{

    CONST TW_API_URL = 'https://api.twitter.com/1.1/search/tweets.json';
    CONST FB_API_URL = 'https://graph.facebook.com/search';
    CONST GP_API_URL = 'https://plus.google.com/search';

    protected $result_count = 100;
    protected $response = 'json';
    protected $callFrequency = array ('tw'=>3600, 'fb'=>3600, 'gp'=>3600);



    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view', 'create','update', 'admin','delete'),
				'users'=>array('admin'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}*/

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SocialStream;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SocialStream']))
		{
            $source = array();
            $model->attributes=$_POST['SocialStream'];
            //$model->keyword = ($model->is_phrase) ? '"'.$model->keyword.'"' : $model->keyword;
            $model->date_created = date('Y-m-d h:i:s');
            $model->status = 'active';

            //adding date of creation
            if ($model->is_twitter){
                $kwString = $this->_createKwString($model,'twitter');
                $source['tw'] = $kwString;
            }
            if ($model->is_facebook){
                $kwString = $this->_createKwString($model,'facebook');
                $source['fb'] = $kwString;
            }
            if ($model->is_gplus){
                $kwString = $this->_createKwString($model,'gplus');
                $source['gp'] = $kwString;
            }

            if ($model->save()){
                $callData['stream_id'] =$model->id;
                $callData['source'] = $source;

                $this->_saveCallDetails($callData);
            }

			$this->redirect(array('create'));
		}

        //do not display deleted records
        $dataProvider=new CActiveDataProvider('SocialStream', array(
            'criteria' => array(
                'condition' => 'status != :status',
                'params' => array(
                    ':status' => 'deleted'),
            ),
            'pagination' => array('pageSize' => 15),
        ));


        //render both the values for create model
        //as well as the dataprovider
		$this->render('create',array(
			'model'=>$model,
            'dataProvider' => $dataProvider
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

		if(isset($_POST['SocialStream']))
		{
			$model->attributes=$_POST['SocialStream'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
                    $result = array('status' => 'success', 'message' => sprintf('Stream status updated to <b>\'%s\'</b>', $model->status), 'newstatus' => $model->status);
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
                    $result = array('status' => 'success', 'message' => sprintf('Stream %s successfully deleted.',$model->title));
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
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}*/

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SocialStream');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.

	public function actionAdmin()
	{
		$model=new SocialStream('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SocialStream']))
			$model->attributes=$_GET['SocialStream'];

		$this->render('admin',array(
			'model'=>$model,
		));
	} */

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SocialStream the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SocialStream::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SocialStream $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='social-stream-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * Function to create keywordstring
     * based on the source and attributes
     * @param $model
     * @param string $source
     * @return string
     */
    protected function _createKwString($model,$source = 'twitter'){
        $kwString = "";
        switch($source){
            case 'twitter':
                if ($model->is_profile){
                    $kwString = "from:".$model->keyword;
                } else if ($model->is_phrase){
                    $kwString = '"'.$model->keyword.'"';
                } else {
                    $kwString = $model->keyword;
                }
                break;
            case 'facebook':
            case 'gplus':
                if ($model->is_phrase){
                    $kwString = '"'.$model->keyword.'"';
                } else {
                    $kwString = $model->keyword;
                }
                break;
        }
        return urlencode($kwString);
    }

    protected function _saveCallDetails($data){

        $source = $data['source'];

        $t=0;
        foreach($source as $media => $kw){
            $call[$t] = new SocialCall;

            $call[$t]->stream_id = $data['stream_id'];
            $call[$t]->source =  ($media == 'tw') ? 'twitter' : (($media == 'fb') ? 'facebook' : 'googleplus') ;
            $call[$t]->keyword_string = $kw;
            $call[$t]->base_api_url = ($media == 'tw') ? self::TW_API_URL : (($media == 'fb') ? self::FB_API_URL : self::GP_API_URL) ;
            $call[$t]->post_count = 25;
            $call[$t]->frequency = $this->callFrequency[$media];
            $call[$t]->date_created = date('Y-m-d h:i:s');

            //$call[$t]->save();
            $t++;
        }

        $i=0;
        while(isset($call[$i])){
            $call[$i++]->save();
        }
        return true;
    }
}
