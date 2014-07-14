<?php
/**
 * Created by IntelliJ IDEA.
 * User: mohammedsadik
 * Date: 29/01/14
 * Time: 1:26 AM
 * To change this template use File | Settings | File Templates.
 */
class HybridAuthIdentity extends CUserIdentity
{
    const VERSION = '2.1.2';

    /**
     *
     * @var Hybrid_Auth
     */
    public $hybridAuth;

    /**
     *
     * @var Hybrid_Provider_Adapter
     */
    public $adapter;

    /**
     *
     * @var Hybrid_User_Profile
     */
    public $userProfile;

    public $allowedProviders = array('twitter','google', 'facebook', 'linkedin', 'yahoo', 'live','flickr');

    protected $config;

    function __construct()
    {
        $path = Yii::getPathOfAlias('ext.HybridAuth');
        //echo $path . '/hybridauth-' . self::VERSION . '/hybridauth/Hybrid/Auth.php';
        require_once $path . '/hybridauth-' . self::VERSION . '/hybridauth/Hybrid/Auth.php';  //path to the Auth php file within HybridAuth folder


        $this->config = array(
            //"base_url" => "http://localhost:8888/Local/CK/LYD/index.php?r=user/socialLogin",
            //'base_url' => Yii::app()->baseUrl . '/social/hybridauth',
            //'base_url' => 'http://'. $_SERVER['SERVER_NAME'] . '/hybridauth',
            //'base_url' => Yii::app()->baseUrl . '/social/auth',
            'base_url' => 'http://localhost:8888/cnkAdmin/'.'social/auth',
//            'base_url' => 'http://emporia.position2.com/'.'social/auth',

            "providers" => array(
                "Google" => array(
                    "enabled" => true,
                    "keys" => array(
                        "id" => "546631074723.apps.googleusercontent.com",
                        "secret" => "6Oce1gVzCcI5j32zbY7xZ6Tx",
                    ),
                    "scope" => "https://www.googleapis.com/auth/userinfo.profile " . "https://www.googleapis.com/auth/userinfo.email",
                    "access_type" => "online",
                ),
                "Facebook" => array (
                    "enabled" => true,
                    "keys" => array (
                        "id" => "230578270399769",
                        "secret" => "064254a344eab45cc67774e3e42383f2",
                    ),
                ),
                "Live" => array (
                    "enabled" => false,
                    "keys" => array (
                        "id" => "windows client id",
                        "secret" => "Windows Live secret",
                    ),
                    "scope" => "email"
                ),
                "Yahoo" => array(
                    "enabled" => false,
                    "keys" => array (
                        "key" => "yahoo client id",
                        "secret" => "yahoo secret",
                    ),
                ),
                "LinkedIn" => array(
                    "enabled" => false,
                    "keys" => array (
                        "key" => "linkedin client id",
                        "secret" => "linkedin secret",
                    ),
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array (
                        "key" => "xvuelGDNGX67CwOkVYO00A",
                        "secret" => "voOfiaxlZvj690c72jRnN6uPJJpWucKKsw1XIpo",
                    ),
                ),
                "Flickr" => array(
                    "enabled"=>true,
                    "keys" => array(
                        "key" => "08ddf325e321662eb8a194edc468dffa",
                        "secret" => "7642fa868e4743fa",
                    ),
                ),
            ),

            "debug_mode" => true,

            // to enable logging, set 'debug_mode' to true, then provide here a path of a writable file
            "debug_file" => "/hybrid_auth.log",
        );

        $this->hybridAuth = new Hybrid_Auth($this->config);
    }

    /**
     *
     * @param string $provider
     * @return bool
     */
    public function validateProviderName($provider)
    {
        if (!is_string($provider))
            return false;
        if (!in_array($provider, $this->allowedProviders))
            return false;

        return true;
    }

}