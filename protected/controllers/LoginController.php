<?php
/**
 * Created by IntelliJ IDEA.
 * User: zainulabdeen
 * Date: 26/01/14
 * Time: 7:21 PM
 * To change this template use File | Settings | File Templates.
 */ 
class LoginController extends Controller
{
    /**
     * Displays the login page
     */
    public function actionIndex()
    {
        if (!Yii::app()->user->isGuest){
            //redirect to the index page
            $this->redirect(array('gallery/index'));
            exit;
        }

        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                //echo  Yii::app()->user->returnUrl;
                $this->redirect(array('gallery/index'));
        }

        // disable the default template
        $this->layout = false;

        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}
