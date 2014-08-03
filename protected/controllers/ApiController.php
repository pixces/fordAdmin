<?php

class ApiController extends Controller
{

    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers
     */
    Const APPLICATION_ID = 'FORDAPP';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

    /**
     * List Action
     * /api/v1/<model>/?limit=x&offset=x&gallery=x
     * Gallery to be used for Content access
     */
    public function actionList()
    {
        // Get the respective model instance
        $model = $_GET['model'];
        $limit = (isset($_GET['limit']) ? $_GET['limit'] : 20);
        $offset = (isset($_GET['offset']) ? $_GET['offset'] : 0);
        $gallery_id = (isset($_GET['gallery']) ? $_GET['gallery'] : null);
        $callback = (isset($_GET['callback'])) ? $_GET['callback'] : null;


        //default order
        $order = 'date_created DESC';

        $criteria=new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->order = $order;
        
        switch($model)
        {
            case 'widget':
                if (isset($_GET['widget_type_id'])){
                    $value = $_GET['widget_type_id'];
                    $field = 'widget_type_id';
                }

                $criteria=new CDbCriteria;
                $criteria->limit = 1;
                $models = Widget::model()->findByAttributes(
                                array($field=>$value),
                                array('limit'=>'1'),
                                array('order'=>'id ASC')
                            );
                $this->_sendResponse(200, CJSON::encode($models));
                break;
            case 'widgetType':
                $criteria=new CDbCriteria;
                $criteria->condition = "status = :status";
                $criteria->params = array(':status' => 'active');
                $models = WidgetType::model()->findAll($criteria);
                break;
            case 'page':
                break;
            case 'phase':
                if (isset($_GET['status'])){
                    $criteria->condition = "status = :status";
                    $criteria->params = array(":status" => $_GET['status']);
                } else if (isset($_GET['phase_name'])){
                    $criteria->condition = "phase_name = :name";
                    $criteria->params = array(":name" => $_GET['phase_name']);
                }
                $criteria->order = 'id ASC';

                $models = Phase::model()->findAll($criteria);
                break;
            case 'content':
                /**
                 * Mandatory params
                 * bool $is_ugc
                 *
                 * Optional Params
                 * int $gallery_id
                 * int $user_id
                 * int $limit
                 * int $offset
                 * string $channel
                 * string $status
                 * string $location
                 * string order
                 */
                $is_ugc = isset($_GET['is_ugc']) && !empty($_GET['is_ugc']) ? $_GET['is_ugc'] : '0'; //mandatory
                $gallery_id = isset($_GET['gallery_id']) && !empty($_GET['gallery_id']) ? (int)$_GET['gallery_id'] : null;
                $limit = isset( $_GET['limit'] ) && !empty($_GET['limit']) ? (int)$_GET['limit'] : null;
                $offset = isset( $_GET['offset']) && !empty($_GET['offset']) ? (int)$_GET['offset'] : 0;
                $user_id = isset( $_GET['user_id']) && !empty($_GET['user_id']) ? (int)$_GET['user_id'] : null;
                $channel = isset( $_GET['channel']) && !empty($_GET['channel']) ? $_GET['channel'] : null;
                $city = isset( $_GET['city']) && !empty($_GET['city']) ? $_GET['city'] : null;
                $orderBy = isset( $_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 't.id DESC';

                //set the query criteria
                $criteria=new CDbCriteria;
                $criteria->order = $orderBy;

                if (isset($limit)){
                    $criteria->limit = $limit;
                }
                if (isset($offset)){
                    $criteria->offset = $offset;
                }

                //setup query conditions
                $condition = " 1 = 1 ";

                if (isset($gallery_id)){
                    $condition .= " AND t.gallery_id = ".$gallery_id;
                }

                if (isset($user_id)){
                    $condition .= " AND t.user_id =".$user_id;
                }
                if (isset($channel)){
                    $condition .= " AND t.channel_name =".$channel;
                }
                if (isset($city)){
                    $condition .= " AND t.city =".$city;
                }

                //display only approved content
                $condition .= " AND t.status = 'approved'";

                $criteria->condition = $condition;

                //echo '<pre>';print_r($criteria);exit;
                $model = Content::model()->findAll($criteria);

                $models = array();
                if ($model){
                    foreach($model as $content){
                        //get the user details
                        //$userProfile = UserProfiles::model()->findByPk($content->user_id);
                        $content->author = $content->user->userProfiles->full_name;
                        $content->location = $content->user->userProfiles->city;
                        $content->image = $content->user->userProfiles->profile_image;

                        //replace the http image path to https
                        if ($content->thumb_image){
                            $content->thumb_image = str_replace( 'http://', 'https://', $content->thumb_image );
                        }
                        $models[] = array('content'=>$content, 'user'=>$content->user->userProfiles);
                    }
                }
                $this->_sendResponse(200, CJSON::encode($models),$callback);
                break;
            default:
                // Model not implemented error
                $this->_sendResponse(200, sprintf( 'Error: Mode <b>list</b> is not implemented for model <b>%s</b>', $_GET['model'] ));
                Yii::app()->end();
        }
        // Did we get some results?
        if(empty($models)) {
            // No
            $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']) );
        } else {
            // Prepare response
            $rows = array();
            foreach($models as $model){
                if (isset($model->attributes)){
                    $rows[] = $model->attributes;
                } else {
                    $rows[] = $model;
                }
            }
            
            $this->_sendResponse(200, CJSON::encode($rows),$callback);
        }
    }

    public function actionView()
    {
        // Check if id was submitted via GET
        if(!isset($_GET['id']))
            $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );

        switch($_GET['model'])
        {
            // Find respective model
            case 'page':
                $pageDet = Page::model()->findByPk($_GET['id']);
                $galleries = array();
                $widgets = array();
                //get galleries

                foreach($pageDet->pageGalleries as $gallery){
                    $galleries[] = $gallery;
                }

                //get widgets
                foreach($pageDet->pageWidgets as $widget){
                   $widgets[] = $widget;
                }
                $model = array('page'=>$pageDet,'gallery'=>$galleries,'widget'=>$widgets);
                break;
            case 'social':
                $model = SocialPost::model()->findByPk($_GET['id']);
                break;
            case 'widget':
                $widgetDet = Widget::model()->findByPk($_GET['id']);
                if($widgetDet){
                    $typeId = $widgetDet->widget_type_id;

                    //get the widgetType details
                    $widgetType = WidgetType::model()->findByPk($typeId);
                    $model = array('label'=>$widgetType->name, 'data' => json_decode($widgetDet->data, true));
                }
                break;
            default:
                $this->_sendResponse(501, sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>', $_GET['model']) );
                Yii::app()->end();
        }
        // Did we find the requested model? If not, raise an error
        if(is_null($model))
            $this->_sendResponse(404, 'No Item found with id '.$_GET['id']);
        else
            $this->_sendResponse(200, CJSON::encode($model));
    }

    public function actionCreate()
	{
        switch($_GET['model'])
        {
            case 'content':

                if ( !$_POST['user_id'] || !$_POST['gallery_id'] ){
                    $this->_sendResponse(404,sprintf('Mandatory fields user_id and gallery_id not available'));
                    Yii::app()->end();
                }
                $saveType = 'new';
                $data = array();
                $model = new Content();

                //check if this same user has not already submitted for
                $isContent = Content::model()->findAll(
                    'user_id = :user_id AND gallery_id = :galleryId AND channel_name = :channel',
                    array(':user_id'=>$_POST['user_id'],':galleryId'=>$_POST['gallery_id'],':channel'=> $_POST['channel_name'])
                );

                if ($isContent){
                    $id = $isContent[0]->id;
                    $saveType = 'edit';

                    //post an update of this content
                    $content = $model->findByPk($id);
                    $content->description = $_POST['description'];
                    $content->status = 'pending';

                    if ($content->save()){
                        $message = $content;
                        $this->_sendResponse(200, CJSON::encode($message));
                    }
                } else {
                    //lets create a new record
                    //now post and save this content
                    foreach($_POST as $field => $val){
                        if ($model->hasAttribute($field)){
                            $data[$field] = $val;
                        }
                    }
                }
                break;
            default:
                $this->_sendResponse(501,sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                Yii::app()->end();
                break;
        }

        // Try to assign POST values to attributes
        foreach($data as $var=>$value) {

            if($model->hasAttribute($var)){
                $model->$var = $value;
            } else {
                echo $msg = sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']);
                $this->_sendResponse(500, $msg );
            }
        }

        // Try to save the model
        if($model->save()){
            $message = $model;
            $this->_sendResponse(200, CJSON::encode($message));
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error)
                    $msg .= "<li>$attr_error</li>";
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
	}

    public function actionUpdate()
    {

        switch($_GET['model'])
        {
            case 'content':
                if ( !$_POST['user_id'] || !$_POST['gallery_id'] ){
                    $this->_sendResponse(200,sprintf('Mandatory fields user_id and gallery_id not available'));
                    Yii::app()->end();
                }

                $data = json_decode($_POST['update'], true);
                $model = new Content();

                if ($_POST['update_type'] == 'partial'){
                    //partial record update based on criteria
                    $qStr = array();
                    foreach($_POST as $var => $value){
                        if($model->hasAttribute($var)){
                            $qStr[] = $var."=".$value;
                        }
                    }
                    $criteria = "'".implode(' AND ',$qStr)."'";

                    try{
                        Content::model()->updateAll($data, $criteria);
                        $this->_sendResponse(200,sprintf('success'));

                    } catch (Exception $e){
                        $this->_sendResponse(200,var_export($e, true));
                    }
                } else {
                    //full update based on id


                }
                break;
            default:
                $this->_sendResponse(501,sprintf('Mode <b>update</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                Yii::app()->end();
                break;
        }
    }

    public function actionDelete()
	{
		$this->render('delete');
	}

    private function _sendResponse($status = 200, $body = '', $callback = '', $content_type = 'application/json')
    {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        //header('Content-type: ' . $content_type);
        header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

        // pages with body are easy
        if($body != '')
        {
            if ($callback){
                echo $callback."(".$body.")";
            } else {
                echo $body;
            }
        } else {
            // create some body messages
            $message = '';
            switch($status)
            {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on
            // (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templated in a real-world solution
            $body = '
                    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                    <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                        <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                    </head>
                    <body>
                        <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                        <p>' . $message . '</p>
                        <hr />
                        <address>' . $signature . '</address>
                    </body>
                    </html>';
            echo $body;
        }
        Yii::app()->end();
    }

    private function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    private function _checkAuth()
    {
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if(!(isset($_SERVER['HTTP_X_USERNAME']) and isset($_SERVER['HTTP_X_PASSWORD']))) {
            // Error: Unauthorized
            $this->_sendResponse(401);
        }
        $username = $_SERVER['HTTP_X_USERNAME'];
        $password = $_SERVER['HTTP_X_PASSWORD'];
        // Find the user
        $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
        if($user===null) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Name is invalid');
        } else if(!$user->validatePassword($password)) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Password is invalid');
        }
    }


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

    /**
     * Function to authenticate a social user
     *
     */
    public function actionAuthenticate(){

        if(isset($_GET['social'])){
            $provider = $_GET['social'];

            if($provider=="googleplus" || $provider=="youtube"){
                $provider = "google";
            }

            $haComp = new HybridAuthIdentity();

            if (!$haComp->validateProviderName($provider))
                $this->_sendResponse(500, 'Error: This social account is not supported' );

            $haComp->adapter = $haComp->hybridAuth->authenticate($provider);
            $haComp->userProfile = $haComp->adapter->getUserProfile();

            // Save the user details
            $this->saveSocialData($haComp->userProfile,$provider,$haComp->adapter->getAccessToken());

        }
        //echo "<script> window.opener.updateUserInfo('".$provider."');*/ window.close();</script>";
        echo "<script> window.close();</script>";
    }

    public function actionTest(){

    }

    /**
     * Function to return the authenticated users details
     */
    public function actionGetSocialUser(){
        // Little hack


        if(isset($_GET['social'])){
            $provider = $_GET['social'];

            if($provider=="googleplus" || $provider=="youtube"){
                $provider = "google";
            }

            //TODO: Fix this : Unable to store session details, so we need to authenticate the user every time
            $haComp = new HybridAuthIdentity();

            if (!$haComp->validateProviderName($provider))
                $this->_sendResponse(500, 'Error: This social account is not supported' );

            $haComp->adapter = $haComp->hybridAuth->authenticate($provider);
            //$haComp->userProfile = $haComp->adapter->getUserProfile();
            $this->_sendResponse(200, CJSON::encode($haComp->adapter->getUserProfile()),$_GET['callback']);
        }

        $this->_sendResponse(404, 'Error: No social account found.');
    }


    /**
     *
     * Function to save social user data
     */
    private function saveSocialData($profileInfo,$social,$tokenInfo){
        $socialAuths = new SocialAuth();

        $authData['social'] = $social;
        $authData['identifier'] = $profileInfo->identifier;
        $authData['first_name'] = $profileInfo->firstName;
        $authData['last_name'] = $profileInfo->lastName;
        $authData['display_name'] = $profileInfo->firstName;
        $authData['email'] = $profileInfo->email;
        $authData['location'] = $profileInfo->region;
        $authData['access_token'] = $tokenInfo['access_token'];
        $authData['access_secret'] = $tokenInfo['access_token_secret'];
        $authData['token_expiry'] = $tokenInfo['expires_in'];

        $socialAuths->attributes = $authData;

        if ($socialAuths->save()){
            return true;
        }
        return false;
    }

}