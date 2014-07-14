<?php
/**
 * Created by IntelliJ IDEA.
 * User: zainulabdeen
 * Date: 29/01/14
 * Time: 9:08 PM
 * To change this template use File | Settings | File Templates.
 */

return CMap::mergeArray(
    require(dirname(__FILE__) . '/main.php'),
    array(
        'components' => array(
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=ford',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
                'enableParamLogging'=>true,
            ),
            'modules'=>array(
                // uncomment the following to enable the Gii tool
                'gii'=>array(
                    'class'=>'system.gii.GiiModule',
                    'password'=>'p0s!t!0n2',
                    // If removed, Gii defaults to localhost only. Edit carefully to taste.
                    'ipFilters'=>array('127.0.0.1','::1'),
                ),
            ),
        ),
    )
);