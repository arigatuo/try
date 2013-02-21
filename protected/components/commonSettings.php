<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-21
 * Time: 上午9:48
 * To change this template use File | Settings | File Templates.
 */
class CommonSettings{
    public static function commonAccessRules(){
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'roles' => Yii::app()->params['roles'],
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
}